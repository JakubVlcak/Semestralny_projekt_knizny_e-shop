<?php
include_once 'parts/html_header.php';
include_once 'environmental_variables.php';
include_once 'db_connection.php';
include_once 'functions/functions.php';
?>

<body>

    <div class="container">
        <?php
        include_once 'parts/navigation.php';
        ?>


        <div class="tm-main-content">
            <section class="tm-margin-b-l">
                <header>
                    <h2 class="tm-main-title">Welcome to our bookstore</h2>
                </header>

                <p>Shelf HTML template is provided by Tooplate. Please tell your friends about it. Thank you. Images are from Unsplash website. In tincidunt metus sed justo tincidunt sollicitudin. Curabitur magna tellus, condimentum vitae consectetur id, elementum sit amet erat.</p>

                <div class="tm-gallery">
                    <div class="row">
                        <?php
                        get_books($conn);
                        ?>
                    </div>
                </div>

                <nav class="tm-gallery-nav">
                    <ul class="nav justify-content-center">
                        <li class="nav-item"><a class="nav-link active" href="#">1</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">2</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">3</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">4</a></li>
                    </ul>
                </nav>
            </section>
        </div>
        <?php
        include_once 'parts/footer.php';
        ?>
    </div>

    <?php
    include_once 'parts/scripts.php';
    ?>
    <script>
        $(document).ready(function() {

            // Update the current year in copyright
            $('.tm-current-year').text(new Date().getFullYear());

        });
    </script>

</body>

</html>