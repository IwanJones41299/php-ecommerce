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

        <!-- Jumbotron Header -->
        <header>
            <h1>All Products</h1>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <?php get_shop_products(); ?>

        </div>
        <!-- /.row -->
        
        <?php
            include(TEMPLATE_FRONTEND . DS . "footer.php");
        ?>

</body>

</html>
