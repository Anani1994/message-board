<?php
include 'connection.php';

$user_name = $_POST['user_name'];
$user_account = $_POST['user_account'];
$user_password = $_POST['password'];
$sex = isset($_POST['sex'])?$_POST['sex']:"";
$email = $_POST['email'];
$number = 0;

mysqli_select_db( $conn, 'comments');

$select_account_sql="SELECT account FROM users WHERE account = '$user_account'";
$select_account = mysqli_query($conn,$select_account_sql);
if (is_array(mysqli_fetch_array($select_account, MYSQLI_ASSOC))) {
	$arr = array("error" => "该用户已被注册，请重新输入！");
    echo json_encode($arr);
	exit();
}

$select_name_sql="SELECT username FROM users WHERE username = '$user_name'";
$select_name = mysqli_query($conn,$select_name_sql);
if (is_array(mysqli_fetch_array($select_name, MYSQLI_ASSOC))) {
	$arr = array("error" => "该昵称已存在，请重新输入！");
    echo json_encode($arr);
	exit();
}

$select_email_sql="SELECT email FROM users WHERE email = '$email'";
$select_email = mysqli_query($conn,$select_email_sql);
if (is_array(mysqli_fetch_array($select_email, MYSQLI_ASSOC))) {
	$arr = array("error" => "该邮箱已被注册，请重新输入！");
    echo json_encode($arr);
	exit();
}

$insert_sql = "INSERT INTO users".
			  "(account,username,password,sex,email,submission_time,status)".
			  "VALUES".
			  "('$user_account','$user_name','$user_password','$sex','$email',now(),'$number')";
$insert = mysqli_query($conn,$insert_sql);
if (!$insert) {
	$arr = array("error" => "注册失败！");
    echo json_encode($arr);
	exit();
}

$arr = array("error" => "noerror");
echo json_encode($arr);

mysqli_free_result($select_account);
mysqli_free_result($select_name);
mysqli_free_result($select_email);

mysqli_close($conn);
?>