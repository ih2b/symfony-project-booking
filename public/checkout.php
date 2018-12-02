<?php require_once("../resource/config.php"); ?>
<?php include("../resource/head.php") ?>

<body>

<?php
    include ("../resource/top_nav.php");
?>

<h4 class="text-center bg-danger"><?php display_message(); ?></h4>
    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">

      <h1>Checkout</h1>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="edwindiaz123-facilitator@gmail.com">
<input type="hidden" name="currency_code" value="US">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
     
          </tr>
        </thead>
        <tbody>
          <?php cart(); ?>
        </tbody>
    </table>
  <?php echo show_paypal(); ?>
</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount"><?php 
echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";?></span></td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">DT. <?php
echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";?>



</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


    </div>
    <!-- /.container -->



<?php include("../resource/footer.php") ?>
