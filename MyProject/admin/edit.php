<?php
	 include 'config.php';
  
	 session_start();
	 
	 $username=$_SESSION['username'];

    $sql = "SELECT * FROM employee where username='$username'";
    $result = mysqli_query($conn, $sql);
    
      if ($result->num_rows > 0) {
     }

    if (isset($_POST['submit'])){

	$fullname=$_POST['fullname'];
	$username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $salary=$_POST['salary'];
	
	mysqli_query($conn,"update employee set fullname='$fullname', username='$username' ,password='$password',role='$role',salary='$salary' where username='$id'");
	header('location:emp.php');

    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Basic MySQLi Commands</title>
</head>
<body>
	<h2>Edit</h2>

	<form method="POST">
		<label>Full Name:</label><input type="text"  name="fullname">
		<label>UserName:</label><input type="text"  name="username">
		<label>Password:</label><input type="password"  name="password">
		<label>Role:</label><input type="text"  name="role">
		<label>Salary:</label><input type="text" name="salary">

		<input type="submit" name="submit">
		<a href="emp.php">Back</a>
		
	</form>
</body>
</html>