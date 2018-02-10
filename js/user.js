$(function () {
    //1.点击添加到购物车
    $("#addCart").click(function () {
        if (!confirm("您确定要加入购物车吗?")) {
            return;
        }
        var productId = $(this).attr('productId');
        var color_sel = $("#color_sel").val();
        var size_sel = $("#size_sel").val();
        //发送AJAX请求到后台
        $.ajax({
            url: './addCart_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: { productId: productId,color_sel:color_sel,size_sel:size_sel}, //自定义的属性
            success: function(data) {
                if (data.res == 'no_login') {
                    alert("亲，您还没登录！");
                    window.location.href = './login.php';
                } else if(data.res == 'no_color') {
                    alert("请选择商品颜色");
                    window.location.reload();
                }else if(data.res == 'no_size') {
                    alert("请选择商品尺寸");
                    window.location.reload();
                }else if (data.res == 'error') {
                    alert("加入购物车失败了！");
                    window.location.reload();
                } else {
                    alert("加入购物车成功了！")
                    window.location.href = './cart.php';
                }
            }
        })
    });
    //2.鼠标移入删除按钮变色
    $(".delCart").hover(function () {
        $(this).addClass('btn-danger');
    }, function () {
        $(this).removeClass('btn-danger');
    });
    //3.点击删除购物车信息
    $(".delCart").click(function () {
        var cart_id = $(this).attr('cart_id');
        $.ajax({
            url: './delCart_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: {cart_id: cart_id}, //自定义的属性
            success: function (data) {
                if (data.res == 'no_login') {
                    alert("亲，您还没登录！");
                    window.location.href = './login.php';
                } else if (data.res == 'error') {
                    alert("删除失败！");
                }else if(data.res == 'success'){
                    alert("删除成功！");
                    window.location.reload();
                }
            }
        });
    });

    //4.icon添加到购物车
    $(".addCart").click(function () {
       if(!confirm("您确定要加入购物车吗？")) {
           return;
       }
       var productId = $(this).attr('productId');
        var color_sel = Math.round(Math.random() * (60 - 40) + 40);
        var size_sel = Math.round(Math.random() * (50 - 30) + 30);
       $.ajax({
            url: './addCart_icon_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: { productId: productId,color_sel:color_sel,size_sel:size_sel}, //自定义的属性
            success: function(data) {
                if (data.res == 'no_login') {
                    alert("亲，您还没登录！");
                    window.location.href = './login.php';
                }else if (data.res == 'error') {
                    alert("加入购物车失败了！");
                    window.location.reload();
                } else {
                    alert("加入购物车成功了！");
                    window.location.href = './cart.php';
                }
            }
       });
    });
    //5.加入收藏
    $(".addCollect").click(function () {
        var productId = $(this).attr('productId');
        $.ajax({
            url: './addCollect_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: { productId: productId}, //自定义的属性
            success: function(data) {
                if (data.res == 'no_login') {
                    alert("亲，您还没登录！");
                    window.location.href = './login.php';
                }else if(data.res == 'no_repeat'){
                    alert("该商品已经收藏过了！");
                    window.location.reload();
                } else {
                    alert("添加收藏成功了！");
                    window.location.href = './collect.php';
                }
            }
        });
    })

    //6.修改用户信息
    $("#updateUserImg").click(function(){
        var username = $("#username").val();
        var passwd = $("#passwd").val();
        var nowpasswd = $("#nowpasswd").val();
        var repasswd = $("#repasswd").val();
        var tel = $("#tel").val();
        var useraddress = $("#useraddress").val();

        if(!username){
            $('#username').next('span').html('必填！').css("color","#f00");
            $('#username').focus();
            return;
        }else {
            $('#username').next('span').html('');
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
            $('#repasswd').focus();
            return;
        }else{
            $('#repasswd').next('span').html('');
        }

        if(!tel){
            $('#tel').next('span').html('必填！').css("color","#f00");
            $('#tel').focus();
            return;
        }else {
            $('#tel').next('span').html('');
        }
        if(!useraddress){
            $('#useraddress').next('span').html('必填！').css("color","#f00");
            $('#useraddress').focus();
            return;
        }else {
            $('#useraddress').next('span').html('');
        }

        //数据无误，发送AJAX请求
        $.ajax({
            url: './updateUserImg_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: {username:username, passwd: passwd, nowpasswd: nowpasswd,tel:tel,useraddress:useraddress  },
            success: function(data) {
                if(data.res == 'no_exit_username'){
                    $('#username').next('span').html('当前账号不存在！').css("color","#f00");
                    $('#username').focus();
                    return;
                } else if(data.res == 'invail_passwd'){
                    $('#passwd').next('span').html('当前密码有误！').css("color","#f00");
                    $('#passwd').focus();
                    return;
                }else if (data.res == 'success') {
                    alert('当前用户信息有变！即将跳转登录页');
                    window.location.href="login.php";
                }
            }
        });
    });

    //7.修改地址
    $("#updateAddress").click(function () {
        var username = $("#username").val();
        var tel = $("#tel").val();
        var useraddress = $("#useraddress").val();
        if(!username){
            $('#username').next('span').html('必填！').css("color","#f00");
            $('#username').focus();
            return;
        }else {
            $('#username').next('span').html('');
        }
        if(!tel){
            $('#tel').next('span').html('必填！').css("color","#f00");
            $('#tel').focus();
            return;
        }else {
            $('#tel').next('span').html('');
        }
        if(!useraddress){
            $('#useraddress').next('span').html('必填！').css("color","#f00");
            $('#useraddress').focus();
            return;
        }else {
            $('#useraddress').next('span').html('');
        }
        //数据无误，发送AJAX请求
        $.ajax({
            url: './updateAddress_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: {username:username,tel:tel,useraddress:useraddress  },
            success: function(data) {
                if(data.res == 'no_exit_username'){
                    $('#username').next('span').html('当前账号不存在！').css("color","#f00");
                    $('#username').focus();
                    return;
                } else if (data.res == 'success') {
                    alert('修改成功，即将跳转到主页！');
                    window.location.href="person_center.php";
                }
            }
        });
    });

    //8.用户提交意见
    $("#submit_suggest").click(function () {
        var content = $("#content").val();
        var sele_suggest = $("#sele_suggest").val();
        if(!content){
            $("#content").next('span').html('不能为空').css('color','#f00');
            $("#content").focus().css('border','1px solid #f00');
            return;
        }else {
            $("#content").next('span').html('');
        }
       //数据无误发送AJAX
        $.ajax({
            url: './submit_suggest_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: {content:content,sele_suggest:sele_suggest},
            success: function(data) {
                if(data.res == 'no_login'){
                    alert("亲，您还没登录！");
                    window.location.href = './login.php';
                } else if (data.res == 'admin_no_login') {
                    alert('亲！管理员没有登录，请及时联系本网站管理员哦！');
                    window.location.reload();
                }else if(data.res == 'success'){
                    alert('提交意见成功，即将跳转到主页！');
                    window.location.href="person_center.php";
                }
            }
        });
    })

    //9.确认支付
    $(".submit_pay").click(function(){
        if (!confirm("您确定要购物此商品吗?")) {
            return;
        }
        var productId = $(this).attr('productId');
        var colorId = $(this).attr('colorId');
        var sizeId = $(this).attr('sizeId');
        var address = $(this).attr('address');
        var price = $(this).attr('price');
        $.ajax({
            url: './pay_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: { productId: productId,colorId:colorId,sizeId:sizeId,address:address,price:price}, //自定义的属性
            success: function(data) {
                if (data.res == 'error') {
                    alert("商品支付失败！");
                    window.location.reload();
                } else {
                    alert("商品支付成功了！");
                    window.location.href = './pay_ok.php';
                }
            }
        });
    });

    //10.删除订单
    $(".delOrder").click(function () {
        if(!confirm('你确定要删除此订单吗？')){
            return;
        }
        var order_id = $(this).attr('order_id');
        $.ajax({
            url: './delOrder_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: {order_id: order_id}, //自定义的属性
            success: function (data) {
                if (data.res == 'error') {
                    alert("删除失败！");
                }else if(data.res == 'success'){
                    alert("删除成功！");
                    window.location.href="./person_center.php";
                }
            }
        });
    });
    //11.点击进入店铺位置
    $(".mymap").click(function () {
        window.location.href = "store_location.php";
    })
})
