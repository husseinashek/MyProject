<?php
 include 'config.php';
 session_start();


      $username=$_SESSION['username'];
  $sql="select * FROM supplier WHERE username= '$username'";
  $result=mysqli_query($conn,$sql);
  
while($row = mysqli_fetch_assoc($result)){
   $full_name= $row['full_name'];?>
         


         <html>
            <head>

            <!-- Navbar -->

    <nav class="navbar navbar-light bg-warning shadow font1 ">
        <div class="container-fluid ">
          <a class="navbar-brand " href="#">Delivery Company MS</a>
        
        
            </div>
          </div>
        </div>
      </nav>

      


      <!-- go back-->
      <div class="bg-warning" style="height: 40px;">
      <i class="fa fa-arrow-circle-left ms-2 mt-2 cursor" style="font-size:24px" onclick="history.back()" ></i>
      <a href="sup_logout.php"  style="color:black"> <i  class="fa fa-sign-out cursor position-absolute top-0 end-0 mt-2 me-3 " style="font-size:28px" ></i>  </a>
      </div>

            <head> <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css " rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
           <br>
<?php

//leabanon
$sql1="SELECT * FROM invoice WHERE supplier_name='$full_name'";
$result1=mysqli_query($conn,$sql1);
$leb_orders=mysqli_num_rows($result1);

$sql="SELECT SUM(delivery_charge) AS totalsum FROM invoice WHERE order_status='DELIVERED' AND supplier_name='$full_name'";
$result=mysqli_query($conn,$sql);
$total=mysqli_fetch_assoc($result);
$sum=$total['totalsum'];

  //delivered
  $sql="SELECT * FROM invoice WHERE  order_status='DELIVERED' AND supplier_name='$full_name' ";
  $result=mysqli_query($conn,$sql);
  $delivered_orders=mysqli_num_rows($result);
  
  //NEW
  $sql="SELECT * FROM invoice WHERE  order_status='NEW' AND supplier_name='$full_name' ";
  $result=mysqli_query($conn,$sql);
  $new_orders=mysqli_num_rows($result);
  
  //canceled
  $sql="SELECT * FROM invoice WHERE  order_status='CANCELED' AND supplier_name='$full_name' ";
  $result=mysqli_query($conn,$sql);
  $canceled_orders=mysqli_num_rows($result);
  
  //delayed
  $sql="SELECT * FROM invoice WHERE  order_status='DELAYED' AND supplier_name='$full_name' ";
  $result=mysqli_query($conn,$sql);
  $delayed_orders=mysqli_num_rows($result);
  
  //ongoing
  $sql="SELECT * FROM invoice WHERE  order_status='ONGOING' AND supplier_name='$full_name' ";
  $result=mysqli_query($conn,$sql);
  $ongoing_orders=mysqli_num_rows($result);
     ?>
           
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
  <a href="delivered.php" style="color: white;">
    <h6 class="mt-3 ms-2" style="color: green;text-align:center">DELIVERED ORDERS</h6>
    <h3 class="mt-3 mb-3" style="text-align: center;color:green"><?php echo $delivered_orders?></h3>
  </a>
  </div>

  <div class="col-2  shadow mt-5" style="background-color: white;">
  <a href="canceled.php" style="color: white;">
    <h6 class="mt-3 ms-2" style="color: red;text-align:center">CANCELED ORDERS</h6>
    <h3 class="mt-3 mb-3" style="text-align: center; color:red"><?php echo $canceled_orders?></h3>
  </a>
  </div>

  <div class="col-2  shadow mt-5" style="background-color: white;">
  <a href="new.php" style="color: white;">
    <h6 class="mt-3 " style="color: blue; text-align:center">NEW ORDERS</h6>
    <h3 class="mt-3 mb-3" style="text-align: center; color:blue"><?php echo $new_orders?></h3>
  </a>
  </div>

  <div class="col-2  shadow mt-5" style="background-color: white;">
  <a href="delayed.php" style="color: white;">
    <h6 class="mt-3 ms-2" style="color: purple;text-align:center">DELAYED ORDERS</h6>
    <h3 class="mt-3 mb-3" style="text-align: center;color:purple"><?php echo $delayed_orders?></h3>
  </a>
  </div>

  <div class="col-2  shadow mt-5" style="background-color: white;">
  <a href="ongoing.php" style="color: white;">
    <h6 class="mt-3 ms-2" style="color: purple;text-align:center">ONGOING ORDERS</h6>
    <h3 class="mt-3 mb-3" style="text-align: center;color:purple"><?php echo $ongoing_orders?></h3>
  </a>
  </div>





</div>

<br>


<h2 style="text-align: center;"> For More Info :  </h2>

<br>
<br>
<div class="container" style="margin-left: 500px ; ">
    <div class="row col-md-6 col-md-offset-2 custyle">
  <table class="table table-striped custab" border="1">
 
  
  
   
   
   <thead style="background-color: #FFD233 ;">

<th style="text-align:center ;" colspan="2">Supplier Name:
 <b><?php echo $full_name; ?></b><?php 
?>
</th>
</thead>
   
   <th style="text-align:center ;">Invoice Number:</th>
    <th style="text-align:center ;">Customer Name: </th> 

    <tr>
<td style="text-align:center ;">

<?php



// 1   2   1   2   1  2   1   3
$sql="SELECT supplier.*, invoice.* FROM supplier  INNER JOIN invoice ON full_name= supplier_name WHERE full_name= '$full_name' ";
  $result=mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result)){
    
  $invoice_nb=$row['invoice_number'];
  


  ?>
  
  
  

<br> <a href="details.php?id= <?php echo $invoice_nb ;?> " style="color: black;"> <b><?php echo $invoice_nb; ?></b> </a> </br>
  
    

  <?php }
}
  
  ?>
</td>
<td style="text-align:center ;">
 <?php
  $sql="SELECT supplier.*, customer.* FROM supplier  INNER JOIN customer ON full_name= supp_name  WHERE  full_name= '$full_name' ";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){

$full_name1=$row['full_name1']; 
?>
 
 
 
 <br><b><?php echo $full_name1 ; ?></b> </br> 

 
<?php } ?>


</td>

 



</table>
    </div>
</div>

</body>

  </html>

