<?php
session_start();
if(!isset($_SESSION['student']))
{
  header('Location: ../login/');
}

if(!isset($_SESSION['sports_dept_cleared']))
{ 
  echo "<script>window.location.replace('library.php');</script>";
}else{
  include '../db/db-connection.php';
  $student_email = $_SESSION['student'];
  $check = "SELECT * FROM `students` WHERE `student_email` = '$student_email'";
  $query = mysqli_query($conn, $check);
  $rows = mysqli_num_rows($query);
  if($rows >= 1){
    while($data = mysqli_fetch_assoc($query)){
      $names = $data['fullnames'];
      $adm = $data['adm'];
      $question = $data['security_quiz'];
      $profile = $data['student_picture'];
      $gender = $data['gender'];
      $student_email = $data['student_email'];
      $student_class = $data['student_class'];
      $phone = $data['phone'];
      
    }
    global $adm, $phone, $student_class, $names, $student_email;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

  <title>Student Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Student Dashboard </div>
      <div class="list-group list-group-flush">
        <a href="student-dashboard.php" class="list-group-item list-group-item-action bg-light">My Account</a>
        <a href="file-report.php" class="list-group-item list-group-item-action bg-light">File Report</a>
        <a href="generate-report.php" class="list-group-item list-group-item-action bg-light">Generate Report</a>
        <a href="logout.php" class="list-group-item list-group-item-action bg-light">Logout</a> 
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><?php echo $names; ?></button> 
        <form method="post" action="" autocomplete="">
          <input type="submit" name="check-maths-dept" value="PROCEED" class="btn btn-warning btn-lg">
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          
             
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Account
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="security-quiz.php">Security Question</a>
                <a class="dropdown-item" href="update-password.php"> Update Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <br><br>
        <div class="row jumbotron">
          <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12" style="background-color: white;border:1px solid black;padding: 40px 20px;">
            <h4><b>OTHER DEPARTMENT CHECKLIST</b></h4><hr><br>
            <?php
              include '../db/db-connection.php';
              global $adm;

              $select = "SELECT * FROM `borrowed_items` WHERE `adm_number` = '$adm' AND `status` = 'BORROWED' AND `department` = 'others'";
              $query = mysqli_query($conn, $select);
              $rows = mysqli_num_rows($query);
              if($rows >= 1){
                echo"
                  <div class='table-responsive'>
                    <table class='table table-bordered table-stripped'>
                      <thead>
                        <tr>
                          <th><b>Num</b></th>
                          <th><b>Date Issued</b></th>
                          <th><b>Class</b></th>
                          <th><b>Item</b></th>
                          <th><b>Serial</b></th>
                          <th><b>Description</b></th>
                          <th><b>Status</b></th>
                        </tr>
                      </thead>
                      <tbody>


                ";
                $num = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                  $class = $data['class'];
                  $id = $data['id'];
                  $stream = $data['stream'];
                  $date_borrowed = $data['date_borrowed'];
                  $serial_number = $data['serial_number'];
                  $item_title = $data['item_title'];
                  $item_description = $data['item_description'];
                  $status = $data['status'];
                  $class_issued = $class.' '.$stream;
                  echo "

                    <tr>
                      <td>$num</td>
                      <td>$date_borrowed</td>
                      <td>$class_issued</td>
                      <td>$item_title</td>
                      <td>$serial_number</td>
                      <td>$item_description</td>
                      <td><a href='clear-item.php?item=$id' class='btn btn-block btn-success'>Return </a></td>
                    </tr>
                  ";
                  $num++;
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
              }else{
                echo "<center><h4 class='text-danger'>YOU HAVE NO PENDING CLEARANCE ITEMS</h4></center>";
              }
            ?>
                        
          </div>
           
          <div class="col-lg-3 col-md-12 col-xs-12 col-sm-12" style="background-color: white;border:1px solid black;padding: 40px 20px;">
             <h4><b>CLEARANCE STATUS</b></h4><hr><br>
            <div class="table-responsive">
            <table class="table table-bordered table-stripped">
              <thead class="thead-light">
                  <tr>
                    <th><b>#</b></th>
                    <th><b>Department</b></th>
                    <th><b>Status</b></th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Mathematics</td>
                  <td><button class="btn btn-success btn-block">CLEARED</button></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Languages</td>
                  <td><button class="btn btn-success btn-block">CLEARED</button></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Sciences</td>
                  <td><button class="btn btn-success btn-block">CLEARED</button></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Humanities</td>
                  <td><button class="btn btn-success btn-block">CLEARED</button></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Finance</td>
                  <td><button class="btn btn-success btn-block">CLEARED</button></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Sports</td>
                  <td><button class="btn btn-success btn-block">CLEARED</button></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Library</td>
                  <td><button class="btn btn-success btn-block">CLEARED</button></td>
                </tr>
                 <tr>
                  <td>8</td>
                  <td>Others</td>
                  <td><button class="btn btn-warning btn-block">IN PROGRESS</button></td>
                </tr>
                 
                 
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
 <?php     

            if(isset($_POST['check-maths-dept'])){
              include '../db/db-connection.php';
              global $adm;

              $select = "SELECT * FROM `clearance_status` WHERE `adm` = '$adm'";
              $query = mysqli_query($conn, $select);
              $rows = mysqli_num_rows($query);
              if($rows >= 1){
                 
                $num = 1;
                while ($data = mysqli_fetch_assoc($query)) { 
                  $status = $data['mathematics']; 
                  if($status == "WAITING"){
                    echo "<script>alert('THIS IS THE FIRST STEP OF YOUR CLEARANCE. YOU ARE REQUIRED TO SUBMIT ALL DETAILS LISTED BELOW BEFORE PROGRESSING ');</script>";
                  }else if($status == "PROGRESS"){
                      echo "<script>alert('YOUR CLEARANCE IS IN PROGRESS.. WAITING FOR CLEARANCE FROM MATHEMATICS DEPARTMENT OR DUE TO PARTIAL RETURN OF ALL MATERIALS BORROWED ');</script>";
                  }else{
                    $select_records = "SELECT * FROM `cleared_students` WHERE `admnumber` = '$adm' AND `fullnames` = '$names'";
                    $select_query = mysqli_query($conn, $select_records);
                    $select_rows = mysqli_num_rows($select_query);
                    if($select_rows >=1){
                        echo "";
                        echo "<script>window.location.replace('generate-report.php');</script>";
                    }else{
                      $today = date('l, d/m/Y h:i:s A');
                      $receipt_number = time();
                      $insert_record = "INSERT INTO `cleared_students`(`admnumber`, `fullnames`, `gender`,`student_email`,  `phone`, `class_admitted`, `date_completed`, `receipt_number`) VALUES ('$adm', '$names', '$gender', '$student_email', '$phone', '$student_class', '$today', '$receipt_number')";
                      $check_insert = mysqli_query($conn, $insert_record);
                      if($check_insert){
                          $_SESSION['others_dept_cleared'] = 'PROCEEDTOGENERATERECEIPT';
                          echo "<script>window.location.replace('generate-report.php');</script>";
                      }
                    }
                     
                    
                  }

                } 
              }
            }
            ?>
                        

