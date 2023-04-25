<?php
include_once 'parts/html_header.php';
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
                        <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                            <a href="preview.html">
                                <div class="tm-gallery-item-overlay">
                                    <img src="img/image-01.jpg" alt="Image" class="img-fluid tm-img-center">
                                </div>

                                <p class="tm-figcaption">Nam vitae odio</p>
                            </a>
                        </figure>
                        <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                            <a href="preview.html">
                                <div class="tm-gallery-item-overlay">
                                    <img src="img/image-02.jpg" alt="Image" class="img-fluid tm-img-center">
                                </div>
                                <p class="tm-figcaption">Integer ornare</p>
                            </a>
                        </figure>
                        <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                            <a href="preview.html">
                                <div class="tm-gallery-item-overlay">
                                    <img src="img/image-03.jpg" alt="Image" class="img-fluid tm-img-center">
                                </div>
                                <p class="tm-figcaption">Cras non addugue</p>
                            </a>
                        </figure>
                        <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                            <a href="preview.html">
                                <div class="tm-gallery-item-overlay">
                                    <img src="img/image-04.jpg" alt="Image" class="img-fluid tm-img-center">
                                </div>
                                <p class="tm-figcaption">Dolor lacus</p>
                            </a>
                        </figure>
                        <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                            <a href="preview.html">
                                <div class="tm-gallery-item-overlay">
                                    <img src="img/image-05.jpg" alt="Image" class="img-fluid tm-img-center">
                                </div>
                                <p class="tm-figcaption">Quisque velit</p>
                            </a>
                        </figure>
                        <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                            <a href="preview.html">
                                <div class="tm-gallery-item-overlay">
                                    <img src="img/image-06.jpg" alt="Image" class="img-fluid tm-img-center">
                                </div>
                                <p class="tm-figcaption">Suspendisse suscipit</p>
                            </a>
                        </figure>
                        <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                            <a href="preview.html">
                                <div class="tm-gallery-item-overlay">
                                    <img src="img/image-07.jpg" alt="Image" class="img-fluid tm-img-center">
                                </div>
                                <p class="tm-figcaption">Facilisis justo</p>
                            </a>
                        </figure>
                        <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                            <a href="preview.html">
                                <div class="tm-gallery-item-overlay">
                                    <img src="img/image-08.jpg" alt="Image" class="img-fluid tm-img-center">
                                </div>
                                <p class="tm-figcaption">Vivamus facilisis</p>
                            </a>
                        </figure>
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

</html>