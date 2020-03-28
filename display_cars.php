<?php

include_once('DB.php');

$query = "SELECT * FROM cars";
$cars_info_query = mysqli_query($connection, $query);


if (!$cars_info_query) {
    die('Query Faield ' . mysqli_error($connection));
} else {
    while ($row = mysqli_fetch_array($cars_info_query)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td> <a class='name-link' rel='".$row['id']."' href='javascript:void(0)'>{$row['name']}</a></td>";
        echo "</tr>";
    }
}

?>


<script>

$(document).ready(function () {

    // $('#action-container').hide();

    $('.name-link').on('click', function () {
        $('#action-container').show();

        var id = $(this).attr("rel")
        
        $.post("process.php", {id: id}, function (data) {
                    
            $('#action-container').html(data);

        });

    });
});

</script>