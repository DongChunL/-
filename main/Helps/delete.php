<?php
header("content-type:text/html;charset=utf8");
date_default_timezone_set('Asia/Shanghai');
//连接数据库
$link = mysqli_connect('localhost','root','','garage');
if (!$link) {
    die("连接失败:".mysqli_connect_error());
}
mysqli_query($link,"set names utf8");

$id = $_GET['id'];
$sql = "delete from helps where id = '$id'";
//echo $sql;
$rel = mysqli_query($link,$sql);
if($rel){
    echo "<script>alert('删除成功');window.location.href='list.php'</script>";
}else{
    echo "<script>alert('删除失败');window.location.href='list.php'</script>";
}
?>