<?php
include 'connection.php';

$user_account =$_POST['user_account'];
$user_password = $_POST['password'];
$remember = $_POST['remember'];

mysqli_select_db( $conn, 'comments' );

$select_check_sql = "SELECT account,password,username,email,status FROM users WHERE account = '$user_account' AND password = '$user_password'";
$select_check = mysqli_query($conn,$select_check_sql);
$check_row = mysqli_fetch_array($select_check, MYSQLI_ASSOC);
$check = is_array($check_row);
if (!$check) {
	$arr = array("error" => "账号或密码错误，请重新输入！");
    echo json_encode($arr);
	exit();
}

session_start();
$_SESSION['user_name'] = $check_row['username'];
$_SESSION['user_email'] = $check_row['email'];
$_SESSION['user_status'] = $check_row['status'];

$arr = array("error" => "noerror");
echo json_encode($arr);

mysqli_free_result($select_check);

mysqli_close($conn);
?>