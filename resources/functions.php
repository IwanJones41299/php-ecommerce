<?php

//helper functions
//redirect page function
function redirect($location){
    header("Location: $location");
}

function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}

//function for db connection test
function confirm($result){
    global $connection;
    if(!$result){
        die("Query Failed " . mysqli_error($connection));
    }
}

//prevent sql injection
function escape_string($string){
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

//fetching data from the db
function fetch_array($result){
    return mysqli_fetch_array($result);
}

// get products
function get_products() {
$query = query("SELECT * FROM products");
confirm($query);
while($row = fetch_array($query)){

$product = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <img src="http://placehold.it/320x150" alt="">
        <div class="caption">
            <h4 class="pull-right">£{$row['product_price']}</h4>
            <h4><a href="product.html">First Product</a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
            <a class="btn btn-primary" href="#">Buy Now</a>
        </div>
    </div>
</div>
DELIMETER;

echo $product;
    }
}