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
      </div>

            <head> <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css " rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
           <br>
<div class="container" style="margin-left: 500px ; ">
    <div class="row col-md-6 col-md-offset-2 custyle">
  <table class="table table-striped custab" border="1">
 
  
  
   
   
   <thead style="background-color: #FFD233 ;">

<th style="text-align:center ;" colspan="2">Supplier Name:
 <b><?php echo $full_name; ?></b><?php }
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

