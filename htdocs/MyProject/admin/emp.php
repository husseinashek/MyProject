<?php
 include 'config.php';
 ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>


         
         <?php
            $sql = "SELECT * FROM employee";
            $result = mysqli_query($conn, $sql);
          	if ($result->num_rows > 0) {
             }
             
         ?>

<!doctype html>

<html lang="en">
<head>
  <style>.custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }</style>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
    <button class="btn btn-primary btn-xs pull-right" name="add" onclick="window.location.href = 'add_emp.php';">Add new employee</button>
        <tr>
            <th>FullName</th>
            <th>UserName</th>
            <th>Password</th>
            <th>Role</th>
            <th>Salary</th>
            <th class="text-center">Action</th>

        </tr>
    </thead>
    <?php
                while($row = mysqli_fetch_assoc($result)){?>
            <tr>
            <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['role']; ?> </td>
                <td><?php echo $row['salary']; ?></td>
                <td class="text-center">  <button class='btn btn-info btn-xs' name="edit" ><span class="glyphicon glyphicon-edit"></span> Edit</button>  <button class="btn btn-danger btn-xs" name="delete"><span class="glyphicon glyphicon-remove"></span> Del</button></td>
             
              </tr>
            <?php }?>
    </table>
    </div>
</div>
</body>
</html>