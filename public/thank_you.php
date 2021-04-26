<?php require_once("../resources/config.php"); ?>
<?php require_once("cart.php"); ?>

<?php
include(TEMPLATE_FRONTEND . DS . "head.php");
?>

<?php

if(isset($_GET['tx'])){
    $amount = $_GET['amt'];
    $currency = $_GET['cc'];
    $transaction = $_GET['tx'];
    $status = $_GET['st'];

    $query = query("INSERT INTO `orders` (order_amount, order_transaction, order_currency, order_status) VALUES ('{$amount}', '{$currency}', '{$transaction}', '{$status}')");
    confirm($query);
    session_destroy();

}else{
    redirect("index.php");
}

?>


<body>

    <?php
    include(TEMPLATE_FRONTEND . DS . "nav.php");
    ?>

    <!-- Page Content -->
    <div class="container">
        <h1>Thank you for your order</h1>
    </div>

    <?php
    include(TEMPLATE_FRONTEND . DS . "footer.php");
    ?>

</body>

</html>