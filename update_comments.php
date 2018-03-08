<?php
include 'connection.php';

$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_content = $_POST['content'];
$subtime = date("Y-m-d H:i:s",time()+8*3600);
$toggle = "show";

$insert_comments_sql = "insert into contents".
                       "(username,email,content,submission_time,toggle)".
                       "values".
                       "('$user_name','$user_email','$user_content',now(),'$toggle')";
mysqli_select_db($conn,'comments');
$insert_comments = mysqli_query($conn,$insert_comments_sql);
if (!$insert_comments) {
	$arr = array("error" => "留言失败，请稍后重试！");
    echo json_encode($arr);
	exit();
}

$number = mysqli_insert_id($conn);
$arr = array("number"=>"$number","name"=>"$user_name","email"=>"$user_email","content"=>"$user_content","time"=>"$subtime","error" => "noerror");
echo json_encode($arr);

mysqli_close($conn);
?>