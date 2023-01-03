<?php

include 'config.php';
error_reporting(0);

session_start();?>
<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css " rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

    <title>Delivery Company</title>
  </head>
  <body>




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

            </div>
          </div>
        </div>
      </nav>

      


      <!-- go back-->
      <div class="bg-warning" style="height: 40px;">
      <i class="fa fa-arrow-circle-left ms-2 mt-2 cursor" style="font-size:24px" onclick="location.href = 'admin.php';" ></i>
      </div>






      <!--  Filter-->
      <div class="container" style="width: 1185px;">
      <form method="POST">
        <div class= " border rounded shadow mt-4">
           
          
              <legend class="fs-5 mt-3 ms-3" style="text-align: center;"><b>Find order</b> </legend><br><br>

             
              <div class=" row align-items-center ">

              <div class=" col d-flex mb-5 me-5 ms-5" >

              <input name="fullname" class="form-control me-2" type="search" placeholder="Supplier Name" aria-label="Search">
              <div style = "position:relative; left:-80px;">
              <button name="s_search" class="btn btn-warning" type="submit" >Search</button>
              </div>
              <div style = "position:relative; left:4px;">
                <input name="invoice_nb" class="form-control me-2" type="search" placeholder="Invoice Number" aria-label="Search">
              </div>
                <button name="search" class="btn btn-warning" type="submit">Search</button>
              </div>


              </div>


        </div>
      </form>
      </div>

      <?php


 

 if (isset($_POST['search'])){
 
 
  $invoice_nb=$_POST['invoice_nb'];
    
  
  $sql = "SELECT * FROM invoice WHERE invoice_number='$invoice_nb'";
  $result=mysqli_query($conn,$sql);
  $row= mysqli_fetch_array($result);

  if ($result->num_rows >0) {
  
    
  $invoice_chrg=$row['invoice_charge']." ".$row['currency'];
  $invoice_nb=$row['invoice_number'];
  $delivery_chrg=$row['delivery_charge']." ".$row['currency1'];
  $note=$row['note'];
  $order=$row['order_status'];
  $date=$row['insert_date'];
  
  if($row['returnn']==0){
    $return="YES";
  }
  else{$return="NO";}

  if($row['breakable']==0){
    $breakable="YES";
  }
  else{$breakable="NO";}



  
// get customer info

  $sql="SELECT invoice.*, customer.* FROM invoice  INNER JOIN customer ON invoice_number= invoice_ID WHERE invoice_number= '$invoice_nb' ";
  $result=mysqli_query($conn,$sql);
  $row= mysqli_fetch_array($result);

  $full_name=$row['full_name1'];
  $primary_phone_number=$row['primary_phone_number'];
  $secondary_phone_number=$row['secondary_phone_number'];
 

//get address info

  $sql="SELECT invoice.*, address1.* FROM invoice  INNER JOIN address1 ON invoice_number= invoice_no WHERE invoice_number= '$invoice_nb' ";
  $result=mysqli_query($conn,$sql);
  $row= mysqli_fetch_array($result);

  $region=$row['region'];
  $city=$row['city'];
  $street=$row['street'];


  //get supplier info

  $sql="SELECT invoice.*, supplier.* FROM invoice  INNER JOIN supplier ON supplier_name= full_name WHERE invoice_number= '$invoice_nb' ";
  $result=mysqli_query($conn,$sql);
  $row= mysqli_fetch_array($result);

  $full_name1=$row['full_name'];
  $primary_phone_number1=$row['primary_phone_number'];
  $region1=$row['region']; 

?>




   <div style= " margin-left: 120px;">

      <div class="container mt-5">
     
        <div class="row">
          
        <!--fill invoice info-->

        <div class="col">
           <div class="card shadow " style="width: 18rem;">
           <div class="card-body">
            <h5 class="card-title bg-warning border rounded" style="text-align: center;">Invoice Info</h5>

            <div class="mt-3">
              
           
            <p>Invoice Number : <b><?php echo $invoice_nb; ?> </b></p>

            <p>Invoice Charge : <b><?php echo $invoice_chrg; ?> </b></p>

            
            <p>Delivery Charge : <b><?php echo $delivery_chrg; ?> </b></p>

            </div>



            </div>
            </div>

        </div>


       <!--fill address info-->

        <div class="col">
           <div class="card shadow" style="width: 18rem;">
           <div class="card-body">
            <h5 class="card-title bg-warning border rounded" style="text-align: center;">Address Info</h5>

            <div class="mt-3">
            <p>Region : <b><?php echo $region; ?> </b></p>
            <p>City : <b><?php echo $city; ?> </b></p>
            <p>Street : <b><?php echo $street; ?> </b></p>

            

            </div>



            </div>
            </div>

        </div>




        <!--fill customer info-->

        <div class="col">
           <div class="card shadow" style="width: 18rem;">
           <div class="card-body">
            <h5 class="card-title bg-warning border rounded" style="text-align: center;">Customer Info</h5>

            <div class="mt-3">
            <p>Full Name : <b><?php echo $full_name; ?> </b></p>
            <p>Primary Phone Number : <b><?php echo $primary_phone_number; ?> </b></p>
            <p>Secondary Phone Number : <b><?php echo $secondary_phone_number; ?> </b></p>

            

            </div>



            </div>
            </div>

        </div>


        <!--fill supplier info-->

        <div class="row mt-5">
        <div class="col">
           <div class="card shadow" style="width: 18rem;">
           <div class="card-body">
            <h5 class="card-title bg-warning border rounded" style="text-align: center;">Supplier Info</h5>

            <div class="mt-3">
            <p>Supplier Name : <b><?php echo $full_name1; ?> </b></p>
            <p>Primary Phone Number : <b><?php echo $primary_phone_number1; ?> </b></p>
            <p>Region : <b><?php echo $region1; ?> </b></p>

            

            </div>



            </div>
            </div>

        </div>


      <!--order info-->

        <div class="col">
           <div class="card shadow" style="width: 18rem;">
           <div class="card-body">
            <h5 class="card-title bg-warning border rounded" style="text-align: center;">Order Info</h5>

            <div class="mt-3">
            <p>Breakable : <b><?php echo $breakable; ?> </b></p>
            <p>With Return : <b><?php echo $return; ?> </b></p>
            <p>Note : <b><?php echo $note; ?> </b></p>

            

            </div>



            </div>
            </div>

        </div>


        <!--order status-->

        <div class="col">
           <div class="card shadow" style="width: 18rem;">
           <div class="card-body">
            <h5 class="card-title bg-warning border rounded" style="text-align: center;">Order Info</h5>

            <div class="mt-3">
            <p>Order Status : <b><?php echo $order ?> </b></p>
            <p>Created In : <b><?php echo $date; ?> </b></p>
            <p>Delivered In : <b><?php  ?> </b></p>
            

            

            </div>


            </div>
            </div>

        </div>


        </div>

        </div>
          
      
</div>     
      </div>




    </div>
       
    

      
      
    







 


   
	
    <?php  }  
else{echo '<script>alert("invalid invoice")</script>';}
}

