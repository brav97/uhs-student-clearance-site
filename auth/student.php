<?php
 session_start();
 include '../db/db-connection.php'; 
 $adm = mysqli_real_escape_string($conn, $_POST['student-adm']);
 $password = mysqli_real_escape_string($conn, $_POST['student-password']);
 if(empty($adm)|| empty($password)){
  echo "
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Warning!</strong> Provide all details required.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
 }else{
  $check = "SELECT * FROM `students` WHERE `adm` = '$adm' AND `password` = '$password'";
  $query = mysqli_query($conn, $check);
  $rows = mysqli_num_rows($query);
  if($rows >= 1){
    while ($data = mysqli_fetch_assoc($query)) {
      $dpassword = $data['password'];
      $student_email = $data['student_email'];
      if($password !== $dpassword){
       echo "
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Warning!</strong> Login Credentials Mismatch.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
      }else{ 
        $_SESSION['student'] = $student_email;
        echo "<script>window.location.replace('../student/student-dashboard.php');</script>";
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