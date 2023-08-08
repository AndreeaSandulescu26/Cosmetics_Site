<?php

include 'connection.php';

if (!isset($_SESSION['products'])) {
   $_SESSION['products'] = array();
}
if (!isset($_SESSION['quantity'])) {
   $_SESSION['quantity'] = array();
}
    
function addToCart($con,$var_id,$var_q)
{
  echo $var_q;
  array_push($_SESSION['products'],$var_id);
  array_push($_SESSION["quantity"],$var_q);
  header("location:../index.php");
}
if (isset($_GET['id'])) {
  addToCart($_SESSION['products'],$_GET['id'],$_GET['quantity']);
}

 ?>
