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
    global $adm;
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
        <a href="step1.php" class="btn btn-warning btn-lg">Proceed</a>

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
          <div class="col-lg-3 col-md-3 col-xs-1 col-sm-2"></div>
          <div class="col-lg-6 col-md-6 col-xs-10 col-sm-8" style="background-color: white;padding: 40px 30px;">
            <?php
              
                $item_id = $_GET['item'];
                  $select = "SELECT * FROM `borrowed_items` WHERE `adm_number` = '$adm' AND `status` = 'BORROWED'";
              $query = mysqli_query($conn, $select);
              $rows = mysqli_num_rows($query);
              if($rows >= 1){
                while($data = mysqli_fetch_assoc($query)){
                    $class = $data['class'];
                  $id = $data['id'];
                  $stream = $data['stream'];
                  $date_borrowed = $data['date_borrowed'];
                  $serial_number = $data['serial_number'];
                  $item_title = $data['item_title'];
                  $item_description = $data['item_description'];
                  $status = $data['status'];
                  $class_issued = $class.' '.$stream;
                }
              }
              
            ?>
            <br><br>
            <center>Date:<span><b><i style="color: red;"><?php echo $date_borrowed; ?></i></b></span> Class <span><b><i style="color: red;"><?php echo $class_issued; ?></i></b></span></center><hr><br>
            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th><b>No</b></th>
                  <th><b>Item</b></th>
                  <th><b>Description</b></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><b>1</b></td>
                  <td>Title</td>
                  <td><?php echo $item_title; ?></td>
                </tr>
                <tr>
                  <td><b>2</b></td>
                  <td>Serial No</td>
                  <td><?php echo $serial_number; ?></td>
                </tr>
                <tr>
                  <td><b>3</b></td>
                  <td>Description</td>
                  <td><?php echo $item_description; ?></td>
                </tr>
                <tr>
                  <td><b>5</b></td>
                  <td>Action</td>
                  <td>
                    <form method="post" action="" autocomplete="off">
                      <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                      <input type="submit" name="return-item" class="btn btn-success btn-block btn-lg" value="FILE RETURN">
                    </form>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
          <div class="col-lg-3 col-md-3 col-xs-1 col-sm-2"></div>
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
if(isset($_POST['return-item'])){
  $update = "UPDATE `borrowed_items` SET `status` = 'PROGRESS' WHERE `id` = '$id'";
  $query_update = mysqli_query($conn, $update);
  if($query_update){
      echo "<script>alert('YOUR REPORT HAS BEEN SUBMITTED.WAIT FOR YOUR DEPARTMENT TO UPDATE YOUR DETAILS IN THE SYSTEM');</script>";
      echo "<script>window.location.replace('student-dashboard.php');</script>";
  }else{
          echo "<script>alert('AN ERROR OCCURRED PLEASE TRY AGAIN LATER. THANK YOU');</script>";
          echo "<script>window.location.replace('student-dashboard.php');</script>";
  }
}