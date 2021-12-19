<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Request</title>

    <!-- Data table css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>

    <!-- PHP Script for adding navbar of manager -->
    <?php
      include 'C:\xampp\htdocs\SGP\partials\_navmanager.php';
      
    ?>

    <!-- Table  header Content -->
    <div class="note-container my-3">
        <table class="table" id="myTable">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Name</th>
            <th scope="col">Country</th>
            <th scope="col">State</th>
            <th scope="col">District</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
      
        <!-- PHP Script for Displaying Data From Database -->
        <?php 
        require 'C:\xampp\htdocs\SGP\partials\_dbconnect.php';
        
        // Checking whether user logged in or not, if not then pass him to the login page.
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
            header("location: /SGP/manager/managerlogin.php");
            echo "Please Login First";
            exit;
        }
        // $sql = "SELECT * FROM `account_request`";
        // $result = mysqli_query($conn, $sql);
        // $sno = 0;
        // while($row = mysqli_fetch_assoc($result)){
          
        // Getting district from url using get method
        $district = $_GET['district'];
        $_SESSION['district'] = $district;

        // SQL Query for displaying only that perticular district account opening requests only.
        $sql = "SELECT * FROM `account_request` WHERE `district`='$district'";
        $result = mysqli_query($conn, $sql);
        $sno = 0;

        // Fetching Data from database and displaying it
        while($row = mysqli_fetch_assoc($result)){
          $sno = $sno + 1;
          echo "<tr>
          <th scope='row'>". $sno . "</th>
          <td>". $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . "</td>
          <td>". $row['country'] . "</td>
          <td>". $row['state'] . "</td>
          <td>". $row['district'] . "</td>
          <td> <button class='btn btn-sm btn-outline-dark my-2' id=".$row['sno']."><a href='account_request.php?sno= ". $row['sno'] ." '>View Full Profile</a></button> </td>
        </tr>";
        } 
        ?>
            </div>
          </tbody>
        </table>
      </div>


  <!-- JavaScript for datatable and bootstrap content -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
  crossorigin="anonymous"></script>

  <!-- Data Table Script -->
  <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script>
    // Calling Datatable
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>
</body>

</html>
