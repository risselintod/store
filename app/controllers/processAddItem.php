<?php 

session_start();
require_once './connect.php';

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$image = "../assets/images/".$_FILES['image']['name']; // storing image path
move_uploaded_file($_FILES['image']['tmp_name'],"./".$image);

$sql = "INSERT INTO items (name, description, price, image_path, category_id) VALUES ('$name', '$description', '$price', '$image', '$category_id')";
mysqli_query($conn, $sql);

header("Location: ../views/items.php");


?>