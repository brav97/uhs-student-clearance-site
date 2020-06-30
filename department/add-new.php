<?php
session_start();
if(!isset($_SESSION['department']))
{
  header('Location: ../login/');
}else{
  include '../db/db-connection.php';
  $department_email = $_SESSION['department'];
  $check = "SELECT * FROM `departments` WHERE `department` = '$department_email'";
  $query = mysqli_query($conn, $check);
  $rows = mysqli_num_rows($query);
  if($rows >= 1){
    while($data = mysqli_fetch_assoc($query)){
      $email = $data['email'];
      $department = $data['department']; 
     global $department; 
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> DEPARTMENT DASHBOARD</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $department; ?> DEPARTMENT</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="department-dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
 
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Select</h6>
            <a class="collapse-item" href="all-students.php">All Students</a>
            <a class="collapse-item" href="cleared-students.php">Cleared Students</a>
            <a class="collapse-item" href="add-new.php">Add New Record</a>
            <a class="collapse-item" href="pending-clearance.php">Pending Clearance</a>
            <div class="collapse-divider"></div>
          
          </div>
        </div>
      </li>

      


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
 
 

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $department; ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="update-password.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Update Password
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
   
        <!-- /.container-fluid -->
            <div class="row">
          <div class="col-lg-3 col-md-3 col-xs-1 col-sm-1"></div>
          <div class="col-lg-6 col-md-6 col-xs-10 col-sm-10" style="background-color: white; padding: 40px 30px;">
            <form method="post" action="" autocomplete="off">
              <div class="form-group">
                <input type="hidden" name="department" value="<?php echo $department; ?>">
              </div>
              <center><h4><i>ADD NEW RECORD</i></h4></center><hr><br>
              <div class="form-row">
                <div class="form-group col-4">
                  <label>Adm Number</label>
                  <input type="number" name="adm-no" class="form-control form-control-lg" min="1">
                </div>
                <div class="form-group col-8">
                  <label>Full Names</label>
                  <input type="text" name="student" class="form-control form-control-lg">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-4">
                  <label>Class</label>
                   <select name="student-class" class="custom-select">
                        <option value="0">Select Class</option>
                        <option value="Form 1">Form 1</option>
                        <option value="Form 2">Form 2</option>
                        <option value="Form 3">Form 3</option>
                        <option value="Form 4">Form 4</option>
                    </select>
                </div>
                
                <div class="form-group col-4">
                  <label>Stream</label>
                   <select name="stream-admitted" class="custom-select">                        
                        <option value="00">Select Stream</option>
                        <option value="North">North</option>
                        <option value="South">South</option>
                        <option value="West">West</option>
                        <option value="East">East</option>
                        <option value="Central">Central</option>
                    </select>
                </div>
                <div class="form-group col-4">
                  <label>Date Issued</label>
                  <input type="text" name="dates" value="<?php echo date('l, d/m/Y h:i:s A'); ?>" class="form-control-md form-control" disabled="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-4">
                  <label>Serial No</label>
                  <input type="text" name="serial-no" class="form-control form-control-lg">
                </div>
                <div class="form-group col-8">
                  <label>Title</label>
                  <input type="text" name="item-title" class="form-control-lg form-control">
                </div>
              </div>
              <div class="form-group">
                <label>Item Description</label>
                <textarea name="item-description" class="form-control form-control-lg" rows="5"></textarea>
              </div>
              <br>
              <input type="submit" name="submit-record" value="SAVE RECORD" class="btn btn-danger btn-block btn-lg">
            </form>
          </div>
          <div class="col-lg-3 col-md-3 col-xs-1 col-sm-1"></div>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; UpperHill School 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php
if(isset($_POST['submit-record'])){
include '../db/db-connection.php';
$adm = mysqli_real_escape_string($conn, $_POST['adm-no']);
$student = mysqli_real_escape_string($conn, $_POST['student']);
$stream_admitted = mysqli_real_escape_string($conn, $_POST['stream-admitted']);
$class_admitted = mysqli_real_escape_string($conn, $_POST['student-class']);
$serial_number = mysqli_real_escape_string($conn, $_POST['serial-no']);
$item_title = mysqli_real_escape_string($conn, $_POST['item-title']);
$item_description = mysqli_real_escape_string($conn, $_POST['item-description']);
$department = $_POST['department'];
if(empty($adm) || empty($student) || empty($serial_number) || empty($item_title)){
    echo "<script>alert('provide all details'); </script>";
}else if($class_admitted == "0"){
    echo "<script>alert('select stream'); </script>";
}else if($stream_admitted == "00"){
    echo "<script>alert('select stream'); </script>";
}else{
  $today = date('l, d/m/Y h:i:s A');
  $check = "SELECT * FROM `borrowed_items` WHERE `serial_number` = '$serial_number' AND `status` = 'BORROWED'";
  $result = mysqli_query($conn, $check);
  $rows = mysqli_num_rows($result);
  if($rows >= 1){
      echo "<script>alert('you have already inserted this record'); </script>";
  }else{
    $insert = "INSERT INTO `borrowed_items`(`department`, `adm_number`, `full_names`, `class`, `stream`, `serial_number`, `item_title`, `item_description`, `date_borrowed`,`status`) VALUES ('$department', '$adm', '$student', '$class_admitted', '$stream_admitted', '$serial_number', '$item_title', '$item_description', '$today', 'BORROWED')";
    $querycheck = mysqli_query($conn, $insert);
    if($querycheck){
      echo "<script>alert('ITEM HAS BEEN ADDED SUCCESSFULLY');</script>";
      echo "<script>window.location.replace('department-dashboard.php');</script>";
    }
  }
}

}
