<?php 
	require_once './connect.php';
	session_start();

	$id = $_POST['user_id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$sqlUpdate = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', address='$address' WHERE id = $id; ";
	mysqli_query($conn, $sqlUpdate);

	$sqlNew = "SELECT * FROM users WHERE id=$id; ";
	$result = mysqli_query($conn, $sqlNew);
	$_SESSION['user'] = mysqli_fetch_assoc($result);

	header('Location: ../views/profile.php');
?>