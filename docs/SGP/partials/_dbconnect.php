<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "bank_details_sgp_project";

    // Connecting to database
    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn) {
        die("Error" . mysqli_connect_error());
    }
?>
