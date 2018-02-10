<?php
    require './head.php';
    $admin_msg = $db->getOneData('admin','*','admin_id="'.$_SESSION["admin_id"].'"');
?>
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
                       查看个人信息
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">首页</a>
                            <span class="divider">/</span>
                        </li>
                         <li class="active">
                            <a href="#">个人中心管理</a>
                            <span class="divider">/</span>
                        </li>
                        <li class="active">
                            查看个人信息
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
                    <div class="widget pink">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> 查看个人信息 </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div>
                               <h3 class="dl_style">当前管理员名称:<span class="dt_style"><?php echo $_SESSION['realname']?></span></h3>
                               <h3 class="dl_style">当前管理员登录次数:<span class="dt_style"><?php echo $admin_msg['loginnum']?></span></h3>
                               <h3 class="dl_style">当前管理员最终登录时间:<span class="dt_style"><?php echo $admin_msg['lasttimes']?></span></h3>

                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
<?php
require './foot.php';
?>
<script src="js/login.js"></script>
