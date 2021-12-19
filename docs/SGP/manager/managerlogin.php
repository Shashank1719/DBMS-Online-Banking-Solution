<?php
$login = false;
$showError = false;
    // require 'SGP/partials/_dbconnect.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require 'C:\xampp\htdocs\SGP\partials\_dbconnect.php';
        $country = $_POST['country'];
        $state = $_POST['state'];
        $district = $_POST['district'];
        $username = $_POST['manageruname'];
        $password = $_POST['password'];

        // SQL Query to check credentials.
        
        $sql = "SELECT * FROM `manager_login` WHERE `country`='$country'AND `state`='$state' AND `district`='$district'AND  `manager_username`='$username'AND `manager_password`='$password'";
        $result = mysqli_query($conn, $sql);
        echo var_dump($result);
        $numRows = mysqli_num_rows($result);
        if($numRows == 1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = "true";
            $_SESSION['district'] = $district;
            $_SESSION['uname'] = $username;
            header("location: /SGP/manager/manager_datatable.php?district=" . $district . "");
        }
        else{
            $showError = true;
        }

    }

    // Login ALert
    if($login){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged in
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
    }

    // Invalid Creadentials ALert
    if($showError){
        echo "<div class='alert alert-danger' role='alert'>
        <button type='button' class='btn-close' id='x' data-bs-dismiss='alert' aria-label='Close'></button>
        Could not logged you in !<br>Please check your Credentials.
        </div>";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login as Manager</title>
    
    <!-- CSS Linking Section -->
    <link rel="stylesheet" href="/SGP/css/managerlogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- Java Script for choosing Country first then state then district -->
    <script>
    var stateObject = {
        "India": {
            "Delhi": ["new Delhi", "Old Delhi"],
            "Kerala": ["Thiruvananthapuram", "Palakkad"],
            "Goa": ["North Goa", "South Goa"],
            "Gujarat": ["Ahemdabad", "Vadodara", "Kheda", "Anand", "Rajkot"],
            "Rajasthan": ["Chittorgadh", "Bhilwada", "Rajsamand", "Udaipur"],
            "Maharashtra": ["Goregao", "East Mumbai", "Pune", "Bandra"],
        },
        "Australia": {
            "South Australia": ["Dunstan", "Mitchell"],
            "Victoria": ["Altona", "Euroa"]
        },
        "Canada": {
            "Alberta": ["Acadia", "Bighorn"],
            "Columbia": ["Washington", ""]
        },
    }
    window.onload = function() {
        var countySel = document.getElementById("countySel"),
            stateSel = document.getElementById("stateSel"),
            districtSel = document.getElementById("districtSel");
        for (var country in stateObject) {
            countySel.options[countySel.options.length] = new Option(country, country);
        }
        countySel.onchange = function() {
            stateSel.length = 1; // remove all options bar first
            districtSel.length = 1; // remove all options bar first
            if (this.selectedIndex < 1) return; // done
            for (var state in stateObject[this.value]) {
                stateSel.options[stateSel.options.length] = new Option(state, state);
            }
        }
        countySel.onchange(); // reset in case page is reloaded
        stateSel.onchange = function() {
            districtSel.length = 1; // remove all options bar first
            if (this.selectedIndex < 1) return; // done
            var district = stateObject[countySel.value][this.value];
            for (var i = 0; i < district.length; i++) {
                districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
            }
        }
    }
    </script>
</head>

<body>

    <!-- Login Form -->
    <div class="center">
        <h1 style="color:black">Manager Login</h1>
        <form action="/SGP/manager/managerlogin.php" method="POST">
            <div class="txt_field">
                Select Country: <select name="country" id="countySel" size="1"
                    style="padding: 5px 90px; border: 3px solid black;border-radius: 10px;">
                    <option value="" selected="selected">Select Country</option>
                </select><br>
            </div>
            <div class="txt_field">
                Select State: <select name="state" id="stateSel" required size="1"
                    style="padding: 5px 57px; border: 3px solid black;border-radius: 10px;">
                    <option value="" selected="selected">Please select Country first</option>
                </select>
                <br>
                <br>
            </div>
            <div class="txt_field">
                Select District: <select name="district" id="districtSel" size="1" required
                    style="padding: 5px 65px; border: 3px solid black;border-radius: 10px;">
                    <option value="" selected="selected">Please select State first</option>
                </select><br>
            </div>
            <div class="txt_field">
                <input type="text" required name="manageruname" style="color: black">
                <span></span>
                <label>User name</label>
            </div>
            <div class="txt_field">
                <input type="password" required name="password" style="color: black">
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass "><a href="#">Forgot Password?</a></div>
            <input type="submit" value="Login">
            <div class="signup_link">
               <a href="/SGP/home.php" translate="50%">Home</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
  
</body>

</html>
