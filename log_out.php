<?php
include_once 'parts/html_header.php';
include_once 'environmental_variables.php';
include_once 'db_connection.php';
if(isset($_SESSION["authenticated"])){
    if($_SESSION["authenticated"]==1){
        $_SESSION["authenticated"] = 0;
        $message = "You have been logged out";
    }
    else{
        $message = "You have not been logged out ,because you were not logged in";
    }
}
else{
    $message = "You have not been logged out ,because you were not logged in";
}
?>

<body>
    <div class="container">
        <?php
        include_once 'parts/navigation.php';
        echo '<p>'. $message .'</p>';
        ?>
    </div>

    <?php
    include_once 'parts/scripts.php';
    ?>
</body>
<?php
include_once 'parts/footer.php';
?>