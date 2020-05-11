<?php
include '../../sql/phpConnectDb.php';

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

$sql = "select * from users where username like '%$keyword%' or email like '%$keyword%' or userAddress like '%$keyword%' order by id asc limit {$limitFrom}, {$limitNews}";
$sqlCount = "select count(*) from  users  where username like '%$keyword%' or email like '%$keyword%' or userAddress like '%$keyword%' order by id asc ";
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
    <title>用户信息</title>
    <style
    >
        #manageUser{
            margin: 0 auto;
            width: 850px;
        }
        #manageUser td[class^='to'] a:hover{
            color: red!important;
        }
        #manageUser  .contact_imgs img{
            width: 15px;
            height: 15px;
        }
        #manageUser.contact_imgs div{
            height: 23px;
            display: inline-block;
            vertical-align: middle;
            text-align: left;
        }
        #manageUser td{
            text-align: left;
            padding-top: 10px;
        }
        #manageUser .toNum{
            width: 50px;
        }
        #manageUser .toTitles{
            width: 100px;
        }
        #manageUser .toRents{
            width: 130px;
        }
        #manageUser .toSevers{
            width: 160px;
        }
        #manageUser .toPerson{
            width: 300px;
            padding-right: 15px;
        }
        #manageUser .toDo{
            width: 70px;
        }
    </style>

</head>
<body>
<div class="mainBorder" style="float: left;">
    <fieldset id="manageUser" style="height:680px;width: 900px;">
        <legend style="font-size: 24px;color: #666;">管理用户信息</legend>
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
        <form method="get" action="userInfos.php" class="newsForm" style="margin:10px;text-align: center">
            <input type="text" name="keyword"  value="<?php echo $keyword;?>"  placeholder="关键字" class="searchNews"/><input type="submit" class="searchNewsButton" value="搜索"/>
        </form>
        <table class="tableUser" border="0" cellspacing="0" cellpadding="0">
            <tr  style="height:40px" bgcolor="#F7F7F7">
                <td class="toNum">编号</td>
                <td class="toTitles">用户名</td>
                <td class="toRents">手机号</td>
                <td class="toSevers">邮箱</td>
                <td class="toPerson">联系地址</td>
                <td class="toDo">操作</td>
            </tr>
            <?php
            while($arr = mysqli_fetch_array($query)){
                /*
                     echo "<pre>";
                     print_r($arr);
                     echo "</pre>";
                     exit();
                 */

                //隔行变色
                /*            if($usern%2==0){
                                echo "<tr bgcolor='grey'>";
                            }else{
                                echo "<tr>";
                            }*/


                //设置租赁所需权限
                if (isset($_SESSION['username'])) {
                    $order_href = "order.php?id=" .$arr[0];
                } else {
                    $tipToLogin = '1'; //登录后才能进行租赁操作！
                    $order_href = "?tipToLogin=" . $tipToLogin;
                }

                /*         $usern++;*/
                ?>
                <tr>
                    <td> <?php echo $arr[0];?></td>
                    <td class="toDetail"><a href="#" style="font-size: 15px;font-weight: bold;color: black"><?php echo $arr[1];?></a></td>
                    <td style="color: red;"><?php echo $arr[3];?></td>
                    <td><?php echo $arr[4];?></td>
                    <td style="color: gray;"><?php echo $arr[6];?></td>
                    <td class="toOrder"><a href="" onclick="checkDelete('<?php echo $arr[1];?>')">删除</a></td>
                </tr>
            <?php }?>
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
</div>

</body>
<script>
    function checkDelete(num){
        alert(num);
        var yes =confirm("确定删除用户"+num+"吗？");
        if (yes == true){
            window.location.href="userDelete.php?who="+num;
            window.event.returnValue=false;
        }
    }
</script>
</html>
