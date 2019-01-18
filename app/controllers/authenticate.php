<?php 

	session_start();
	require_once './connect.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);
	$userInfo = mysqli_fetch_assoc($result);

	if (!password_verify($password, $userInfo['password'])) {
		die("login failed");
	} else {
		$_SESSION['user'] = $userInfo;
	}

	// var_dump($_SESSION['user']);

	echo "login success";
	mysqli_close($conn);
	// var_dump($_SESSION['user'] = $userInfo);

?>