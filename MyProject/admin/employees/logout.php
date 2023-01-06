<?php 

session_start();
session_destroy();

header("Location: /MyProject/admin/main.php");

?>