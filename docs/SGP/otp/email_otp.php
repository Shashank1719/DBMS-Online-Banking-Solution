<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Get OTP</title>

    <!-- CSS Links -->
    <link rel="stylesheet" href="/SGP/css/otp_page.css">
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <!-- PHP Script for mail sending and otp generating, storing in database -->
    <?php
        $emailSent = false;
            include 'C:\xampp\htdocs\SGP\partials\_dbconnect.php';
            if(isset($_POST['getotp'])) {  

                // Generating otp using function of php.
                $otp = mt_rand(10000, 99999);
                $to = $_POST['emailotp'];

                // Sql query to check whether email exist or not...
                // $sql = ""

                $subject = "Email Verification OTP";
                $message = "Your Email OTP Verification code is : ". $otp . "\nDo not share to anyone.\nvalid for 10 minutes only.";
                $header = "From: care.bank.mail@gmail.com ";

                if(mail($to, $subject, $message, $header)){
                    $emailSent = true;
                }
                else{
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Oops !</strong>Soory for interuption.. Our mail server has down.<br>Please Try after some time.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            }

        if($emailSent){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success !</strong>OTP has beensent. Check YOu mail.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    setcookie('otp', $otp, time()+600, "/");
                    setcookie('email', $to, time()+600, "/");
                    header("location: verify_OTP.php");
        }

    ?>
    <!-- form container starts here -->
    <div class="center">
        
        <h1>Email OTP Verification Page</h1>
        <!-- form starts here -->
        <form action="/SGP/otp/email_otp.php" method="POST">
            <div class="number_field">
                <input type="email" required name="emailotp" placeholder="Enter Your Email Address">
            </div>
            <input type="submit" value="Get OTP" name="getotp">
            <div class="signup_link">
                Didn't Get OTP? <a href="email_otp.php" type="submit">Send Again</a><br>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
