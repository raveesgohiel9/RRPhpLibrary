<?php

//Local host details
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ams_db";
*/

//Live server details
/*
$servername = "localhost";
$username = "ridingro_dharti";
$password = "T9870853326";
$dbname = "ridingro_ams_db";
*/

//Ace Success server details
$servername = "localhost";
$username = "acesucce_crm";
$password = "0g?diC0,uTOT";
$dbname = "acesucce_ams_admin";



// Create connection
//$dbh = new mysqli($servername, $username, $password);

//$dbq = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//else echo "Connected";
// Check connection
//if ($dbh->connect_error) {
//    die("Connection failed: " . $dbh->connect_error);
//}
 
?>