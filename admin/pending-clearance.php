<?php
session_start();
if(!isset($_SESSION['admin']))
{
  header('Location: ../login/');
}else{
  include '../db/db-connection.php';
  $admin = $_SESSION['admin'];
  $check = "SELECT * FROM `admin` WHERE `email` = '$admin'";
  $query = mysqli_query($conn, $check);
  $rows = mysqli_num_rows($query);
  if($rows >= 1){
    while($data = mysqli_fetch_assoc($query)){
      $email = $data['email'];  
      $profile = $data['profile']; 
      
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

  <title> ADMIN DASHBOARD</title>

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
        <div class="sidebar-brand-text mx-3">ADMIN DASHBOARD</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="admin-dashboard.php">
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
            <a class="collapse-item" href="cleared-students.php">Cleared Students</a>
            <a class="collapse-item" href="add-new.php">Add New Record</a>
            <a class="collapse-item" href="add-department.php">Add New Department</a>
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN</span>
                   <?php 
                if($profile== ''){
                      echo" <img src='uploads/noimage.jpg' class='img-profile rounded-circle' />";
                }else{

                    echo" <img src='uploads/$profile'  class='img-profile rounded-circle'  />";
                 }
                 ?>
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
            <h1 class="h3 mb-0 text-gray-800">PENDING CLEARANCE</h1>
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="print-receipt"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</button> 
          </div>

         
        <!-- /.container-fluid -->
        <div class="row">
          <div class="table-responsive print-section" style="background-color: white;padding: 50px 30px;">
             <center><h3><b><i>PENDING CLEARANCE</i></b></h3></center><hr><br>
             <?php
              include '../db/db-connection.php';
              global $department;
              $status = "WAITING";

              $select = "SELECT * FROM `clearance_status` WHERE `mathematics` = '$status'  OR `languages` = '$status' OR `sciences` = '$status' OR `humanities` = '$status' OR `finance` = '$status' OR `library` = '$status' OR `others` = '$status'";
              $query = mysqli_query($conn, $select);
              $rows = mysqli_num_rows($query);
              if($rows >= 1){
                echo"
                  <div class='table-responsive'>
                    <table class='table table-bordered table-stripped'>
                      <thead class='thead-dark'>
                        <tr>
                          <th><b>#</b></th>
                          <th><b>Adm No</b></th>
                          <th><b>Full Names</b></th>
                          <th><b>Mathematics</b></th>
                          <th><b>Languages</b></th>
                          <th><b>Sciences</b></th>
                          <th><b>Humanities</b></th>
                          <th><b>Finance</b></th>
                          <th><b>Library</b></th>
                          <th><b>Others</b></th> 
                        </tr>
                      </thead>
                      <tbody>


                ";
                $num = 1;
                while ($data = mysqli_fetch_assoc($query)) { 
                  $adm = $data['adm']; 
                  $names = $data['names'];
                  $mathematics = $data['mathematics'];
                  $languages = $data['languages'];
                  $sciences = $data['sciences'];
                  $humanities = $data['humanities'];
                  $finance = $data['finance'];
                  $library = $data['library'];
                  $others = $data['others']; 
                  echo "

                    <tr>
                      <td>$num</td>
                      <td>$adm</td>
                      <td>$names</td>
                      <td>$mathematics</td>
                      <td>$languages</td>
                      <td>$sciences</td>
                      <td>$humanities</td>
                      <td>$finance</td>
                      <td>$library</td>
                      <td>$others</td>
                    </tr>
                  ";
                  $num++;
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
              }
            ?>
            <center><span>Copyright &copy; UpperHill School 2020</span></center>
          </div>
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
        pageTitle: "UPPERHILL SCHOOL PENDING CLEARANCE LIST",               
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
  <!-- Bootstrap core JavaScript--> 
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
 <?php            if(isset($_GET['item'])){
                  $id = $_GET['item'];
                  include '../db/db-connection.php'; 
                    $select = "UPDATE `borrowed_items` SET `status` = 'CLEARED' WHERE `id` = '$id'";
                  $query = mysqli_query($conn, $select);
                  if($query){
                    echo "<script>alert('YOU HAVE SUCCESSFULLY VERIFIED ONE ITEM');</script>";
                    echo "<script>window.location.href='pending-clearance.php';</script>"; 
                  }
                }
                     

?>
