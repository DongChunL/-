<?php
include '../../sql/phpConnectDb.php';
session_start();
$username = $_SESSION['username'];
$sql = "SELECT * FROM comment  order by  commentTime desc";
if (!$query = mysqli_query($link,$sql)){
    echo mysqli_error($link)."无";
}

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
/*用户名*/
$sql = "select * from comment where commentWho like '%$keyword%' or commentTime like '%$keyword%' or commentWhat like '%$keyword%'order by  commentTime desc limit {$limitFrom}, {$limitNews} ";
$sqlCount = "select count(*) from comment where commentWho like '%$keyword%' or commentTime like '%$keyword%'  or commentWhat like '%$keyword%'";
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

$query = mysqli_query($link, $sql);
?>
<html>
<head>
    <meta charset="utf-8">
    <style>
        .commentBox .oneComment{
            width: 600px;
            height: 50px;
            margin-bottom: 15px;
        }
        .commentBox a{
            color: blue;
        }
        .commentBox a:hover{
            color: orange;
        }
        .orange_red{
            color: orange;
        }
        .orange_red:hover{
            color: red;
        }
        .commentDelete{
            border: 2px solid blue;
            color: blue;
            border-radius: 25px;
            width: 40px;
            height: 25px;
            text-align: center;
            line-height: 25px;
            float: right;
        }
        .commentDelete:hover{
            border: 3px solid red;
            color: red;
        }
        .hrPx{
            transform: scale(1,0.5);
        }
    </style>
</head>
<body>
<fieldset id="manageUser" style="height:680px;width: 900px;">
    <legend style="font-size: 24px;color: #666;">管理用户留言</legend>
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
    </style>
    <form method="get" action="userComment.php" class="newsForm" style="margin:5px;text-align: center">
        <input type="text" name="keyword"  value="<?php echo $keyword;?>"  autocomplete="off" placeholder="用户、日期等关键字" class="searchNews"/><input type="submit" class="searchNewsButton" value="搜索"/>
    </form>
<div class="commentBox" style="min-height:300px;width:900px" >
    <?php
    $count = 0;
    while($arr = mysqli_fetch_array($query)):
        $count++;
        $comment = $arr['commentWhat'];
        $publicId = $arr['public_Id'];
        $commentId =  $arr['commentId'];
        ?>
        <div class="oneComment" style="width: 860px; height: 50px;">
            <table>
                <tr><td colspan="2" style=" width: 850px;"><span style="color: #666;"><?php echo $arr['commentTime'];?></span></td></tr>
                <tr><td style=" width: 850px;"><?php echo $arr['commentWho'];?>在<a style="text-decoration: none;" target="_blank" href="../User/bikeDetail.php?id=<?php echo $publicId?>"><?php $public_sql = "select publicTitle FROM carpublic WHERE publicId  = '$publicId'";$public_query = mysqli_query($link,$public_sql); $publicTitle = mysqli_fetch_row($public_query);$publicTitle = $publicTitle[0];echo$publicTitle?></a>中说:<span style="color: red;"><?php echo $arr['commentWhat']?></span>
                    </td><td><a style="float: right;" class="orange_red" href="" onclick="commentDelete(<?php echo $commentId?>)"><div class="commentDelete" style="display: inline-block">删除</div></a></td></tr>
            </table>
        <hr class="hrPx">
        <?php
        echo "<script>function commentDelete(commentId){var myConfirm = confirm('确定删除这条留言吗？');if(myConfirm==true){window.location.href='../userCenter/commentDelete.php?commentId='+commentId;window.event.returnValue=false;}else {}}</script>";
        ?>

    <?php  endwhile;?>
            <div style="margin:20px;">
                共<?php echo $countPage;?>页 |查到<?php echo $countNews;?>条记录
                当前第<?php echo $page;?>页|
                <a href="?page=<?php echo $prev;?>&keyword=<?php echo $keyword;?>">上一页|</a>
                <?php for($i=1; $i<=$countPage; $i++):?>
                    <a href="?page=<?php echo $i;?>&keyword=<?php echo $keyword;?>"><?php echo $i;?></a>
                <?php endfor;?>
                <a href="?page=<?php echo $next;?>&keyword=<?php echo $keyword;?>">|下一页</a>
            </div>
</div>
</fieldset>

</body>
</html>
