<?php 

include 'config.php';
error_reporting(0);


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

      #position {
        position: relative;

      }

     
      
      .card2:hover {
          transform: scale(1.05);
          }

        
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

                  <li class="nav-item">
                    <a class="nav-link" href="dash.php">Dashboard</a>
                  </li>

             
            </div>
          </div>
        </div>
      </nav>

      


      <!-- go back-->
      <div class="bg-warning" style="height: 40px;">
      <div class="position-relative">
      <i class="fa fa-arrow-circle-left ms-2 mt-2 cursor" style="font-size:24px"  onclick="history.back()"></i>
      <a href="logout.php"  style="color:black"> <i  class="fa fa-sign-out cursor position-absolute top-0 end-0 mt-2 me-3 " style="font-size:28px" ></i>  </a>
      </div>




      <div class="container mt-5">
      <div class="row ">

      
      <!-- data entry-->
        <div class="col ">
          <a href="data.php">
        <div class="card card1 shadow  border   font1" style="width: 18rem;">
        <img src="img/dataent.png" class="card-img-top " alt="...">
        <div class="card-body">
          <a href="data.php" class="btn btn-warning d-grid gap-2 card2">Data Entry</a>
        </div>
      </div>
          </a>
      </div>


      <!-- Call center-->
      <div class="col">
        <a href="center.php">
        <div class="card card1 border shadow  font1 " style="width: 18rem;">
          <img src="img/CallCenter.png" class="card-img-top" alt="...">
          <div class="card-body">
            <a href="center.php" class="btn btn-warning d-grid gap-2 card2">Call Center</a>
          </div>
        </div>
          </a>
        </div>


        <!-- Suppliers-->
        <div class="col ">
          <a href="sup.php">
          <div class="card card1 border  shadow  font1 " style="width: 18rem;">
            <img src="img/supplier.png" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="sup.php" class="btn btn-warning d-grid gap-2 card2">Suppliers</a>
            </div>
          </div>
            </a>
          </div>
      </div>


          <!-- Order Status-->
          <div class="row mt-5">
          <div class="col ">
          <a href="order.php">
          <div class="card card1 border  shadow  font1 " style="width: 18rem;">
            <img src="img/order.png" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="order.php" class="btn btn-warning d-grid gap-2 card2">Order Status</a>
            </div>
          </div>
            </a>
          </div>



           <!--Employees-->
           
          <div class="col ">
          <a href="emp.php">
          <div class="card card1 border  shadow  font1 " style="width: 18rem;">
            <img src="img/emp.png" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="emp.php" class="btn btn-warning d-grid gap-2 card2">Employees</a>
            </div>
          </div>
            </a>
          </div>




           <!--Dashboard-->
           
          <div class="col ">
          <a href="dashboard.php">
          <div class="card card1 border  shadow  font1 " style="width: 18rem;">
            <img src="img/dash.png" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="dash.php" class="btn btn-warning d-grid gap-2 card2">Dashboard</a>
            </div>
          </div>
            </a>
          </div>









      </div>

      


     





    
  </body>
</html> 

