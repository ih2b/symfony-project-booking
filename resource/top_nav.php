<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	 <!-- Bootstrap core CSS -->
    <link href="../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../public/css/shop-homepage.css" rel="stylesheet">
      <div class="container">
        <a class="navbar-brand" href="../public/index.php">MARIAGE FACILE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../public/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
              <li class="nav-item">
                  <a class="nav-link" href="../public/contact.php">Contact</a>
              </li>
              <?php
              if (isset($_SESSION['user_id'])) :?>
              <li class="nav-item">
                  <a class="nav-link" href="../public/checkout.php">Checkout</a>
              </li>
                  <li class="nav-item">
                      <a class="nav-link" href="../public/profil.php">Profile</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="../public/login.php?id=0">Logout</a>
              </li>
              <?php else :?>
              <li class="nav-item">
                  <a class="nav-link" href="../public/login.php">Login</a>
              </li>
                  <li class="nav-item">
                      <a class="nav-link" href="../public/registerform.php">Register</a>
                  </li>
                <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- iheb: delete this after login and add the log out in navbar  -->
    <?php if (!isset($_SESSION['user_id'])) :?>
    <div class="jumbotron my-4 container">
     <h4 class="display-5">ORGANISER VOTRE MARIAGE EN LIGNE !</h4>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        
        
        <a href="../public/login.php" class="btn btn-primary btn-lg">Login </a>
        <a href="../public/registerform.php" class="btn btn-primary btn-lg">Register </a>
    
            </div>
        <?php endif; ?>
      