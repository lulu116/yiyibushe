<?php
    require './head.php';
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
                            <span class="text">Theme Color:</span>
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
                        修改密码
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">首页</a>
                            <span class="divider">/</span>
                        </li>
                        <li class="active">
                            修改密码
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
                            <h4><i class="icon-reorder"></i> 修改密码 </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="#" class="form-horizontal" id="addcontentform">
                                <div class="control-group">
                                    <label class="control-label">账号</label>
                                    <div class="controls">
                                        <input type="text" id="realname" name="realname" class="span6" />
                                        <span></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">旧密码</label>
                                    <div class="controls">
                                        <input type="password" id="passwd" name="passwd" class="span6" />
                                        <span></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">新密码</label>
                                    <div class="controls">
                                        <input type="password" id="nowpasswd" name="nowpasswd" class="span6" />
                                        <span></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">确认密码</label>
                                    <div class="controls">
                                        <input type="password" id="repasswd" name="repasswd" class="span6" />
                                        <span></span>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="button" class="btn btn-success" id="updatePWD_btn">修改</button>
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
<?php
require './foot.php';
?>
<script src="js/login.js"></script>
