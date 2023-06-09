<header class="tm-site-header">
    <h1 class="tm-site-name">Shelf</h1>
    <p class="tm-site-description">Your Online Bookstore</p>

    <nav class="navbar navbar-expand-md tm-main-nav-container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tmMainNav" aria-controls="tmMainNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse tm-main-nav" id="tmMainNav">
            <ul class="nav nav-fill tm-main-nav-ul">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="catalogs.php">Catalogs</a></li>
                <?php
                if (isset($_SESSION["authenticated"])) {
                    if ($_SESSION["authenticated"] == 0) {
                        echo '<li class="nav-item"><a class="nav-link" href="log_in.php">Log In</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="sign_in.php">Sign In</a></li>';
                    }
                    if ($_SESSION["authenticated"] == 1) {
                        echo '<li class="nav-item"><a class="nav-link" href="log_out.php">Log Out</a></li>';
                    }
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="log_in.php">Log In</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="sign_in.php">Sign In</a></li>';
                }
                ?>
                <li class="nav-item"><a class="nav-link" href="cart.php">Shopping Cart &#128722</a></li>
            </ul>
        </div>
    </nav>

</header>