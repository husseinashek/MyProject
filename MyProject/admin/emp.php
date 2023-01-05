<?php
 include 'config.php';
 ob_start();
   session_start();

            $sql = "SELECT * FROM employee";
            $result = mysqli_query($conn, $sql);
          	if ($result->num_rows > 0) { 
             }
             
         ?>

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
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">GO TO</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="data.php">Data Entry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="center.php">Call center</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="sup.php">Suppliers</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="order.php">Order Status</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="dash.php">Dashboard</a>
                  </li>

              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </div>
      </nav>

      


      <!-- go back-->
      <div class="bg-warning" style="margin-top:-22px ; height: 40px;">
      <div class="position-relative">
      <i class="fa fa-arrow-circle-left ms-2 mt-2 cursor" style="font-size:24px" onclick="history.back()"></i>
      <a href="logout.php"  style="color:black"> <i  class="fa fa-sign-out cursor position-absolute top-0 end-0 mt-2 me-3 " style="font-size:28px" ></i>  </a>
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>


<div class="container" style="margin-top:70px ;" >
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead style="background-color: #FFC107 ;">
    

            <th>FullName</th>
            <th>UserName</th>
            <th>Password</th>
            <th>Role</th>
            <th>Salary</th>
            <th class="text-center">Action</th>

            
        </tr>
    </thead>
    

    <?php
  
                while($row = mysqli_fetch_assoc($result)){
                 
                   ?>
            <tr>


                <td ><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['role']; ?> </td>
                <td><?php echo $row['salary']; ?></td>
                <td class="text-center"> 
               
                 <a href="edit.php?id=<?php echo $row['username']; ?>" class='btn btn-info btn-xs' >
                 <span class="glyphicon glyphicon-edit" ></span> Edit</a>

                 <a href="delete.php?id=<?php echo $row['username']; ?>"  class="btn btn-danger btn-xs">
                <span class="glyphicon glyphicon-remove"></span> Del</a></td>

            
               </tr>
            <?php }?>
    </table>

    <button class="btn btn-warning" name="add" onclick="window.location.href = 'add_emp.php';" style="height: 30px; position:relative; left:3px;">Add new employee</button>
        
    </div>
</div>
</body>
</html>