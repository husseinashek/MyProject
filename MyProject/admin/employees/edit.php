<?php
	 include 'config.php';
     
	 
	 $username=$_GET['id'];

    $sql = "SELECT * FROM employee where username='$username'";
    $result = mysqli_query($conn, $sql);

      if ($result->num_rows > 0) {	$row=mysqli_fetch_array($result);
     

    if (isset($_POST['submit'])){

	$fullname=$_POST['fullname'];
	$username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $salary=$_POST['salary'];

	$sql=("UPDATE employee set fullname='$fullname', username='$username' ,password='$password',role='$role',salary='$salary' where username='$username'");
	$result=mysqli_query($conn,$sql);
	header('location:emp.php');

    }
?>
<!DOCTYPE html>
<html>
<!doctype html>

<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css " rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Delivery Company</title>
  <style>.custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }
   

</style>
 <!-- Navbar -->

 <nav class="navbar navbar-light bg-warning shadow font1 ">
        <div class="container-fluid ">
          <a class="navbar-brand " href="#">Delivery Company MS</a>
         
        </div>
      </nav>
  <!-- go back-->
  <div class="bg-warning" style="margin-top:-22px ; height: 40px;">
      <div class="position-relative">
      <i class="fa fa-arrow-circle-left ms-2 mt-2 cursor" style="font-size:24px"  onclick="history.back()"></i>
      </div>

      <!-- -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
</head>

<body>


	<h2>Edit Employee</h2><br>

	

<div class="container">

<form class="well form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><?php echo $row['fullname']  ?></legend>



<!-- Fullname Text input-->

<div class="form-group">
<label class="col-md-4 control-label">Full Name</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">

<input  name="fullname"  class="form-control"  type="text" placeholder="full name" value="<?php echo $row['fullname']  ?>">
</div>
</div>
</div>


<!-- Username Text input-->
   <div class="form-group">
<label class="col-md-4 control-label" >Username</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">	
<input name="username" placeholder="username" class="form-control"  type="text" value="<?php echo $row['username']  ?>" disabled>
</div>
</div>
</div>


<!-- Password Text input-->
   
<div class="form-group">
<label class="col-md-4 control-label">Password</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">	
<input name="password" placeholder="password" class="form-control" type="text" value="<?php echo $row['password']  ?>">
</div>
</div>
</div>

<!-- Role Text input-->
  
<div class="form-group">
<label class="col-md-4 control-label">Role</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">  
<select name="role" placeholder="role" class="form-control" type="text" value="<?php echo $row['role']  ?>">
  <option>call center</option>
  <option>data entry</option>
  <option>driver</option>
  <option>manager</option>
  <option>accountant</option>
  </select>

</div>
</div>
</div>


<!-- Salary Text input-->

<div class="form-group">
<label class="col-md-4 control-label">Salary</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<input name="salary" placeholder="salary" class="form-control"  type="text" value="<?php echo $row['salary']  ?>">
</div>
</div>
</div>


					

<!-- Button -->
<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col-md-4">
<button type="submit" class="btn btn-warning" name="submit" >Update <span class="glyphicon glyphicon-edit" ></span></button>
</div>
</div>


</fieldset>
</form>
</div>
</div><!-- /.container -->
</body>
</html>
<?php } ?>