<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "covaid_store";
 if ($conn = new mysqli($dbhost, $dbuser, $dbpass,$db)){ 
     
     echo 'connection succesful';
     
 }else {
     
     echo 'not connected';
     $conn -> error;}
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>