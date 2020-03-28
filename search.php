<?php

include_once 'DB.php';



$search = $_POST['search'];

if (!empty($search)) {
    $query = "SELECT * FROM cars WHERE name LIKE '$search%'";
    $search_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($search_query);

    if ($count <= 0) {
        die("This Car Dosn't Available");
    }

    if (!$search_query) {
        die('Query Faield' . mysqli_error($connection));
    }
    echo "<ul>";
    while($row = mysqli_fetch_array($search_query)) {
        $brand = $row['name'];

        
            echo "<li>". $brand ." in Stock</li>";
        
    }
    echo "</lu>";
}






//   PDO 
// if (!empty($search)) {

//     $stmt = $con->prepare("SELECT * FROM cars WHERE name LIKE '$search%'");

//     $stmt->execute();

//     $cars = $stmt->fetchAll(); 

//     foreach ($cars as $car) {
//         echo $car['name']."<br />\n";
//     }

// }
