<?php 
	
	require_once './connect.php';
	$id = $_GET['id'];
	$cancelOrderQuery = "UPDATE orders SET status_id = 3 WHERE id=$id;";
	$result = mysqli_query($conn, $cancelOrderQuery);

	header("Location: ../views/orders.php");
?>