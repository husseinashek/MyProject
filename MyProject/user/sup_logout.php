<?php 

session_start();
session_destroy();

header("Location: sup_login.php");

?>