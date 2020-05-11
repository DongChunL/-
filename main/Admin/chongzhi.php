<?php
include '../../sql/phpConnectDb.php';

//绑定用户
$username = $_GET['username'];
$user_sql = "SELECT id FROM users WHERE username = '$username'";
$user_query = mysqli_query($link,$user_sql);
$user_id = mysqli_fetch_row($user_query);
$user_id = $user_id[0];


//账单流水
$money = $_GET['coins'];
$moneyDescribe = "充值".$money."租币";
ini_set("date.timezone","Asia/Chongqing");   /*调整时区，否则会相差八个小时*/
$created_at = date('Y-m-d H:i:s',time());
$type="充值";
$account_sql = "INSERT INTO accounts(id,moneyIn,moneyDescribe,created_at,user_Id,user_name,accountType,public_id)VALUES(null,'$money','$moneyDescribe','$created_at','$user_id','$username','$type',NULL)";
if(!$account_query = mysqli_query($link,$account_sql)){
    var_dump(mysqli_error($link));
    echo "流水出错";
    exit();
}

//查询原有金额，判断是否是第一次充值
$sql = "SELECT money FROM money WHERE username = '$username'";
$query = mysqli_query($link,$sql);


if(!$oldMoney = mysqli_fetch_row($query)){
//第一次充值
    $money = $_GET['coins'];
    $sql = "SELECT id FROM users WHERE username = '$username'";
    $query = mysqli_query($link,$sql);
    $user_id = mysqli_fetch_row($query);
    $user_id = $user_id[0];
    $sql = "INSERT INTO money(id,money,user_id,username)VALUES(NULL,'$money','$user_id','$username')";
    if(!$query = mysqli_query($link,$sql))
    {
        echo "充值失败！";
        echo mysqli_error($link);
        exit();
    }
    /*    echo "第一次充值";*/
    echo "<script>window.location.href='myCoins.php';</script>";
    exit();
}

$money = $_GET['coins']+$oldMoney[0];
echo $money;

//充值
$sql  = "UPDATE money SET money = '$money' WHERE username = '$username'";
if(!$query = mysqli_query($link,$sql))
{
    echo "充值失败！";
    echo mysqli_error($link);
    exit();
}
echo "<script>window.location.href='myCoins.php?user=$username';/*            window.event.returnValue=true*/</script>";



