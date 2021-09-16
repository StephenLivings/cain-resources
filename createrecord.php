<?php

session_start();
/*if (!empty($_POST['resource_cain'])) {
	
	$cain= $_POST['resource_cain'];
	$cain = filter_var($cain, FILTER_VALIDATE_INT);

	if ($cain === false) {
		exit('Invalid Value for Cain Resource');
	}

}*/


// check if resource section and subsections match
// achieved by checking the section and if the subsection is not a march for the section genrate the error message
// first check NI GCSE Sections with subsections
if (($_POST['resource_sectionni'] == "1" && ($_POST['resource_subsectionni'] == "101" || $_POST['resource_subsectionni'] == "102" || $_POST['resource_subsectionni'] == "103")) ||
($_POST['resource_sectionni'] == "2" && ($_POST['resource_subsectionni'] == "201" || $_POST['resource_subsectionni'] == "202" || $_POST['resource_subsectionni'] == "203" || $_POST['resource_subsectionni'] == "204" || $_POST['resource_subsectionni'] == "205" || $_POST['resource_subsectionni'] == "206")) ||
($_POST['resource_sectionni'] == "3" && ($_POST['resource_subsectionni'] == "301" || $_POST['resource_subsectionni'] == "302" || $_POST['resource_subsectionni'] == "303" || $_POST['resource_subsectionni'] == "304" || $_POST['resource_subsectionni'] == "305" || $_POST['resource_subsectionni'] == "306" || $_POST['resource_subsectionni'] == "307")) ||
($_POST['resource_sectionni'] == "4" && ($_POST['resource_subsectionni'] == "401" || $_POST['resource_subsectionni'] == "402" || $_POST['resource_subsectionni'] == "403" )) ||
($_POST['resource_sectionni'] == "5" && ($_POST['resource_subsectionni'] == "501" || $_POST['resource_subsectionni'] == "502" || $_POST['resource_subsectionni'] == "503" )) ||
($_POST['resource_sectionni'] == "6" && ($_POST['resource_subsectionni'] == "601" || $_POST['resource_subsectionni'] == "602" || $_POST['resource_subsectionni'] == "603" )) ||
($_POST['resource_sectionni'] == "7" && ($_POST['resource_subsectionni'] == "701" || $_POST['resource_subsectionni'] == "702" || $_POST['resource_subsectionni'] == "703" )) ||
($_POST['resource_sectionni'] == "8" && ($_POST['resource_subsectionni'] == "801" || $_POST['resource_subsectionni'] == "802" )) ||
($_POST['resource_sectionni'] == "0" && ($_POST['resource_subsectionni'] == "0" ))) {

    if 
    //then check Leaving Cert Sections with subsections
    (($_POST['resource_sectionleaving'] == "1" && ($_POST['resource_subsectionleaving'] == "101" || $_POST['resource_subsectionleaving'] == "102" || $_POST['resource_subsectionleaving'] == "103" || $_POST['resource_subsectionleaving'] == "104" || $_POST['resource_subsectionleaving'] == "105" || $_POST['resource_subsectionleaving'] == "106" || $_POST['resource_subsectionleaving'] == "107"|| $_POST['resource_subsectionleaving'] == "108" || $_POST['resource_subsectionleaving'] == "109" || $_POST['resource_subsectionleaving'] == "110")) ||
    ($_POST['resource_sectionleaving'] == "2" && ($_POST['resource_subsectionleaving'] == "201" || $_POST['resource_subsectionleaving'] == "202")) ||
    ($_POST['resource_sectionleaving'] == "3" && ($_POST['resource_subsectionleaving'] == "301" || $_POST['resource_subsectionleaving'] == "302" || $_POST['resource_subsectionleaving'] == "303" || $_POST['resource_subsectionni'] == "304")) ||
    ($_POST['resource_sectionleaving'] == "4" && ($_POST['resource_subsectionleaving'] == "401" )) ||
    ($_POST['resource_sectionleaving'] == "5" && ($_POST['resource_subsectionleaving'] == "501" || $_POST['resource_subsectionleaving'] == "502" || $_POST['resource_subsectionleaving'] == "503" )) ||
    ($_POST['resource_sectionleaving'] == "6" && ($_POST['resource_subsectionleaving'] == "601" )) ||
    ($_POST['resource_sectionleaving'] == "7" && ($_POST['resource_subsectionleaving'] == "701" || $_POST['resource_subsectionleaving'] == "702" || $_POST['resource_subsectionleaving'] == "703" || $_POST['resource_subsectionleaving'] == "704" || $_POST['resource_subsectionleaving'] == "705" || $_POST['resource_subsectionleaving'] == "706" || $_POST['resource_subsectionleaving'] == "707"|| $_POST['resource_subsectionleaving'] == "708" || $_POST['resource_subsectionleaving'] == "709" || $_POST['resource_subsectionleaving'] == "710")) ||
    ($_POST['resource_sectionleaving'] == "0" && ($_POST['resource_subsectionleaving'] == "0" )))
    {

    $resource_title = $_POST['resource_title'];
    $resource_cain = $_POST['resource_cain'];
$resource_teacher = $_POST['resource_teacher'];
$resource_url = $_POST['resource_url'];
$resource_source = $_POST['resource_source'];
$resource_sectionni = $_POST['resource_sectionni'];
$resource_sectionjunior = $_POST['resource_sectionjunior'];
$resource_sectionleaving = $_POST['resource_sectionleaving'];
$resource_subsectionni = $_POST['resource_subsectionni'];
$resource_subsectionleaving = $_POST['resource_subsectionleaving'];
$resource_in_irl = $_POST['resource_in_irl'];
$resource_year = $_POST['resource_year'];
$resource_info = $_POST['resource_info']
;

$endpoint = "http://slivingston02.lampt.eeecs.qub.ac.uk/cain/api/createapi.php?addrecord";
//$endpoint = "api/createapi.php";

/* the name of each field must match the database school_details in array*/
$posteddata = http_build_query(
array('resource_title'=>$resource_title,'resource_cain'=>$resource_cain,'resource_teacher'=>$resource_teacher,'resource_url'=>$resource_url,'resource_source'=>$resource_source,'resource_sectionni'=>$resource_sectionni,'resource_sectionjunior'=>$resource_sectionjunior,'resource_sectionleaving'=>$resource_sectionleaving,'resource_subsectionni'=>$resource_subsectionni,'resource_subsectionleaving'=>$resource_subsectionleaving,'resource_in_irl'=>$resource_in_irl,'resource_year'=>$resource_year,'resource_info'=>$resource_info)
);

$opts=array(
    'http' => array(
        'method'=>'POST',
        'header'=>'Content-Type: application/x-www-form-urlencoded',
        'content'=>$posteddata
    )
    );

    $context = stream_context_create($opts);

    $result = file_get_contents($endpoint, false, $context);



echo $result;
} 
else{
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
    
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
    <link rel='stylesheet' href='https://rawgit.com/outboxcraft/beauter/master/beauter.min.css'>
    <link rel='stylesheet' href='css/body.css'>
    <link rel='stylesheet'
    href='https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100'>
    <!--<link rel='stylesheet' href='carousel.css'>-->
    
    <style>
    
    </style>
    </head>
    <body>
        
        <nav class='navbar navbar-expand-lg navbar-light bg-info'>
            <div class='navbar-logo'>
                <img src='img/cainlogo.png' alt='CAIN in the Curriculum' height='60' width='221' />
            </div>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
              <span class='navbar-toggler-icon'></span>
            </button>
          
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
              <ul class='navbar-nav mr-auto'>
    
                <li class='nav-item'>
                  <a class='nav-link' href='frontindex.html'>Home <span class='sr-only'>(current)</span></a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='dashboard.php' id='about'>Dashboard</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='forumindex.php'>Forum</a>
                  </li>
                  <li class='nav-item active'>
                    <a class='nav-link' href='admin.php'>Admin</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Log Out</a>
                  </li>
              </ul>
    
            </div>
          </nav>
          <?php
           include 'adminnavbar.php';
           ?>
              <div id='indent'>
    <div class='col m12' id='bodytext'>";
    echo 'The section and subsection for Leaving Cert mismatch</br>';
    echo "<a href='create.php'><h3>Back to Create A Record</h3></a href>";
    echo"</div>
    </div>
    </body>
    </html>";
}
}
 else{
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
    
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
    <link rel='stylesheet' href='https://rawgit.com/outboxcraft/beauter/master/beauter.min.css'>
    <link rel='stylesheet' href='css/body.css'>
    <link rel='stylesheet'
    href='https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100'>
    <!--<link rel='stylesheet' href='carousel.css'>-->
    
    <style>
    
    </style>
    </head>
    <body>
        
        <nav class='navbar navbar-expand-lg navbar-light bg-info'>
            <div class='navbar-logo'>
                <img src='img/cainlogo.png' alt='CAIN in the Curriculum' height='60' width='221' />
            </div>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
              <span class='navbar-toggler-icon'></span>
            </button>
          
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
              <ul class='navbar-nav mr-auto'>
    
                <li class='nav-item'>
                  <a class='nav-link' href='frontindex.html'>Home <span class='sr-only'>(current)</span></a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='dashboard.php' id='about'>Dashboard</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='forumindex.php'>Forum</a>
                  </li>
                  <li class='nav-item active'>
                    <a class='nav-link' href='admin.php'>Admin</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Log Out</a>
                  </li>
              </ul>
    
            </div>
          </nav>
          <?php
           include 'adminnavbar.php';
           ?>
              <div id='indent'>
    <div class='col m12' id='bodytext'>";
    echo 'The section and subsection for NI GCSE mismatch</br>';
    echo "<a href='create.php'><h3>Back to Create A Record</h3></a href>";
    echo"</div>
    </div>
    </body>
    </html>";
}


//{


?>