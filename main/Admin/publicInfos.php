<?php
include '../../sql/phpConnectDb.php';
//去掉多余的字
function cut_str($str, $length)
{
    if (mb_strlen($str, 'UTF-8') > $length) {
        return mb_substr($str, 0, $length, 'UTF-8') . '...';
    } else {
        return $str;
    }
}
//用*替换电话号码
/*function replace_str($str,$pattern,$replacement){
    return preg_replace($pattern,$replacement,$str);
}*/

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
$sql = "select * from carpublic where publicTitle like '%$keyword%' or  publicMoneyStyle like '%$keyword%' or publicPledge like '%$keyword%' or  publicMoney like '%$keyword%' or publicSheng like '%$keyword%' or publicShi like '%$keyword%' or publicPerson like '%$keyword%' or  publicQu like '%$keyword%' or isRent like '%$keyword%'order by  publicId desc limit {$limitFrom}, {$limitNews} ";
$sqlCount = "select count(*) from carpublic where publicTitle like '%$keyword%' or  publicMoneyStyle like '%$keyword%' or publicPledge like '%$keyword%' or  publicMoney like '%$keyword%' or publicSheng like '%$keyword%' or publicShi like '%$keyword%' or publicPerson like '%$keyword%' or  publicQu like '%$keyword%' or isRent like '%$keyword%'";
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
    <title>出租信息</title>
    <style>
        #manageUser{
            margin: 0 auto;
            width: 1100px;
        }
        #manageUser td[class^='to'] a:hover{
            color: red!important;
        }
        #manageUser .contact_imgs{
            font-size: 15px;

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
            width: 180px;
        }
        #manageUser .toRents{
            width: 130px;
        }
        #manageUser .toSevers{
            width: 80px;
        }
        #manageUser .toPerson{
            width: 90px;
            padding-right: 15px;
        }
        #manageUser .toContacts{
            width: 220px;
        }
        #manageUser .toAddress{
            width: 250px;
        }
        #manageUser .toDo{
            width: 112px;
        }
        #manageUser .toStatue{
            width: 110px;
        }
        #manageUser .newBlueRentStatus{
            background-color: rgb(0, 160, 255)!important;
            width:30px;height:30px;border-radius:5px;color:white
        }
        #manageUser  .blueRentStatus{
            width:30px;height:30px;background-color: rgb(0, 191, 255);border-radius:5px;color:white
        }
        #manageUser .redRentStatus{
            width:30px;height:30px;background-color:red;border-radius:5px;color:white;
        }
        #manageUser .newRedRentStatus{
            width:30px;height:30px;background-color:darkred!important;;border-radius:5px;color:white;
        }
    </style>
</head>
<body>
<div class="mainBorder" style="float: left;">

