<?php
include '../../sql/phpConnectDb.php';
$commentId = $_GET['commentId'];
$sql = "DELETE FROM comment WHERE commentId = '$commentId'";
if(mysqli_query($link,$sql)){
    echo "<script>window.location.href='userComment.php'</script>";
}