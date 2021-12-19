<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Welcome !</title>
</head>

<body>
    <!-- <?php session_start();?> -->
    <nav class="navbar navbar-expand-lg navbar-red bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/SGP/user/account_details.php"><?php echo $_SESSION['username']; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/SGP/user/account_welcome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Check Your Credit Score(FREE)</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Request Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Block Check</a></li>
                            <li><a class="dropdown-item" href="#">Block Your Card</a></li>
                            <li><a class="dropdown-item" href="#">Request Debit Card</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Anything else ? Click here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Notifications</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <!-- LogOut Pop up -->
                <?php
                    include '_logoutHandler.php';
                    echo '<button class="btn btn-outline-secondary mx-2" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Settings</button>
                    <button class="btn btn-outline-danger mx-2" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Log Out</button>';
                ?>
            </div>
        </div>
    </nav>

    <!-- Settings sliding off canvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Settings / More Options</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul>
                <li><a class="dropdown-item my-2" href="/SGP/user/change_pass.php">Change Password</a></li>
                <li><a class="dropdown-item my-2" href="/SGP/user/change_pin.php">Change Security Pin</a></li>
                <li><a class="dropdown-item my-2" href="#">Request Services</a></li>
                <li><a class="dropdown-item my-2" href="#">Digital Loan</a></li>
                <li><a class="dropdown-item my-2" href="#">Stop Cheque/Block Card</a></li>
                <li><a class="dropdown-item my-2" href="#">Recharge Anything</a></li>
                <li><a class="dropdown-item my-2" href="#">Invite & earn</a></li>
            </ul>
        </div>
    </div>


   
    <?php
        if(isset($_POST['yes'])){
            session_destroy();
            // header("location: /SGP/home.php");
        }

        if(isset($_POST['no'])){
            header("location: /SGP/user/account_welcome.php");
        }

    ?> 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>
