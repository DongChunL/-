<?php
include '../../sql/phpConnectDb.php';
//绑定用户
session_start();
$username = $_SESSION['username'];
$user_sql = "SELECT id FROM users WHERE username = '$username'";
$user_query = mysqli_query($link,$user_sql);
$user_id = mysqli_fetch_row($user_query);
$user_id = $user_id[0];

$orderPeriod = $_GET['zuQi'];
$orderId = $_GET['orderId'];
$oldMoney = $_GET['oldMoney'];  //原租金
$orderMoney = $_GET['Span_Money'];//续租金
/*$newMoney = $oldMoney +$orderMoney; //新租金*/

$public_Id = $_GET['public_Id'];
$orderTime = $_GET['orderTime'];

//归还时间
$style_sql = "select publicMoneyStyle FROM carpublic WHERE publicId = '$public_Id'";
$style_query = mysqli_query($link,$style_sql);
$publicMoneyStyle = mysqli_fetch_array($style_query);
if($publicMoneyStyle['publicMoneyStyle'] == "元/小时"){
    $style = 'hour';
}else if($publicMoneyStyle['publicMoneyStyle'] == "元/天"){
    $style = 'day';
}else if($publicMoneyStyle['publicMoneyStyle'] == "元/月"){
    $style = 'month';
}
$setReturnTime = $orderTime.' +'.$orderPeriod.' '.$style;
$returnTime =date('Y-m-d H:i:s',strtotime($setReturnTime));

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
    //3、查剩余余额
    $left_sql = "SELECT money FROM money WHERE  username='$username'AND user_id='$user_id'";
    $left_query = mysqli_query($link,$left_sql);
    $left_Result = mysqli_fetch_array($left_query);
    $left = $left_Result['money'];
}

//账单流水
$moneyDescribe = "续租了一件物品，支付".$orderMoney."租币";
ini_set("date.timezone","Asia/Chongqing");   /*调整时区，否则会相差八个小时*/
$created_at = date('Y-m-d H:i:s',time());
$type="支付";
$waterMoney = -$orderMoney;
$account_sql = "INSERT INTO accounts(id,moneyIn,moneyDescribe,created_at,user_Id,user_name,accountType,public_id)VALUES(null,'$waterMoney','$moneyDescribe','$created_at','$user_id','$username','$type','$public_Id[0]')";
if(!$account_query = mysqli_query($link,$account_sql)){
    echo mysqli_error($link);
    echo "流水出错";
    exit();
}


//查询原订单
$sql = "SELECT * FROM rentorders WHERE orderId = '$orderId'";
$query = mysqli_query($link,$sql);
$arr = mysqli_fetch_array($query);
$orderPhone = $arr['orderPhone'];
$orderAddress = $arr['orderAddress'];
$orderTime =  date('Y-m-d H:i:s',time());
$orderNumber = $arr['orderNumber'];
$orderMethod = $arr['orderMethod'];
//添加一个续的订单历史
$sql = "INSERT INTO rentorders(orderId,public_Id,user_name,orderPhone,orderAddress,orderTime,returnTime,orderNumber,orderPeriod,orderInfo,orderMethod,orderMoney,continueRent,oldOrderId)VALUES(NULL,'$public_Id','$username','$orderPhone','$orderAddress','$orderTime','$returnTime','$orderNumber','$orderPeriod',NULL,'$orderMethod','$orderMoney','续单','$orderId')";
if(!$query = mysqli_query($link,$sql)){
    var_dump(mysqli_error($link));
    exit();
    /*         exit();*/
}
echo "<script>window.location.href='user_index.php#seekManage'</script>";