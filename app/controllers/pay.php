<?php
session_start();
require "../../vendor/autoload.php";
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;


require_once "paypal/start.php";
require_once "./connect.php";

if(!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])){
	die();
}

if((bool)$_GET['success']===false){
	die();
}

$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

$payment = Payment::get($paymentId, $paypal);
$execute = new PaymentExecution();
$execute->setPayerId($payerId);
$trans_code = "";

try {
	$result = $payment->execute($execute, $paypal);
	$result_of_payment = json_decode($result);
	$trans_code = $result_of_payment->transactions[0]->invoice_number; 
} catch(Exception $e){
	echo($e->getData());
	die();
}

$user_id = $_SESSION['user']['id'];
$purchase_date = date("Y-m-d G:i:s");
$status_id = 1;
$payment_mode_id = 2;
$address = $_SESSION['address'];

$new_order_query = "INSERT INTO orders(user_id, total, transaction_code, purchase_date, status_id, payment_mode_id) VALUES ('$user_id', $total, '$trans_code', '$purchase_date', '$status_id', '$payment_mode_id');";
$new_order = mysqli_query($conn, $new_order_query);
$new_order_id = mysqli_insert_id($conn);

if($new_order){
	foreach($_SESSION['cart'] as $item_id => $qty){
		$item_query = "SELECT price FROM items WHERE id = '$item_id';";
		$item_result = mysqli_query($conn, $item_query);
		$item = mysqli_fetch_assoc($item_result);

		$order_item_query = "INSERT INTO orders_items(order_id, item_id, quantity, price) VALUES ('$new_order_id', '$item_id', '$qty', '" . $item['price']. "');";
		mysqli_query($conn, $order_item_query);
	}
}

unset($_SESSION['cart']);
unset($_SESSION['address']);
$_SESSION['new_txn_number'] = $trans_code;
mysql_error($conn);
mysqli_close($conn);
header('Location: ../views/confirmation.php');
?>