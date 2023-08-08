<?php
function OpenCon()
 {
 $dbhost = "localhost";      //  adresa serverului de baze de date
 $dbuser = "root";          // numele utilizatorului
 $dbpass = "";             // parola
 $db = "SYSTEM.XEPDB1";    // numele bazei de date
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>