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

/*默认*/$user_id = 0;

$title = isset($_POST['title'])?$_POST['title']:"";
$author = isset($_POST['author'])?$_POST['author']:"";
$content = isset($_POST['content'])?$_POST['content']:"";
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");
//执行插入语句
$sql="insert into helps(title,author,content,created_at,updated_at,counts,user_id) values('$title','$author','$content','$created_at','$updated_at',50,'$user_id')";
$rel = mysqli_query($link,$sql);
//执行sql语句
if($rel){
    echo "<script>alert('发布成功');window.location.href='list.php'</script>"; //发布成功跳转到新闻列表页list.php
}else{
    echo mysqli_error($link);
   /* echo "<script>alert('新闻发布失败');window.location.href='publish.php'</script>";*/
}
?>