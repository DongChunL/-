<?php
session_start();
include '../../sql/phpConnectDb.php';
$name = $_SESSION['admin'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$userAddress = $_POST['userAddress'];
$sql = "UPDATE admin SET username='$username',phone='$phone',email='$email',userAddress='$userAddress' WHERE username = '$name'";
if($query = mysqli_query($link,$sql)){
    $_SESSION['username']= $username;
    echo "<script>window.location.href='myInfo.php'</script>";
}else{
    echo mysqli_error($link);
}
?>