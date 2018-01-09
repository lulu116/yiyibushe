<?php
    require './head.php';
    //获取全部的一级分类
    $cate_one = $db->getDatas('cate','*','parent_cate_id=0');
    //获取传过来的产品
    $one_product = $db->getOneData('product','*','product_id = '.$_GET['product_id']);
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
                            内容修改
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
                            <h4><i class="icon-reorder"></i> 内容修改</h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="#" class="form-horizontal" id="addContentForm">
                                <input type="hidden" name="product_id" value="<?php echo $one_product['product_id']?>" />
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
                                        <input type="text" id="productname" name="productname" class="span6 " value="<?=$one_product['productname']?>"/>
                                        <span></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">价格</label>
                                    <div class="controls">
                                        <input type="number" id="price" name="price" class="span6 " value="<?php echo $one_product['price']?>" />
                                        <span></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">详情</label>
                                    <div class="controls">
                                        <textarea id="detail" name="detail" class="span10 "/>这里是默认信息</textarea>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-success" id="addContent">修改</button>
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
        var ue = UE.getEditor('detail');
    </script>

    <!-- END PAGE -->



<?php
require './foot.php';
?>