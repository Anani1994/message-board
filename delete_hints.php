<?php
include 'connection.php';

$delete_name_status = $_POST['delete_name_status'];
$change_sataus = "0";

$delete_status_sql = "UPDATE users SET status='$change_sataus' WHERE username = '$delete_name_status'";
mysqli_select_db($conn,'comments');

$delete_status = mysqli_query($conn,$delete_status_sql);
if (!$delete_status) {
	$arr = array("error" => "操作失败,请稍后重试！");
    echo json_encode($arr);
	exit();
}

$arr = array("error" => "noerror");
echo json_encode($arr);

mysqli_close($conn);
?>