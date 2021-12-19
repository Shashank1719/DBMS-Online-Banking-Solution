<?php

    // Database connect file linking.
    require 'C:\xampp\htdocs\SGP\partials\_dbconnect.php';
    session_start();
    // If user not login then Pass him at login page.
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        header("location: managerlogin.php");
        echo "Please Login First";
        exit;
    }

    // Log out functionality code
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: /SGP/home.php");
    }

    // Navbar code
    echo '<nav class="navbar navbar-expand-lg navbar-red bg-white">
    <div class="container-fluid">
    <a class="navbar-brand" href="/SGP/manager/manager_datatable.php?district=' . $_SESSION['district'] . '">Home</a>
        <form class="d-flex mx-2 action="_navmanager.php" method="POST">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <button class="btn btn-outline-warning mx-2" name="queries" type="button"><a class="navbar-brand" href="/SGP/contact_request.php">Contact Queries</a></button>
        <button class="btn btn-outline-danger mx-2" name="logout" type="submit">Logout</button>
        
        </form>
    </div>
    </div>
    </nav>';
    

?>
