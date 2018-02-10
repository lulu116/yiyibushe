<?php 
    require './head.php';
    $admin_suggest = $db->getDatas('suggest','suggest_id,username,content,admin_suggest,types ','admin_id="'.$_SESSION["admin_id"].'"');

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
                    查看用户反馈
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
                            查看用户反馈
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
                        <div class="widget purple">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i>  查看用户反馈</h4>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                     <tr>
                                         <th style="text-align: center;">管理员姓名</th>
                                         <th style="text-align: center;">用户姓名</th>
                                         <th style="text-align: center;">用户提交反馈类型</th>
                                         <th style="text-align: center;">用户提交反馈</th>
                                         <th style="text-align: center;">管理员回复反馈</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                     <?php 
                                        foreach ($admin_suggest as $key => $value) {
                                     ?>
                                     <tr class="">
                                         <td  style="text-align: center;"><?php echo $_SESSION["realname"]?></td>
                                         <td style="text-align: center;"><?php echo $value["username"]?></td>
                                         <td style="text-align: center;"><?php echo $value["types"]?></td>
                                         <td ><?php echo $value["content"]?></td>
                                         <td style="text-align: center;"><?php echo $value["admin_suggest"]?></td>
                                          <td>
                                                <a href="updateSuggest.php?suggest_id=<?=$value['suggest_id'];?>" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                                <button type="button" suggest_id="<?=$value['suggest_id'];?>" class="btn btn-danger delsuggest"><i class="icon-trash "></i></button>
                                          </td>
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