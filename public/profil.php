
<?php
 require_once("../resource/config.php");
  if (!isset($_SESSION['user_id'])){
  	redirect("index.php");
  }
 if (isset($_SESSION['user_id'])) 
 {$query = query("SELECT * FROM users WHERE user_id={$_SESSION['user_id']} ;");
            confirm($query);
             $name = fetch_array($query);
        
}?>

<!doctype html>
<html lang="en">
  <head>


    <title>Profil</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body>
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
             
              
              <li class="nav-item">
                  <a class="nav-link" href="../public/checkout.php">Checkout</a>
              </li>
                  <li class="nav-item">
                      <a class="nav-link" href="../public/profil.php">Profile</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="../public/login.php?id=0">Logout</a>
              </li>
             
              
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">


 <form class="needs-validation" method="POST" >
 	<?php 
                        display_message(); 
                        modify_profil(); ?>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">First name</label>
      <input type="text" class="form-control" name="prenom" placeholder="First name" value="<?php     echo $name['user_name'];
?>" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please enter your first name.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Last name</label>
      <input type="text" class="form-control" name="nom" placeholder="Last name" value="<?php     echo $name['nom'];
?>" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please enter your last name.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">password</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="password" class="form-control" name="txt_upass" placeholder="" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          TO add NEW password
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">EMAIL</label>
      <input type="text" class="form-control" name="email" value="<?php     echo $name['user_email'];
?>" required>
      <div class="invalid-feedback">
        modifier email.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">NUM TEL</label>
      <input type="text" class="form-control" name="phone" value="<?php     echo $name['tel'];
?>" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
   
  </div>
   <a class="btn btn-primary" type="submit" href="../public/index.php">RETURN</a>
<input type="submit" name="submit" class="btn btn--radius-2 btn--blue"  >
   
</form>

    </div> <!-- /container -->
  </body>
  <?php include( "../resource/footer.php");?>
</html>
