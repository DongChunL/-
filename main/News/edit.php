<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>修改租赁资讯</title>
    <style type="text/css">
        span{display:inline-block; float: left; width: 50px;}
        input[type="submit"]{margin-left: 10%;}
    </style>
</head>
<body>
<?php

header("content-type:text/html;charset=utf8");
date_default_timezone_set('Asia/Shanghai');
//连接数据库
$link = mysqli_connect('localhost','root','','garage');
if (!$link) {
    die("连接失败:".mysqli_connect_error());
}
mysqli_query($link,"set names utf8");


$id = isset($_GET["id"])?$_GET["id"]:"";
$title = isset($_POST['title'])?$_POST['title']:"";
$author = isset($_POST['author'])?$_POST['author']:"";
$content = isset($_POST['content'])?$_POST['content']:"";

$sql="select id,title,author,content from news where id = '$id'";
//echo $sql;
$rel = mysqli_query($link,$sql);//执行sql语句
$arr= mysqli_fetch_array($rel);
?>
<fieldset id="manageUser" style="height:680px;width: 900px;">
    <legend style="font-size: 24px;color: #666;">修改租赁资讯</legend>
<form name="article" method="post" action="update.php" style="">
    <input type="hidden" name="id" value="<?php echo $arr['id']?>"/><br/>
    标 题:<input type="text" name="title"style="width: 300px;height: 20px;" value="<?php echo $arr['title']?>"/><br/><br/>
    作 者:<input type="text" name="author" style="width: 80px;height: 20px;" value="<?php echo $arr['author']?>"/><br/><br/>
    <span>内 容:</span>
    <textarea cols=30 rows=5 name="content" style="margin: 0px; width: 708px; height: 435px;"><?php echo $arr['content']?></textarea><br/><br/>
    <input type="submit" value="修改新闻"/>
</form>
</fieldset>
</body>
</html>
