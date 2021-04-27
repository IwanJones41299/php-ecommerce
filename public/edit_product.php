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
<?php create_product(); ?>
    <h1>Admin Area -- Edit</h1>
    <form class="form-inline" action="" method="POST">
        <label for="product_title">Product Title :</label>
        <input type="text" class="form-control m-2" id="product_title" name="product_title"><br><br>
        <label for="product_cateogry_id">Product Cateogry :</label>
        <input type="text" class="form-control m-2" id="product_cateogry_id" name="product_cateogry_id"><br><br>
        <label for="product_price">Product Price :</label>
        <input type="text" class="form-control m-2" id="product_price" name="product_price"><br><br>
        <label for="product_quantity">Product Quantity :</label>
        <input type="text" class="form-control m-2" id="product_quantity" name="product_quantity"><br><br>
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