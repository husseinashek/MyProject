<?php

 include 'config.php';
 error_reporting(0);

 session_start();




 if(isset($_POST['apply'])){

 
  


  $invoice0=$_POST['invoice'];

  $sql = "SELECT * FROM invoice WHERE invoice_number='$invoice0'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);
$invoice=$row['invoice_number'];
  
  if($invoice0!=$invoice){
 
    $error="<p> Not a valid invoice!</p>";}
  else{
  $order=$_POST['order'];
  $note=$_POST['note'];

  $sql1="UPDATE invoice SET order_status='$order' WHERE invoice_number= '$invoice0'";
  $result=mysqli_query($conn,$sql1);
  
  $sql2="UPDATE invoice SET note='$note' WHERE invoice_number= '$invoice0'";
  $result=mysqli_query($conn,$sql2);
 
  
  echo '<script>alert("successfuly updated")</script>';}
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

      *{
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

            </div>
          </div>
        </div>
      </nav>


      


      <!-- go back-->
      <div class="bg-warning" style="height: 40px;">
      <i class="fa fa-arrow-circle-left ms-2 mt-2 cursor" style="font-size:24px" onclick="location.href = 'admin.php';"></i>
      </div>




 




      
      <div class="container" style="width: 900px;  ">
      
            <form method="POST" >

            <div style= " margin-left: 120px; ">

<div class="container mt-5" style="width: 500px; height: 500px; ;">

  <div class="row" style="width: 500px; height: 500px; margin-left: -100px;">
    
    <div class="col">
    <div class="card shadow" style="width: 500px; height: 400px;background-color:whitesmoke">
    <div class="card-body" >
     <h5 class="card-title bg-warning border rounded" style="text-align: center;">Update Status</h5>
     <div class="mt-3" >
      

                <input name="invoice" class="form-control me-2" type="search" placeholder="Invoice Number" aria-label="Search">
                <input name="note" class="form-control me-2" type="text" placeholder=" Note" aria-label="Note" style="margin-top:10px;">
               
                <div><?php echo $error;?></div>
            

            <div class="row ">
                

            <div class="col">

              <div class="form-floating "style="margin-top:10px">
                <select name="order" class="form-select"  id="floatingSelectGrid" aria-label="Floating label select example">
                  <option selected></option>
                  <option value=NEW>New</option>
                  <option value=DELIVERED>Delivered</option>
                  <option value=DELAYED>Delayed</option>
                  <option value=CANCELED>Canceled</option>
                  <option value=ONGOING>Ongoing</option>
                  
                </select>
                <label for="floatingSelectGrid">Status</label>
              </div>
            </div>

            <div class="col">

            <button name="apply" type="submit" class="btn btn-warning" style="margin-top:175px; margin-left: 120px;">Apply</button>

             
     </div>
    </div>
  </div>
     </div>
    </div>
    </div>
  

            </div>





            </div>















            </form>








        

