<?php
session_start();
if(!isset($_SESSION['student']))
{
  header('Location: ../login/');
}else{
  include '../db/db-connection.php';
  $student_email = $_SESSION['student'];
  $check = "SELECT * FROM `cleared_students` WHERE `student_email` = '$student_email'";
  $query = mysqli_query($conn, $check);
  $rows = mysqli_num_rows($query);
  if($rows >= 1){
    while($data = mysqli_fetch_assoc($query)){
      $names = $data['fullnames'];
      $adm = $data['admnumber'];
      $email = $data['student_email'];
      $gender = $data['gender'];
      $phone = $data['phone'];
      $date_cleared = $data['date_completed'];
      $receipt_number = $data['receipt_number'];
      
    }
    global $names, $adm, $email, $gender, $phone;
  }else{
    echo "<script>alert('YOUR CLEARANCE IS YET TO BE APPROVED');</script>";
    echo "<script>window.location.replace('maths.php');</script>";

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
        <button id="print-receipt" class="btn btn-danger btn-danger-lg">DOWNLOAD RECEIPT</button>
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
        <div class="row">
              <div class="col-1"></div>
              <div class="col-10">
                  <div class="print-section">
                    <br><br><br>
                    <center><h3><b><i>UPPERHILL SCHOOL</i></b></h3></center><hr><br>
                        <div class="row" style="background-color: white;padding: 50px 20px;">
                            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4">
                              <small><span style="color: red;">Receipt number</span></small><br><br><br>
                              <h2><b><?php echo $receipt_number; ?></b></h2>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4"></div>
                            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4">
                                <p><b><i>STUDENT NAMES</i></b><span style="float: right;"><?php echo $names; ?></span></p>
                                <p><b><i>ADMISSION NUMBER</i></b><span style="float: right;"><?php echo $adm; ?></span></p>
                                <p><b><i>GENDER</i></b><span style="float: right;"><?php echo $gender; ?></span></p>
                                <p><b><i>EMAIL ADDRESS</i></b><span style="float: right;"><?php echo $email; ?></span></p>
                                <p><b><i>PHONE NUMBER</i></b><span style="float: right;"><?php echo $phone; ?></span></p>
                                <p><b><i>DATE CLEARED</i></b><span style="float: right;"><?php echo $date_cleared; ?></span></p> 

                            </div>
                        </div><hr>
                        <div class="table-responsive">
                            <table class="table table-stripped table-bordered">
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
                                      <td class="text-center"><i>CLEARED</i></td>

                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>Languages</td>
                                      <td class="text-center"><i>CLEARED</i></td>
                                    </tr><tr>
                                      <td>3</td>
                                      <td>Sciences</td>
                                      <td class="text-center"><i>CLEARED</i></td>
                                    </tr><tr>
                                      <td>4</td>
                                      <td>Humanities</td>
                                      <td class="text-center"><i>CLEARED</i></td>
                                    </tr>
                                    <tr>
                                      <td>5</td>
                                      <td>Finance</td>
                                      <td class="text-center"><i>CLEARED</i></td>
                                    </tr>
                                    <tr>
                                      <td>6</td>
                                      <td>Sports</td>
                                      <td class="text-center"><i>CLEARED</i></td>
                                    </tr>
                                    <tr>
                                      <td>7</td>
                                      <td>Library</td>
                                      <td class="text-center"><i>CLEARED</i></td>
                                    </tr>
                                    <tr>
                                      <td>8</td>
                                      <td>Others</td>
                                      <td class="text-center"><i>CLEARED</i></td>
                                    </tr>
                                  </tbody>
                            </table>
                          
                        </div><br><br>
                        <center><h2><b><i>ALL THE BEST IN YOUR ENDAVOURS</i></b></h2></center>
                  </div>
              </div>
              <div class="col-1"></div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="printThis.js"></script>

  <!-- demo -->
  <script>
    $('#print-receipt').on("click", function () {
      $('.print-section').printThis({
         debug: false,                
        importCSS: true,             
        importStyle: false,          
        printContainer: true,        
        loadCSS: "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css",                 
        pageTitle: "UPPERHILL SCHOOL",               
        removeInline: false,         
        removeInlineSelector: "*",   
        printDelay: 333,             
        header: null,                
        footer: null,                
        base: false,                 
        formValues: true,            
        canvas: false,               
        doctypeString: '<!DOCTYPE html>',  
        removeScripts: false,        
        copyTagClasses: false,       
        beforePrintEvent: null,      
        beforePrint: null,           
        afterPrint: null  
      });
    }); 
    
  </script>
  <!-- Bootstrap core JavaScript --> 
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
