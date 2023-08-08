<?php

include 'connection.php';

if (isset($_SESSION['orderID'])) {       // Verificam dacă variabila de sesiune 'orderID' exista
    $orderID = $_SESSION['orderID'];

echo "Order ID from session: " . $_SESSION['orderID'];

$orderID = $_SESSION['orderID'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$adress = $_POST['adress'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = "INSERT INTO ORDERDETAILS (firstName, lastName, adress, city, email, phone, order_id) VALUES (:fname, :lname, :adress, :city, :email, :phone, :orderID)";
$stid = oci_parse($c, $sql);

// Atribuim valorile parametrilor
oci_bind_by_name($stid, ':fname', $fname);
oci_bind_by_name($stid, ':lname', $lname);
oci_bind_by_name($stid, ':adress', $adress);
oci_bind_by_name($stid, ':city', $city);
oci_bind_by_name($stid, ':email', $email);
oci_bind_by_name($stid, ':phone', $phone);
oci_bind_by_name($stid, ':orderID', $orderID, -1, SQLT_INT);

// Executam instructiunea SQL
if (oci_execute($stid)) {
    header("location: placedOrder.php");
    } else  {
            die("Error: Failed to insert delivery details into ORDERDETAILS table.");
            }
} else  {
echo "Order ID not found in session.";
exit;
}

?>