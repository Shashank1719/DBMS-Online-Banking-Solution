<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Account Opening Request</title>

</head>

<body>

    <!-- PHP Script for geting perticular account details -->
    <?php
        require 'C:\xampp\htdocs\SGP\partials\_dbconnect.php';
        $uid = $_GET['sno'];
        $sql = "SELECT * FROM `account_request` WHERE `sno` = $uid";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $name = $row['fname'] . " " . $row['mname'] . " " . $row['lname'];
            $dob = $row['dob'];
            $birth_place = $row['place_of_birth'];
            $nationality = $row['nationality'];
            $occupation = $row['customer_occupation'];
            $mobile = $row['mobile_number'];
            $email = $row['email'];
            $father_name = $row['father_fname'] . " " . $row['father_mname'] . " " . $row['father_lname'];
            $foccupation = $row['father_occupation'];
            $mother_name = $row['mother_fname'] . " " . $row['mother_mname'] . " " . $row['mother_lname'];
            $moccupation = $row['mother_occupation'];
            $address = $row['addressline_1'] . " " . $row['addressline_2'];
            $city = $row['city'];
            $district = $row['district'];
            $state = $row['state'];
            $country = $row['country'];
            $photo = $row['photo'];
            $aadhar_no = $row['aadhar_no'];
            $aadhar_img = $row['aadhar_img'];
            $pan_no = $row['pan_no'];
            $pan_img = $row['pan_img'];
            $username = $row['username'];
            $password = $row['password'];
            $spin = $row['spin'];

        }
    ?>

    <!-- PHP Script for including navbar -->
    <?php
      include 'C:\xampp\htdocs\SGP\partials\_navmanager.php';
      
    ?>
    <h2 class="text-center my-3">Account Opening Request</h2>
    <h3>Personal Information</h3>

    <!-- Form for showing details -->

    <!-- <form action="account_request.php?sno=<?php echo $uid; ?>" method="POST" enctype="multipart/form-data"> -->
    <!-- <form action="account_request.php" method="POST"> -->
    <fieldset disabled>
        <div class="mb-3 my-2">
            <label for="disabledTextInput" class="form-label mx-2">Full Name</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2" placeholder="<?php echo $name; ?>">

            <label for="disabledTextInput" class="form-label mx-2">
                Date of Birth
            </label>
            <input type="text" id="disabledTextInput" class="form-control mx-2" placeholder="<?php echo $dob; ?>">

            <label for="disabledTextInput" class="form-label mx-2">Place of Birth</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2"
                placeholder="<?php echo $birth_place; ?>">

            <label for="disabledTextInput" class="form-label mx-2">Nationality</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2"
                placeholder="<?php echo $nationality; ?>">

            <label for="disabledTextInput" class="form-label mx-2">User Occupation</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2"
                placeholder="<?php echo $occupation; ?>">

            <label for="disabledTextInput" class="form-label mx-2">Mobile Number</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2" placeholder="<?php echo $mobile; ?>">

            <label for="disabledTextInput" class="form-label mx-2">Email</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2" placeholder="<?php echo $email; ?>">

            <!-- Family Information -->
            <h3 class="mb-3 my-2">Family Info</h3>

            <label for="disabledTextInput" class="form-label mx-2">Father name</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2"
                placeholder="<?php echo $father_name; ?>">

            <label for="disabledTextInput" class="form-label mx-2">Father Occupation</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2"
                placeholder="<?php echo $foccupation; ?>">

            <label for="disabledTextInput" class="form-label mx-2">Mother name</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2"
                placeholder="<?php echo $mother_name; ?>">

            <label for="disabledTextInput" class="form-label mx-2">Mother Occupation</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2"
                placeholder="<?php echo $moccupation; ?>">

            <!-- Address Info -->
            <h3 class="mb-3 my-2">Address</h3>

            <label for="disabledTextInput" class="form-label mx-2">Residential Address</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2" placeholder="<?php echo $address; ?>">

            <label for="disabledTextInput" class="form-label mx-2">City</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2" placeholder="<?php echo $city; ?>">

            <label for="disabledTextInput" class="form-label mx-2">District</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2" placeholder="<?php echo $district; ?>">

            <label for="disabledTextInput" class="form-label mx-2">State</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2" placeholder="<?php echo $state; ?>">

            <label for="disabledTextInput" class="form-label mx-2">Country</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2" placeholder="<?php echo $country; ?>">

            <!-- Documents -->
            <h3 class="mb-3 my-2">Uploaded Documents</h3>

            <label for="disabledTextInput" class="form-label mx-2">User Image</label>
            <!-- <input type="text" id="disabledTextInput" class="form-control mx-2" placeholder="<?php echo $photo; ?>"> -->
            <?php echo '<img src="data:image;base64, ' . base64_encode($photo) . '" alt="Could not load Image">';?>

            <label for="disabledTextInput" class="form-label mx-2">Aadharcard Details</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2" placeholder="<?php echo $aadhar_no; ?>">

            <label for="disabledTextInput" class="form-label mx-2">Pancard Details</label>
            <input type="text" id="disabledTextInput" class="form-control mx-2" placeholder="<?php echo $pan_no; ?>">

        </div>

    </fieldset>

    <!-- Buttons for account approval or rejection -->

    <?php
            
            echo '<button type="button" name="approve" class="btn btn-success my-2 mx-2" data-toggle="modal" data-target="#approvemodal">Approve</button>
            <button type="button" name="reject" class="btn btn-danger my-2 mx-2" data-toggle="modal" data-target="#rejectmodal">Reject</button>';
        ?>

    <!-- Approve Modal -->
    <!-- <form action="/SGP/manager/manager_datatable.php?district=<?php echo $district; ?>" method="post"> -->
    <form action="/SGP/manager/account_request.php?sno=<?php echo $uid; ?>" method="post">
        <div class="modal" tabindex="-1" id="approvemodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Approve Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="number" class="form-control my-4" name="account_number" id="account_number"
                            maxlength="12" placeholder="Enter Account Number">
                        <input type="number" class="form-control my-4" name="opening_amount"
                            placeholder="Enter Account Opening Amount">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Let it
                            pending</button>
                        <button type="submit" name="accept" class="btn btn-success">Approve Account</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Reject Modal -->
    <!-- <form action="/SGP/manager/manager_datatable.php?district=<?php echo $district; ?>" method="POST"> -->
    <form action="/SGP/manager/account_request.php?sno=<?php echo $uid; ?>" method="POST">
        <div class="modal" tabindex="-1" id="rejectmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Reject Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Do You Wants to Reject this Account Opening Request?</h4>
                        <small>Please Enter Reason for Rejecting Request</small>
                        <input type="text" name="reason" id="reject_reason" class="form-control my-2">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Let it be
                            Pending</button>
                        <button type="submit" name="reject_request" class="btn btn-danger">Reject</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php

        // PHP Script for Approve Request
        if(isset($_POST['accept'])){
            $accountNumber = $_POST['account_number'];
            $opening_amount = $_POST['opening_amount'];
            $sql = "INSERT INTO `login_credentials`(`username`, `password`, `email`, `spin`, `account_number`, `Amount`) VALUES ('$username','$password','$email','$spin','$accountNumber','$opening_amount')";
            $newResult = mysqli_query($conn, $sql);
            if($newResult){
                $sql = "DELETE FROM `account_request` WHERE `sno`=$uid";
                $newResult = mysqli_query($conn, $sql);
                if($newResult){
                    echo 'Success!!';
                    $to = "svsvinod19@gmail.com";
                    $subject = "Account Approval Confirmation !!!";
                    $message = "Your Account Request has been Confirmed by our Manager.\nVisit your nearest branch for further communication or visit CARE Bank";
                    $header = "From: care.bank.mail@gmail.com ";

                    if(mail($to, $subject, $message, $header)){
                        header("location: manager_datatable.php?district=" . $district . "");
                    }
                    else{
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Oops !</strong>Mail servers are down....
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                }
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Failed !</strong>Failed to approve account..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }

        // PHP Script for delete Request
        if(isset($_POST['reject_request'])){
            $sql = "DELETE FROM `account_request` WHERE `sno`=$uid";
            $newResult = mysqli_query($conn, $sql);
            if($newResult){
                echo 'Success!!';
            }
            else{
                echo 'Failed !!';
            }
        }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
    </script>

</body>

</html>
