<?php require_once("../resource/config.php");?>
<!DOCTYPE html>
<html lang="en">

 <?php include("../resource/head.php");?>

  <body>
    <?php include("../resource/head.php");?>

    <!-- Navigation -->
   <?php include( "../resource/top_nav.php");?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

         <?php include( "../resource/categorie.php");?>
        <!-- /.col-lg-3 -->
<?php 
$query =query("SELECT * FROM produit WHERE produit_id=". escape_string($_GET['id'])." ");
    confirm($query);
    while ($data = fetch_array($query)):
      ?>
        <div class="col-lg-9">

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
            <div class="card-body">
              <h3 class="card-title"><?php echo $data['produit_titre']?></h3>
              <h4><?php echo $data['produit_prix']?> Dinar </h4>
              <p class="card-text"><?php echo $data['produit_desc']?></p>
              <a class="btn btn-primary" target="_blank" href="cart.php?id= <?php echo $data['produit_id'] ?>">RESERVE</a>
              <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
            </div>
          </div>
          <!-- /.card -->

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Product Reviews
            </div>
            <div class="card-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <a href="#" class="btn btn-success">Leave a Review</a>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->
<?php endwhile; ?>
      </div>

    </div>
    <!-- /.container -->

<?php include( "../resource/footer.php");?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
