<?php

	include 'connection.php';
	echo "increase quantity";
    
function increaseQuantity($con,$var_id,$var_q)
{
  $var_q = $var_q + 1;  // Cantitatea curenta este incrementata cu 1
  $_SESSION['quantity'][$var_id] = $var_q;  // Se actualizeaza cantitatea curenta a produsului cu id-ul specificat
  header("location:newCart.php");
}
if (isset($_GET['id'])) {
  increaseQuantity($_SESSION['products'],$_GET['id'],$_GET["quantity"]);
}

 ?>