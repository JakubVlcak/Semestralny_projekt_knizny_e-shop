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


        <div class="tm-main-content">
            <section class="tm-margin-b-l">
                <header>
                    <h2 class="tm-main-title">Welcome to our bookstore</h2>
                </header>

                <p>Shelf HTML template is provided by Tooplate. Please tell your friends about it. Thank you. Images are from Unsplash website. In tincidunt metus sed justo tincidunt sollicitudin. Curabitur magna tellus, condimentum vitae consectetur id, elementum sit amet erat.</p>

                <div class="tm-gallery">
                    <?php
                    $sql = "SELECT * FROM books";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <div class="row">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                        // Start output buffering
                        ob_start();



                        // Output each row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            
                        echo '<figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">';
                        echo'<a href="preview.html">';
                        echo'<div class="tm-gallery-item-overlay">';
                        echo'<img src="' . $row["urlimage"] . '" alt="Image" class="img-fluid tm-img-center">';
                                echo'</div>';

                                echo'<p class="tm-figcaption">'. $row["title"] . '</p>';
                            echo'</a>';
                        echo '</figure>';

                        }

                
                       

                        // Get the output buffer contents and clear it
                        $table = ob_get_clean();

                        // Output the table to the browser
                        echo $table;
                        } else {
                        echo "No results found.";
                        }
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

            <section class="media tm-highlight tm-highlight-w-icon">

                <div class="tm-highlight-icon">
                    <i class="fa tm-fa-6x fa-meetup"></i>
                </div>

                <div class="media-body">
                    <header>
                        <h2>Need Help?</h2>
                    </header>
                    <p class="tm-margin-b">Curabitur magna tellus, condimentum vitae consectetur id, elementum sit amet erat. Phasellus arcu leo, sagittis fringilla nisi et, pulvinar vestibulum mi. Maecenas mollis ullamcorper est at dignissim.</p>
                    <a href="" class="tm-white-bordered-btn">Live Chat</a>
                </div>
            </section>
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
<?php
include_once 'db_connection_close.php'
?>

</html>