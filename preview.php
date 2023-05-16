<?php
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

        <div class="tm-main-content no-pad-b">
            <?php
            include_once 'functions/functions.php';
            $item = preview($conn);
            get_preview($item, $conn);
            get_random_books($conn);
            ?>



        </div>

        <?php
        include_once 'parts/footer.php';

        include_once 'parts/scripts.php';

        ?>
    </div>

    <!-- load JS files -->
    <script src="js/jquery-1.11.3.min.js"></script> <!-- jQuery (https://jquery.com/download/) -->
    <script src="js/popper.min.js"></script> <!-- Popper (https://popper.js.org/) -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap (https://getbootstrap.com/) -->
    <script>
        $(document).ready(function() {

            // Update the current year in copyright
            $('.tm-current-year').text(new Date().getFullYear());

        });
    </script>

</body>

</html>