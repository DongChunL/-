<?php
header("content-type:text/html;charset=utf-8");

$name=$_POST['name'];

//连接数据库
$conn=mysqli_connect("localhost","root","");
if(!$conn){
    die("连接数据库失败");
}

//设置字符集
mysqli_query($conn, "set names utf8");

//选择数据库
mysqli_select_db($conn, "garage");

$sql="select id from district where district_name="."'$name';";

$res=mysqli_query($conn, $sql);
if(mysqli_num_rows($res)>0){
    $row=mysqli_fetch_assoc($res);
    $id=$row['id'];
}else{
    $id=0;
}

$sql="select * from distrcit where pid=".$id;

$res=mysqli_query($conn, $sql);
$arr=array();
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
        $arr[]=$row;
    }
}

foreach ($arr as $k=>$v){

    @$str.='{"district_name":'.'"'.$v['district_name'].'","pid":'.'"'.$v['pid'].'","id":'.'"'.$v['id'].'"},';

}

echo "[".$str."]";


// echo '[{"name":"安徽","parent_id":"0"},{"name":"浙江","parent_id":"0"},{"name":"吉林","parent_id":"0"},]';


?>
