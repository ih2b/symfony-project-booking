<?php require_once("../resource/config.php");?>
<!DOCTYPE html>
<html lang="en">

  <?php include("../resource/head.php");?>

  <body>

     

    <!-- Navigation -->
   <?php include( "../resource/top_nav.php");?>

    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3">A Warm Welcome!</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
      </header>

      <!-- Page Features -->
      <div class="row text-center">

     <?php  get_product_in_cat_page() ?>
       

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include( "../resource/footer.php");?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
