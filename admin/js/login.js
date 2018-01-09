$(document).ready(function() {
    //实现登录事件
    $('#loginbutton').click(function() {
        //账号必填
        var $realname = $('#realname').val();
        var $passwd = $('#passwd').val();
        var $remember = $('input[name="remember"]:checked').val();
        //console.log($remember); 选中为1
        if (!$realname) {
            $('#realname').next('span').html('账号必填！').css("color","#f00");
            $('#realname').focus();
            return;
        } else {
            $('#realname').next('span').html('');
        }

        if (!$passwd) {
            $('#passwd').next('span').html('密码必填！').css("color","#f00");
            $('#passwd').focus();
            return;
        } else {
            $('#passwd').next('span').html('');
        }

        //进入数据处理阶段：AJAX
        $.ajax({
            url: './loginSubmit_AJAX.php',
            type: 'POST', 
            dataType: 'json', 
            data: { realname: $realname, passwd: $passwd, remember: $remember }, 
            success: function(data) {
                console.log(data);
                if (data.res == 'no_exit_realname') {
                    alert('请输入正确账号！');
                    $("#realname").focus();
                } else if (data.res == 'invail_passwd') {
                    alert("请输入正确的密码！");
                    $("#passwd").focus();
                } else if (data.res == 'success') {
                    alert('登录成功');
                    window.location.href = 'index.php';
                }
            }
        });

    });

    //点击修改密码
    $("#updatePWD_btn").click(function () {
        var realname = $("#realname").val();
        var passwd = $("#passwd").val();
        var nowpasswd = $("#nowpasswd").val();
        var repasswd = $("#repasswd").val();

        if(!realname){
            $('#realname').next('span').html('必填！').css("color","#f00");
            $('#realname').focus();
            return;
        }else {
            $('#realname').next('span').html('');
        }
        if(!passwd){
            $('#passwd').next('span').html('必填！').css("color","#f00");
            $('#passwd').focus();
            return;
        }else {
            $('#passwd').next('span').html('');
        }
        if(!nowpasswd){
            $('#nowpasswd').next('span').html('必填！').css("color","#f00");
            $('#nowpasswd').focus();
            return;
        }else {
            $('#nowpasswd').next('span').html('');
        }
        if(!repasswd){
            $('#repasswd').next('span').html('必填！').css("color","#f00");
            $('#repasswd').focus();
            return;
        }else {
            $('#repasswd').next('span').html('');
        }
        //两次密码是否一致
        if(nowpasswd != repasswd){
            $('#repasswd').next('span').html('两次输入密码不一致，请重新输入！').css("color","#f00");
        }else{
            $('#repasswd').next('span').html('');
        }
        //数据无误发送ajax请求
        $.ajax({
            url: './updatePWD_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: {realname:realname, passwd: passwd, nowpasswd: nowpasswd, repasswd: repasswd },
            success: function(data) {
                if(data.res == 'no_exit_realname'){
                    $('#realname').next('span').html('当前账号不存在！').css("color","#f00");
                    $('#realname').focus();
                    return;
                } else if(data.res == 'invail_passwd'){
                    $('#passwd').next('span').html('当前密码有误！').css("color","#f00");
                    $('#passwd').focus();
                    return;
                }
                if (data.res == 'success') {
                    alert('修改成功，即将跳转到主页！');
                   window.location.href="login.php";
                }
            }
        });
    });
});
