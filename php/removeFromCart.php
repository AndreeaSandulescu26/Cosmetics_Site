<?php

include 'connection.php';

function removeToCart($con,$var_id)
  {
    // Elimina produsul si cantitatea corespunzatoare din sesiune
    array_splice($_SESSION['products'],$var_id,1);
    array_splice($_SESSION['quantity'],$var_id,1);
    header("location:newCart.php");
  }

if (isset($_GET['id'])) {
    removeToCart($_SESSION['products'],$_GET['id']);
    }

?>
