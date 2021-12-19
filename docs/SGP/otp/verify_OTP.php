<!-- PHP Script for verifying otp -->
<?php
    include 'C:\xampp\htdocs\SGP\partials\_dbconnect.php';
    if(isset($_POST['verifyotp'])) {
        $votp = $_POST['checkotp'];
        if($_COOKIE['otp'] == $votp) {

            $to = $_COOKIE['email'];
            $subject = "Email Verification Confirmation";
            $message = "Your Email Id " . $to . " has been Verified Succesfully.";
            $header = "From: care.bank.mail@gmail.com ";

            // Change sql query to update only status of email id's verification.




            $sql = "UPDATE `login_credentials` SET `status`='verified'";
            // $sql = "UPDATE `login_credentials` SET `status`='verified' WHERE `email` = '$to'";
            $result = mysqli_query($conn, $sql);



            
            if($result){                    
                if(mail($to, $subject, $message, $header)){
                    header("location: /SGP/Login.php");
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success !</strong>Your Account has been Verified successfully. You can login from here.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                } 
                else {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Sorry !</strong>Your Account has verified, but our mail server is down.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
            else{
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Oops !</strong>Your account could not verified.<br>Enter Correct OTP.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Verify OTP</title>
    <!-- CSS Style sheet link section -->
    <link rel="stylesheet" href="/SGP/css/otp_page.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
    .center {
        padding-bottom: 50px;
        padding-top: 20px;
    }
    }
    </style>
</head>

<body>
    <!-- Form container starts here -->
    <div class="center">
        <h1>Email OTP Verification Page</h1>
        <!-- Form starts here -->
        <form action="/SGP/otp/verify_OTP.php" method="POST">
            <div class="number_field">
                <input type="number" minlength="6" maxlength="5" required name="checkotp" placeholder="Enter Your OTP sent to Your Email Address">
            </div>
            <input type="submit" value="Verify OTP" name="verifyotp">
            <!-- <button type="submit" value="Verify OTP" name="verifyotp"> Verify OTP</button> -->
        </form>
    </div>
</body>

</html>