if (isset($_POST['s_search'])){
  
  ?>
<br>
<div class="container" style="margin-left: 500px ;">
    <div class="row col-md-6 col-md-offset-2 custyle">
  <table class="table table-striped custab">
 
  
  
  
   <?php

$full_name=$_POST['fullname'];
  
$sql = "SELECT * FROM supplier WHERE full_name='$full_name'";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){



  
$full_name=$row['full_name'];?>
   
   
   <thead style="background-color: #FFD233 ;">

<th style="text-align:center ;" colspan="2">Supplier Name:
 <b><?php echo $full_name; ?></b><?php }
?>
</th>
</thead>
   
   <th style="text-align:center ;">Invoice Number:</th>
    <th style="text-align:center ;">Customer Name:</th> 
    <tr>
<td style="text-align:center ;">
<?php
// 1   2   1   2   1  2   1   3

$sql="SELECT supplier.*, invoice.* FROM supplier  INNER JOIN invoice ON full_name= supplier_name WHERE full_name= '$full_name' ";
  $result=mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result)){
    
  $invoice_nb=$row['invoice_number'];
  $suppl= $row['full_name'];?>
  

  

  <br> <a href="details.php?id= <?php echo $invoice_nb ;?> " style="color: black;"> <b><?php echo $invoice_nb; ?></b> </a> </br>
  


  <?php }

  
  ?>
</td>
<td style="text-align:center ;">
 <?php
  $sql="SELECT supplier.*, customer.* FROM supplier  INNER JOIN customer ON full_name= supp_name  WHERE  full_name= '$suppl' ";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){

$full_name1=$row['full_name1']; 
?>
 
 
 
 <br><b><?php echo $full_name1; ?></b> </br> 

 
<?php } ?>


</td>


</table>
    </div>
</div>
<?php } ?>
</body>

  </html>

