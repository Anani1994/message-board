<?php

$mysql_server = 'localhost';
$user = 'root';
$password = 'justyou@123456';

$conn = mysqli_connect($mysql_server,$user,$password);
if (!$conn) {
	$arr = array("error" => "操作失败，请稍后重试！");
    echo json_encode($arr);
	exit();
}

mysqli_query($conn , "set names utf8");

?>