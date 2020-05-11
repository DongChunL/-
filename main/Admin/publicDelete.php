<?php
include '../../sql/phpConnectDb.php';
$publicId = $_GET['id'];
$sql= "delete from carpublic where publicId = '$publicId'";
if(mysqli_query($link,$sql)){
    echo "<script>window.location.href='publicInfos.php'</script>";
}
else{
    echo mysqli_error($link);
}
?>