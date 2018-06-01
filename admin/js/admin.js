$(document).ready(function() {
    //1.点击添加分类
    //把cate_id与catename传到后台
    $('#addCateBtn').click(function() {
        if (!$("#catename").val()) {
            $('#catename').next('span').html('分类名称必填！').css("color", "#f00");
            $('#catename').focus();
            return;
        } else {
            $('#cate_name').next('span').html('');
        }
        //console.log($("#addCateForm").serialize())
        //提交数据
        $.ajax({
            url: './addCate_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: $("#addCateForm").serialize(), //序列化表单
            success: function(data) {
                if (data.res == 'success') {
                    alert('操作成功，即将跳转到分类列表页！');
                    window.location.href = './cateList.php';
                } else {
                    alert('操作失败！');
                }
            }
        });
    });

    //2.点击删除分类信息
    $('.delcate').click(function() {
        // 2.1删除是一个相对较危险的操作，需要给用户确认提示
        if (!confirm('你确定要删除该信息吗？')) {
            return;
        }
        //2.2需要找到删除的信息的主键
        //获取自定义属性cate_id
        var cate_id = $(this).attr('cate_id');
        //2.3交给后台进行数据处理
        $.ajax({
            url: 'delCate_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: { cate_id: cate_id },
            success: function(data) {
                if (data.res == 'success') {
                    alert('删除成功！');
                    window.location.reload(); //刷新当前页
                } else if (data.res == 'error') {
                    alert('删除失败！');
                }
            }
        });
    });

    //3.添加内容--联动菜单
    $('#cate_id_p').change(function() {
        //3.1得到一级分类的id值(cate_id)。然后去数据库里面得到他的子分类
        var cate_id_p = $(this).val();
        //3.2每选择一次一级分类都要清空二级分类,才能得到最新的二级分类
        $('#cate_id_c').html('');

        $.ajax({
            url: './getChild_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: { cate_id_p: cate_id_p },
            success: function(data) {
                // console.log(data)
                //遍历数组
                $(data).each(function(index, ele) {
                    var cate_child_option = '<option value="' + ele.cate_id + '">' + ele.catename + '</option>';
                    //添加到二级分类列表中
                    $("#cate_id_c").append(cate_child_option);

                });
            }
        });
    });

    //4.点击添加尺寸
    $('#addSize').click(function() {
        var input = document.createElement('input');
        var btn = document.createElement('button');
        btn.innerHTML = "删除";
        $('.sizename').parent().append(input);
        $('.sizename').parent().append(btn);
        input.setAttribute('class', 'sizename');
        input.setAttribute('name', 'sizename[]');
        input.setAttribute('type', 'text');
        btn.setAttribute('class', 'close_size btn-danger');
        btn.setAttribute('type', 'button');
        $('.close_size').on('click', function() {
            $(this).prev('input').remove();
            $(this).remove();
        });
    });

    //5.点击添加颜色
    $('#addColor').click(function() {
        var input = document.createElement('input');
        var btn = document.createElement('button');
        btn.innerHTML = "删除";
        $('.colorname').parent().append(input);
        $('.colorname').parent().append(btn);
        input.setAttribute('class', 'colorname');
        input.setAttribute('name', 'colorname[]');
        input.setAttribute('type', 'text');
        btn.setAttribute('class', 'close_color btn-danger');
        btn.setAttribute('type', 'button');
        $('.close_color').on('click', function() {
            $(this).prev('input').remove();
            $(this).remove();
        });
    });

    //6.添加颜色框失去焦点时
    $('.colorname').on('blur', function() {
        $('#sku').html('<tr height="40"><td>颜色</td><td>尺寸</td><td>库存</td></tr>');
        //遍历所有尺寸节点
        for (var i = 0; i < $('.sizename').length; i++) {
            //遍历所有颜色节点
            for (var j = 0; j < $('.colorname').length; j++) {
                $tr = '<tr><td>' + $('.colorname')[j].value + '</td><td>' + $('.sizename')[i].value + '</td><td><input value="10" name="stock"></td></tr>';
                $('#sku').append($tr);
            }
        }
    });

    //7.添加尺寸框失去焦点时
    $('.sizename').on('blur', function() {
        $('#sku').html('<tr height="40"><td>颜色</td><td>尺寸</td><td>库存</td></tr>');
        //遍历所有尺寸节点
        for (var i = 0; i < $('.sizename').length; i++) {
            //遍历所有颜色节点
            for (var j = 0; j < $('.colorname').length; j++) {
                $tr = '<tr><td>' + $('.colorname')[j].value + '</td><td>' + $('.sizename')[i].value + '</td><td><input value="10" name="stock"></td></tr>';
                $('#sku').append($tr);
            }
        }
    });

    //8.添加内容事件
    $('#addContent').click(function() {
        if (!$('#productname').val()) {
            $('#productname').next('span').html('标题必填！').css("color", "#f00");
            $('#productname').focus();
            return;
        } else {
            $('#productname').next('span').html('');
        }
        if (!$('#price').val()) {
            $('#price').next('span').html('价格必填！').css("color", "#f00");
            $('#price').focus();
            return;
        } else {
            $('#price').next('span').html('');
        }
        //提交数据

        $.ajax({
            url: './addContent_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: $('#addContentForm').serialize(), //对整个表单的数据进行序列化
            success: function(data) {
                if (data.res == 'success') {
                    alert('操作成功！');
                    window.location.href = './contentList.php';
                } else if (data.res == 'error') {
                    alert('操作失败！');
                }
            }
        });
    });

    //9.点击删除内容
    $(".delcontent").click(function() {
        // 9.1删除是一个相对较危险的操作，需要给用户确认提示
        if (!confirm('你确定要删除该信息吗？')) {
            return;
        }
        //9.2需要找到删除的信息的主键
        //获取自定义属性cate_id
        var product_id = $(this).attr('product_id');
        //2.3交给后台进行数据处理
        $.ajax({
            url: 'delContent_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: { product_id: product_id },
            success: function(data) {
                if (data.res == 'success') {
                    alert('删除成功！');
                    window.location.reload(); //刷新当前页
                } else if (data.res == 'error') {
                    alert('删除失败！');
                }
            }
        });
    });
    //10.管理员给用户的反馈回复
    $("#addSuggest").click(function() {
        var admin_suggest = $("#admin_suggest").val();
        var username = $("#username").val();
        if (!$("#admin_suggest").val()) {
            $("#admin_suggest").next('span').html('必填').css('color', '#f00');
            $("#admin_suggest").focus().css('border', '1px solid #f00');
            return;
        } else {
            $("#admin_suggest").next('span').html('');
        }
        $.ajax({
            url: 'addSuggest_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: { admin_suggest: admin_suggest, username: username },
            success: function(data) {
                if (data.res == 'success') {
                    alert('回复成功！');
                    window.location.href = "admin_suggest.php";
                } else if (data.res == 'error') {
                    alert('回复失败！');
                    window.location.reload();
                }
            }
        });

    });
    //11.删除反馈信息
    $(".delsuggest").click(function() {
        if (!confirm('亲，请考虑清楚再删除吧！')) {
            return;
        }
        //得到反馈信息ID
        var suggest_id = $(this).attr('suggest_id');
        //发送AJAX请求
        $.ajax({
            url: 'delSuggest_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: { suggest_id: suggest_id },
            success: function(data) {
                if (data.res == 'success') {
                    alert('删除成功！');
                    window.location.reload(); //刷新当前页
                } else if (data.res == 'error') {
                    alert('删除失败！');
                }
            }
        });
    });
    //12.修改管理员给用户的反馈
    $("#update_suggest").click(function() {

        var admin_suggest = $("#admin_suggest").val();
        var suggest_id = $("#admin_suggest").attr("suggest_id");

        $.ajax({
            url: './updateSuggest_AJAX.php',
            type: 'POST',
            dataType: 'json',
            data: { admin_suggest: admin_suggest, suggest_id: suggest_id },
            success: function(data) {
                if (data.res == 'success') {
                    alert('操作成功！');
                    window.location.href = './admin_suggest.php';
                } else if (data.res == 'error') {
                    alert('操作失败！');
                }
            }
        });

    });


});
