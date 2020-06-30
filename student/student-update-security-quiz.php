<?php

include '../db/db-connection.php';

 

 $security_question = mysqli_real_escape_string($conn, $_POST['security-question']);
 $security_answer = mysqli_real_escape_string($conn, $_POST['security-answer']);
 if(empty($security_answer)){
 	echo "<script>alert('PROVIDE THE SECURITY ANSWER');</script>";
 }else if($security_question === '000'){
 	echo "<script>alert('SELECT THE SECURITY QUESTION');</script>";
 }else{
 	  $student_email = $_SESSION['student'];
  $check = "UPDATE `students` SET `security_quiz` = '$security_question' , `security_ans` = '$security_answer' WHERE `student_email` = '$student_email'";
  $query = mysqli_query($conn, $check);
  if($query){
  	echo "<script>alert('YOUR SECURITY QUESTION HAS BEEN UPDATED SUCCESSFULLY');</script>";
  	echo "<script>window.location.replace('student-dashboard.php');</script>";
  }
 }