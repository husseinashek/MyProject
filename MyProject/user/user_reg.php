<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['email'])) {
    header("Location: user_login.php");
}

if (isset($_POST['submit'])) {
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users ( email, password)
					VALUES ( '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form - Pure Coding</title>
</head>
<body>

<div class="container" >
	<section id="content">
		<form action="" method="POST" class="login-email">
			<h1>Sign Up</h1>
			<div>
				<input type="text" placeholder="Email" required="" name="email" id="username" value="<?php echo $email; ?>"  />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password" id="password" value="<?php echo $_POST['password']; ?>" />
				<input type="password" placeholder="Confirm Password" required="" name="cpassword"   id="password" value="<?php echo $_POST['cpassword']; ?>"/>
			</div>
			<div>
				<input type="submit" value="Sign Up" name="submit"/>
		
				
			<a href="user_login.php">Login Here</a>.</p>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>