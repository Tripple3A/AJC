<?php
// Check if the constant is not defined before defining it
if (!defined('DB_SERVER')) {
    define('DB_SERVER', '127.0.0.1');
}

if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', 'root');
}

if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '');
}

if (!defined('DB_NAME')) {
    define('DB_NAME', 'ajms');
}

// Establish database connection
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>