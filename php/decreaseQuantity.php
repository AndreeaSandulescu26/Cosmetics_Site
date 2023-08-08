<?php

	include 'connection.php';

    
function decreaseQuantity($con,$var_id,$var_q)
{
  echo $var_q;

  if($var_q > 1){
	  echo "Intra in blocul de cod cand cantitatea este mai mare decat 1";
	  $var_q = $var_q - 1;
	  $_SESSION['quantity'][$var_id] = $var_q;  // Se actualizeaza cantitatea curenta a produsului cu id-ul specificat
	  header("location:newCart.php");
  } else {
	array_splice($_SESSION['products'],$var_id,1);   // Se elimina produsul cu id-ul specificat din lista de produse
	array_splice($_SESSION['quantity'],$var_id,1);   // Se elimină cantitatea corespunzatoare produsului cu id-ul specificat din lista de produse din cadrul sesiunii.
	header("location:newCart.php");
  }

}
if (isset($_GET['id'])) {
  decreaseQuantity($_SESSION['products'],$_GET['id'],$_GET["quantity"]);
}

 ?>