<?php
include '../../sql/phpConnectDb.php';
session_start();

$public_Id = $_GET['id'];
if(isset($_SESSION['username'])){
    $commentWho = $_SESSION['username'];
    $commentWhat = $_GET['txtContent'];
    $commentTime = date('Y-m-d H:i:s',time());
    $sql = "INSERT INTO comment(commentId,commentWho,commentWhat,commentTime,public_Id)VALUES(NULL,'$commentWho','$commentWhat','$commentTime','$public_Id')";
    if(!$query = mysqli_query($link,$sql)){
        echo mysqli_error($link);
        exit();
    }else{
        echo "<script>window.location.href='bikeDetail?id=".$public_Id."';</script>";
    }
}else{
//    echo "未登录！";
    $info = "1";
    echo $info;
    echo "<script>window.location.href='bikeDetail?info=".$info."&&id=".$public_Id."';</script>";
}

