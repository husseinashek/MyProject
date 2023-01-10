<?php 

include 'config.php';
error_reporting(0);

session_start();



//December
$sql1="SELECT * FROM invoice WHERE insert_date BETWEEN '2022-12-01' AND '2022-12-31' ";
$result1=mysqli_query($conn,$sql1);
$dec_orders=mysqli_num_rows($result1);

$sql='SELECT SUM(delivery_charge) AS totalsum FROM invoice WHERE order_status="DELIVERED"';
$result=mysqli_query($conn,$sql);
$total=mysqli_fetch_assoc($result);
$sum=$total['totalsum'];



//January
$sql1="SELECT * FROM invoice WHERE insert_date BETWEEN '2023-01-01' AND '2023-01-31' ";
$result1=mysqli_query($conn,$sql1);
$jan_orders=mysqli_num_rows($result1);

$sql='SELECT SUM(delivery_charge) AS totalsum FROM invoice WHERE order_status="DELIVERED"';
$result=mysqli_query($conn,$sql);
$total=mysqli_fetch_assoc($result);
$sum=$total['totalsum'];    


//November
$sql1="SELECT * FROM invoice WHERE insert_date BETWEEN '2022-11-01' AND '2022-11-30' ";
$result1=mysqli_query($conn,$sql1);
$nov_orders=mysqli_num_rows($result1);

$sql='SELECT SUM(delivery_charge) AS totalsum FROM invoice WHERE order_status="DELIVERED"';
$result=mysqli_query($conn,$sql);
$total=mysqli_fetch_assoc($result);
$sum=$total['totalsum'];


//October
$sql1="SELECT * FROM invoice WHERE insert_date BETWEEN '2022-10-01' AND '2022-10-31' ";
$result1=mysqli_query($conn,$sql1);
$oct_orders=mysqli_num_rows($result1);

$sql='SELECT SUM(delivery_charge) AS totalsum FROM invoice WHERE order_status="DELIVERED"';
$result=mysqli_query($conn,$sql);
$total=mysqli_fetch_assoc($result);
$sum=$total['totalsum'];


//Beirut
$sql4="SELECT * FROM invoice WHERE invoice_region='beirut' ";
$result4=mysqli_query($conn,$sql4);
$bei_orders=mysqli_num_rows($result4);

//Bekaa
$sql4="SELECT * FROM invoice WHERE invoice_region='bekaa' ";
$result4=mysqli_query($conn,$sql4);
$bek_orders=mysqli_num_rows($result4);

//North
$sql4="SELECT * FROM invoice WHERE invoice_region='north' ";
$result4=mysqli_query($conn,$sql4);
$nor_orders=mysqli_num_rows($result4);

//South
$sql4="SELECT * FROM invoice WHERE invoice_region='south' ";
$result4=mysqli_query($conn,$sql4);
$sou_orders=mysqli_num_rows($result4);

//Mount
$sql4="SELECT * FROM invoice WHERE invoice_region='mount' ";
$result4=mysqli_query($conn,$sql4);
$mou_orders=mysqli_num_rows($result4);



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


    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

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

  <body>

  <!--Navbar-->

  <nav class="navbar navbar-expand-lg navbar-light bg-warning ">
  <a class="navbar-brand ms-2" href="dashboard.php">Home</a>
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
            Regions
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="beirut.php">Beirut</a></li>
            <li><a class="dropdown-item" href="south.php">South </a></li>
            <li><a class="dropdown-item" href="north.php">North </a></li>
            <li><a class="dropdown-item" href="bekaa.php">Bekaa </a></li>
            
          </ul>
        </li>
     
      </ul>
     
    </div>
  </div>
</nav>




<div class="row justify-content-around">

  <div class="col-6 ms-3 mt-5 shadow">
    <div id="donutchart" style="width: 600px; height: 400px; "></div>
  </div>
  <div class="col-5 ms-1 mt-5 shadow">
  <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
  </div>

</div>  

<div class="row justify-content-around">
<div class="col-5 ms-3 mt-5 shadow">
<div id="curve_chart" style="width: 700px; height: 400px"></div>
  </div>






</div>















<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>







<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Orders", { role: "style" } ],
        ["Jan", <?php echo $jan_orders?>, "#b87333"],
        ["Dec ", <?php echo $dec_orders?>, "silver"],
        ["Nov", <?php echo $nov_orders?>, "gold"],
        ["Oct", <?php echo $oct_orders?>, "color: #e5e4e2"]
        
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Total orders",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

  














<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Beirut', <?php echo $bei_orders?>],
          ['South',<?php echo $sou_orders?>],
          ['North',<?php echo $nor_orders?>],
          ['Bekaa',<?php echo $bek_orders?>],
          ['Mount Leb',<?php echo $mou_orders?>]
        ]);

        var options = {
          title: '',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
        





<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>