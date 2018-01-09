<?php 
    require './head.php';
    //1.获取全部的一级分类
    $cate_one = $db->getDatas('cate', '*', 'parent_cate_id=0');
    foreach ($cate_one as $key => $child_value) {
        //查询当前分类下面的子分类
        $child_catelist = $db->getDatas('cate', '*', 'parent_cate_id=' . $child_value['cate_id']);
        //需要把子分类追加到当前元素里面
        $cate_one[$key]['child'] = $child_catelist;
    }
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
                     分类列表
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
                           分类列表
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
                                <h4><i class="icon-reorder"></i> 分类列表</h4>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 名称</th>
                                        <th><i class="icon-bullhorn"></i> ID</th>
                                        <th><i class="icon-bookmark"></i> 添加时间</th>
                                        <th><i class="icon-bookmark"></i> 添加人</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!--所有一级分类-->
                                    <?php
                                        foreach ($cate_one as $key =>$parent_value){
                                    ?>
                                        <tr id="tr_<?=$parent_value['cate_id'];?>">
                                            <td class="hidden-phone"><?=$parent_value['catename'];?></td>
                                            <td><a href="#"><?=$parent_value['cate_id'];?></a></td>
                                            <td><?=$parent_value['addtimes'];?></td>
                                            <td><?=$parent_value['realname'];?></td>
                                            <td>
                                                <a href="updateCateList.php?cate_id=<?=$parent_value['cate_id'];?>" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                                <button type="button" cate_id="<?=$parent_value['cate_id'];?>" class="btn btn-danger delcate"><i class="icon-trash "></i></button>
                                            </td>
                                        </tr>
                                        <!-- 开始显示一级分类下面的子分类 -->
                                        <?php 
                                            foreach ($parent_value['child'] as $key_c => $child_value) {
                                        ?>
                                        <tr id="tr_<?=$child_value['cate_id'];?>">
                                            <td class="hidden-phone">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-bullhorn"></i><i class="icon-bullhorn"></i><?=$child_value['catename'];?></td>
                                            <td><a href="#"><?=$child_value['cate_id'];?></a></td>
                                            <td><?=$child_value['addtimes'];?></td>
                                            <td><?=$child_value['realname'];?></td>
                                            <td>
                                                <a href="updateCateList.php?cate_id=<?=$child_value['cate_id'];?>" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                                <button type="button" cate_id="<?=$child_value['cate_id'];?>" class="btn btn-danger delcate"><i class="icon-trash "></i></button>
                                            </td>
                                        </tr>
                                        <?php 
                                            }
                                        ?>
                                        <!-- 子分类显示结束 -->
                                        
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