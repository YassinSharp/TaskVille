<?php
    $host_name = "localhost";
    $db_user = "root";
    $password = "";
    $db_name = "9raya24_db";
    $connection = mysqli_connect($host_name, $db_user, $password, $db_name, 4306);
    
    if(mysqli_connect_errno()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
    
    echo "Successfully connected to the database!";
?>
