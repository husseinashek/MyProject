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
    *, *:after, *:before{
    -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
    box-sizing:border-box;
    
}
body, html{
    font-size:100%;
    padding:0;
    margin:0;
    height:100%;
}
body{
    font-family:Arial, sans-serif;
  
}
a{
    color:#888;
    text-decoration:none;
}
a:hover,
a:active{
    color:#333;   
}
.container{
    height:100%;
    position:relative;
}
.container > section{
    margin:0 auto;
    padding:6em 3em;
    text-align:center;
    color:#fff;
}
h2{
    color:#fff;
    margin:20px;
    text-align:center;
    text-transform:uppercase;
}
/* General button styles */
.btn{
    border:none;
    position:relative;
    background:none;
    padding:28px 90px;
    display:inline-block;
    text-transform:uppercase;
    margin:15px 30px;
    color:inherit;
    letter-spacing:2px;
    font-size:0.9em;
    outline:none;
    -moz-transition:all 0.4s;
    -webkit-transition:all 0.4s;
    transition:all 0.4s;
    cursor:pointer;
}
.btn:after{
    content:"";
    position:absolute;
    z-index:-1;
    -webkit-transition:all 0.4s;
    -moz-transition:all 0.4s;
    transition:all 04.s;
}
.btn_perspective{
    -webkit-perspective:800px;
    -moz-perspective:800px;
    perspective:800px;
    display:inline-block;
}
.btn-3d{
    display:block;
    background:#FFD233;
    outline:1px solid transparent;
    transform-style:preserve-3d;
}
.btn-3d:active{
    background:#FFD233;   
}
.btn-3da:after{
    width:100%;
    height:42%;
    left:0;
    top:-40%;
    background:#FFD233;
    transform-origin:0% 100%;
    transform:rotateX(90deg);
   
    
}
.btn-3da:hover{
    transform: rotateX(-45deg);   
}
.btn-3db:after{
    width:100%;
    height:40%;
    left:0;
    top:100%;
    background:#FFD233;
    transform-origin: 0% 0%;
    transform:rotateX(-90deg);
}
.btn-3db:hover{
    transform:rotateX(35deg);   
}
.btn-3dc:after{
    width:20%;
    height:100%;
    left:-20%;
    top:0;
    background:#FFD233;
    -webkit-transform-origin:100% 0%;
    -webkit-transform:rotateY(-90deg);
    -moz-transform-origin:100% 0%;
    -moz-transform:rotateY(-90deg);
    -ms-transform-origin:100% 0%;
    -ms-transform:rotateY(-90deg);
    transform-origin:100% 0%;
    transform:rotateY(-90deg);
}
.btn-3dc:hover{
    transform:rotateY(25deg);   
}
.btn-3dd:after{
    width:20%;
    height:100%;
    left:100%;
    top:0;
    background:#FFD233;
    -webkit-transform-origin:0% 0%;
    -webkit-transform:rotateY(90deg);
    -moz-transform-origin:0% 0%;
    -moz-transform:rotateY(90deg);
    -ms-transform-origin:0% 0%;
    -ms-transform:rotateY(90deg);
    transform-origin:0% 0%;
    transform:rotateY(90deg);
}
.btn-3dd:hover{
    -webkit-transform:rotateY(-15deg);
    -moz-transform:rotateY(-15deg);
    -ms-transform:rotateY(-15deg);
    transform:rotateY(-15deg);
}


@media screen and (max-width:480px){
    .container{
        font-size:1.2em;   
    }
}




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
                  <a class="nav-link active" aria-current="page" href="manager_emp.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/MyProject/admin/data.php">Data Entry</a>
                </li>
               

                  <li class="nav-item">
                    <a class="nav-link" href="/MyProject/admin/center.php">Call Center</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="/MyProject/admin/sup.php">Supplier</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="/MyProject/admin/order.php">Order Status</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="/MyProject/admin//employees/emp.php">Employees</a>
                  </li>
                  

              
            </div>
          </div>
        </div>
      </nav>

      


      <!-- go back-->
      <div class="bg-warning" style="height: 40px;">
      <div class="position-relative">
      
      <a href="logout.php"  style="color:black"> <i  class="fa fa-sign-out cursor position-absolute top-0 end-0 mt-2 me-3 " style="font-size:28px" ></i>  </a>
      </div>

      

      <div class="container">
  <section class="3d-buttons">
    <h2 style="color:black ;">Manager</h2>
 <br>
 <br>
 
     <!-- take us to new orders-->
    <p class="btn_perspective">
      <button class="btn btn-3d btn-3da" style="color:black ;" onclick="location.href='/MyProject/admin/data.php'" ><b>New Orders</b>
      </button>
    </p>
    
    <!-- take us to new call center-->
    <p class="btn_perspective">
      <button class="btn btn-3d btn-3da" style="color:black ;" onclick="location.href='/MyProject/admin/center.php'" ><b>Call Center</b>
      </button>
    </p>

     <!-- take us to new supplier-->
     <p class="btn_perspective">
      <button class="btn btn-3d btn-3da" style="color:black ;" onclick="location.href='/MyProject/admin/sup.php'" ><b>Supplier</b>
      </button>
    </p>

    <!-- take us to order status-->
    <p class="btn_perspective" >
      <button class="btn btn-3d btn-3dd" style="color:black ;" onclick="location.href='/MyProject/admin/order.php'"><b>Order Status</b>
      </button>
    </p>
   
      <!-- take us to employee -->
      <p class="btn_perspective" >
      <button class="btn btn-3d btn-3dd" style="color:black ;" onclick="location.href='/MyProject/admin/employees/emp.php'"><b>Employees</b>
      </button>
    </p>

  </section>
</div>

     





    
  </body>
</html> 

