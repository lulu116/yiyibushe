<!DOCTYPE html>
<html class="noIE" lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>衣衣不舍商城-注册</title>
    <link rel="shortcut icon" href="images/yiyi_logo.png">
    <link rel="stylesheet" type="text/css" href="//css.vancl.com/css.ashx?href=[/index/global.css,vanclcommon2012.css],[/login/footer.css]&amp;v=121211" />
    
    <script type="text/javascript" language="javascript" src="//js.vancl.com/js.ashx?href=[/jquery/jquery-1.8.3.min,jquery.fn.alert],[/public/cookies_oper.js,trace.js]&compress"></script>
    
    
    <link href="https://login.vancl.com/Css/login/reg.css" type="text/css" rel="stylesheet" />
    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="body" class="wrapper">
    <div id="top" style="margin:10px 0 0 0;padding:0 0 10px 0; border-bottom:solid 1px #919191;">
        <img src="img/logo.png" alt="衣衣不舍" title="衣衣不舍" onclick="javascript:window.location.href='index.php'" style="cursor:pointer" />
    </div>
    <!--logo-->
</div>
    <!-- 编辑器使用的==配置文件 start-->
    <script type="text/javascript" src="./admin/public/plug/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="./admin/public/plug/ue/ueditor.all.js"></script>
    <!-- 编辑器使用的==配置文件 end-->
    <span class="box15"></span>
    <div class="regist">
        <h1>
            注册新用户 <span>我已经注册，现在就<a href="login.php">登录</a></span>
        </h1>
        <div style="width: 100%; height: 10px; overflow: hidden; clear: both;">
        </div>
        <div class="content_left">
            <!--tag-->             
            <div class="contain">
                <div class='form-group'>
                    <label for='username'>账号</label>
                    <input id='username' name="username" type='text' placeholder="请输入账号" class='form-control' >
                    <span></span>
                </div>
                <div class='form-group'>
                    <label for='passwd'>密码</label>
                    <input id='passwd' name="passwd" type='password'  placeholder='请输入密码' class='form-control' >
                    <span></span>
                </div>
                <div class='form-group'>
                    <label for='tel'>手机号</label>
                    <input id='tel' name="tel" type='text'  placeholder='请输入手机号' class='form-control' >
                    <span></span>
                </div>
                 <div class='form-group'>
                    <label for='useraddress'>地址</label>
                    <input id='useraddress' name="useraddress" type='text'  placeholder='请输入地址' class='form-control' >
                    <span></span>
                </div>
                <div class='form-group'>
                    <label for='usercode'>验证码</label>
                    <input id='usercode' name="usercode" type='text' placeholder="请输入验证码" class='form-control'>
                    <img src="./coder.php" id="mycoder" alt="验证码" style="cursor: pointer;margin-top: -43px;margin-left: 325px;">
                </div>
                <div class="form-group">
                    <div class="controls">
                        <button type="button" id="j_upload_img_btn" class="btn-info" style="padding:5px 10px;">上传头像</button>
                        <!-- 点击多图上传确认后图片显示在ul里面-->
                        <ul id="upload_img_wrap"></ul>
                        <!-- 传图片地址值用的 -->
                        <input type="hidden" id="userImg" name="userImg">

                        <!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面 -->
                        <textarea id="uploadEditor" style="display: none;"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4">
                <button class="btn btn-danger btn-round pull-left" id="registBtn">点我注册</button>
            </div>
        </div>
        <!--content_left-->
        <div class="content_right">
            <img src="img/logo1.jpg" style="width: 420px" />
        </div>
        <!--content_right-->
        <div class="clear">
        </div>
    </div>
    <!--regist-->
    <input name="hdn_RegisterType" id="hdn_RegisterType" type="hidden" value="email" />
    <input name="hdn_ResourceHref" id="hdn_ResourceHref_name" type="hidden" value="http://localhost/indexmk/?http%3A%2F%2Fwww.vancl.com%2F" />
    <!--wrapper-->
    </form>
    <script type="text/javascript">
        //1.detail是需要加载编辑器的id
        var ue = UE.getEditor('detail');
        //==========================================================
        // 如何单独上传图片功能
        // 监听多图上传和上传附件组件的插入动作
        // 这里需要实例化一个新的编辑器，防止和上面的编辑器的内容冲突
        var uploadEditor = UE.getEditor("uploadEditor", {
            isShow: false,
            focus: false,
            enableAutoSave: false,
            autoSyncData: false,
            autoFloatEnabled:false,
            wordCount: false,
            sourceEditor: null,
            scaleEnabled:true,
            toolbars: [["insertimage", "attachment"]]
        });
        uploadEditor.ready(function () {
            uploadEditor.addListener("beforeInsertImage", _beforeInsertImage);
        });

        // 2.自定义按钮绑定触发多图上传和上传附件对话框事件
        document.getElementById('j_upload_img_btn').onclick = function () {
            var dialog = uploadEditor.getDialog("insertimage");
            dialog.title = '多图上传';
            dialog.render();
            dialog.open();
        };
        // 多图上传动作
        function _beforeInsertImage(t, result) {
            var imageHtml = '';
            var imgval = '';
            for(var i in result){
                imageHtml += '<li><img src="'+result[i].src+'" alt="'+result[i].alt+'" height="150"></li>';
                imgval = result[i].src;
            }
            document.getElementById('upload_img_wrap').innerHTML = imageHtml;
            //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
            //具体怎么设置看项目需求，我这里只是举个例子
            document.getElementById('userImg').value = imgval;
        }
    </script>
        
<div id="bottom" align="center">
		<div id="bottoms">
			<p class="bZp3">Copyright 2013-2020 vancl.com All Rights Reserved 京ICP证100557号 京公网安备11010102000579号 出版物经营许可证新出发京批字第直110138号</p>
			<div id="footerArea">
            <div class="subFooter"><a rel="nofollow" href="https://search.szfw.org/cert/l/CX20111229001302001330" class="redLogo" target="_blank"></a><span class="costumeOrg"></span><a rel="nofollow" href="http://www.315online.com.cn/member/315090053.html" class="wsjyBzzx" target="_blank"></a><a rel="nofollow" href="http://www.hd315.gov.cn/beian/view.asp?bianhao=010202010081900017" class="vanclMsg" target="_blank"></a></div>
            </div>
		</div>
	</div>
    </center>
    <!--javascript-->
    
    
    <script type="text/JavaScript" src="https://js.vancl.com/js.ashx?href=[/login/reg.js]&v=2017073101&compress"
        language="javascript"></script>
    

    
    <script type="text/javascript" language="javascript" src="//js.vanclimg.com/js.ashx?href=[public/union_websource.js]&compress"></script>
</body>
</html>
<script src="js/regist.js"></script>
