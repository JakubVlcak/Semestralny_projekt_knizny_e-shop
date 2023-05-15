<?php
include_once 'functions/functions.php';
include_once 'environmental_variables.php';
include_once 'db_connection.php';
include_once 'parts/session.php';
include_once 'parts/html_header.php';
?>

<body>
    <div class="container">
        <?php
        include_once 'parts/navigation.php';
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th  scope="col ">id</th>
                    <th scope="col">title</th>
                    <th scope="col">count</th>
                    <th scope="col">price</th>
                    <th scope="col"> total </th>
                </tr>
            </thead>
            <tbody>
                <?php
                show_cart($conn);
                ?>
            </tbody>
        </table>
    </div>

    <?php
    include_once 'parts/scripts.php';
    ?>
</body>
<?php
include_once 'parts/footer.php';
?>