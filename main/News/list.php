<?php
header("content-type:text/html;charset=utf8");
date_default_timezone_set('Asia/Shanghai');
//连接数据库
$link = mysqli_connect('localhost','root','','garage');
if (!$link) {
    die("连接失败:".mysqli_connect_error());
}
mysqli_query($link,"set names utf8");

$keyword = isset($_GET['keyword'])?$_GET['keyword']:"";

$page = isset($_GET['page'])?$_GET['page']:1;//获取当前分页数
$limitNews = 8; //每页显示新闻数量, 这里设置每页显示3条新闻
$countNews = 0; //总共有多少条新闻
$countPage = 0; //一共有多少页数

$limitFrom = ($page - 1) * $limitNews;//从第几条数据开始读记录
//每页显示3个
//page = l limit 0
//page = 2 limit 3
//page = 3 limit 6

$sql = "select * from news where title like '%$keyword%' or content like '%$keyword%'  order by id desc limit {$limitFrom}, {$limitNews}";
$sqlCount = "select count(*) from news where title like '%$keyword%' or content like '%$keyword%'   order by id desc ";
$retQuery = mysqli_query($link, $sqlCount); //查询数量sql语句
$retCount = mysqli_fetch_array($retQuery); //获取数量
$count = $retCount[0]?$retCount[0]:0; //判断获取的新闻数量
$countNews = $count;

$countPage = $countNews%$limitNews; //求余数获取分页数量能否被除尽
if(($countPage) > 0) { //获取的页数有余
    $countPage = ceil($countNews/$limitNews);
    // ceil()函数向上舍入为最接近的整数,除不尽则取整数+1页, 10个新闻每个页面显示3个，成3个页面，剩余1个成1个页面
} else {
    $countPage = $countNews/$limitNews;
}

$prev = ($page - 1 <= 0 )?1:$page-1;
$next = ($page + 1 > $countPage)?$countPage:$page+1;

$result = mysqli_query($link, $sql);
?>

<html>
<head>
    <meta charset="utf8">
    <title>新闻列表页</title>
    <style>
        .newsForm  .searchNewsButton{
            background-color: rgb(0, 191, 255);
            color: white;
            border: 0;
            display: inline-block;
            vertical-align: top;
            /*            margin-top: 10px;*/
            height: 40px;
            width: 85px;
            font-size: 20px;
        }
        .newsForm .searchNewsButton:hover{
            background-color: rgb(0, 160, 255);
        }
        .newsForm  .searchNews{
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            /* -webkit-box-sizing: content-box; */
            /* -moz-box-sizing: content-box; */
            /* box-sizing: content-box; */
            /* -webkit-box-sizing: padding-box; */
            /* -moz-box-sizing: padding-box; */
            height: 40px;
            width: 180px;
            font-size: 18px;
        }
        .newsTable .articleTitle{
            width: 100px;
        }
        .blue_orange:hover{
            color: orange !important;
        }
        .blue_red:hover{
            color: red !important;
        }
    </style>
</head>
<body>
<!--搜索框-->
<fieldset id="manageUser" style="height:680px;width: 900px;" style="background-color: #ccc">
    <legend style="font-size: 24px;color: #666;">管理租赁资讯</legend>
<form method="get" action="list.php" class="newsForm" style="margin:10px;text-align: center">
    <input type="text" name="keyword"  value="<?php echo $keyword;?>"  placeholder="标题关键字" class="searchNews"/><input type="submit" class="searchNewsButton" value="搜索"/>
</form>
<table class="newsTable" cellspacing="0" cellpadding="0"  bgcolor="" width="1200px">
    <tr>
        <th>编号</th>
        <th class="articleTitle">文章标题</th>
        <th>文章作者</th>
        <th>文章内容</th>
        <th>发布时间</th>
        <th>修改时间</th>
        <th>编辑文章</th>
    </tr>
    <?php while($arr=mysqli_fetch_array($result)):?>
        <tr>
            <td align="center" style="border:1px solid #000;width: 8%;"><?php echo $arr['id'];?></td>
            <td align="center" style="border:1px solid #000; width: 28%;"><a style="color: blue" class="blue_orange" target='_blank' href="../User/news.php?id=<?php echo $arr['id'];?>"><?php  if(strlen($arr['title'])>=20)
                {
                    $article = mb_substr($arr['title'],0,20,"utf-8");
                    echo $article.'...';
                }else
                {echo $arr['content'];}?></td>
            <td align="center" style="border:1px solid #000; width: 10%;"><?php echo $arr['author'];?></td>
            <td align="center" style="border:1px solid #000; width: 22%;"><?php  if(strlen($arr['content'])>=40)
                {
                    $article = mb_substr($arr['content'],0,40,"utf-8");
                    echo $article.'...';
                }else
                {echo $arr['content'];}?></a></td>
            <td align="center" style="border:1px solid #000; width: 10%;"><?php echo $arr['created_at'];?></td>
            <td align="center" style="border:1px solid #000; width: 10%;"><?php echo $arr['updated_at'];?></td>
            <td align="center" style="border:1px solid #000; width: 10%;">
                <a href="edit.php?id=<?php echo $arr['id']?>" style="color: blue" class="blue_orange">修改</a>
                <a href="delete.php?id=<?php echo $arr['id']?>"style="color: blue"class="blue_red">删除</a>
            </td>
        </tr>
    <?php endwhile;?>
</table>
<div style="margin:20px;">
    共<?php echo $countPage;?>页 |查到<?php echo $countNews;?>条记录
    当前第<?php echo $page;?>页|
    <a href="?page=<?php echo $prev;?>&keyword=<?php echo $keyword;?>">上一页|</a>
    <?php for($i=1; $i<=$countPage; $i++):?>
        <a href="?page=<?php echo $i;?>&keyword=<?php echo $keyword;?>"><?php echo $i;?></a>
    <?php endfor;?>
    <a href="?page=<?php echo $next;?>&keyword=<?php echo $keyword;?>">|下一页</a>
</div>
</fieldset>
</body>
</html>