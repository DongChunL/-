<?php
include'../model/head.php';
?>
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
$limitNews = 5; //每页显示新闻数量, 这里设置每页显示3条新闻
$countNews = 0; //总共有多少条新闻
$countPage = 0; //一共有多少页数

$limitFrom = ($page - 1) * $limitNews;//从第几条数据开始读记录
//每页显示3个
//page = l limit 0
//page = 2 limit 3
//page = 3 limit 6

$sql = "select * from helps  where title like '%$keyword%' or content like '%$keyword%'order by id desc limit {$limitFrom}, {$limitNews}";
$sqlCount = "select count(*) from helps where title like '%$keyword%' or content like '%$keyword%'";
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

if(!$result = mysqli_query($link, $sql)){
    echo mysqli_error($link);
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>帮助中心</title>
    <style>
        /*nav*/
        nav{
            width: 100%;
            background: darkslategrey;
            height: 60px;
        }
        nav li{
            display: inline-block;
            width: 100px;
            text-align: center;
            height: 56px;
            line-height: 56px;
            margin-top: 2px;
            padding-right: 15px;
            padding-left: 15px;
        }
        /*        nav li:last-child{
                    background-color: red; !* 浏览器不支持时显示 *!
                    background-image: linear-gradient(#ffffff, #ff0000);
                }*/
        nav li a{
            color: white!important;
            font-size: 22px!important;
            height: 36px;
            line-height: 36px;
            width: 80px;
            font-weight: bold;
        }
        nav ul li:nth-child(5){
            background: white;
        }
        nav ul li:nth-child(5) a{
            color: darkgreen!important;
        }
        nav a:hover{
            color: yellow!important;
        }
    </style>
    <link rel="stylesheet" href="../Css/news.css">
    <link rel="stylesheet" href="../Css/headso.css">
</head>
<body>
<!--导航-->
<nav class="navigation">
    <section class="center">
        <ul>
            <li><a href="../../index.php">首页</a></li>
            <li><a href="publicInfos.php">出租信息</a></li>
            <li><a href="seekInfos.php">求租信息</a></li>
            <Li><a href="newInfos.php">租赁资讯</a></Li>
            <Li><a href="help.php">帮助中心</a></Li>
            <Li><a href="about.php">关于我们</a></Li>
</nav>
            <!--新闻主体-->
            <form action="helpInfo.php">
                <div class="bodyMid">
                    <div class="midLeft">
                        <div class="newsCon_border">
                            <h5 id="newstitle"><a href="../../index.php">首页</a>&gt;&gt;<a href="help.php">帮助中心</a></h5>
                            <!--数据部分-->
                            <?php while($arr=mysqli_fetch_array($result)):?>

                                <div class="newTitle">
                                    <a href="helpInfo.php?id=<?php echo $arr['id'];?>" title="<?php echo $arr['title'];?>" target="_blank">
                                        <?php echo $arr['title'];?>
                                    </a>
                                </div>
                                <div class="newsDate">
                                    <?php echo $arr['updated_at'];?></div>
                                <div class="newsCon clear">
                                    <?php

                                    if(strlen($arr['content'])>=230)
                                    {
                                        $article = mb_substr($arr['content'],0,230,"utf-8");
                                        echo $article.'...';
                                    }else
                                    {echo $arr['content'];}
                                    ?><a href="helpInfo.php?id=<?php echo $arr['id'];?>" target="_blank">[阅读全文]</a>
                                </div>
                                <div class="newsFoor">
                                    来源：<?php echo $arr['author'];?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;浏览：<?php echo $arr['counts']?></div>
                            <?php endwhile;?>
                        </div>
                        <div style="margin:20px;">
                            共<?php echo $countPage;?>页 |<?php echo $countNews;?>条资讯
                            当前第<?php echo $page;?>页|
                            <a href="?page=<?php echo $prev;?>&keyword=<?php echo $keyword;?>">上一页|</a>
                            <?php for($i=1; $i<=$countPage; $i++):?>
                                <a href="?page=<?php echo $i;?>&keyword=<?php echo $keyword;?>"><?php echo $i;?></a>
                            <?php endfor;?>
                            <a href="?page=<?php echo $next;?>&keyword=<?php echo $keyword;?>">|下一页</a>
                        </div>
                    </div>
                </div>
                <div style="clear: both"></div>
            </form>
        </ul>
    </section>
</body>
</html>
<?php
include '../model/footer.html';
?>
