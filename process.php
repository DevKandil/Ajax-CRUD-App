<?php

include_once('DB.php');

if (isset($_POST['id'])) {
    
    $id = mysqli_real_escape_string($connection, $_POST['id']);

    $query = "SELECT * FROM cars WHERE id ={$id}";
    $cars_info_query = mysqli_query($connection, $query);


    if (!$cars_info_query) {
        die('Query Faield ' . mysqli_error($connection));
    } else {
        while ($row = mysqli_fetch_array($cars_info_query)) {
            
            echo "<h3>Opetions</h3> <br>";
            echo "<input type='text' rel='".$row['id']."' class='form-control name-input' value='".$row['name']."'><br>";
            echo "<button type='button' class='btn btn-outline-primary btn-sm update'>Update</button>";
            echo "<button type='button' class='btn btn-outline-danger btn-sm delete'>Delete</button>";
            echo "<button type='button' class='btn btn-outline-Secondary btn-sm close'>x</button>";
            echo "<h6 id='feedback' class='bg-light'></h6>";
            

        }
    }
}


if (isset($_POST['updateCar'])) {

    $id     = mysqli_real_escape_string($connection, $_POST['id']);
    $name   = mysqli_real_escape_string($connection, $_POST['name']);

    $updatequery = "UPDATE cars SET name = '".$name."' WHERE id = {$id}";

    $update_car_name = mysqli_query($connection, $updatequery);

    if (!$update_car_name) {
        die('Query Faield ' . mysqli_error($connection));
    }

}


if (isset($_POST['deleteCar'])) {

    $id    = mysqli_real_escape_string($connection, $_POST['id']);

    $daletequery = "DELETE FROM cars WHERE id = {$id}";

    $delete_car = mysqli_query($connection, $daletequery);

    if (!$delete_car) {
        die('Query Faield ' . mysqli_error($connection));
    }

}

?>

<script>

$(document).ready(function () {

    var id;
    var name;
    var updateCar = "update";
    var deleteCar = "delete";

    $('.name-input').on('input', function (){

        id = $(this).attr('rel');
        name = $(this).val();

    });

    /************** Update Button Function ****************/

    $('.update').on('click', function (){

        $.post("process.php", {id: id , name: name, updateCar: updateCar}, function (data) {
            $("#feedback").html("Car Name Updated Successfuly");
            
        });
    });

    /************** Delete Button Function ****************/

    $('.delete').on('click', function (){

        if (confirm("Are You Sure You Wont To Delete This Car ?")) {
            
            id = $(".name-input").attr('rel');
            
            $.post("process.php", {id: id, deleteCar: deleteCar}, function (data) {
                $("#action-container").hide();
                
            });
        }
    });

    /************** Delete Button Function ****************/

    $('.close').on('click', function (){

        $("#action-container").hide();

    });


});

</script>