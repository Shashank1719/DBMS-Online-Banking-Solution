<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Linking Section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/contact_us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Contact Us - Get Solution of your Problems</title>
</head>

<body>
    <!-- PHP Script for storing contact request in database -->
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['submitQuery'])){
                include 'C:\xampp\htdocs\SGP\partials\_dbconnect.php';
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $query = $_POST['query'];

                // SQL Queries for data Insertion.
                $sql = "INSERT INTO `query_form`(`query_fname`, `query_lname`, `query_email`, `query_phone`, `query`) VALUES ('$fname','$lname','$email','$phone','$query')";
                $result = mysqli_query($conn, $sql);

                // Success Alert
                if($result){
                    echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                                Your Query has been sended Successfully...
                            </div>
                        </div>';
                }
                // Failure Alert
                else{
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Ohh Sorry !!!</strong> Your Query could not posted, please try after some time. Apologies for interuption.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            }
            if(isset($_POST['home'])){
                header("location: /SGP/home.php");
            }
        }

    ?>
    <!-- Contact Form Section -->
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="contact-form">
                    <h5>Contact Us</h5>
                    <h3>Get in Touch</h3>
                    <form action="contact_us.php" method="POST">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="single-form">
                                    <input type="text" name="fname" placeholder="Your First Name">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="single-form">
                                    <input type="text" name="lname" placeholder="Your Last name">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="single-form">
                                    <input type="email" name="email" placeholder="Your Email Address">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="single-form">
                                    <input type="text" name="phone" placeholder="Your Phone Number">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="single-form">
                                    <textarea name="query" placeholder="Enter Your Query"></textarea>
                                </div>
                            </div>

                            <div class="col-md-20">
                                <div class="single-form">
                                    <button type="submit" name="submitQuery" class="main-btn">Submit</button>
                                    <button class="main-btn" name="home" ><a href="/SGP/home.php" style="text-decoration: none;color: black;"> Home</a> </button>
                                </div>
                            </div>
                           
                    </form>
                    </div>
                </div>
            </div>

            <!-- Google Map API -->
            <div class="col-lg-5">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29382.75771871012!2d72.58687003091534!3d22.992737037948068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e85c2e335ed6b%3A0xd19a77c6688f5c9b!2sManinagar%2C%20Ahmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1632295671685!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

                <!-- Contact Details -->
                <div class="contact-address">
                    <ul>
                        <li>
                            <div class="cont">
                                <p>Lorem ipsum dolor sit amet cons</p>
                            </div>
                        </li>

                        <li>
                            <div class="cont">
                                <p>Contact No. &nbsp;&nbsp;&nbsp;&nbsp;: <a href="tel:+91 12345 67890">Call Us</a></p>
                            </div>
                        </li>

                        <li>
                            <div class="cont">
                                <p>Email address : <a href="mailto:abcd@gmail.com">Mail us your Query.</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- <div>
        <?php include 'partials\_footer1.php';?>
    </div> -->

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>
