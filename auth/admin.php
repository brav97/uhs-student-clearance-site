<?php
 session_start();
 include '../db/db-connection.php'; 
 $email = mysqli_real_escape_string($conn, $_POST['admin-email']);
 $password = mysqli_real_escape_string($conn, $_POST['admin-password']);
 if(empty($email)|| empty($password)){
  echo "
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Warning!</strong> Provide all details required.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }else{
  $check = "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password'";
  $query = mysqli_query($conn, $check);
  $rows = mysqli_num_rows($query);
  if($rows >= 1){
    while ($data = mysqli_fetch_assoc($query)) {
      $dpassword = $data['password'];
      $department = $data['department'];
      if($password !== $dpassword){
       echo "
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Warning!</strong> Login Credentials Mismatch.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      }else{ 
        $_SESSION['admin'] = $email;
        echo "<script>window.location.replace('../admin/admin-dashboard.php');</script>";
      }
    }
  }else{
    echo "
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Warning!</strong>An Error Occurred.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
  }
 } 
 ?>