<?php
include '../../sql/phpConnectDb.php';
ini_set("date.timezone","Asia/Chongqing");   /*调整时区，否则会相差八个小时*/

$public_Id = $_POST["public_Id"];
$user_name = $_POST["user_name"];
$orderPhone  = $_POST["orderPhone"];
$orderAddress  = $_POST["orderAddress"];
$orderTime  = date('Y-m-d H:i:s',time());
$orderNumber = $_POST["orderNumber"];
$orderPeriod  = $_POST["orderPeriod"];

//归还时间
$style_sql = "select publicMoneyStyle FROM carpublic WHERE publicId = $public_Id";
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

$orderInfo = $_POST["orderInfo"];
$orderMethod = $_POST['DDL_Method'];

$orderMoney = $_POST["orderMoney"];

    //1.判断该租赁物品是否为 已出租
    $sql = "SELECT publicId,isRent FROM carpublic WHERE publicId='$public_Id'";

    $query = mysqli_query($link,$sql);
    $rentResult = mysqli_fetch_array($query);
    $isRent =$rentResult ['isRent'];
    if ($isRent =="已出租"){
        echo '物品编号：'.$rentResult['publicId'].",该物品已经出租了";
        exit();
    }else if ($isRent =="未出租"){
        //判断订单库中是否已经有该订单  (已预订但未付款 该订单标识是 物品未出租+在订单库中)
        $public_sql  = "SELECT public_Id FROM rentorders where public_Id='$public_Id '";
        $public_query = mysqli_query($link,$public_sql);
        $publicHasId = mysqli_fetch_array($public_query);
        if($publicHasId['public_Id']!=""){
            echo '物品编号：'.$publicHasId['public_Id']."该物品已被预订，请租赁其它自行车";
            exit();
        }
        //2.修改租赁物品状态为 已出租
        $isRent = "已出租";
        $sql = "UPDATE carpublic SET isRent = '$isRent' WHERE publicId = '$public_Id'";
        mysqli_query($link,$sql);
        //3.储存订单 （该订单标识是 物品已出租+在订单库中)
        $sql = "INSERT INTO rentorders(orderId,public_Id,user_name,orderPhone,orderAddress,orderTime,returnTime,orderNumber,orderPeriod,orderInfo,orderMethod,orderMoney,continueRent,oldOrderId)VALUES(NULL,'$public_Id','$user_name','$orderPhone','$orderAddress','$orderTime','$returnTime','$orderNumber','$orderPeriod','$orderInfo','$orderMethod','$orderMoney',NULL,NULL)";
        if(!$query = mysqli_query($link,$sql)){
            var_dump(mysqli_error($link));
            exit();
        }

        //4.获取正确订单
        $sql = "SELECT  orderId FROM rentorders WHERE public_Id='$public_Id'";
        if(!$query = mysqli_query($link,$sql)){
            echo mysqli_error($link);
            exit();
        }else{
            $arr = mysqli_fetch_row($query);
            echo "<script>window.location.href='orderSuccess.php?orderId=".$arr[0]."'</script>";
        }
    }


?>

<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<form action="orderSuccess.php" method="post">
    <input type="hidden" name="publicId" value="<?php echo $public_Id;?>">
</form>
</body>
</html>
