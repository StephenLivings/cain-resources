<?php

header('Content-Type: application/json');

include("connect.php");

//$response = array();
/*
            // used in conjunction with structure index.php to retrieve iall information about schools
if(isset($_GET['allfields'])){

$response1 =array();

//$sql = "SELECT school_id, school_code,school_name, school_type, address_a, town, zip_code, phone, fax, first_land_not_eng_pc, eng_learner_pc, av_sat_reading, av_sat_writing, av_sat_maths, grades FROM school_details";
$sql = "SELECT * FROM cain_resourceitems";


$result1 = mysqli_query($conn,$sql);

if(!$result1){
    echo $conn->error;
}else{

    while ($row = mysqli_fetch_assoc($result1)){

        $response1[] = $row;
        
    }

    //print_r ($json_array);
echo json_encode($response1);
    //echo '<pre>';
//print_r ($json_array[]);
       //echo'';
}
}
*/


// posting information about a new record - author must have level 1 id

if($_SERVER["REQUEST_METHOD"]==="POST"){
    if(isset($_GET['addrecord'])){
        parse_str(file_get_contents("php://input"),$post_vars);
    $post1 = $_POST['resource_title'];
    $post2 = $_POST['resource_cain'];
    $post3 = $_POST['resource_teacher'];
    $post4 = $_POST['resource_url'];
    $post5 = $_POST['resource_source'];
   $post6 = $_POST['resource_sectionni'];
   //$post6 = 1;
    $post7 = $_POST['resource_sectionjunior'];
    $post8 = $_POST['resource_sectionleaving'];
    $post9 = $_POST['resource_subsectionni'];
    $post10 = $_POST['resource_subsectionleaving'];
    $post11 = $_POST['resource_in_irl'];
    $post12 = $_POST['resource_year'];
    $post13 = $_POST['resource_info'];


    //$post30 = $_POST['grades'];

    $sql = "INSERT INTO cain_resourceitems (`resource_title`,`resource_cain`,`resource_teacher`,`resource_url`,`resource_source`,`resource_sectionni`,`resource_sectionjunior`,`resource_sectionleaving`,`resource_subsectionni`,`resource_subsectionleaving`,`resource_in_irl`,`resource_year`,`resource_info`) VALUES ('$post1','$post2','$post3','$post4','$post5','$post6','$post7','$post8','$post9','$post10','$post11','$post12','$post13')";
    
    $result6 = mysqli_query($conn,$sql);
// if information has been successfully posted a page for user is displayed informing them of this
    if (!$result6){
        echo $conn->error;
    }else {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='https://rawgit.com/outboxcraft/beauter/master/beauter.min.css'>
            <link rel='stylesheet' href='../css/base.css'>
           <link rel='stylesheet'
            href='https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100'>
          
            <title>
               TRIMS</title>
        </head>
        <body>
        
            <ul class='topnav' id='myTopnav2' id='companyheaderadmin' style='background:#9003fc'>
                <li><a href='#' class='brand'>TRIMS ADMIN</a></li>
                <li><a href='schooldetails.php' class='active'>Enter School Details</a></li>
        
                <li> <a href='schoolstoedit.php'>Amend School Details</a></li>
        
                    <li> <a href='logout.php'>Log Out</a></li>
              
                  </div>
                </li>
        
                
                <li class='-icon'>
                  <a href='javascript:void(0);' onclick='topnav('myTopnav2')'>☰</a>
                </li>
              
              </ul>
        
        ";
        echo "<h3> Record added successfully</h3>";
        echo"<a href='schooldetails.php'>Go to school details</a>";
    }
 }
}

















    $conn->close();
        ?>
     