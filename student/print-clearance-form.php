<?php
session_start();
if(!isset($_SESSION['student']))
{
  header('Location: ../login/');
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
      
    }
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
        <a href="generate-report" class="list-group-item list-group-item-action bg-light">Generate Report</a>
        <a href="logout.php" class="list-group-item list-group-item-action bg-light">Logout</a> 
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><?php echo $names; ?></button>
        <a href="maths.php" class="btn btn-danger btn-lg">Start Clearance</a>

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
          <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12" style="background-color: white;border:1px solid black;padding: 40px 20px;">
            <h4><b>MY PROFILE </b></h4><hr><br>

            <center>
              <?php 
                if($profile== ''){
                      echo" <img src='uploads/noimage.jpg' style='height:120px;width:120px;border-radius:50%' />";
                }else{

                    echo" <img src='uploads/$picture' style='height:120px;width:120px;border-radius:50%' />";
                 }
                 ?>

              </center><hr><br>
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-1"></div>
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-10">
                  <p><b>Full Names</b><span style="float: right;"><?php echo $names; ?></span></p>
                  <p><b>Date Registered</b><span style="float: right;"><?php echo $names; ?></span></p>
                  <p><b>Class</b><span style="float: right;"><?php echo $names;  ?></span></p>
                  <p><b>Subjects Taught</b><span style="float: right;"><?php echo $names;  ?></span></p>
                  <p><b>Gender</b><span style="float: right;"><?php echo $names; ?></span></p> 
                </div>
                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-1"></div>
              </div>
              
          </div>
          <div class="col-lg-3 col-md-12 col-xs-12 col-sm-12" style="background-color: white;border:1px solid black;padding: 40px 20px;">
            <h4><b>UPDATE ACCOUNT</b></h4><hr><br>
            <form method="post" action="" autocomplete="off">
              <div class="form-group">
                <label>Phone Number</label>
                <input type="number" name="phone-number"   min="0" class="form-control form-control-lg">
              </div>
              <div class="form-group">
                <label>Profile Picture</label>
                <input type="file" name="picture" class="form-control form-control-lg">
              </div>
              <button class="btn btn-block btn-danger btn-lg" type="submit" name="update-profile">UPDATE DETAILS</button>
            </form>
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
                  <td><button class="btn btn-danger btn-block">Pending</button></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Languages</td>
                 <td><button class="btn btn-warning btn-block">In Progress</button></td>
                </tr><tr>
                  <td>3</td>
                  <td>Sciences</td>
                  <td><button class="btn btn-danger btn-block">Pending</button></td>
                </tr><tr>
                  <td>4</td>
                  <td>Humanities</td>
                  <td><button class="btn btn-warning btn-block">In Progress</button></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Finance</td>
                  <td><button class="btn btn-danger btn-block">Pending</button></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Sports</td>
                  <td><button class="btn btn-success btn-block">Completed</button></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Library</td>
                  <td><button class="btn btn-warning btn-block">In Progress</button></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Others</td>
                  <td><button class="btn btn-success btn-block">Completed</button></td>
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
