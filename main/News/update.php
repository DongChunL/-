<?php
header("content-type:text/html;charset=utf8");
date_default_timezone_set('Asia/Shanghai');
//连接数据库
$link = mysqli_connect('localhost','root','','garage');
if (!$link) {
    die("连接失败:".mysqli_connect_error());
}
mysqli_query($link,"set names utf8");

$id = isset($_POST['id'])?$_POST['id']:"";
$title = isset($_POST['title'])?$_POST['title']:"";
$author = isset($_POST['author'])?$_POST['author']:"";
$content = isset($_POST['content'])?$_POST['content']:"";
$updated_at = date("Y-m-d H:i:s");

$sql="update news set title = '$title',author = '$author',content = '$content',updated_at='$updated_at' where id = '$id'";
//echo $sql;
$rel=mysqli_query($link,$sql);//执行sql语句
//echo $rel

if($rel){
    echo "<script>alert('新闻修改成功');window.location.href='list.php'</script>";
}else{
    echo "<script>alert('新闻修改失败');window.location.href='edit.php'</script>";
}
?>