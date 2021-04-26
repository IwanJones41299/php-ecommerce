<?php ob_start();

session_start();

// use this for debugging purposes
// session_destroy(); 

//make root file (public) ready for cross platform
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined("TEMPLATE_FRONTEND") ? null : define("TEMPLATE_FRONTEND", __DIR__ . DS . "templates/frontend");
defined("TEMPLATE_BACKEND") ? null : define("TEMPLATE_BACKEND", __DIR__ . DS . "templates/backend");

//Database Routes
defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "root");
defined("DB_PASS") ? null : define("DB_PASS", "");
defined("DB_NAME") ? null : define("DB_NAME", "ecom_db");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

require_once("functions.php");

?>