<?php require_once("../../resource/config.php");?>
<!DOCTYPE html>
<html lang="en">

<?php include("resource/head.php");?>
<body>
<div id="wrapper">

    <?php include ("resource/nav_bar.php"); ?>

    <div id="page-wrapper">

        <div class="container-fluid">

    <h1 class="page-header text-info">
   All Products

</h1>

<h3 class="bg-success"><?php display_message(); ?></h3>
<table class="table table-hover">
    <thead>
      <tr class="text-primary">
           <th scope="col">Id</th>
           <th scope="col">Titre</th>
           <th scope="col">Categorie</th>
           <th scope="col">Prix</th>
           <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
      <?php get_products_in_admin(); ?>
  </tbody>
</table>
        </div>
    </div>
</div>
    <?php include( "resource/footer.php");?>

</body>

</html>
</html>



