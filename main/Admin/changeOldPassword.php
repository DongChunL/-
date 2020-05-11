<?php
include '../../sql/phpConnectDb.php';
session_start();
$username = $_SESSION['admin'];
$oldPassword = md5($_POST['oldPassword']);
$newPassword = md5($_POST['newPassword']);

//判断原密码是否正确
$sql = "SELECT passwd FROM admin WHERE username = '$username'";
$query = mysqli_query($link,$sql);
if(!$arr = mysqli_fetch_array($query)){
    echo mysqli_error($link);
}else if($oldPassword != $arr['passwd']){
    $_SESSION['tip'] = 2;/*tip=2 原密码错误*/
    echo "<script>window.location.href='changePassword?tip=2'</script>";
    exit();
}

$sql = "UPDATE  admin SET passwd = '$newPassword' WHERE username = '$username' AND passwd = '$oldPassword'";
if($query = mysqli_query($link,$sql)){
    $_SESSION['tip'] = 1;/*tip=1 密码修改成功，请重新登录！*/
    echo "<script>window.location.href='changePassword?tip=1'</script>";
}