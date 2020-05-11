<?php
include '../../sql/phpConnectDb.php';
$type = isset($_GET['type'])?$_GET['type']:0;//获取请求信息类型 1省 2市 3区
$province_num = isset($_GET['pnum'])?$_GET['pnum']:'440000';//根据省编号查市信息
$city_num = isset($_GET['cnum'])?$_GET['cnum']:'440100';//根据市编号查区信息

switch ($type) {//根据请求信息类型，组装对应的sql
    case 1://省
        $sql = "SELECT * FROM province";
        break;
    case 2://市
        $sql = "SELECT * FROM city WHERE province_num='{$province_num}'";
        break;
    case 3://区
        $sql = "SELECT * FROM area WHERE city_num='{$city_num}'";
        break;
    default:
        die('no data');
        break;
}
$result = mysqli_query($link, $sql);//执行查询sql
if (mysqli_num_rows($result) <= 0){
    die("no data");
}
// 组装数据输出
$rows = array();
while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
echo json_encode($rows);//返回json数据
?>