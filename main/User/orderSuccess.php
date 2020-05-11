<?php
include'../model/head.php';
include '../../sql/phpConnectDb.php';

//绑定用户
session_start();
$username = $_SESSION['username'];
$user_sql = "SELECT id FROM users WHERE username = '$username'";
$user_query = mysqli_query($link,$user_sql);
$user_id = mysqli_fetch_row($user_query);
$user_id = $user_id[0];

//订单的出租方信息
if(($orderId = $_GET['orderId'])!=""&&isset($_SESSION['username'])){
    $sql = "SELECT public_id  FROM  rentorders WHERE orderId='$orderId'";
    if(!$query = mysqli_query($link,$sql)){
        var_dump(mysqli_error($link));
        exit();
    }
    $public_Id = mysqli_fetch_row($query);

    $sql = "SELECT publicPerson,publicMPhone,publicGPhone,publicSheng,publicShi,publicQu,publicQQ FROM carpublic WHERE publicId = '$public_Id[0]'";
    if(!$query = mysqli_query($link,$sql)){
        var_dump(mysqli_error($link));
        exit();
    }
    $arr = mysqli_fetch_row($query);
}

//订单需扣除的钱款
$order_sql = "SELECT orderMoney FROM rentorders WHERE orderId = '$orderId'";
$order_query = mysqli_query($link,$order_sql);
$order_result = mysqli_fetch_array($order_query);
$orderMoney = $order_result['orderMoney'];

//更新账户余额
//1、原有余额
$left_sql = "SELECT money FROM money WHERE  username='$username'AND user_id='$user_id'";
$left_query = mysqli_query($link,$left_sql);
$left_Result = mysqli_fetch_array($left_query);
$left = $left_Result['money'];

//2、更新账户余额
$leftMoney = $left - $orderMoney;
$money_sql = "UPDATE money SET money = '$leftMoney' WHERE username='$username'AND user_id='$user_id'";
if(!mysqli_query($link,$money_sql)){
    var_dump(mysqli_error($link));
    exit();
}else{
    //3、剩余余额
    $left_sql = "SELECT money FROM money WHERE  username='$username'AND user_id='$user_id'";
    $left_query = mysqli_query($link,$left_sql);
    $left_Result = mysqli_fetch_array($left_query);
    $left = $left_Result['money'];
}


//账单流水
$moneyDescribe = "租赁了一件物品，支付".$orderMoney."租币";
ini_set("date.timezone","Asia/Chongqing");   /*调整时区，否则会相差八个小时*/
$created_at = date('Y-m-d H:i:s',time());
$type="支付";
$orderMoney = -$orderMoney;
$account_sql = "INSERT INTO accounts(id,moneyIn,moneyDescribe,created_at,user_Id,user_name,accountType,public_id)VALUES(null,'$orderMoney','$moneyDescribe','$created_at','$user_id','$username','$type','$public_Id[0]')";
if(!$account_query = mysqli_query($link,$account_sql)){
    echo mysqli_error($link);
    echo "流水出错";
    exit();
}
?>
    <html>
    <head>
        <meta charset="utf-8">
        <title>自行车租赁 - 租用订单</title>
        <link href="../Css/nav.css" rel="stylesheet" type="text/css">
        <link href="../Css/headso.css" rel="stylesheet" type="text/css">
        <link href="../Css/order.css" rel="stylesheet" type="text/css">
        <style>
            .contact{
                width:18px;
                height:18px;
            }

        </style>
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
                <Li><a href="about.php">关于我们</a></Li>
                <Li><a href="help.php">帮助中心</a></Li>
                <li><a href="onlinePredict.php">在线预订</a></li>
            </ul>
        </section>
    </nav>
<div class="center" style="min-height: 600px">
    <div class="weizhi1">
        <div class="wzTxt">
            您当前所在的位置：<a href="./">租赁宝</a> &gt;&gt; 下订单</div>
<!--        <div class="ddstep2">
            <ul class="stepList">
                <li>1.填写订单信息</li>
                <li class="hover">2.成功提交订单</li>
                <li>3.支付订单</li>
            </ul>
        </div>-->
    </div>
    <div class="orderMain">
        <div class="msgBorder">
            <div class="msgTitle1" style="width: 802px">
                <img src="../../image/icons/dui.gif" alt="" style="display: inline-block;"><span id="spantext" class="sendSuc">恭喜,您的订单已提交成功！请等待出租方确认,您也可以联系出租方。</span></div>
            <div class="czfTel">
                出租方联系方式：</div>
            <ul>
                <li>
                    姓名：<?php echo $arr[0]?>                        &nbsp;&nbsp;&nbsp;&nbsp;联系方式：<img src="../../image/icons/tel_icon.gif" class="contact" alt="">固话：<?php echo $arr[2]?>      &nbsp;<img src="../../image/icons/icon_phone.gif" class="contact" alt="">手机：<?php echo $arr[1]?>         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../image/icons/icon_qqA.gif" class="contact" alt="">QQ：<?php echo $arr[6]?>                                                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地址：<?php echo $arr[3].$arr[4].$arr[5];?>
                </li>
                <li>
                    <br>
                    <div class="czfTel">
                        支付订单：</div>
                    <ul>
                        <li>
                            扣除租币：<?php echo $orderMoney?>
                        </li>
                        <li>
                            剩余租币：<?php echo $left?>
                        </li>
                    </ul>
                    <br>
                    <font style="font-size: 14px;">您还可以：</font><br>
                    <span class="colorBlue">
                        <a id="MemberLink" title="进入用户中心查看租赁宝更多服务，赚取积分信用值获得更多权限" href="../userCenter/user_index.php" style="color: blue;">进入用户中心</a>&nbsp;&nbsp;&nbsp;<a id="hydetailorder" title="查看出租物品状态，信息越详细被下订单几率越高哦" href="details_order9487.html" style="color: blue;">查看订单详情</a>&nbsp;&nbsp;&nbsp;<a href="../../index.php" title="首页" style="color: blue;">返回首页</a></span> </li>
            </ul>
        </div>
    </div>
</div>
    </body>
    </html>
<?php
include '../model/footer.html';
?>