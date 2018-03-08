<?php 
include 'connection.php';

mysqli_select_db($conn,'comments');

$user_name = $_POST['user_name'];

$select_status_sql = "SELECT status FROM users WHERE username = '$user_name'";
$select_status = mysqli_query($conn,$select_status_sql);
if (!$select_status) {
	$arr = array("error" => "操作失败，请稍后重试！");
    echo json_encode($arr);
	exit();
}
$select_row = mysqli_fetch_array($select_status, MYSQLI_ASSOC);
$select_ret = $select_row['status'];

$arr = array("status"=>"$select_ret","error" => "noerror");
echo json_encode($arr);

mysqli_free_result($select_status);

mysqli_close($conn);
 ?>