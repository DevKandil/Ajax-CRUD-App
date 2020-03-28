<?php
// PDO
// $dsn = 'mysql:host=localhost;dbname=cars';
// $user = 'root';
// $pass = 'root';
// $option = array(
//     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
// );

// try {
//     $con = new PDO($dsn, $user, $pass, $option);
//     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
// }

// catch(PDOException $e) {
//     echo 'Failed To Connect ' . $e->getMessage();
// }


// MySqli

$connection = mysqli_connect('localhost', 'root', 'root', 'cars');