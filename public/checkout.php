<?php require_once("../resources/config.php"); ?>
<?php require_once("cart.php"); ?>

<?php
include(TEMPLATE_FRONTEND . DS . "head.php");
?>


<body>

    <?php
    include(TEMPLATE_FRONTEND . DS . "nav.php");
    ?>

<!-- Page Content -->
<div class="container">

<!-- /.row --> 

<div class="row">

      <h1>Checkout</h1>
      <h3 class="text-center bg-danger"><?php display_message(); ?></h3>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="iwanjones_bus@gmail.com">
  <input type="hidden" name="currency_code" value="GBP">
  <input type="hidden" name="upload" value="1">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
            <?php cart(); ?>
        </tbody>
    </table>
    <?php echo display_paypal() ?>
</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount"><?php echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity']="0";  ?></span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">&pound;<?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total']="0";  ?></span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


           <hr>

    <?php
        include(TEMPLATE_FRONTEND . DS . "footer.php");
    ?>

</body>

</html>
