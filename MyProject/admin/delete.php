<?php
  include 'config.php';

  session_start();

  $id=$_GET['id'];
 

  
  $sql="Delete FROM employee WHERE username= '$id'";
  $result=mysqli_query($conn,$sql);
  
  header('location:emp.php');

 ?>  