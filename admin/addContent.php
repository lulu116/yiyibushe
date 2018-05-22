<?php 
    require './head.php';
    //获取全部的一级分类
    $cate_one = $db->getDatas('cate','*','parent_cate_id=0');
    // var_dump($cate_one);
?>
    <!-- 编辑器使用的==配置文件 start-->
    <script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
    <!-- 编辑器使用的==配置文件 end-->
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">颜色主题:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     内容添加
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">首页</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">商品内容管理</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           内容添加
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> 内容添加 </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="#" class="form-horizontal" id="addContentForm">
                                <div class="control-group">
                                    <label class="control-label">一级分类</label>
                                    <div class="controls">
                                        <select class="span6 "  name="cate_id_p" id="cate_id_p" tabindex="1">
                                            <option value="0">请选择</option>
                                            <?php 
                                                foreach ($cate_one as $key =>$value){
                                                    echo '<option value="'.$value['cate_id'].'">'.$value['catename'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">二级分类</label>
                                    <div class="controls">
                                        <select class="span6 " name="cate_id_c" id="cate_id_c" tabindex="1">
                                            <option value="0">请选择</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">标题</label>
                                    <div class="controls">
                                        <input type="text" id="productname" name="productname" class="span6 " />
                                        <span></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">价格</label>
                                    <div class="controls">
                                        <input type="number" id="price" name="price" class="span6 " />
                                        <span></span>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">添加人</label>
                                    <div class="controls">
                                        <input type="text" id="username" name="username" class="span6 " />
                                        <span></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">颜色</label>
                                    <div class="controls">
                                        <input type="text" class="colorname" name="colorname[]" class="span6 " />
                                        <button type="button" class="btn btn-success" id="addColor">+</button>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">尺寸</label>
                                    <div class="controls">
                                        <input type="text" class="sizename" name="sizename[]" class="span6 " />
                                        <button type="button" class="btn btn-success" id="addSize">+</button>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">库存</label>
                                    <div class="controls">
                                        <table id="sku" border="1" style="width:80%;border-collapse: collapse;">
                                            <tr height="40">
                                                <td>颜色</td>
                                                <td>尺寸</td>
                                                <td>库存</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">产品类型</label>
                                    <div class="controls">
                                        <input type="text" id="types" name="types" class="span6 " />
                                        <span></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">商家保证</label>
                                    <div class="controls">
                                        <input type="text" id="assure" name="assure" class="span6 " />
                                        <span></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">推荐</label>
                                    <div class="controls">
                                        <input type="checkbox" id="woman_img" name="woman_img" value="1" />
                                        推荐到女装轮播
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">推荐</label>
                                    <div class="controls">
                                        <input type="checkbox" id="man_img" name="man_img" value="1" />
                                        推荐到男装轮播
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">推荐</label>
                                    <div class="controls">
                                        <input type="checkbox" id="img" name="img" value="1" />
                                        推荐到主轮播
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">男装或女装</label>
                                    <div class="controls">
                                        <input type="number" id="sex_type" name="sex_type" class="span6 " placeholder="男装：1，女装：2" />
                                        <span></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">图片</label>
                                    <div class="controls">
                                    <button type="button" id="j_upload_img_btn">多图上传</button>
                                    <!-- 点击多图上传确认后图片显示在ul里面-->
                                    <ul id="upload_img_wrap"></ul>
                                        <!-- 传图片地址值用的 -->
                                    <input type="hidden" id="imgs" name="imgs" value="">

                                    <!-- 加载编辑器的容器：用来上传图片的，必须要，不然上传的图片会追加到上面的编辑器里面 -->
                                    <textarea id="uploadEditor" style="display: none;"></textarea>
                                    </div>
                                </div>

                           
                                <div class="control-group">
                                    <label class="control-label">详情</label>
                                    <div class="controls">
                                        <textarea id="detail" name="detail" class="span10 "/>这里是默认信息</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="button" class="btn btn-success" id="addContent">添加</button>
                                    <button type="reset" class="btn">重置</button>
                                </div>

                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
         <!-- END PAGE CONTAINER-->
      </div>
    </div>
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
                imgval +=','+ result[i].src;
            }
            document.getElementById('upload_img_wrap').innerHTML = imageHtml;
            //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
            //具体怎么设置看项目需求，我这里只是举个例子
            document.getElementById('imgs').value = imgval;
        }
    </script>
    
      <!-- END PAGE -->



    <?php
        require './foot.php';
    ?>