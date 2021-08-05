<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["eu-cdbr-west-01.cleardb.com"];
$cleardb_username = $cleardb_url["b58663ddf59ae8"];
$cleardb_password = $cleardb_url["1077328e"];
$cleardb_db = substr($cleardb_url["heroku_b909e35f617b419"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>

//Code to connect with Heroku and PHP from https://www.doabledanny.com/Deploy-PHP-And-MySQL-to-Heroku