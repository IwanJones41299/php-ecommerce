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
    <?php
            $query = query("SELECT * FROM categories WHERE cat_id =" . escape_string($_GET['id']) ." ");
            confirm($query);
            while($row = fetch_array($query)):

        ?>

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1><?php echo $row['cat_title']; ?></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
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

            <?php get_cat_products(); ?>

        </div>
        <!-- /.row -->
        <?php endwhile; ?>
        
        <?php
            include(TEMPLATE_FRONTEND . DS . "footer.php");
        ?>

</body>

</html>
