<?php
//Get Heroku ClearDB connection information

$cleardb_server = "eu-cdbr-west-01.cleardb.com";
$cleardb_username = "b58663ddf59ae8";
$cleardb_password = "1077328e";
$cleardb_db = "heroku_b909e35f617b419";
$active_group = 'default';
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

if($conn->connect_error){
    echo "not connected".$conn->connect_error;
}else{
   // echo "connection to DB found.";
}

?>

<!--Code to connect with Heroku and PHP from https://www.doabledanny.com/Deploy-PHP-And-MySQL-to-Heroku-->