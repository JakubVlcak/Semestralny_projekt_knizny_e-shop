<?php
include_once 'parts/html_header.php';
?>

<body>
  <div class="container">
    <?php
    include_once 'parts/navigation.php';
    ?>
    <div class="text-center h-50 d-inline-block d-flex justify-content-center mt-9">
      <form class="form-signin" action="register.php" method="post">
      <h1 class="tm-site-name">Shelf</h1>
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="name" class="sr-only">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">© 2023</p>
      </form>
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