<fieldset id="manageUser">
    <legend style="font-size: 24px;color: #666;">管理出租信息</legend>
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
    <form method="get" action="publicInfos.php" class="newsForm" style="margin:10px;text-align: center">
        <input type="text" name="keyword"  value="<?php echo $keyword;?>"  placeholder="关键字" class="searchNews"/><input type="submit" class="searchNewsButton" value="搜索"/>
    </form>
    <table class="tableUser" border="0" cellspacing="0" cellpadding="0">
        <tr  style="height:40px" bgcolor="#F7F7F7">
            <td class="toNum">编号</td>
            <td class="toTitles">标题</td>
            <td class="toRents">租金</td>
            <td class="toSevers">服务保障</td>
            <td class="toPerson">联系人</td>
            <td class="toAddress">租赁联系地址</td>
            <td class="toContacts">联系方式</td>
            <td class="toStatue">租赁状态</td>
            <td class="toDo">操作</td>
        </tr>
        <?php
        while($arr = mysqli_fetch_array($query)){

            //设置租赁所需权限
            if (isset($_SESSION['username'])) {
                $order_href = "order.php?id=" .$arr[0];
            } else {
                $tipToLogin = '1'; //登录后才能进行租赁操作！
                $order_href = "?tipToLogin=" . $tipToLogin;
            }
            ?>
            <tr>
                <td> <?php echo $arr[0];?></td>
            <td class="toDetail"><a href="../User/bikeDetail.php?id=<?php echo $arr[0];?>" style="font-size: 15px;font-weight: bold;color: black" target="_blank"><?php echo cut_str($arr[1],10);?></a></td>
            <td style="color: red;"><?php echo $arr[7].$arr[8];?></td>
            <td><img src="../../image/icons/icon33.gif" alt=""><img src="../../image/icons/icon34.gif" alt=""><img src="../../image/icons/icon35.gif" alt=""></td>
            <td style="color: gray;"><?php echo $arr[13];?></td>
            <td><?php echo cut_str($arr[3].$arr[4].$arr[5],10);?></td>
                <td class="contact_imgs">
                    <div><img src="../../image/icons/tel_icon.gif" alt="">固话：<?php echo substr_replace($arr[15],'****',3,5);?></div><div><img src="../../image/icons/icon_phone.gif" alt="">手机：<?php echo substr_replace($arr[14],'****',3,4);?></div><div><img src="../../image/icons/icon_qqA.gif" alt="">QQ：<?php echo substr_replace($arr[16],'****',1,6);?></div></td>
                <td style="color: gray;"><a href="updatePublicStatus.php?isRent=<?php echo $arr[18];?>&publicId=<?php echo $arr[0];?>" style="text-decoration: none;"><span  class="rentStatus" ><?php echo $arr[18];?></span></a></td>
            <!--租赁-->
            <?php if ($arr[18]!='已出租'){
                ?>
                <td class="toOrder"><a href="publicUpdate.php?publicId=<?php echo $arr[0];?>">修改</a>&nbsp;&nbsp;<a href="" onclick="deletePublic(<?php echo $arr[0] ?>)">删除</a></td>
           <?php }?>
    </tr>
        <?php }?>
    <script>
        (function() {
           for (var i=0;i<document.getElementsByClassName('rentStatus').length;i++) {
               document.getElementsByClassName('rentStatus')[i].addEventListener('click',function (e) {
                  var yes =  confirm('确定要改变出租状态吗？');
                  if(yes !=true){
                      window.event.returnValue = false;
                  }
               },false);
                   var rentStatus = document.getElementsByClassName('rentStatus')[i].innerHTML;
                   var str='已出租';
                   if (rentStatus == str){
                       document.getElementsByClassName('rentStatus')[i].setAttribute('style',"width:30px;height:30px;background-color:red;border-radius:5px;color:white");
                       document.getElementsByClassName('rentStatus')[i].addEventListener('mouseover',function (e) {
                           e.target.className="newRedRentStatus";
                       },false);
                       document.getElementsByClassName('rentStatus')[i].addEventListener('mouseout',function (e) {
                           e.target.className="redRentStatus";
                       },false);
                   }else{
                       document.getElementsByClassName('rentStatus')[i].setAttribute('style',"width:30px;height:30px;background-color: rgb(0, 191, 255);border-radius:5px;color:white");
                       /*  .className='newRentStatus';*/
                       document.getElementsByClassName('rentStatus')[i].addEventListener('mouseover',function (e) {
                           e.target.className="newBlueRentStatus";
                       },false);
                       document.getElementsByClassName('rentStatus')[i].addEventListener('mouseout',function (e) {
                           e.target.className="blueRentStatus";
                       },false);
               }
           }
        })();
    </script>
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
<script>
    function deletePublic(id){
       var yes = confirm('确定要删除编号为'+id+"的出租信息吗？");
    if(yes ==true){
        window.location.href="publicDelete.php?id="+id;
        window.event.returnValue =false;
    }else{
        alert("未删除");
    }
    }

</script>
</body>
</html>

