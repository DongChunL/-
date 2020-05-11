<?php
include '../../sql/phpConnectDb.php';
$commentId = $_GET['id'];
$sql = "DELETE FROM accounts WHERE id = '$id'";
if(mysqli_query($link,$sql)){
    echo "<script>window.location.href='user_index.php#myAccount'</script>";
}