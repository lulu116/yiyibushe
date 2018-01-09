<?php 
    require './head.php';
    //获取全部的一级内容:左连接查询
    //以分类表为准
    // 分类表cate中cate_id == 产品表product中ID
    $sql = 'SELECT  product_n.product_id, product_n.productname	, product_n.cate_id_p,
                        product_n.cate_id_c, product_n.addtimes, product_n.username,
                        cate_p.catename AS cpname,
                        cate_c.catename AS ccname
                FROM product AS product_n
                LEFT JOIN cate AS cate_p ON product_n.cate_id_p = cate_p.cate_id
                LEFT JOIN cate AS cate_c ON product_n.cate_id_c = cate_c.cate_id
                ';
    $contentlist = $db->dblink->query($sql);
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
                     内容列表
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
                           内容列表
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
                        <div class="widget orange">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> 内容列表</h4>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th><i class="icon-bullhorn"></i> ID</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 标题</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 一级分类</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 二级分类</th>
                                        <th><i class="icon-bookmark"></i> 添加时间</th>
                                        <th><i class="icon-bookmark"></i> 添加人</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach ($contentlist as $key =>$value){
                                    ?>
                                        <tr>
                                             <td><a href="#"><?=$value['product_id'];?></a></td>
                                             <td class="hidden-phone"><?=$value['productname'];?></td>
                                             <td class="hidden-phone"><?=$value['cpname'];?></td>
                                             <td class="hidden-phone"><?=$value['ccname'];?></td>
                                             <td><?=$value['addtimes'];?></td>
                                             <td><?=$value['username'];?></td>
                                             <td>
                                             <td>
                                                <a href="updateContentList.php?product_id=<?=$value['product_id'];?>" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                                <button type="button" product_id="<?=$value['product_id'];?>" class="btn btn-danger delcontent"><i class="icon-trash "></i></button>
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