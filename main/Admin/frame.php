<?php
session_start();
include '../../sql/phpConnectDb.php';
?>
<!--头部-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>自行车租赁网站 - 后台</title>
    <link rel="stylesheet" href="../Css/head.css">
    <link id="style" rel="stylesheet" type="text/css" href="../userCenter/css/admincss.css">
    <script src="../../jquery-3.3.1/jquery-3.3.1.js"></script>
    <style>
        body{
            scrollbar-base-color:#C0D586;
            scrollbar-arrow-color:#FFFFFF;
            scrollbar-shadow-color:#DEEFC6;
            width:100%;
            height:960px;;
            margin:0;
            padding:0
        }
    </style>
</head>
<frameset rows="50,*,97" border="0" frameborder="yes">
    <frame src="head.php"   noresize>
    <frameset min-height="600px;"cols="620,*"scrolling="no" class="setOne" >
        <frame  src="left.html"scrolling="no"/>
        <frame  name="contents" src="carPublic.php"  noresize="noresize" >
    </frameset>
        <frame src="../model/footer.html" noresize="noresize" scrolling="no">
</frameset>
<noframes>
</noframes>
</html>
