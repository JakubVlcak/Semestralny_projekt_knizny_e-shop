<?php
include_once 'parts/html_header.php';
include_once 'environmental_variables.php';
include_once 'db_connection.php';
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$_POST['email']]);
$result = $stmt->fetch();
if (!empty($result)) {
    if (hash("sha256", $_POST["password"]) == $result["password"]) {
        $_SESSION["authenticated"] = 1;
        $_SESSION["iduser"]=$result["idusers"];
        $_SESSION["name"]=$result["name"];
        if ($result["isadmin"]) {
            $_SESSION["isadmin"] = 1;
        } else {
            $_SESSION["isadmin"] = 0;
        }
        $stmt = $conn->prepare("SELECT * FROM cart WHERE users_idusers = ?");
        $stmt->execute([$result["idusers"]]);
        $result_cart=$stmt->fetch();
        if(empty($result_cart)){
            $stmt2 = $conn->prepare("INSERT INTO `cart` (`users_idusers`) VALUES (?)");
            $stmt2->execute([$result["idusers"]]);
            $stmt3 = $conn->prepare("SELECT * FROM cart WHERE users_idusers = ?");
            $stmt3->execute([$result["idusers"]]);
            $result2=$stmt3->fetch();
            $cart=$result2["idcart"];
        }
        else{
            $cart=$result_cart["idcart"];
        }
        $_SESSION["idcart"] = $cart;
        $message = "You have been authenticated";
    } else {
        $_SESSION["authenticated"] = 0;
        $message = "Password is not correct";
    }
} else {
    $message = "Email address doesn't exist";
}
?>

<body>
    <div class="container">
        <?php
        include_once 'parts/navigation.php';
        ?>
        <div class="text-center h-50 d-inline-block d-flex justify-content-center mt-9">
            <?php
            echo '<p>' . $message . '</p><br>';
            ?>
        </div>
    </div>
    <?php
    include_once 'parts/scripts.php';
    ?>

</body>
<?php
include_once 'parts/footer.php';
?>

</html>