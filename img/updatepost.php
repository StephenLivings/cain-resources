<?php
$endpoint = "http://slivingston02.lampt.eeecs.qub.ac.uk/cain/api/allrecordapi.php?allpostfields";

$dataset = file_get_contents($endpoint);

$allinfo = json_decode($dataset, true);

include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>-->
<link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
<link rel="stylesheet" href="css/body.css">
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100">
<!--<link rel="stylesheet" href="carousel.css">-->

<style>

</style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="navbar-logo">
            <img src="img/cainlogo.png" alt="CAIN in the Curriculum" height="60" width="221" />
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link" href="frontindex.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="dashboard.php" id="about">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="forumindex.php">Forum</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Log Out</a>
              </li>
          </ul>

        </div>
      </nav>
      <?php
       include "adminnavbar.php";
       ?>
          <div id="indent">

<?php

//session_start();

//if(!isset($_SESSION['admin_name'])){

   //// header("Location: ../index.php");
//}

include("connect.php");

$currentuser = $_SESSION['admin_name'];

$id = $_GET['keyid'];

//echo $id;
$_SESSION['keyid'] = $id;

$arg = $conn->real_escape_string($_GET['keyid']);

$sql = "SELECT * FROM cain_categories_posts WHERE post_topic=$arg";

$result2 = $conn->query($sql);

 
?>


        <div class="col m12" id="bodytext">

<!-- title displayed and user name hown when logged in-->

<p><h3>Choose Post To Amend in Topic</h3></p>
<?php
//$user = $_SESSION['admin_name'];
//echo "<p><h5>$user logged in</h5></p>";

?>

<div style="background:#fcf5cb">
<div id="indent">


<table class="_width100">
<thead>
  <tr>
    <th>ID </th>
    <th>Content</th>
    <th>Posted By</th>
    <th>Update</th>
    
   
  </tr>
</thead>
<tbody>
  
    
    <?php
//if (is_array($allinfo) || is_object($allinfo))
//{
foreach($allinfo as $row){
echo $row['post_by'];
                $sql2 = "SELECT `user_name` FROM `cain_users` INNER JOIN `cain_categories_posts` ON cain_users.user_keyid = {$row['post_by']}";
                $res2 = $conn->query($sql2);
                $row2 = $res2->fetch_assoc();
                $username=$row2["user_name"];

//echo "<p>{$row['school_id']}</p>";
$row_id= $row['post_keyid'];

echo "<tr><div class=''>
<th>{$row["post_keyid"]}</th>
<th>{$row["post_content"]}</th>
            <th>$user_name</th>

            <th><a href='updateonepost.php?keyid=$row_id'>Update</th>
            
    </div></tr> ";

// }
// else // If $myList was not an array, then this block is executed. 
//{
//echo "Unfortunately, an error occured.";
//}
}
