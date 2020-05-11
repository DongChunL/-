<?php
session_start();
include '../../sql/phpConnectDb.php';
$name = $_SESSION['username'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$userAddress = $_POST['userAddress'];
$sql = "UPDATE users SET username='$username',phone='$phone',email='$email',userAddress='$userAddress' WHERE username = '$name'";
if($query = mysqli_query($link,$sql)){
    $_SESSION['username']= $username;
    echo "<script>window.location.href='user_index.php#myInfo'</script>";
}else{
    echo mysqli_error($link);
}

?>