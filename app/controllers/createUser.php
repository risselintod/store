<?php 
	require_once './connect.php';
	// require_once './library.php';

	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$role = 2;

	//retrieve only the data under the username column that has the same value as the username variable
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		die("user_exists");
		} else{
		$sql_insert = "INSERT INTO users(username, password, firstname, lastname, email, address, roles_id) VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$address', $role'); ";
		$result = mysqli_query($conn, $sql_insert);

	}

	mysqli_close($conn);

?>