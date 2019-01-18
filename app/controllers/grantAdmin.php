<?php 

session_start();
require_once './connect.php';
$id = $_GET['id'];

$updateUserQuery = "SELECT roles_id FROM users WHERE id = $id;";
$userToEdit = mysqli_query($conn, $updateUserQuery);
$user = mysqli_fetch_assoc($userToEdit);

// var_export($user);
if ($user['roles_id'] == 2) {
	$updateRoleQuery = "UPDATE users SET roles_id = 1 WHERE id=$id;";
} else {
	$updateRoleQuery = "UPDATE users SET roles_id = 2 WHERE id=$id;";
}
$result = mysqli_query($conn, $updateRoleQuery);
if ($result) {
	echo mysqli_error($conn);
}

header("Location: ../views/users.php");
	
?>