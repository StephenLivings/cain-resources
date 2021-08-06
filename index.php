<?php
//Get Heroku ClearDB connection information

$cleardb_server = "eu-cdbr-west-01.cleardb.com";
$cleardb_username = "b58663ddf59ae8";
$cleardb_password = "1077328e";
$cleardb_db = "heroku_b909e35f617b419";
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

if($conn->connect_error){
    echo "not connected".$conn->connect_error;
}else{
   // echo "connection to DB found.";
}

$query = "INSERT INTO `heroku_b909e35f617b419`.`cain_temp` (`temp_name`) VALUES ('Michael');";
echo $query;
$result=$conn->query($query);

?>

<h1>test to see if insert works</h1>





