<?php

include_once('DB.php');

if (!empty($_POST['car_name'])) {
    
    $car_name = $_POST['car_name'];
    $query = "INSERT INTO cars(name) VALUES('$car_name')";
    $add_car_query = mysqli_query($connection, $query);

    if (!$add_car_query) {
        die('Query Faield ' . mysqli_error($connection));
    }

    echo $car_name ." Added";


} else {
    echo"Empty";
}