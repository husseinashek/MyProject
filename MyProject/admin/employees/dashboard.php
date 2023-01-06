<?php 

include 'config.php';
error_reporting(0);

session_start();

//leabanon
$sql1='SELECT * FROM invoice';
$result1=mysqli_query($conn,$sql1);
$leb_orders=mysqli_num_rows($result1);

$sql='SELECT SUM(delivery_charge) AS totalsum FROM invoice WHERE order_status="DELIVERED"';
$result=mysqli_query($conn,$sql);
$total=mysqli_fetch_assoc($result);
$sum=$total['totalsum'];


//delivered
$sql="SELECT * FROM invoice WHERE  order_status='DELIVERED' ";
$result=mysqli_query($conn,$sql);
$delivered_orders=mysqli_num_rows($result);

//NEW
$sql="SELECT * FROM invoice WHERE  order_status='NEW' ";
$result=mysqli_query($conn,$sql);
$new_orders=mysqli_num_rows($result);

//canceled
$sql="SELECT * FROM invoice WHERE  order_status='CANCELED' ";
$result=mysqli_query($conn,$sql);
$canceled_orders=mysqli_num_rows($result);

//delayed
$sql="SELECT * FROM invoice WHERE  order_status='DELAYED' ";
$result=mysqli_query($conn,$sql);
$delayed_orders=mysqli_num_rows($result);

//ongoing
$sql="SELECT * FROM invoice WHERE  order_status='ONGOING' ";
$result=mysqli_query($conn,$sql);
$ongoing_orders=mysqli_num_rows($result);






if(isset($_GET['from_date']) && isset($_GET['to_date']))
{
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

      $sql1="SELECT * FROM invoice WHERE insert_date BETWEEN '$from_date' AND '$to_date'";
      $result1=mysqli_query($conn,$sql1);
      $leb_orders=mysqli_num_rows($result1);

      $sql="SELECT SUM(delivery_charge) AS totalsum FROM invoice WHERE order_status='DELIVERED' AND insert_date BETWEEN '$from_date' AND '$to_date'";
      $result=mysqli_query($conn,$sql);
      $total=mysqli_fetch_assoc($result);
      $sum=$total['totalsum'];

      //delivered
      $sql="SELECT * FROM invoice WHERE order_status='DELIVERED' AND insert_date BETWEEN '$from_date' AND '$to_date' ";
      $result=mysqli_query($conn,$sql);
      $delivered_orders=mysqli_num_rows($result);

      //NEW
      $sql="SELECT * FROM invoice WHERE  order_status='NEW' AND insert_date BETWEEN '$from_date' AND '$to_date'";
      $result=mysqli_query($conn,$sql);
      $new_orders=mysqli_num_rows($result);

      //canceled
      $sql="SELECT * FROM invoice WHERE  order_status='CANCELED' AND insert_date BETWEEN '$from_date' AND '$to_date' ";
      $result=mysqli_query($conn,$sql);
      $canceled_orders=mysqli_num_rows($result);

      //delayed
      $sql="SELECT * FROM invoice WHERE  order_status='DELAYED' AND insert_date BETWEEN '$from_date' AND '$to_date' ";
      $result=mysqli_query($conn,$sql);
      $delayed_orders=mysqli_num_rows($result);

     //ongoing
     $sql="SELECT * FROM invoice WHERE  order_status='ONGOING' AND insert_date BETWEEN '$from_date' AND '$to_date' ";
     $result=mysqli_query($conn,$sql);
     $ongoing_orders=mysqli_num_rows($result);



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
 
    <div class="container-fluid  justify-content-center">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active  " aria-current="page" href="/MyProject/admin/employees/dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active " href="/MyProject/admin/graph.php">Graphs</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Regions
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/MyProject/admin/beirut.php">Beirut</a></li>
            <li><a class="dropdown-item" href="/MyProject/admin/south.php">South </a></li>
            <li><a class="dropdown-item" href="/MyProject/admin/north.php">North </a></li>
            <li><a class="dropdown-item" href="/MyProject/admin/bekaa.php">Bekaa </a></li>
            
          </ul>
        </li>
     
      </ul>
      <a href="logout.php"  style="color:black"> <i  class="fa fa-sign-out cursor position-absolute top-0 end-0 mt-2 me-3 " style="font-size:28px" ></i>  </a>
    </div>
  </div>
</nav>


<!-- filter-->
<div class="container">
 <div class="row mt-4 justify-content-center">
   <div class="col-11">
   <div class="accordion " id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Filter
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card  shadow-sm">
                    
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
      </div>
    </div>
  </div>
  
    </div>
  </div>
</div>
</div>
   </div>
  </div>


<div class="row justify-content-evenly  mt-5">
  <div class="col-3  shadow" style="background-color: white;">
    <h6 class="mt-3 ms-3" style="color: darkgrey;">TOTAL ORDERS</h6>
    <h3 class="mt-3 mb-3 ms-3"><?php echo $leb_orders?></h3>
  </div>


  <div class="col-3  shadow ms-5" style="background-color: white;">
    <h6 class="mt-3 ms-3" style="color: darkgrey;">TOTAL EARNINGS</h6>
    <h3 class="mt-3 mb-3 ms-3"><?php echo $sum?> LBP   </h3>
  </div>

</div>



<div class="row justify-content-evenly  mt-5">
  <div class="col-2  shadow mt-5" style="background-color: white;">
    <h6 class="mt-3 ms-2" style="color: green;text-align:center">DELIVERED ORDERS</h6>
    <h3 class="mt-3 mb-3" style="text-align: center;color:green"><?php echo $delivered_orders?></h3>
  </div>

  <div class="col-2  shadow mt-5" style="background-color: white;">
    <h6 class="mt-3 ms-2" style="color: red;text-align:center">CANCELED ORDERS</h6>
    <h3 class="mt-3 mb-3" style="text-align: center; color:red"><?php echo $canceled_orders?></h3>
  </div>

  <div class="col-2  shadow mt-5" style="background-color: white;">
    <h6 class="mt-3 " style="color: blue; text-align:center">NEW ORDERS</h6>
    <h3 class="mt-3 mb-3" style="text-align: center; color:blue"><?php echo $new_orders?></h3>
  </div>

  <div class="col-2  shadow mt-5" style="background-color: white;">
    <h6 class="mt-3 ms-2" style="color: purple;text-align:center">DELAYED ORDERS</h6>
    <h3 class="mt-3 mb-3" style="text-align: center;color:purple"><?php echo $delayed_orders?></h3>
  </div>

  <div class="col-2  shadow mt-5" style="background-color: white;">
    <h6 class="mt-3 ms-2" style="color: purple;text-align:center">ONGOING ORDERS</h6>
    <h3 class="mt-3 mb-3" style="text-align: center;color:purple"><?php echo $ongoing_orders?></h3>
  </div>















</div>
  </body>



   
  



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>