<?php
    require './head.php';
    $orders_msg = $db->getDatas('orders','*');
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
                        订单列表
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">首页</a>
                            <span class="divider">/</span>
                        </li>
                        <li>
                            <a href="#">订单管理</a>
                            <span class="divider">/</span>
                        </li>
                        <li class="active">
                            订单列表
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
                                <h4><i class="icon-reorder"></i> 订单列表 </h4>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th><i class="icon-bullhorn"></i> ID</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 商品名称</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 商品主图</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 购买者</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 下单时间</th>
                                        <th class="hidden-phone"><i class="icon-question-sign"></i> 收货地址</th>
                                        <th><i class="icon-bookmark"></i> 联系电话</th>
                                        <th><i class="icon-bookmark"></i> 商品价格</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($orders_msg as $key =>$value){
                                        $product_name = $db->getDatas('product','productname,imgs','product_id="'.$value["product_id"].'"');
                                        $slider_img = explode(',', $product_name[0]['imgs']);
                                        ?>
                                        <tr>
                                            <td><a href="#"><?=$value['order_id'];?></a></td>
                                            <td class="hidden-phone"><?=$product_name[0]['productname'];?></td>
                                            <td class="hidden-phone"><img src="<?php echo $slider_img[1]?>" alt="" style="width: 65px;height: 65px;"></td>
                                            <td class="hidden-phone"><?=$value['username'];?></td>
                                            <td class="hidden-phone"><?=$value['ordertimes'];?></td>
                                            <td class="hidden-phone"><?=$value['orderaddress'];?></td>
                                            <td><?=$value['tel'];?></td>
                                            <td><?=$value['price'];?></td>

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