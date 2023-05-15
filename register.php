<?php
include_once 'environmental_variables.php';
include_once 'db_connection.php';
include_once 'parts/session.php';
include_once 'parts/html_header.php';
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$_POST['email']]);
$result = $stmt->fetch();
if (empty($result)) {
    $pass = hash("sha256",$_POST["password"]);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stmt = $conn->prepare("UPDATE `users` SET `email` = ?, `name` = ?, `password` = ? , `isadmin` = ?
    WHERE idusers=". $_POST["iduser"]);
    $stmt->execute([$email,$name,$pass,0]);
    $iduser=$_POST["iduser"];
    $idcart=$_POST["idcart"];
    $_SESSION["authenticated"] = 1;
    $_SESSION["iduser"]=$iduser;
    $_SESSION["name"]=$name;
    $_SESSION["isadmin"] = 0;
    $_SESSION["idcart"]=$idcart;
    $message = "Succesfuly registered";
}
else{
    $message = "Somebody with this email already signed in, please use different email";
}
?>

<body>
    <div class="container">
        <?php
        include_once 'parts/navigation.php';
        ?>
        <div class="text-center h-50 d-inline-block d-flex justify-content-center mt-9">
            <?php
            echo '<p>' . $message . '</p>';
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