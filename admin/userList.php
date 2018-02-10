<?php 
    require './head.php';
    $userList = $db->getDatas('user','*');
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
                     用户列表
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">首页</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">网站用户管理</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           用户列表
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <div id="page-wraper">
                <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN BASIC PORTLET-->
                        <div class="widget red">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> 用户列表</h4>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover ">
                                    <thead>
                                    <tr>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 用户名</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 用户头像</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 手机号</th>
                                        
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 最后一次登录时间</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 登录次数</th>
                                      
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 收货地址</th>
                                  
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach ($userList as $key =>$value){
                                    ?>
                                        <tr>
                                             <td><a href="#"><?=$value['username'];?></a></td>
                                             <td class="hidden-phone"><img src="../upload/image/<?php echo $value['userImg'] ?>" alt="" style="width:25px;height: 25px;"></td>
                                             <td class="hidden-phone"><?=$value['tel'];?></td>
                                            
                                             <td><?=$value['logintimes'];?></td>
                                             <td><?=$value['loginnum'];?></td>
                                            
                                             <td><?=$value['useraddress'];?></td>
                                        </tr>   
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                </div>

            </div>

            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
    <?php 
        require './foot.php';
    ?>