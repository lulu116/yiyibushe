 <?php
    require './common/common.php';
    //根据传过来的账号查询
    $row = $db->getOneData('admin', '*', 'realname = "'.$_POST['realname'].'"');

    //1.检查账号是否存在
    if(!$row){
        $result['res'] = 'no_exit_realname';
        echo json_encode($result);
        exit;
    }

    //2.检查密码是否正确
    if(md5($_POST['passwd']) != $row['passwd']){
        $result['res'] = 'invail_passwd';
        echo json_encode($result);
        exit;
    }

    //3.账号密码正确，更新管理员登录信息
    $sql = 'UPDATE admin SET loginnum = loginnum + 1,lasttimes=now() WHERE admin_id = ' . $row['admin_id'];
    //4.执行sql语句
    $db->dblink->query($sql);

    //5.管理员信息录入成功后，开始存储COOKIE信息:选中的时候存储，没有选中就要销毁
    /*
     Session是在服务端保存的一个数据结构，用来跟踪用户的状态，这个数据可以保存在集群、数据库、文件中；
     Cookie是客户端保存用户信息的一种机制，用来记录用户的一些信息，也是实现Session的一种方式。
    */
    
    if($_POST['remember'] == '1'){
        //5.1把管理员的账号及密码存储到COOKIE里面
        setcookie('realname',   $row['realname'],       time() + 7*24*3600);
        setcookie('passwd',     $_POST['passwd'],       time() + 7*24*3600);
    }else{
        //5.2销毁COOKIE信息
        setcookie('realname',   '',    time() - 7*24*3600);
        setcookie('passwd',     '',    time() - 7*24*3600);
    }

    //存储管理员登录的信息到SESSION
    $_SESSION['realname']   = $row['realname'];
    $_SESSION['admin_id']   = $row['admin_id'];

    //6.登录成功
    echo json_encode(array('res'=>'success'));
