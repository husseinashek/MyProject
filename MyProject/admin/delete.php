<?php
  include 'config.php';
  
  
  
  $id=$_GET['id'];
  
  $sql="Delete FROM employee WHERE username= '$id'";
  $result=mysqli_query($conn,$sql);
  
  header('location:emp.php');
 
 ?>  