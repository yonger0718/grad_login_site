<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'admin');
define('DB_NAME', 'iot_test');

// database connection
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_query($connection, 'set names utf8');

if($connection === false){
    die("ERROR: Cannot connect to mysql. ".mysqli_connect_error());
}
else{
    return $connection; //return as an object
}
?>