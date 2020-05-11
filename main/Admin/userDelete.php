<?php
include  '../../sql/phpConnectDb.php';
$username = $_GET['who'];
$sql = "select * from users";
$sql = "DELETE FROM users WHERE username='$username'";
if(!mysqli_query($link,$sql)){
    echo "删除失败".mysqli_error($link);
}else{
    header("location:userInfos.php");
}