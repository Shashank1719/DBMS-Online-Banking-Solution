<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SGP/css/change_pass.css">
    <title>Change Password</title>
</head>

<body>

    <!-- PHP Script for UPDATING Password in DATABASE -->
    <?php
        include 'C:\xampp\htdocs\SGP\partials\_dbconnect.php';
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['submit'])){
                $currentPass = $_POST['cpassword'];
                $newPass = $_POST['password'];
                $confirmPass = $_POST['newcpassword'];
                $spin = $_POST['spin'];
                
                // Session variable Error not solved.
                $sql = "SELECT * FROM `login_credential` WHERE `username` = '" . $_SESSION['username'] . "'";

                
                $result = mysqli_query($conn, $sql);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        if($row['password'] == $currentPass && $row['spin'] == $spin){
                            if($newPass == $confirmPass){
                                $sql = 'UPDATE `login_credentials` SET `password`= "' . $newPass . '" WHERE `username` = "'. $row["username"] . '"';
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                    echo 'Password Changed.';
                                    header("location: account_welcome.php");    
                                }
                                else{
                                    echo 'Password could not changed';
                                }
                            }
                            else{
                                echo 'Enter Same Passwords.';
                            }
                        }
                        else{
                            echo 'Enter Correct Current Passwords.';
                        }
                    }
                }
                else{
                    echo 'Account Could not found.';
                }
            }
        }
    ?>



    <div class="center">
        <h1>Change Password</h1>
        <form action="/SGP/user/change_pass.php" method="POST">
            <div class="txt_field">
                <input type="password" required name="cpassword">
                <span></span>
                <label>Your Current Password</label>
            </div>
            <div class="txt_field">
                <input type="password" required name="password">
                <span></span>
                <label>New Password</label>
            </div>
            <div class="txt_field">
                <input type="password" required name="newcpassword">
                <span></span>
                <label>Confirm New Password</label>
            </div>
            <div class="txt_field">
                <input type="password" required name="spin">
                <span></span>
                <label>Security Pin</label>
            </div>
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
</body>

</html>
