<?php
//Get Heroku ClearDB connection information

$cleardb_server = "slivingston02.lampt.eeecs.qub.ac.uk";
$cleardb_username = "slivingston02";
$cleardb_password = "26qmFny3xHzktc6x";
$cleardb_db = "slivingston02";
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





