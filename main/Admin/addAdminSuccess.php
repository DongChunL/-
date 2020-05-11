<?php
session_start();
include '../../sql/phpConnectDb.php';
$name = $_SESSION['admin'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$passwd = md5($_POST['passwd']);
$publicProvince = $_POST['provinces'];   //子类
$publicCity = $_POST['city'];        //子类
$publicArea= $_POST['area'];        //子类
//处理省市区的转换；
$sql = "SELECT province_name FROM province WHERE province_num ='$publicProvince'";
if ($result = mysqli_query($link, $sql)) {
    $arr = mysqli_fetch_row($result);
    $publicProvince = $arr[0];
}
$sql = "SELECT city_name FROM city WHERE city_num ='$publicCity'";
if ($result = mysqli_query($link, $sql)) {
    $arr = mysqli_fetch_row($result);
    $publicCity = $arr[0];
}
$sql = "SELECT area_name FROM area WHERE id ='$publicArea'";
if ($result = mysqli_query($link, $sql)) {
    $arr = mysqli_fetch_row($result);
    $publicArea = $arr[0];
}

$userAddress = $publicProvince.$publicCity.$publicArea;
$sql = "INSERT INTO admin(username,passwd,phone,email,userAddress)VALUES('$username','$passwd','$phone','$email','$userAddress')";
if($query = mysqli_query($link,$sql)){
    echo "<script>window.location.href='myInfo.php'</script>";
}else{
    echo mysqli_error($link);
}
?>