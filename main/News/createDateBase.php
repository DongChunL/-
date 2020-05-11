<?php
// 创建连接
$conn = new mysqli("localhost", "root", "","garage");
// 检测连接
if ($conn->connect_error)
{
    die("连接失败: " . $conn->connect_error);
}
// 使用 sql 创建数据表
$sql = "CREATE TABLE news (
 id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 title varchar(100) NOT NULL,
 author varchar(20) NOT NULL,
 content text NOT NULL,
 created_at datetime NOT NULL,
 ) DEFAULT CHARSET=utf8 ";
if ($conn->query($sql) === TRUE)
{
    echo "Table MyGuests created successfully";
} else {
    echo "创建数据表错误: " . $conn->error;
}
$conn->close();
?>