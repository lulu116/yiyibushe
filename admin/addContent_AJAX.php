<?php
    require './common/admin.common.php';
    $data                   = $_POST;
    $data['updatetimes']    = date('Y-m-d H:i:s');
    //由于有多张图片用，分离，不能进行截取
  /* $data['imgs'] = substr($data['imgs'],strrpos($data['imgs'],'/')+1);*/
    //如果有cate_id则为修改内容，否则添加内容
    if($_POST['product_id']){
        //修改信息
        // 删除多余的信息
        unset($data['product_id']);
        $row = $db->updateData('product', $data, 'product_id = ' . $_POST['product_id']);
    }else {
        $data['addtimes'] = date('Y-m-d H:i:s');
        $size = $data['sizename'];  //array
        $color = $data['colorname']; //array
        $stock = $data['stock'];
        unset($data['sizename']);
        unset($data['colorname']);
        unset($data['stock']);
        //得到当前产品对应的ID号
        $product_id = $db->addData('product', $data, 1);

        //循环方式分别插入数据
        //2.1插入尺寸
        foreach ($size as $key => $value) {
            $data1['sizename']=$value;
            $data1['product_id']=$product_id;
            unset($data['colorname']);  //由于插入时是表格组合，要把颜色名称去掉
            $row = $db->addData('size', $data1);
        }
        //2.2插入颜色
        foreach ($color as $key1 => $value1) {
            $date2['colorname']=$value1;
            $date2['product_id']=$product_id;
            unset($data['sizename']);
            $row=$db->addData('color',$date2);
        }
        $row1=$db->getDatas('color','*','product_id='.$product_id);
        $row2=$db->getDatas('size','*','product_id='.$product_id);
        //2.3获取颜色表中的颜色ID
        foreach($row1 AS $key=>$value){
            $data3['color_id']=$value['color_id'];
        }
        //2.4获取尺寸表中的尺寸ID
        foreach($row2 AS $key=>$value){
            $data3['size_id']=$value['size_id'];
        }
        $data3['product_id']=$product_id;
        $data3['addtimes']=date('Y-m-d H:i:s');
        $data3['updatetimes']=date('Y-m-d H:i:s');
        $data3['stocknum']=$_POST['stock'];
        //添加产品到库存表
        $row = $db->addData('stock', $data3);
    }
    if($row){
        echo json_encode(array('res'=>'success'));
    }else{
        echo json_encode(array('res'=>'error'));
    }




