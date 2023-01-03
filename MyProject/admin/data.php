<?php

 include 'config.php';
  error_reporting(0);

  session_start();
  
  
  if (isset($_POST['submit'])){ 
    
    $full_name= $_POST['full_name'];
    $primary_phone_nb=$_POST['primary_phone_nb'];
    $secondary_Phone_nb=$_POST['secondary_phone_nb'];
    $region=$_POST['region'];
    $city=$_POST['city'];
    $region=$_POST['region'];
    $street=$_POST['street'];
    $invoice_nb= $_POST['invoice_nb'];
    $invoice_chrg= $_POST['invoice_chrg'];
    $currency= $_POST['currency'];
    $delivery_charge=$_POST['delivery_charge'];
    $currency1= $_POST['currency1'];
    $note=$_POST['note'];
    $breakable=$_POST['breakable'];
    $supplier=$_POST['supplier'];
    $return=$_POST['returnn'];
    $date=date("Y/m/d");
  
    $sql0="Select * FROM invoice WHERE invoice_number='$invoice_nb'";
    $result=mysqli_query($conn,$sql0); 
    if ($result->num_rows > 0) {echo "<script>alert('Woops! Invoice Number Already Exists.')</script>";
    }
    
    else{

    $sql3="SELECT * FROM supplier WHERE full_name= '$supplier' " ;
    $result=mysqli_query($conn,$sql3); 
    if ($result->num_rows > 0) {
      $sql2="INSERT INTO invoice (invoice_number,invoice_charge,currency,delivery_charge,currency1,note,breakable,returnn,order_status,insert_date,supplier_name,invoice_region) VALUES ('$invoice_nb','$invoice_chrg','$currency','$delivery_charge','$currency1','$note','$breakable','$return','NEW','$date','$supplier','$region')";
      $result=mysqli_query($conn,$sql2);}
  else die("<script>alert('unknown supplier.')</script>");
   
    
    
    
    $sql="INSERT INTO customer(full_name1,primary_phone_number,secondary_phone_number,invoice_ID,supp_name) VALUES ('$full_name','$primary_phone_nb','$secondary_Phone_nb','$invoice_nb','$supplier')";
    $result = mysqli_query($conn,$sql);


    $sql1="INSERT INTO address1(region,city,street,invoice_no) VALUES ('$region','$city','$street','$invoice_nb')";
    $result = mysqli_query($conn, $sql1);

    

    header('location:data.php');

    
 

  

    }
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

            </div>
          </div>
        </div>
      </nav>

      


      <!-- go back-->
      <div class="bg-warning" style="height: 40px;">
      <i class="fa fa-arrow-circle-left ms-2 mt-2 cursor" style="font-size:24px"  onclick="history.back()"></i>
      </div>



    <p>
      <button class="btn btn-warning shadow mt-4 ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Add New Order
      </button>
      
    </p>
    
    <!-- Add new order-->

    <div class="collapse container" id="collapseExample">
    <div class="mt-5 mb-5 card card-body border border-dark">  

 <form method="POST">
       <div class="row">


      <!--customer info-->
        <div   class="col">

        <div class="mt-1 shadow border rounded">
          
          <legend class="mt-2 ms-3">Customer Info</legend>

           <div class="form-floating text-muted ms-3 me-3">
             <input  name="full_name" type="text" value="<?php echo $_POST['full_name'];  ?>" class=" form-control border-top-0 border-end-0 border-start-0" id="floatingInput" placeholder="Full Name" >
             <label  for="floatingInput">Full Name</label>
           </div>

           <div class="form-floating text-muted ms-3 me-3 mt-3">
             <input  name="primary_phone_nb" type="tel" value="<?php echo $_POST['primary_phone_nb']; ?>" class="form-control border-top-0 border-end-0 border-start-0 " id="floatingInput" placeholder="Primary Phone Number">
             <label for="floatingInput">Primary Phone Number</label>
           </div>

           <div class="form-floating text-muted ms-3 me-3 mb-4 mt-3">
             <input name="secondary_phone_nb" type="text" value="<?php echo $_POST['secondary_Phone_nb']; ?>" class="form-control border-top-0 border-end-0 border-start-0" id="floatingInput" placeholder="Secondary Phone Number">
             <label for="floatingInput">Secondary Phone Number</label>
           </div>
          
           </div>
           </div>



            <!-- adress info-->
           <div class="col">
            <div class="mt-1 shadow border rounded">
              <legend class="mt-2 ms-3">Address Info </legend>
              
              <div class="form-floating ms-3 me-3">
                <select name="region" class="form-select border-top-0 border-end-0 border-start-0" id="floatingSelectGrid" aria-label="Floating label select example">
                  <option selected></option>
                  <option value="beirut">Beirut</option>
                  <option value="north">North</option>
                  <option value="south">South</option>
                  <option value="bekaa">Bekaa</option>
                </select>
                <label for="floatingSelectGrid">Region</label>
              </div>
    
               <div class="form-floating text-muted ms-3 me-3 mt-3">
                 <input  type="text" name="city" class="form-control border-top-0 border-end-0 border-start-0 " id="floatingInput" placeholder="City">
                 <label for="floatingInput">City</label>
               </div>
    
               <div class="form-floating text-muted ms-3 me-3 mb-4 mt-3">
                 <input  type="text"  name="street" class="form-control border-top-0 border-end-0 border-start-0" id="floatingInput" placeholder="Street">
                 <label for="floatingInput">Street</label>
               </div>
            </div>
              </div>
           </div>


          
          <!--invoice info-->
          <div class="mt-3 shadow border rounded">
          <legend class="mt-2 ms-3">Invoice Info</legend>

            <div class="row">
              
              <!--invoice nb-->
              <div class="col">
              
                <div class="form-floating text-muted ms-3 me-3">
                  <input  type="number" name="invoice_nb" class=" form-control border-top-0 border-end-0 border-start-0" id="floatingInput" placeholder="Invoice Number">
                  <label  for="floatingInput">Invoice Number</label>
                </div>
              </div>
          
              

              
              <!-- invoice chrg-->
              <div class="col">
                <div class="form-floating text-muted ms-3 me-3">
                  <input  type="number"   name="invoice_chrg" class="form-control border-top-0 border-end-0 border-start-0" id="floatingInput" placeholder="Invoice Charge" value="0">
                  <label  for="floatingInput">Invoice Charge</label>
                </div>
              </div>

              <!-- currency-->
              <div class="col">

              <div class="form-floating ms-3 me-3">
                <select  name="currency" class="form-select" style="width: 150px;" id="floatingSelectGrid" aria-label="Floating label select example">
                  
                  <option selected value="LBP">LBP</option>
                  <option value="USD">USD</option>
                  
                </select>
                <label for="floatingSelectGrid">Currency</label>
              </div>
            </div>

            </div>



        <!-- delivery charge-->
        <div class="row mb-4">

        <div class="col">
                <div class="form-floating text-muted ms-3 me-3">
                  <input  value="0" type="text" name="delivery_charge" class="form-control border-top-0 border-end-0 border-start-0 mt-3" id="floatingInput" placeholder="Delivery Charge">
                  <label  for="floatingInput">Delivery Charge</label>
                </div>
              </div>
        


        <!-- currency-->
        <div class="col">

             <div class="form-floating ms-3 me-3">
                <select  style="width:120px" name="currency1" class="form-select  mt-3" id="floatingSelectGrid" aria-label="Floating label select example">
                  
                  <option selected value="LBP">LBP</option>
                  <option value="USD">USD</option>
                  
                </select>
                <label for="floatingSelectGrid">Currency</label>
              </div>
            </div>



            <div class="col ">
                <div class="form-floating text-muted ms-3 me-3">
                  <input  type="text" name="supplier" class="form-control border-top-0 border-end-0 border-start-0 mt-3 me-5" id="floatingInput" placeholder="Supplier">
                  <label  for="floatingInput">Supplier</label>
                </div>
              </div>


        <!-- Note-->
        <div class="col ">
                <div class="form-floating text-muted ms-3 me-3">
                  <input type="text" name="note" class="form-control border-top-0 border-end-0 border-start-0 mt-3 me-5" id="floatingInput" placeholder="Note">
                  <label  for="floatingInput">Note</label>
                </div>
              </div>

     




     <div class="row">
            <div class="col">
              <div class="form-check mt-4 ms-3 mb-3">
                <input  name="breakable" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Breakable
                </label>
              </div>
            </div>


            <div class="col ms-4">
              <div class="form-check ms-3 mt-4">
                <input  name="return" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Return
                </label>
              </div>
            </div>

          </div>
          </div>

          
          </div>
          <!--submit-->
          <div class=" mt-5 mb-3" style="text-align: center;">
          <button class="btn btn-warning" type="submit" name="submit">Submit</button>
          </div>
       
      












 </form>
          </div>


           






       </div>
    






















    </div>
    </div>

   


