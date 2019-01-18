<?php 
	
	require_once './connect.php';
	$id = $_GET['id'];
	$completeOrderQuery = "UPDATE orders SET status_id = 2 WHERE id=$id;";
	$result = mysqli_query($conn, $completeOrderQuery);

	header("Location: ../views/orders.php");
?>