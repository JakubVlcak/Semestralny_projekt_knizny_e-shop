<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["idcart"])){
    $stmt = $conn->prepare("INSERT INTO `users`(`email`, `isadmin`) VALUES (?,?)");
    $stmt->execute(['unregistered', 0]);
    $userid=$conn->lastInsertId();
    $stmt2 = $conn->prepare("SELECT * FROM cart WHERE users_idusers = ?");
    $stmt2->execute([$userid]);
    $result_cart = $stmt2->fetch();
        if(empty($result_cart)){
            $stmt3 = $conn->prepare("INSERT INTO `cart` (`users_idusers`) VALUES (?)");
            $stmt3->execute([$userid]);
            $cart=$conn->lastInsertId();
            $_SESSION["idcart"]=$cart;
        }
    $_SESSION["iduser"]=$userid;
}
?>