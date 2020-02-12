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
    
  <?php include( "../resource/searchbar.php");?>
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
