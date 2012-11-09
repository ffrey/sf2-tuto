<?php
error_reporting(E_ALL); ini_set("display_errors", 1);

// load and initialize any global libraries
require_once 'model.php';
// require_once 'controllers.php';

// route the request internally
$uri = $_SERVER['PHP_SELF'];
// var_dump($_SERVER);
if ('/index.php' == $uri) {
    require 'list.php';
} elseif ('/index.php/show' == $uri && isset($_GET['id']) ) {
    require 'show.php';
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}