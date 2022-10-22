<?php
  include 'config.php';
  error_reporting(0);

  session_start();

   if (isset($_POST['add'])){

  $username=$_POST['username'];
  $password=$_POST['password'];
  $role=$_POST['role'];
  $salary=$_POST['salary'];
  $fullname=$_POST['fullname'];
  
  $sql="INSERT INTO employee (username ,password ,role , salary,fullname) 
  VALUES('$username','$password','$role','$salary','$fullname')";
  $result=mysqli_query($conn,$sql);
  
   }
?>
<!doctype html>

<html lang="en">
    <head>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<div class="span3 well">
      <legend>Add New Employee</legend>
    <form accept-charset="UTF-8" action="" method="post">
		<input class="span3" name="fullname" placeholder="Full Name" type="text"> 
        <input class="span3" name="username" placeholder="Username" type="text">
        <input class="span3" name="password" placeholder="Password" type="password"> 

<select class="span3" name="role" id="cars" >
  <option></option>
  <option value="call center">call center</option>
  <option value="data entry">data entry</option>
</select>
        <input class="span3" name="salary" placeholder="salary" type="text">
        <button name="add" class="btn btn-warning" type="submit">Add Employee</button>
    </form>
</div>
</html>