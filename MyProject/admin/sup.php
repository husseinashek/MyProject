<?php

 include 'config.php';
 error_reporting(0);

 session_start();


 if (isset($_POST['add'])){

  $full_name=$_POST['full_name'];
  $primary_phone_number=$_POST['primary_phone_number'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $region=$_POST['region'];
  $city=$_POST['city'];
  $street=$_POST['street'];

  $sql="INSERT INTO supplier(full_name,primary_phone_number ,username ,password ,region , city,street) 
  VALUES('$full_name','$primary_phone_number','$username','$password','$region','$city','$street')";
  $result=mysqli_query($conn,$sql);
 }

 if (isset($_POST['search'])){

$full_name=$_POST['full_name2'];
$primary_phone_number=$_POST['primary_phone_number2'];

  $sql="SELECT * FROM supplier WHERE full_name= '$full_name' and primary_phone_number='$primary_phone_number' " ;
 $result=mysqli_query($conn,$sql);
 $row= mysqli_fetch_array($result);
 if ($result->num_rows > 0) {
 $full_name1=$row['full_name'];
 $primary_phone_number1=$row['primary_phone_number'];
 $username1=$row['username'];
 $password1=$row['password'];
 $region1=$row['region'];
 $city1=$row['city'];
 $street1=$row['street'];
 }
 else echo "please enter correct information";
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
  </head>
  <body>

    <style> 

      
      .cursor:hover{
        cursor: pointer;
        transform: scale(1.2);
      }

      .card1:hover {
        transform: scale(1.1);
        }

      .font1{
      font-family: 'Oswald', sans-serif;
      font-family: 'Roboto Serif', sans-serif;
      }


    </style>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




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

              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </div>
      </nav>


      


      <!-- go back-->
      <div class="bg-warning" style="height: 40px;">
      <i class="fa fa-arrow-circle-left ms-2 mt-2 cursor" style="font-size:24px"  onclick="history.back()"></i>
      </div>





      


      <div class="accordion accordion-flush container   shadow mt-4 ms-4 font1" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Add New Supplier
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <form method="POST">
              <div class="row">
                <div class="col">
                  
               <!-- add supplier-->   
               <div class="form-floating text-muted ms-3 me-3">
                <input name="full_name" type="text" class=" form-control border-top-0 border-end-0 border-start-0" id="floatingInput" placeholder="Full Name">
                <label  for="floatingInput">Full Name</label>
                </div>
                </div>

                <div class="col">
                <div class="form-floating text-muted ms-3 me-3">
                  <input name="primary_phone_number"  type="text" class=" form-control border-top-0 border-end-0 border-start-0" id="floatingInput" placeholder="Primary Phone number">
                  <label  for="floatingInput">Primary Phone number</label>
                </div>
                </div>

              

                
                  <div class="col">
                <div class="form-floating text-muted ms-3 me-3">
                  <input name="username" type="text" class=" form-control border-top-0 border-end-0 border-start-0" id="floatingInput" placeholder="Username">
                  <label  for="floatingInput">Username</label>
                </div>
                </div>


                <div class="col">
                    <div class="form-floating text-muted ms-3 me-3">
                      <input name="password" type="text" class=" form-control border-top-0 border-end-0 border-start-0" id="floatingInput" placeholder="Password">
                      <label  for="floatingInput">Password</label>
                    </div>
                </div>
              </div>

              <div class="row">

              <div class="col">

              <div class="form-floating mt-3 ms-3 me-3">
                <select name="region" class="form-select border-top-0 border-end-0 border-start-0" id="floatingSelectGrid" aria-label="Floating label select example">
                  <option selected></option>
                  <option value="beirut">Beirut</option>
                  <option value="north">North</option>
                  <option value="south">South</option>
                  <option value="bekaa">Bekaa</option>
                </select>
                <label for="floatingSelectGrid">Region</label>
              </div>
              </div>

              <div class="col">

              <div class="form-floating text-muted ms-3 me-3 mt-3">
                 <input type="text" name="city" class="form-control border-top-0 border-end-0 border-start-0 " id="floatingInput" placeholder="City">
                 <label for="floatingInput">City</label>
               </div>
              </div>

              <div class="col">

              <div class="form-floating text-muted ms-3 me-3 mb-4 mt-3">
                 <input type="text"  name="street" class="form-control border-top-0 border-end-0 border-start-0" id="floatingInput" placeholder="Street">
                 <label for="floatingInput">Street</label>
              </div>

              </div>

              <div class="col">
                <div class="mt-4">
              <button name="add" class="btn btn-warning" type="submit">Add</button>
              </div>
              </div>
             </form>
              </div>

              </div>

            </div>
        </div>


        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              Find Supplier
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
          <form method="POST">

          <div class="row">
            <div class="col">

            <div class="form-floating text-muted ms-3 me-3">
                <input name="full_name2" type="text" class=" form-control border-top-0 border-end-0 border-start-0" id="floatingInput" placeholder="Full Name">
                <label  for="floatingInput">Full Name</label>
                </div>

            </div>


            <div class="col">
                <div class="form-floating text-muted ms-3 me-3">
                  <input name="primary_phone_number2"  type="text" class=" form-control border-top-0 border-end-0 border-start-0" id="floatingInput" placeholder="Primary Phone number">
                  <label  for="floatingInput">Primary Phone number</label>
                </div>
            </div>


                  <div class="col mt-3">
                  <div class="d-flex">
                    
                    <button name="search" class="btn btn-warning ms-5" type="submit">Search</button>
                    </div>
                    <div class="row mt-5" >
        <div class="col" style = "position:relative; left:-800px; ">
           <div class="card shadow" style="width: 18rem;">
           <div class="card-body">
            <h5 class="card-title bg-warning border rounded" style="text-align: center;">Supplier Info</h5>
                    <div class="mt-3" >
            <p>Supplier Name : <b><?php echo $full_name1; ?> </b></p>
            <p>Primary Phone Number : <b><?php echo $primary_phone_number1; ?> </b></p>
            <p>User Name : <b><?php echo $username1; ?> </b></p>
            <p>Password : <b><?php echo $password1; ?> </b></p>
            <p>Region : <b><?php echo $region1; ?> </b></p>
            <p>city : <b><?php echo $city1; ?> </b></p>
            <p>street : <b><?php echo $street1; ?> </b></p>


            

            </div>
                  </div>
            
            </div>
          








          </div>











          </form>
          
          
          
          
          
          
            </div>
          
          </div>
        </div>









      </div>
      


      <div class="mt-5">
      <?php echo $suppliers; ?>;
      </div>


        