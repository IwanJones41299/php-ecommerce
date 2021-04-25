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
            <a class="btn btn-primary" target="_blank" href="item.php?id={$row['product_id']}">Add to Cart</a>
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

        $headers = "From : {$name} {$email}";
        $result = mail($to, $message, $subject, $headers);

        if(!$result){
            set_message("Message not sent");
        }else{
            set_message("Message sent");
        }
    }
}




/*********************BACKEND FUNCTIONS *************************/