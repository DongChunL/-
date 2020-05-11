<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>新闻发布页面</title>
    <style type="text/css">
        span{display:inline-block; float: left; width: 55px}
        input[type="submit"]{margin-left: 30%;}
    </style>
</head>
<body bgcolor="#ccc">
<form name="article" method="post" action="publish.php" style="">
    <h3 style="margin-left: 60px;">帮助中心 - 租赁问答</h3>
    标 题：<input type="text" name="title" style="width: 300px;
    height: 20px;"/>
    <br/><br/>
    作 者: <input type="text" name="author" style="width: 80px;
    height: 20px;"/>
    <br/><br/>
    <span>内 容:</span>
    <textarea cols=35 rows=8 name="content" style="margin: 0px; width: 650px; height: 227px;"></textarea><br/><br/>
    <input type="submit" value="发布"/>
</form>
</body>
</html>