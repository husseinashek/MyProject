<?php
 include 'config.php';
 session_start();








      $invoice_number=$_GET['id'];
      $sql="select * FROM invoice WHERE invoice_number= '$invoice_number'";
      $result=mysqli_query($conn,$sql);
      
    while($row = mysqli_fetch_assoc($result)){ 

        $invoice_chrg=$row['invoice_charge']." ".$row['currency'];
        $invoice_number=$row['invoice_number'];
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
          
    $sql="SELECT invoice.*, customer.* FROM invoice  INNER JOIN customer ON invoice_number= invoice_ID WHERE invoice_number= '$invoice_number' ";
  $result=mysqli_query($conn,$sql);
  $row= mysqli_fetch_array($result);

  $full_name=$row['full_name1'];
  $primary_phone_number=$row['primary_phone_number'];
  $secondary_phone_number=$row['secondary_phone_number'];
 

  $sql="SELECT invoice.*, address1.* FROM invoice  INNER JOIN address1 ON invoice_number= invoice_no WHERE invoice_number= '$invoice_number' ";
  $result=mysqli_query($conn,$sql);
  $row= mysqli_fetch_array($result);

  $region=$row['region'];
  $city=$row['city'];
  $street=$row['street'];

  
  $sql="SELECT invoice.*, supplier.* FROM invoice  INNER JOIN supplier ON supplier_name= full_name WHERE invoice_number= '$invoice_number' ";
  $result=mysqli_query($conn,$sql);
  $row= mysqli_fetch_array($result);

  $full_name1=$row['full_name'];
  $primary_phone_number1=$row['primary_phone_number'];
  $region1=$row['region'];
  
  
  


    }





?>


<html>

<head>
        <!-- Navbar -->

        <nav class="navbar navbar-light bg-warning shadow font1 ">
        <div class="container-fluid ">
          <a class="navbar-brand " href="#">Delivery Company MS</a>
           <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css " rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css " rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Delivery Company</title>
  </head>
        
            </div>
          </div>
        </div>
      </nav>

      


      <!-- go back-->
      <div class="bg-warning" style="height: 40px;">
      <i class="fa fa-arrow-circle-left ms-2 mt-2 cursor" style="font-size:24px" onclick="history.back()" ></i>
      </div>

             <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 
   <div style= " margin-left: 120px;">

      <div class="container mt-5">
     
        <div class="row">
          
        
        <div class="col">
           <div class="card shadow " style="width: 18rem;">
           <div class="card-body">
            <h5 class="card-title bg-warning border rounded" style="text-align: center;">Invoice Info</h5>

            <div class="mt-3">
            <p>Invoice Number : <b><?php echo $invoice_number; ?> </b></p>

            <p>Invoice Charge : <b><?php echo $invoice_chrg; ?> </b></p>

            
            <p>Delivery Charge : <b><?php echo $delivery_chrg; ?> </b></p>

            </div>



            </div>
            </div>

        </div>



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
       
    </html>
 

