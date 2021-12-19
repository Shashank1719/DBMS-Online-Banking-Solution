<!-- PHP Script for storing data into database for pending request -->
<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require 'partials/_dbconnect.php';
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $birthplace = $_POST['birthplace'];
        $nationality = $_POST['nationality'];
        $coccupation = $_POST['coccupation'];
        $mobilenumber = $_POST['mobilenumber'];
        $email = $_POST['email'];
        $fatherfname = $_POST['fatherfname'];
        $fathermname = $_POST['fathermname'];
        $fatherlname = $_POST['fatherlname'];
        $foccupation = $_POST['foccupation'];
        $motherfname = $_POST['motherfname'];
        $mothermname = $_POST['mothermname'];
        $motherlname = $_POST['motherlname'];
        $moccupation = $_POST['moccupation'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $district = $_POST['district'];
        $pincode = $_POST['pincode'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $photo = $_FILES['photofile'];
        $aadharno = $_POST['aadharno'];
        $aadharfile = $_FILES['aadharfile'];
        $panno = $_POST['panno'];
        $panfile = $_FILES['panfile'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $spin = $_POST['spin'];

        // SQL Query to check whether user exist or not? If exist then send him on home page and show notification
        $exitSql = "SELECT * FROM `account_request` WHERE `username`='$username'";
        $result = mysqli_query($conn, $exitSql);
        $numRows = mysqli_num_rows($result);
        if($numRows > 0){
            header("location : /SGP/home.php?error=userexist");
        }
        else{
            // Checking both password entered are correct or not?
            if($password == $cpassword && isset($_POST['submit'])){

                // Extension array for uploading file
                $extension = array('png', 'jpg', 'jpeg');

                // For user profile photo
                $profilepic_name = $photo['name'];
                $profilepic_error = $photo['error'];
                $profilepic_tmp = $photo['tmp_name'];
                $profilepic_ext = explode('.', $profilepic_name);
                $profilepic_check = strtolower(end($profilepic_ext));
                
                // For user Aadharcard photo
                $aadhar_name = $aadharfile['name'];
                $aadhar_error = $aadharfile['error'];
                $aadhar_tmp = $aadharfile['tmp_name'];
                $aadhar_ext = explode('.', $aadhar_name);
                $aadhar_check = strtolower(end($aadhar_ext));

                // For user Pancard photo
                $pan_name = $panfile['name'];
                $pan_error = $panfile['error'];
                $pan_tmp = $panfile['tmp_name'];
                $pan_ext = explode('.', $pan_name);
                $pan_check = strtolower(end($pan_ext));

                // Validating uploaded documents extensions
                if(in_array($profilepic_check, $extension)){            

                $profileimage = 'img_videos/'. $profilepic_name;
                $aadharimage = 'img_videos/'. $aadhar_name;
                $panimage = 'img_videos/'. $pan_name;

                // Password encryption code
                $hash = password_hash($password, PASSWORD_DEFAULT);

                // SQL Query to be executed for adding data in database with their values.
                $sql = "INSERT INTO `account_request`(`fname`, `mname`, `lname`, `dob`, `place_of_birth`, `nationality`, `customer_occupation`, `mobile_number`, `email`, `father_fname`, `father_mname`, `father_lname`, `father_occupation`, `mother_fname`, `mother_mname`, `mother_lname`, `mother_occupation`, `addressline_1`, `addressline_2`, `city`, `district`, `pincode`, `state`, `country`, `photo`, `aadhar_no`, `aadhar_img`, `pan_no`, `pan_img`, `username`, `password`, `spin`) VALUES ('$fname', '$mname', '$lname', '$dob', '$birthplace', '$nationality', '$coccupation', '$mobilenumber', '$email', '$fatherfname', '$fathermname', '$fatherlname', '$foccupation', '$motherfname', '$mothermname', '$motherlname', '$moccupation', '$address1', '$address2', '$city', '$district', '$pincode', '$state', '$country', '$profileimage', '$aadharno', '$aadharimage', '$panno', '$panimage', '$username', '$hash', '$spin')";
                
                $result = mysqli_query($conn, $sql);

                // Condition for checking that Query executed or not
                if($result){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Congratulations !</strong> Your account request has been successfulyy sent to our manager, it will check your details and reach out to you soon !
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    header("location: /SGP/home.php?error=true");
                }
                else{
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oops !</strong> It seems like your passwords does not match. check it.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    // header("location: /SGP/home.php?error=wrong");
                }
            }
            }
            else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops !</strong> It seems like you lost your network connectivity, or we are unable to serve you right now. <br>Please come back after some time.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                header("location: /SGP/home.php?error=false");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <title>Enter Your Details</title>
</head>

<body>
    <h2 class="mainheading">Create Your Account</h2>

    <div class="container-fluid">

    <form action="Signup.php" method="POST" enctype="multipart/form-data" class="form-card">

            <div class="subheading">
                <h2>Personal Information</h2>
                <hr>
            </div>

            <div class="input-group">
                <!--User's name-->
                <label class="namelabel">Name :</label>
                <input class="fname" type="text" name="fname" placeholder="First Name" required>
                <input class="mname" type="text" name="mname" placeholder="Middle Name" required>
                <input class="lname" type="text" name="lname" placeholder="Last Name" required>
            </div>

            <div class="input-group">
                <label>Date of Birth :</label>
                <input type="date" name="dob" required>
            </div>
            <div class="input-group">
                <label>Place of Birth :</label>
                <input type="text" placeholder="Enter City / Village Name" name="birthplace" required>
            </div>

            <div class="input-group">
                <label>Nationality :</label>
                <input type="text" placeholder="Indian, Canadian,..." name="nationality" required>
            </div>

            <div class="input-group">
                <label>Occupation :</label>
                <input type="text" placeholder="Businessman, Serviceman, etc." name="coccupation" required>
            </div>

            <div class="input-group">
                <h2>Contact Details</h2>
                <hr>
            </div>

            <div class="input-group">
                <label>Mobile No. :</label>
                <input type="tel" placeholder="9876543210" maxlength="10" minlength="10" name="mobilenumber" required>
                <!-- <input type="tel" required> -->
            </div>

            <div class="input-group">
                <label>E-mail ID :</label>
                <input type="email" placeholder="jacksparrow007@gmail.com" name="email" required>
            </div>

            <!--Father's name-->
            <div>
                <h2>Parent's Information</h2>
                <hr>
            </div>

            <div class="input-group">
                <label class="namelabel">Father's Name :</label>
                <input class="fname" type="text" placeholder="First Name" name="fatherfname" required>
                <input class="mname" type="text" placeholder="Middle Name" name="fathermname" required>
                <input class="lname" type="text" placeholder="Last Name" name="fatherlname" required>
            </div>

            <div class="input-group">
                <label>Occupation :</label>
                <input type="text" placeholder="Businessman, Serviceman, etc." name="foccupation" required>
            </div>

            <!--Mother's name-->
            <div class="input-group">
                <label class="namelabel">Mother's Name :</label>
                <input class="fname" type="text" placeholder="First Name" name="motherfname" required>
                <input class="mname" type="text" placeholder="Middle Name" name="mothermname" required>
                <input class="lname" type="text" placeholder="Last Name" name="motherlname" required>
            </div>

            <div class="input-group">
                <label>Occupation :</label>
                <input type="text" placeholder="Businessman, Serviceman, etc." name="moccupation" required>
            </div>

            <!--Current Address-->
            <div>
                <h2>Current Address</h2>
            </div>
            <hr>
            <div class="input-group">
                <label>Address :</label>
                <input type="text" placeholder="Street Address Line 1" name="address1" required>
                <input type="text" placeholder="Street Address Line 2" name="address2" required>
            </div>

            <div class="input-group">
                <label>City :</label>
                <input type="text" placeholder="Enter City Name" name="city" required>
            </div>

            <div class="input-group">
                <label>District :</label>
                <input type="text" placeholder="Enter District Name" name="district" required>
            </div>

            <div class="input-group">
                <label>Pin Code</label>
                <input type="text" placeholder="Enter Pincode" name="pincode" required>
            </div>

            <div class="input-group">
                <label>State :</label>
                <input type="text" placeholder="Enter State Name" name="state" required>
            </div>

            <div class="input-group">
                <label>Country :</label>
                <input type="text" placeholder="Enter Country Name" name="country" required>
            </div>

            <!-- Passport sized Photo Details -->
            <div>
                <h2>Passport Size Photo</h2>
                <hr>
            </div>

            <div class="input-group">

                <label for="upload">Please upload your latest passport size photograph.</label>
                <input class="browse button" type="file" id="aadharupload" required name="photofile">

            </div>

            <!-- Aadhaar Card Details -->
            <div class="input-group">
                <h2>Aadhaar Card Details</h2>
                <hr>
            </div>
            <div class="input-group">
                <label>Aadhaar Card No. :</label>
                <input type="text" name="aadharno" required placeholder="0000 0000 0000 0000" minlength="12"
                    maxlength="12">
            </div>
            <div class="input-group">
                <label for="upload">Attach File :</label>
                <input type="file" id="aadharupload" required name="aadharfile">

            </div>

            <!-- PAN Card Details -->
            <div>
                <h2>PAN Card Details</h2>
                <hr>
            </div>
            <div class="input-group">
                <label>PAN No. :</label>
                <input type="text" name="panno" required placeholder="ABCTY1234D">
            </div>
            <div class="input-group">
                <label for="upload">Attach File :</label>
                <input type="file" id="panupload" name="panfile" required>

            </div>

            <div>
                <h2>Profile Details</h2>
                <hr>
            </div>

            <div class="input-group">
                <label>Username :</label>
                <input type="text" name="username" placeholder="jacksparrow007" required>
            </div>

            <div class="input-group">
                <label>Create Password :</label>
                <input type="password" name="password"
                    placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" minlength="8" maxlength="8"
                    required>
            </div>

            <div class="input-group">
                <label>Confirm Password :</label>
                <input type="password" name="cpassword"
                    placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" minlength="8" maxlength="8"
                    required>
            </div>

            <div class="input-group">
                <label>Security Pin :</label>
                <input type="tel" maxlength="4" name="spin" placeholder="&#9679;&#9679;&#9679;&#9679;" minlength="4"
                    maxlength="4" required>
            </div>

        <!-- Submit request section -->
        <input type="submit" value="Send Request" name="submit">
        
    </form>

    <!-- JavaScript Section -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
