<?php

include 'config.php';
error_reporting(0);

session_start();




//total orders
$sql4="SELECT * FROM invoice WHERE invoice_region='beirut' ";
$result4=mysqli_query($conn,$sql4);
$bei_orders=mysqli_num_rows($result4);

//total earning
$sql='SELECT SUM(delivery_charge) AS beisum FROM invoice WHERE order_status="DELIVERED" AND invoice_region="beirut"';
$result=mysqli_query($conn,$sql);
$total=mysqli_fetch_assoc($result);
$beisum=$total['beisum'];

//delivered
$sql="SELECT * FROM invoice WHERE invoice_region='beirut' AND order_status='DELIVERED' ";
$result=mysqli_query($conn,$sql);
$delivered_orders=mysqli_num_rows($result);

//NEW
$sql="SELECT * FROM invoice WHERE invoice_region='beirut' AND order_status='NEW' ";
$result=mysqli_query($conn,$sql);
$new_orders=mysqli_num_rows($result);

//canceled
$sql="SELECT * FROM invoice WHERE invoice_region='beirut' AND order_status='CANCELED' ";
$result=mysqli_query($conn,$sql);
$canceled_orders=mysqli_num_rows($result);

//delayed
$sql="SELECT * FROM invoice WHERE invoice_region='beirut' AND order_status='DELAYED' ";
$result=mysqli_query($conn,$sql);
$delayed_orders=mysqli_num_rows($result);








if(isset($_GET['from_date']) && isset($_GET['to_date']))
{
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

    //total
    $sql4="SELECT * FROM invoice WHERE insert_date BETWEEN '$from_date' AND '$to_date' AND invoice_region='beirut' ";
    $result4=mysqli_query($conn,$sql4);
    $bei_orders=mysqli_num_rows($result4);

    //earnings
    $sql="SELECT SUM(delivery_charge) AS beisum FROM invoice WHERE order_status='DELIVERED' AND invoice_region='beirut'AND insert_date BETWEEN '$from_date' AND '$to_date'";
    $result=mysqli_query($conn,$sql);
    $total=mysqli_fetch_assoc($result);
    $beisum=$total['beisum'];

    //delivered
    $sql="SELECT * FROM invoice WHERE invoice_region='beirut' AND order_status='DELIVERED' AND insert_date BETWEEN '$from_date' AND '$to_date' ";
    $result=mysqli_query($conn,$sql);
    $delivered_orders=mysqli_num_rows($result);

    //NEW
    $sql="SELECT * FROM invoice WHERE invoice_region='beirut' AND order_status='NEW' AND insert_date BETWEEN '$from_date' AND '$to_date' ";
    $result=mysqli_query($conn,$sql);
    $new_orders=mysqli_num_rows($result);

    //canceled
    $sql="SELECT * FROM invoice WHERE invoice_region='beirut' AND order_status='CANCELED' AND insert_date BETWEEN '$from_date' AND '$to_date' ";
    $result=mysqli_query($conn,$sql);
    $canceled_orders=mysqli_num_rows($result);

    //delayed
    $sql="SELECT * FROM invoice WHERE invoice_region='beirut' AND order_status='DELAYED' AND insert_date BETWEEN '$from_date' AND '$to_date' ";
    $result=mysqli_query($conn,$sql);
    $delayed_orders=mysqli_num_rows($result);
        

    
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

    <script src="mapdata.js"></script>
    <script src="countrymap.js"></script>

    <title>Delivery Company</title>
  </head>

  <style>

.card2:hover {
          transform: scale(1.05);
          }

        
      .cursor:hover{
          cursor: pointer;
          
        }
  
  
  
  
  
  
  
  
  
  
  
  
  </style>

  <body class="bg-light">


         <!--Navbar-->

  <nav class="navbar navbar-expand-lg navbar-light bg-warning ">
  <a class="navbar-brand ms-2" href="admin.php">Home</a>
    <div class="container-fluid  justify-content-center">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active  " aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active " href="#">Graphs</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Beirut
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="south.php">South</a></li>
            <li><a class="dropdown-item" href="north.php">North </a></li>
            <li><a class="dropdown-item" href="bekaa.php">Bekaa </a></li>
            
                </ul>
             </li>
     
           </ul>
     
        </div>
      </div>
    </nav>



<!--filter date-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5 shadow-sm">
                    <div class="card-header">
                        <h6 style="text-align: center;">Beirut</h6>
                    </div>
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="form-group ">
                                        <label ><h6>From Date</h6></label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group ">
                                        <label><h6>To Date</h6></label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-1 ms-4">
                                         <br>
                                      <button type="submit" class="btn btn-warning">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-5 mb-5">
                    <div class="card-body shadow">
                        
                    <div class="row mt-3">

<!-- South total orders--> 
       <div class="col-5 card2 ms-4">
     <div class="card-body card2  border-0 ">
       <div class="border-start border-secondary border-5 rounded-3 shadow bg-white ">
    <h5 class="card-title ms-2">Total Orders</h5>
    <p class="card-text ms-2"><?php echo $bei_orders; ?></p>
       </div>
     </div>
       </div>

<!-- South total earning-->     
        <div class="col-5 ms-3 ">
       <div class="card-body card2  ">
       <div class="border-start border-secondary border-5 rounded-3 shadow bg-white  ">
    <h5 class="card-title ms-2" style="color: darkgrey;">TOTAL EARNINGS</h5>
    <h4 class="ms-3 mb-3 "><?php echo $beisum ?> LBP</h4> 
       </div>
       </div>
     </div>


     </div>  



 <!-- lebanon orders-->
 
<div class="row ms-4">
  <div class="col mt-5 ms-4 mb-5 border-start border-secondary border-5 rounded-3 shadow card2">
  <legend class="mt-2 ms-3"><h5>Total Orders Status :</h5></legend>
  <div>
      <p class="btn btn-primary mt-3 ms-3">NEW ORDERS</p> <p class="mt-3 ms-2 btn btn-outline-primary"><?php echo $new_orders ?></p>
  </div> 

  <div class="mt-2 ms-3">
      <p class="btn btn-success">Delivered Orders</p> <p class="ms-2 btn btn-outline-success"><?php echo $delivered_orders?></p>
  </div>    

  <div class="mt-2 ms-3">
      <p class="btn btn-danger">Canceled Orders</p> <p class="ms-2 btn btn-outline-danger"><?php echo $canceled_orders?></p>
  </div>  
  
  <div class="mt-2 ms-3">
      <p class="btn btn-warning">Delayed Orders</p> <p class="ms-2 btn btn-outline-warning"><?php echo $delayed_orders?></p>
  </div>    
    </div>

    
<div class="col mt-5 ms-5 card2">
  <img src="img/beirutmap.png" style="width:400; height:300px;">
</div>


                    </div>
                </div>

            </div>
        </div>
    </div>













    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>