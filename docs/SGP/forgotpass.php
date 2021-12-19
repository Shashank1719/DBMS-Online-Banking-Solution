<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Linking -->
    <link rel="stylesheet" href="/SGP/css/forgotpass.css">
    <title>Forgot_Password</title>
</head>

<body>
    <!-- Form for forgotten Password -->
    <div class="center">
        <h1>Forgot Password</h1>
        <form action="login.php" method="POST">
            <div class="txt_field">
                <input type="text" required name="password">
                <span></span>
                <label>New Password</label>
            </div>
            <div class="txt_field">
                <input type="password" required name="repassword">
                <span></span>
                <label>Confirm New Password</label>
            </div>
            <div class="txt_field">
                <input type="password" required name="otp">
                <span></span>
                <label>Enter OTP</label>
            </div>
            <input type="submit" value="Submit">
            <div class="signup_link">
                Not a member? <a href="signup1.php" translate="50%">Signup</a><br><a href="home.php" translate="50%">Home</a>
            </div>
        </form>
    </div>
</body>

</html>
