<?php
include 'connection.php';

$delete_time = $_POST['delete_time'];
$change_toggle = "hide";

$delete_comment_sql = "UPDATE contents SET toggle='$change_toggle' WHERE submission_time = '$delete_time'";
mysqli_select_db($conn,'comments');

$delete_comment = mysqli_query($conn,$delete_comment_sql);
if (!$delete_comment) {
	$arr = array("error" => "删除留言失败,请稍后重试！");
    echo json_encode($arr);
	exit();
}

$arr = array("error" => "noerror");
echo json_encode($arr);

mysqli_close($conn);
?>