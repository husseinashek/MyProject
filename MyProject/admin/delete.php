<?php
  include 'config.php';
  session_start();
  
  $id=$_GET['id'];
  
  $sql= "DELETE FROM employee WHERE username='$id'";
  $result=mysqli_query($conn,$sql);
  
  header('location:emp.php');
 
 ?>  