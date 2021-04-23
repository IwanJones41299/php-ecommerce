<?php

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

?>