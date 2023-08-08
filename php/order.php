<?php

include 'connection.php';

$prods = $_SESSION["products"];
$quant = $_SESSION["quantity"];
$date = date('Y-m-d H:i:s');
$orderId = -1;
$total = $_SESSION['total'];

$sql = "INSERT INTO MYORDER (total, order_date) VALUES ('$total', to_date('$date', 'YYYY-MM-DD HH24:MI:SS'))";
$result=oci_parse($c,$sql);
oci_execute($result);

// Selecteaza ID-ul comenzii recent inserate
$new_sql = "SELECT MYORDER_ID FROM myorder WHERE order_date = to_date('$date', 'YYYY-MM-DD HH24:MI:SS')";
$new_result=oci_parse($c,$new_sql);
oci_execute($new_result);

// Verifica daca exista campuri in rezultat
if (oci_num_fields($new_result) > 0) {
    while (($row = oci_fetch_array($new_result, OCI_ASSOC)) != false) {
        $id = $row['MYORDER_ID'];
        $orderID = $row['MYORDER_ID'];
        
        // Parcurge lista de produse din sesiune si insereaza fiecare produs in tabelul ORDEREDITEM
        for ($i = 0; $i < sizeof($_SESSION['products']); $i++) {
            $new_sql_req = "SELECT * FROM PRODUCT WHERE product_id = '$prods[$i]'";
            $new2_result = oci_parse($c,$new_sql_req);
			      oci_execute($new2_result);
            
            // Verifica daca exista campuri in rezultat
            if (oci_num_fields($new2_result) > 0) {
                // Insereaza inregistrarea în tabelul ORDEREDITEM cu cantitatea, ID-ul produsului si ID-ul comenzii
                $insert_sql = "INSERT INTO ORDEREDITEM (quantity,productID,orderID) VALUES ('$quant[$i]','$prods[$i]','$id')";
                $insert_result=oci_parse($c,$insert_sql);
				        oci_execute($insert_result);
            }
        }
    }
} else  {
        echo "0 results";
        }

// Seteaza orderID-ul in sesiune cu ultimul MYORDER_ID
  $_SESSION['orderID'] = $id;

  // Actualizeaza cantitatea disponibila a fiecarui produs din tabelul PRODUCT
  for ($i = 0; $i < sizeof($prods); $i++) {
      $new_sql_reqx = "SELECT * FROM PRODUCT WHERE product_id = '$prods[$i]'";
      $new_resultx = oci_parse($c, $new_sql_reqx);
      oci_execute($new_resultx);

      // Verifica daca exista campuri in rezultat
      if (oci_num_fields($new_resultx) > 0) {
          while(($row = oci_fetch_array($new_resultx, OCI_ASSOC)) != false) {    
              $currentq = $row["TOTALQUANTITY"] - $quant[$i];
              $alter_sql = "UPDATE Product SET totalQuantity = $currentq WHERE product_id = '$prods[$i]'";
              $alter_result = oci_parse($c, $alter_sql);
              oci_execute($alter_result);
          }
        } else  {
                  echo "0 results";
                }
  }

header("location:orderDetails.php?orderID=".$orderID);
exit;
?>

