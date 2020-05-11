<?php
include '../sql/phpConnectDb.php';

/*验证注册*/
if($_GET['checkInfo']=='register'){
    $username = $_GET['username'];
    $passwd = md5($_GET['passwd']);
    $IdCard = md5($_GET['userId']);
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $sql  = "INSERT INTO users(id,username,passwd,phone,email,IdCard)VALUES(NULL,'$username','$passwd','$phone','$email','$IdCard')";
    if(!$query = mysqli_query($link,$sql)){
        echo mysqli_error($link);
        exit();
    }else{
        $info = "注册成功";
        echo "<script>window.location.href='login.php?info=$info&&name=$username'</script>";
    }
}

/*验证前台登录*/
if($_POST['checkInfo']=='login'){
    $username = $_POST['username'];
    $passwd = md5($_POST['passwd']);

    /*验证 验证码*/
    $res = $_GET['res'];
    if($res == "false"){
        $res = "验证码错误";
        echo "<script>window.location.href='login.php?res=$res'</script>";
    }

    /*验证用户名和密码*/
    $sql  = "SELECT username FROM users WHERE (username='$username'||phone='$username'||email='$username')AND passwd ='$passwd'";
    $query = mysqli_query($link,$sql);
    if(!$result = mysqli_fetch_array($query)){
        $info = "登录失败";
        $error = "用户名或密码错误";
        echo "<script>window.location.href='login.php?info=$info&&error=$error'</script>";
    }else{

        //设置会话
        $expire=3600;
        ini_set('session.gc_maxlifetime', $expire);//保存1小时
        if (empty($_COOKIE['PHPSESSID'])) {
            session_set_cookie_params($expire);
            session_start();
        }else{
            session_start();
            setcookie('PHPSESSID', session_id(), time() + $expire);
        }
        if(isset($_SESSION['username'])){
/*            exit("您已经登入了，请不要重新登入！用户名：{$_SESSION['username']}---<a href='main/User/session/sessionUnset.php'>注销</a>");*/
        }else{
            $_SESSION['username']=$result['username'];
        }
        $arr=mysqli_fetch_row($query);
        echo "<script>window.location.href='../index.php?'</script>";
    }
}

/*验证后台登录*/
if($_POST['checkInfo']=='adminLogin'){
    $username = $_POST['username'];
    $passwd = md5($_POST['passwd']);

    /*验证 验证码*/
    $res = $_GET['res'];
    if($res == "false"){
        $res = "验证码错误";
        echo "<script>window.location.href='adminLogin.php?res=$res'</script>";
    }

    /*验证用户名和密码*/
    $sql  = "SELECT username FROM admin WHERE username='$username'AND passwd ='$passwd'";
    $query = mysqli_query($link,$sql);
    if(!$result = mysqli_fetch_array($query)){
        $info = "登录失败";
        $error = "用户名或密码错误";
        echo "<script>window.location.href='adminLogin.php?info=$info&&error=$error'</script>";
    }else{

        //设置会话
        $expire=3600;
        ini_set('session.gc_maxlifetime', $expire);//保存1小时
        if (empty($_COOKIE['PHPSESSID'])) {
            session_set_cookie_params($expire);
            session_start();
        }else{
            session_start();
            setcookie('PHPSESSID', session_id(), time() + $expire);
        }
        if(isset($_SESSION['admin'])){
            /*            exit("您已经登入了，请不要重新登入！用户名：{$_SESSION['username']}---<a href='main/User/session/sessionUnset.php'>注销</a>");*/
        }else{
            $_SESSION['admin']=$result['username'];
        }
        $arr=mysqli_fetch_row($query);
        echo "<script>window.location.href='Admin/admin.php?'</script>";
    }
}
?>
