<?php
    $host_name = "localhost";
    $host_name = "root";
    $password = "";
    $db_name = "taskville_gig";
    $connection = mysqli_connect($host_name, $db_user, $password, $db_name);
    if(!$connection){
        die("ERROR CONNECTING TO THE DATABASE");
    }
?>