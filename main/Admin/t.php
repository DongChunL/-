<?php
if (!$link) {
    die("连接失败:".mysqli_connect_error());
}
mysqli_query($link,"set names utf8");

$keyword = isset($_GET['keyword'])?$_GET['keyword']:"";

$page = isset($_GET['page'])?$_GET['page']:1;//获取当前分页数
$limitNews = 6; //每页显示新闻数量, 这里设置每页显示3条新闻
$countNews = 0; //总共有多少条新闻
$countPage = 0; //一共有多少页数

$limitFrom = ($page - 1) * $limitNews;//从第几条数据开始读记录
//每页显示3个
//page = l limit 0
//page = 2 limit 3
//page = 3 limit 6

$sql = "select * from news where title like '%$keyword%' or content like '%$keyword%'limit {$limitFrom}, {$limitNews}";
$sqlCount = "select count(*) from news where title like '%$keyword%' or content like '%$keyword%'";
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

<?php while($arr=mysqli_fetch_array($result)){}?>
<HTML>
<head>

</head>
<body>
<div style="margin:20px;">
    共<?php echo $countPage;?>页 |查到<?php echo $countNews;?>条记录
    当前第<?php echo $page;?>页|
    <a href="?page=<?php echo $prev;?>&keyword=<?php echo $keyword;?>">上一页|</a>
    <?php for($i=1; $i<=$countPage; $i++):?>
        <a href="?page=<?php echo $i;?>&keyword=<?php echo $keyword;?>"><?php echo $i;?></a>
    <?php endfor;?>
    <a href="?page=<?php echo $next;?>&keyword=<?php echo $keyword;?>">|下一页</a>
</div>
</body>
</HTML>