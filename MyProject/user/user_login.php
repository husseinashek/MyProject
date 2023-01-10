<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['email'])) {
    header("Location: users.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
		header("Location: users.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
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
			<h1>Sign In</h1>
			<div>
				<input type="text" placeholder="Email" required="" name="email" id="username" value="<?php echo $email; ?>"  />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password" id="password" value="<?php echo $_POST['password']; ?>" />
				
			</div>
			<div>
				<input type="submit" value="Sign In" name="submit"/>
		
				
			<a href="user_reg.php">Sign Up Here</a>.</p>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
<script>
   if ( window.history.replaceState ) {
	window.history.replaceState( null, null, window.location.href );
   }
</script>
</html>


