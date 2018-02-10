$(function(){
	//点击切换验证码
	$("#mycoder").click(function(){
		$(this).attr('src','./coder.php?randoms=' + Math.random());
	});
    //跳转到注册页面
    $("#regist").click(function () {
        window.location.href = "./regist.php";
    })
	//点击登录
	$("#loginBtn").click(function(){
		//获取登录信息
		var username = $("#username").val();
		var passwd = $("#passwd").val();
		var usercode = $("#usercode").val();
        var remember = $('input[name="remember"]:checked').val();
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
            $("#passwd").next('span').html('');
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
            url: './login_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: {
                username: username,
                passwd: passwd,
                usercode: usercode,
                remember:remember
            },
            success: function(data) {
                if (data.res == 'no_coder') {
                    alert("验证码错误，请重新输入!");
                    $("#usercode").focus();
                    $("#usercode").css('border',"1px solid #f00");
                } else if (data.res == 'no_exit_username') {
                    alert("用户名不存在！");
                } else if(data.res == 'invail_passwd'){
                    alert("密码错误，请重新输入！");
                    $("#passwd").css('border',"1px solid #f00");
                    $("#passwd").focus();
                }else if(data.res == 'success'){
                    alert("登录成功！");
                    location.href = "./index.php";
                }
            }
        });


        

	});
});