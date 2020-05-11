<?php
include '../../sql/phpConnectDb.php';
$rent = $_GET['isRent'];
if ($rent=="未出租"){
    $rent="已出租";
}else{
    $rent="未出租";
}
$publicId = $_GET['publicId'];
$sql = "update carpublic set isRent = '$rent'where publicId='$publicId'";
if(!mysqli_query($link,$sql)){
    var_dump(mysqli_error($link));
}else{
    echo "<script>window.location.href='publicInfos.php'</script>";
}

