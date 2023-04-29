<?php
include_once 'environmental_variables.php';
include_once 'db_connection.php';
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$_POST['email']]);
$result = $stmt->fetch();
if (empty($result)) {
    $pass = hash("sha256",$_POST["password"]);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stmt = $conn->prepare("INSERT INTO `users`(`email`, `name`, `password`, `isadmin`) VALUES (?,?,?,?)");
    $stmt->execute([$email,$name,$pass,0]);
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $result = $stmt->fetch();
    $_SESSION["authenticated"] = 1;
    $_SESSION["iduser"]=$result["iduser"];
    $_SESSION["name"]=$name;
    $_SESSION["isadmin"] = 0;
    $item = $stmt->fetch();
    $message = "Succesfuly registered";
}
else{
    $message = "Somebody with this email already signed in, please use different email";
}
include_once 'parts/html_header.php';
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