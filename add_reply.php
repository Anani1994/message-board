<?php
include 'connection.php';

$reply_comment_time = $_POST['reply_comment_time'];
$sub_username = $_POST['sub_username'];
$to_username = $_POST['to_username'];
$reply_content = $_POST['reply_content'];
$subtime = date("Y-m-d H:i:s",time()+8*3600);
$number = '1';

mysqli_select_db($conn,'comments');

$change_status_sql = "UPDATE users SET status='$number' WHERE username = '$to_username'";
$change_status = mysqli_query($conn,$change_status_sql);
if (!$change_status) {
	$arr = array("error" => "回复失败，请稍后重试！");
    echo json_encode($arr);
	exit();
}

$select_check_sql = "SELECT number FROM contents WHERE submission_time = '$reply_comment_time' ";
$select_check = mysqli_query($conn,$select_check_sql);
if (!$select_check) {
	$arr = array("error" => "回复失败，请稍后重试！");
    echo json_encode($arr);
	exit();
}
$check_row = mysqli_fetch_array($select_check, MYSQLI_ASSOC);
$check_ret = $check_row['number'];

$insert_comments_sql = "insert into replies".
                       "(parent_id,sub_username,to_username,reply_content,reply_time)".
                       "values".
                       "('$check_ret','$sub_username','$to_username','$reply_content',now())";
$insert_comments = mysqli_query($conn,$insert_comments_sql);
if (!$insert_comments) {
	$arr = array("error" => "回复失败，请稍后重试！");
    echo json_encode($arr);
	exit();
}

$arr = array("subName"=>"$sub_username","content"=>"$reply_content","time"=>"$subtime","error" => "noerror");
echo json_encode($arr);

mysqli_free_result($select_check);

mysqli_close($conn);
?>