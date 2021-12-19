<?php
    $login = false;
    $showError = false;
    // If method is post then if block will execute
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // Including database connect file so database can be connected.
        include 'partials/_dbconnect.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        // SQL Query to be executed for checking login credentials.
        $sql = "Select * from `login_credentials` where username='$username' AND password='$password'";

            $result = mysqli_query($conn, $sql);    //execute query function
            $num = mysqli_num_rows($result);        // fetching that username and password exist or not
            if ($num == 1) {
                while($row = mysqli_fetch_assoc($result)){
                // if(password_verify($password, $row['password'])){
                    if($row['status'] == "verified"){
                        $login = true;
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $username;
                        header("location: /SGP/user/account_welcome.php");
                    }
                    else{
                        echo "Please verify Email";
                        header("location: /SGP/otp/email_otp.php");
                    }
                }
            }
            else {
                $showError = true;
            }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login as Consumer</title>

    <!-- CSS Files linking Section -->
    <link rel="stylesheet" href="/SGP/css/Log.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <!-- PHP Script for checking login access if done print message or else show error -->
    <?php
        if($login){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success !</strong>You are logged in.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
        if($showError){
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Oops !</strong>Please Check your credentials and try again...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> ';
        }
    ?>

    <!-- Form Container -->
    <div class="center">
        <h1>Login as Customer</h1>

        <!-- Form for login starts here -->
        <form action="/SGP/Login.php" method="POST">
            <div class="txt_field">
                <input type="text" required name="username" placeholder="Enter Username">
                <span></span>
            </div>
            <div class="txt_field">
                <input type="password" required name="password" placeholder="Password">
                <span></span>
            </div>

            <!-- Forgot password section -->
            <div class="restpass"><a href="forgotpass.php">Forgot Password?</a></div>
            <input type="submit" value="Login">

            <!-- Manager login link here -->
            <div class="signup_link">
                Are you a Manager ?<a href="/SGP/manager/managerlogin.php" translate="50%">Login as Manager</a>
            </div>

            <!-- Crate account link section -->
            <div class="signup_link">
                Don't have Account? <a href="/SGP/signup1.php" translate="50%">Create Account</a><br><span>Start Your
                    Banking Journey With Us.</span><br>
            </div>
            
            <!-- home link -->
            <div class="returnHome">
                Back to - <a href="/SGP/home.php" translate="50%" id="home">Home</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
