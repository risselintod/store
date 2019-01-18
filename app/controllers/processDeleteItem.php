<?php 

session_start();
require_once './connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM items WHERE id='$id' ";
$result = mysqli_query($conn, $sql);

if (!$result) {
	echo mysqli_error($conn);
}

header("Location: ../views/items.php");

?>