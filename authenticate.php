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
        $message = "You have been authenticated";
        if ($result["isadmin"]) {
            $_SESSION["isadmin"] = 1;
        } else {
            $_SESSION["isadmin"] = 0;
        }
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