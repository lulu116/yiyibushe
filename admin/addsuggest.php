<?php 
    require './head.php';
    $user_msg = $db->getDatas('suggest','*');

?>
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
                     用户反馈回复
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">首页</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">商品分类管理</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           用户反馈回复
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
                            <h4><i class="icon-reorder"></i> 用户反馈回复 </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="#" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">选择用户</label>
                                    <div class="controls">
                                        <select class="span6 " name="username" id="username" tabindex="1">
                                            <option value="0">请选择</option>
                                            <?php 
                                                foreach ($user_msg as $key =>$value){
                                                    echo '<option value="'.$value['user_id'].'">'.$value['username'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">选择意见类型</label>
                                    <div class="controls">
                                        <select class="span6 " name="types" id="types" tabindex="1">
                                            <option value="0">请选择</option>
                                            <?php 
                                                foreach ($user_msg as $key =>$value){
                                                    echo '<option value="'.$value['user_id'].'">'.$value['types'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">给当前用户的反馈信息</label>
                                    <div class="controls">
                                        <input type="text" id="admin_suggest" name="admin_suggest" class="span6 " />
                                        <span></span>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="button" class="btn btn-success" id="addSuggest">添加</button>
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
      <!-- END PAGE -->
    <?php 
        require './foot.php';
    ?>