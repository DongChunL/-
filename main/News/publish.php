<html>
<head>
    <meta charset="utf-8">
</head>
</html>
<?php
header("content-type:text/html;charset=utf8");
date_default_timezone_set('Asia/Shanghai');
//连接数据库
$link = mysqli_connect('localhost','root','','garage');
if (!$link) {
    die("连接失败:".mysqli_connect_error());
}
mysqli_query($link,"set names utf8");

$title = isset($_GET['title'])?$_GET['title']:"";
$author = isset($_GET['author'])?$_GET['author']:"";
$content = isset($_GET['newsContent'])?$_GET['newsContent']:"";
var_dump($title);
var_dump($author);
var_dump($content);
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");
//执行插入语句
$sql="insert into news(title,author,content,created_at,updated_at,counts) values('$title','$author','$content','$created_at','$updated_at',50)";
$rel = mysqli_query($link,$sql);
//执行sql语句
if($rel){
    echo "<script>alert('新闻发布成功');window.location.href='list.php'</script>"; //发布成功跳转到新闻列表页list.php
}else{
    echo mysqli_error($link);
   /* echo "<script>alert('新闻发布失败');window.location.href='publish.php'</script>";*/
}
?>