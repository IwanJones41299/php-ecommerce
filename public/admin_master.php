<?php require_once("../resources/config.php"); ?>

<?php
include(TEMPLATE_FRONTEND . DS . "head.php");
?>

<body>

    <?php
    include(TEMPLATE_FRONTEND . DS . "nav.php");
    ?>

    <!-- Page Content -->
<div class="container">
    <h1>Admin Area</h1>

    <table class="table table-striped">
        <thead>
          <tr>
            <th>Product id</th>
           <th>Product</th>
           <th>Cateogry id</th></th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Description</th>
           <th>Short Description</th>
           <th>Image</th>
          </tr>
        </thead>
        <tbody>
        <?php if($edit_state == false){
            ?><a class="btn btn-success" href="create.php"><span>New</span></a><?php
        } ?>
        <?php if($edit_state == false){
            ?><a class="btn btn-success" name="update"><span>Update</span></a><?php
        } ?>
            <?php admin_products(); ?>
        </tbody>
    </table>

    <form class="form-inline" action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="product_title">Product Title :</label>
        <input type="text" class="form-control m-2" id="product_title" name="product_title" value="<?php echo $productTitle; ?>"><br><br>
        <label for="product_cateogry_id">Product Cateogry :</label>
        <input type="text" class="form-control m-2" id="product_cateogry_id" name="product_cateogry_id" value="<?php echo $productCategory; ?>"><br><br>
        <label for="product_price">Product Price :</label>
        <input type="text" class="form-control m-2" id="product_price" name="product_price" value="<?php echo $productPrice; ?>"><br><br>
        <label for="product_quantity">Product Quantity :</label>
        <input type="text" class="form-control m-2" id="product_quantity" name="product_quantity" value="<?php echo $productQuantity; ?>"><br><br>
        <label for="product_description">Product Description :</label>
        <input type="text" class="form-control m-2" id="product_description" name="product_description"><br><br>
        <label for="short_desc">Short Description :</label>
        <input type="text" class="form-control m-2" id="short_desc" name="short_desc"><br><br>
        <label for="product_image">Image :</label>
        <input type="text" class="form-control m-2" id="product_image" name="product_image"><br><br>
        <input type="submit" name="submit" class="btn btn-primary">
    </form>
</div><!--Main Content-->


    <hr>

    <?php
        include(TEMPLATE_FRONTEND . DS . "footer.php");
    ?>
    
</body>
</html>