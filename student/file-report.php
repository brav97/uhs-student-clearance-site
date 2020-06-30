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
        <a href="generate-report.php" class="list-group-item list-group-item-action bg-light">Generate Report</a>
        <a href="logout.php" class="list-group-item list-group-item-action bg-light">Logout</a> 
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><?php echo $names; ?></button>

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

      <div class="container-fluid jumbotron">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-xs-1 col-sm-1"></div>
            <div class="col-lg-8 col-md-8 col-xs-10 col-sm-10" style="padding: 50px 30px;background-color: white;">
              <form method="post" action="" autocomplete="off">
                <center><h3><b><i>SEND MESSAGE</i></b></h3></center><hr><br>
                <?php 
                  if(isset($_POST['send-report'])){
                    include '../db/db-connection.php';
                    $title = mysqli_real_escape_string($conn, $_POST['title']);
                    $description = mysqli_real_escape_string($conn, $_POST['description']);
                    if(empty($title) || empty($description)){
                      echo "<script>alert('provide both details');</script>";
                    }
                  }
                 ?>
                  <div class="form-group">
                    <label><b>Title</b></label>
                    <input type="text" name="title" class="form-control form-control-lg">
                  </div>
                  <div class="form-group">
                    <label><b>Description</b></label>
                    <textarea name="description" rows="6" class="form-control form-control-lg"></textarea>
                  </div>
                  <center><input type="submit" name="send-report" class="btn btn-lg btn-danger" value="SEND REPORT"></center>
              </form>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-1 col-sm-1"></div>
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
