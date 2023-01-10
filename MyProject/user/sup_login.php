<?php
 include 'config.php';
 ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>


         
         <?php
            $msg = '';
            
            if (isset($_POST['submit']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               $username=$_POST['username'];
               $password=$_POST['password'];
               
	$sql = "SELECT * FROM supplier WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: supp_orders.php");
        
	} else {
		echo "<script>alert('Woops! username or Password is Wrong.')</script>";
	}
}

         ?>
      <html>
<head>
<title>Creating Material Design Login Form with PHP and jQuery</title>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="container">
    <h1 style="background-color: #FFD233;"><b>Supplier Login Form</b></h1>
    <div id="user-login" class="row">
        <div class="col s12 z-depth-6 card-panel">
            <form class="login-form" name="login-form" method="POST"
                action="">

                <div class="row margin">

                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input class="validate" id="username"
                            name="username" required="" type="text" required placeholder="Username">
                            
                        
             

                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i> <input
                            id="password" name="password" required=""
                            type="password" required placeholder="Password">
                            </div>
                </div>
                
                </div>
                <div class="row" >
                    <div class="input-field col s12">

                    <div class="input-group" style="position:absolute; left:80px; top: -15px;" >
                    <form method="get" action="supp_orders.php" >
				<button name="submit"  class="btn" value="login">Login</button></form>
			</div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
</body>
<script>
   if ( window.history.replaceState ) {
	window.history.replaceState( null, null, window.location.href );
   }
</script>
</html>