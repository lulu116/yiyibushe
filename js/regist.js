$(function(){
	//点击切换验证码
	$("#mycoder").click(function(){
		$(this).attr('src','./coder.php?randoms=' + Math.random());
	});
	//点击注册
	$("#registBtn").click(function(){
		//获取注册信息
		var username = $("#username").val();
		var passwd = $("#passwd").val();
		var tel = $("#tel").val();
		var useraddress = $("#useraddress").val();
		var usercode = $("#usercode").val();
        var userImg = $("#userImg").val().substr($("#userImg").val().lastIndexOf('/')+1);
		if(!username){
            $("#username").next('span').html('请输入账号!');
            $("#username").next('span').css('color','#f00');
            $("#username").focus();
            return;
        }else{
            $("#username").next('span').html('');
        }
        if(!passwd){
            $("#passwd").next('span').html('请输入密码!');
            $("#passwd").next('span').css('color','#f00');
            $("#passwd").focus();
            return;
        }else {
            var passwdReg = /^(\w){6,20}$/;
            if(!passwdReg.test(passwd)){
                $("#passwd").next('span').html('密码只能输入6-20个字母、数字、下划线!');
                $("#passwd").next('span').css('color','#f00');
                return;
            }else {
                $("#passwd").next('span').html('');
            }
        }

        if(!tel){
            $("#tel").next('span').html('请输入手机号!');
            $("#tel").next('span').css('color','#f00');
            $("#tel").focus();
            return;
        }else {
            var telReg = /^1[3|4|5|8][0-9]\d{4,8}$/;
            if(!telReg.test(tel)){
                $("#tel").next('span').html('请输入11位手机号!');
                $("#tel").next('span').css('color','#f00');
                $("#tel").focus();
                return;
            }else{
                $("#tel").next('span').html('');
            }

        }

        if(!useraddress){
            $("#useraddress").next('span').html('请输入地址!');
            $("#useraddress").next('span').css('color','#f00');
            $("#useraddress").focus();
            return;
        }else{
            $("#useraddress").next('span').html('');
        }
        if(!usercode){
            $("#usercode").css('border',"1px solid #f00");
            $("#usercode").focus();
            return;
        }else{
            $("#usercode").css('border',"1px solid #fff");
        }

        //数据格式无误发送ajax请求
        $.ajax({
            url: './regist_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: {
                username: username,
                passwd: passwd,
                tel: tel,
                useraddress: useraddress,
                usercode: usercode,
                userImg:userImg
            },
            success: function(data) {
                if (data.res == 'no_coder') {
                    alert("验证码错误，请重新输入!");
                    $("#usercode").focus();
                    $("#usercode").css('border',"1px solid #f00");
                } else if (data.res == 'error') {
                    alert("注册失败");
                } else if(data.res == 'success'){
                    alert("注册成功");
                    location.href = "./login.php";
                }
            }
        });


        

	});
});