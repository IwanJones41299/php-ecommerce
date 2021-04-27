<?php

//helper functions

//message function
function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    }else{
        $msg = "";
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

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


/*********************FRONTEND FUNCTIONS *************************/



// get products
function get_products() {
$query = query("SELECT * FROM products");
confirm($query);
while($row = fetch_array($query)){

$product = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}"> <img src={$row['product_image']} alt="produc image"></a>
        <div class="caption">
            <h4 class="pull-right">&pound{$row['product_price']}</h4>
            <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
            <a class="btn btn-primary" target="_blank" href="cart.php?add={$row['product_id']}">Add to Cart</a>
        </div>
    </div>
</div>
DELIMETER;

echo $product;
    }
}

function get_categories(){

$query = query("SELECT * FROM categories");
confirm($query);

while($row = fetch_array($query)){
$category_links = <<<DELIMETER

    <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>

DELIMETER;

echo $category_links;

    }
}

function get_cat_products() {
    $query = query("SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . "");
    confirm($query);
    while($row = fetch_array($query)){
    
$productbycategory = <<<DELIMETER
    
    <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="{$row['product_image']}" alt="">
            <div class="caption">
                <h3>{$row['product_title']}</h3>
                <p>{$row['short_desc']}</p>
                <p>
                <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                </p>
            </div>
        </div>
    </div>
DELIMETER;
    
    echo $productbycategory;
    }
}


function get_shop_products() {
    $query = query("SELECT * FROM products");
    confirm($query);
    while($row = fetch_array($query)){
    
$productbycategory = <<<DELIMETER
    
    <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="{$row['product_image']}" alt="">
            <div class="caption">
                <h3>{$row['product_title']}</h3>
                <p>{$row['short_desc']}</p>
                <p>
                <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                </p>
            </div>
        </div>
    </div>
DELIMETER;
    
    echo $productbycategory;
    }
}

function login_user(){
    if(isset($_POST['submit'])){
        $username = escape_string($_POST["username"]);
        $password = escape_string($_POST["password"]);

        $query = query("SELECT * FROM users WHERE username ='{$username}' AND password = '{$password}'");
        confirm($query);

        if(mysqli_num_rows($query) ==0){
            set_message("Your username or password was incorrect");
            redirect("login.php");
        }else{
            set_message("Welcome to admin {$username}");
            redirect("admin");
        }
    }
}

function send_message(){//look into creating a ticket system.
    if(isset($_POST['submit'])){
        $to = "iwanjones41299@gmail.com";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $headers = "From: {$name} {$email}";
        $result = mail($to, $message, $subject, $headers);

        if(!$result){
            set_message("Message not sent");
        }else{
            set_message("Message sent");
        }
    }
}

function admin_products(){
    $query = query("SELECT * FROM products");
    confirm($query);
    while($row = fetch_array($query)){
$all_products = <<<DELIMETER
<tr>
    <td>{$row['product_id']}</td>
    <td>{$row['product_title']}</td>
    <td>{$row['product_category_id']}</td>
    <td>&pound{$row['product_price']}</td>
    <td>{$row['product_quantity']}</td>
    <td>{$row['product_description']}</td>
    <td>{$row['short_desc']}</td>
    <td>{$row['product_image']}</td>
    <td>
        <a class="btn btn-warning" href="edit_product.php&id={$row['product_id']}"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="btn btn-danger" href="{$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a>
    </td>
</tr>
DELIMETER;

echo $all_products;
    }
}

function create_product(){
    if(isset($_POST['submit'])){
        $productTitle = escape_string($_POST["product_title"]);
        $productCategory = escape_string($_POST["product_cateogry_id"]);
        $productPrice = escape_string($_POST["product_price"]);
        $productQuantity = escape_string($_POST["product_quantity"]);
        $productDescription = escape_string($_POST["product_description"]);
        $shortDesc = escape_string($_POST["short_desc"]);
        $productImage = escape_string($_POST["product_image"]);

        $query = query("INSERT INTO `products` (product_title, product_category_id, product_price, product_quantity, product_description, short_desc, product_image) VALUES ('{$productTitle}', '{$productCategory}', '{$productPrice}', '{$productQuantity}', '{$productDescription}', '{$shortDesc}', '{$productImage}')");
        confirm($query);
    }
}

function edit_product(){
    $edit_state = 0;
    $id = 0;

    if(isset($_POST['update'])){
        $id = escape_string($_POST['id']);
        $productTitle = escape_string($_POST["product_title"]);
        $productCategory = escape_string($_POST["product_cateogry_id"]);
        $productPrice = escape_string($_POST["product_price"]);
        $productQuantity = escape_string($_POST["product_quantity"]);
        $productDescription = escape_string($_POST["product_description"]);
        $shortDesc = escape_string($_POST["short_desc"]);
        $productImage = escape_string($_POST["product_image"]);
    }
}




/*********************BACKEND FUNCTIONS *************************/