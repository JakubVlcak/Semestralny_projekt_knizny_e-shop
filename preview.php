<?php
include_once 'parts/html_header.php';
include_once 'environmental_variables.php';
include_once 'db_connection.php';
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
            get_preview($item,$conn);
            ?>

            <div class="tm-gallery no-pad-b">
                <div class="row">
                    <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item mb-5">
                        <a href="preview.html">
                            <div class="tm-gallery-item-overlay">
                                <img src="img/image-06.jpg" alt="Image" class="img-fluid tm-img-center">
                            </div>
                            <p class="tm-figcaption no-pad-b">Suspendisse suscipit</p>
                        </a>
                    </figure>
                    <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item mb-5">
                        <a href="preview.html">
                            <div class="tm-gallery-item-overlay">
                                <img src="img/image-03.jpg" alt="Image" class="img-fluid tm-img-center">
                            </div>
                            <p class="tm-figcaption no-pad-b">Cras non augue</p>
                        </a>
                    </figure>
                    <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item mb-5">
                        <a href="preview.html">
                            <div class="tm-gallery-item-overlay">
                                <img src="img/image-08.jpg" alt="Image" class="img-fluid tm-img-center">
                            </div>
                            <p class="tm-figcaption no-pad-b">Vivamus facilisis</p>
                        </a>
                    </figure>
                    <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item mb-5">
                        <a href="preview.html">
                            <div class="tm-gallery-item-overlay">
                                <img src="img/image-05.jpg" alt="Image" class="img-fluid tm-img-center">
                            </div>
                            <p class="tm-figcaption no-pad-b">Quisque velit</p>
                        </a>
                    </figure>
                </div>
            </div>

        </div>

        <?php
        include_once 'parts/footer.php';
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