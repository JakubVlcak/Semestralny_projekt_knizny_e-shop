<?php
include_once 'environmental_variables.php';
include_once 'db_connection.php';
header('Access-Control-Allow-Origin: *'); 
header("Content-Type: application/json; charset=UTF-8");
$content = trim(file_get_contents("php://input"));
$_arr = json_decode($content, true);
$stmt = $conn->prepare("INSERT INTO `books_has_cart`(`books_idbooks`,`cart_idcart`) VALUES (?,?)");
$stmt->execute([$_arr["id"],$_arr["idcart"]]);
?>