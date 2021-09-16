<?php
//connect to the  MySQL database using PHP
$passw = "26qmFny3xHzktc6x";
$username = "slivingston02";

$db = "slivingston02";

$host = "slivingston02.lampt.eeecs.qub.ac.uk";

ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli($host, $username, $passw, $db);

if($conn->connect_error){
    echo "not connected".$conn->connect_error;
}else{
   // echo "connection to DB found.";
}


