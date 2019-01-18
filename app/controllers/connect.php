<?php 

$host = 'db4free.net';
$username = 'adminacount';
$password = '09161996';
$dbname = 'store_database';

$conn = mysqli_connect($host, $username, $password, $dbname);


if (!$conn) {
	die('connection failed:' . mysqli_error($conn));
}

// echo 'connected succesfully';

?>