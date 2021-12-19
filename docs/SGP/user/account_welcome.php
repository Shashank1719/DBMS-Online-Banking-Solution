<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: /SGP/home.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="/SGP/css/aw.css">
    <title><?php echo "Welcome ! ". $_SESSION['username'];?></title>
</head>

<body>

    <?php 
        include 'C:\xampp\htdocs\SGP\partials\_navuser.php';
    
    ?>
    
    <div class="profile-header-container">
        <div class="profile-header-img">
            <img class="img-circle" src="img-avatar.png" alt="Profile Pic" />
        </div>
    </div>

    <div>
        <div><a class="menu-element" href="transfermoney.php">TRANSFER MONEY</a></div>
        <div><a class="menu-element" href="transaction_history.php">TRANSACTION HISTORY</a></div>
        <div><a class="menu-element" href="#">PASSBOOK</a></div>
        <div><a class="menu-element" href="#">ACCOUNT DETAILS</a></div>
        <div><a class="menu-element" href="#">CONTACT BRANCH MANAGER</a></div>
        
    </div>

    <footer>
        <div class="text_footer">
            Copyright &copy; 2021 CARE BANK. All rights reserved.
        </div>
    </footer>

</body>

</html>
