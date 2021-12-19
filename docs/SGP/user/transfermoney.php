<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: /SGP/home.php");
    echo "Please Login First";
    exit;
}
?>

<?php
    // If method is post then if block will execute
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // Including database connect file so database can be connected.
        include 'C:\xampp\htdocs\SGP\partials\_dbconnect.php';
        $receiver = $_POST['account_no'];
        $sender = $_POST['sender'];
        $amount = $_POST['amount'];
        $secpin = $_POST['secpin'];

        // Error
        // $mysql = "SELECT * FROM `login_credentials` WHERE `username`= " . $_SESSION['username'] . "";
        // $res = mysqli_query($conn, $mysql);
        // $number = mysqli_num_rows($res);
        // if($number == 1){
        //     while($rows = mysqli_fetch_assoc($res)){
        //         $acNum = $rows['account_number'];
        //     }
        // }

        // sql query for receiver
        $sql = "SELECT * FROM `login_credentials` WHERE `account_number`=$receiver";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        // sql query for sender
        $sql1 = "SELECT * FROM `login_credentials` WHERE `account_number`=$sender";
        $result1 = mysqli_query($conn, $sql1);
        $num1 = mysqli_num_rows($result1);

        if($num == 1 && $num1 == 1){

            // Fetching data of sender
            while($row1 = mysqli_fetch_assoc($result1)){

                // Fetching data of receiver
                while($row = mysqli_fetch_assoc($result)){
                    $previous_sender_amount = $row1['amount'];

                    // Checking that sender has enuff amount
                    if($previous_sender_amount >= $amount){
                        if($secpin == $row1['spin']){
                            $previous_sender_amount -= $amount;
                            $previous_amount = $row['amount'];
                            $previous_amount += $amount;

                            // Sql query for updating data in sender's database.
                            $sql1 = "UPDATE `login_credentials` SET `amount`='$previous_sender_amount' WHERE `account_number`=$sender";
                            $result1 = mysqli_query($conn, $sql1);

                            // Sql query for updating amount in receiver database
                            $sql = "UPDATE `login_credentials` SET `amount`='$previous_amount' WHERE `account_number`=$receiver";
                            $result = mysqli_query($conn, $sql);

                            // SQL Query for inserting data into transaction history.
                            $tsql = "INSERT INTO `transaction_history`(`username1`, `username`, `amount`, `date`) VALUES ('".$row['username']."','".$row1['username']."','$amount','date(". "l jS \of F Y h:i:s A".")')";
                            $tres = mysqli_query($conn, $tsql);
                        }
                        else{
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Please Check Your Pin !</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        }
                    }
                    else{
                        
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oops !!!</strong>You Don\'t have suffiecient Balance.\nFund can not be tranfer...
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        header("location: /SGP/user/account_welcome.php");
                    }

                    // Checking that amount has been transfered or not.
                    if($result && $result1 && $tres){
                        $receiver_email = $row['email'];
                        $sender_email = $row1['email'];
                        $subject = "Tranfer Money Email";

                        $message_sender = "Your account has been debited " . $amount . " to Account Number " . $receiver . ".\n Your current Balance is : ". $previous_sender_amount;

                        $message_receiver = "Your account has been credited " . $amount . " from Account Number " . $sender . ".\n Your current Balance is : ". $previous_amount;
                        // . $otp . "\nDo not share to anyone.\nvalid for 10 minutes only.";
                        $header = "From: care.bank.mail@gmail.com ";

                        if(mail($receiver_email, $subject, $message_receiver, $header)){
                            if (mail($sender_email, $subject, $message_sender, $header)) {
                                echo '<div class="alert alert-Success alert-dismissible fade    show" role="alert">
                                    <strong>Congratulations !!!</strong>Money has been Transfered Successfully...
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                // header("location: /SGP/user/account_welcome.php");
                            }
                        }
                            else{
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Apologies !!!</strong>Your fund has been transfered successfully !\n But we are not able to send you mail due to server issues...
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                // header("location: /SGP/user/account_welcome.php");
                            }
                    }
                    else{
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Ohh !!!</strong>Your Money has been Transfered, but mail could not be sent.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        // header("location: /SGP/user/account_welcome.php");
                    }
                    
                }
            }
        }
    }

?>

<!-- PHP Script for fetching user details -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SGP/css/transfermoney.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    
    <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
    <title>Transfer Money</title>
</head>
<html>  

<body>
    <div class="container-fluid">
        <h2 class="heading text-center">Transfer Money</h2>
        <form class="form-card" action="/SGP/user/transfermoney.php" method="POST">

            <div class="input-group">
                <label>Your Account Number</label>
                <input type="text" name="sender" placeholder="0000 0000 0000 0000">
                <!-- <?php echo $acNum; ?> -->
            </div>

            <div class="input-group">
                <label>Receiver's Account Number</label>
                <input type="tel" name="account_no" placeholder="0000 0000 0000 0000" minlength="12" maxlength="12">
            </div>

            <div class="input-group">
                <label>Receiver's IFSC Code</label>
                <input type="text" name="ifsc-code" placeholder="ABCD0000000" minlength="6" maxlength="11">             
            </div>

            <div class="input-group">
                <label>Amount</label>
                <input type="number" name="amount" placeholder="1000/-">
            </div>

            <div class="input-group">
                <label>Your Security pin</label>
                <input type="tel" name="secpin" placeholder="1234" maxlength="4" minlength="4">
            </div>

            <input type="submit" value="Pay Now" class="btn btn-pay placeicon">
            <button><a href="account_welcome.php">Home...</a></button>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>
