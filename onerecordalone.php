<?php

session_start();
include("connect.php");

$arg = $conn->real_escape_string($_GET['keyid']);

$sql = "SELECT * FROM cain_resourceitems WHERE resource_keyid=$arg";

$result2 = $conn->query($sql);

$sql2 = "UPDATE `cain_resourceitems` SET `resource_count` = `resource_count`+1 WHERE resource_keyid=$arg";
$resultupdate = $conn->query($sql2);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
<link rel="stylesheet" href="css/body.css">
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100">
<!--<link rel="stylesheet" href="carousel.css">-->
<title>CAIN in the Curriculum</title>
<style>

</style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                <a class="nav-link" href="logout.php">Log Out</a>
              </li>
          </ul>

        </div>
      </nav>
      
          <div id="indent">

        <div class="col m12" id="bodytext">

<?php
while($row = $result2->fetch_assoc()){
        echo"<h2> {$row["resource_title"]}</h2>";
       

       $sql2 = "SELECT `yesno_answer` FROM `cain_yesno` INNER JOIN `cain_resourceitems` ON cain_yesno.yesno_keyid = {$row['resource_cain']}";
       $res2 = $conn->query($sql2);
       $row2 = $res2->fetch_assoc();
       $searchcain=$row2["yesno_answer"];
   
       $sql3 = "SELECT `yesno_answer` FROM `cain_yesno` INNER JOIN `cain_resourceitems` ON cain_yesno.yesno_keyid = {$row['resource_teacher']}";
       $res3 = $conn->query($sql3);
       $row3 = $res3->fetch_assoc();
       $searchteacher=$row3["yesno_answer"];
   
       $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
       $res4 = $conn->query($sql4);
       $row4 = $res4->fetch_assoc();
       $searchsource=$row4["sources_location"]; 
   
       $sql5 = "SELECT `section_ni_title` FROM `cain_sections_ni` INNER JOIN `cain_resourceitems` ON cain_sections_ni.section_ni_keyid = {$row['resource_sectionni']}";
       $res5 = $conn->query($sql5);
       $row5 = $res5->fetch_assoc();
       $searchsecnititle=$row5["section_ni_title"]; 
   
       $sql6 = "SELECT `junior_title` FROM `cain_section_junior` INNER JOIN `cain_resourceitems` ON cain_section_junior.section_junior_keyid = {$row['resource_sectionjunior']}";
       $res6 = $conn->query($sql6);
       $row6 = $res6->fetch_assoc();
       $searchsecjuniortitle=$row6["junior_title"]; 
   
       $sql7 = "SELECT `leaving_title` FROM `cain_section_leaving` INNER JOIN `cain_resourceitems` ON cain_section_leaving.section_leaving_keyid = {$row['resource_sectionleaving']}";
       $res7 = $conn->query($sql7);
       $row7 = $res7->fetch_assoc();
       $searchsecleavingtitle=$row7["leaving_title"];
   
       $sql8 = "SELECT `subsec_title` FROM `cain_subsecni` INNER JOIN `cain_resourceitems` ON cain_subsecni.subsec_keyid = {$row['resource_subsectionni']}";
       $res8 = $conn->query($sql8);
       $row8 = $res8->fetch_assoc();
       $searchsubsecnititle=$row8["subsec_title"]; 
   
       //$sql9 = "SELECT `junior_title` FROM `cain_section_junior` INNER JOIN `cain_resourceitems` ON cain_section_junior.section_junior_keyid = {$row['resource_sectionjunior']}";
       //$res9 = $conn->query($sql9);
       //$row9 = $res9->fetch_assoc();
       //$searchsecjuniortitle=$row9["junior_title"]; 
   
       $sql10 = "SELECT `subsecleaving_title` FROM `cain_subsecleaving` INNER JOIN `cain_resourceitems` ON cain_subsecleaving.subsecleaving_keyid = {$row['resource_subsectionleaving']}";
       $res10 = $conn->query($sql10);
       $row10 = $res10->fetch_assoc();
       $searchsubsecleavingtitle=$row10["subsecleaving_title"];
   
       $sql11 = "SELECT `subsecleaving_title` FROM `cain_subsecleaving` INNER JOIN `cain_resourceitems` ON cain_subsecleaving.subsecleaving_keyid = {$row['resource_subsectionleaving']}";
       $res11 = $conn->query($sql11);
       $row11 = $res11->fetch_assoc();
       $searchroi=$row11["subsecleaving_title"];
   
       $sql12 = "SELECT `yesno_answer` FROM `cain_yesno` INNER JOIN `cain_resourceitems` ON cain_yesno.yesno_keyid = {$row['resource_in_irl']}";
       $res12 = $conn->query($sql12);
       $row12 = $res12->fetch_assoc();
       $searchroi=$row12["yesno_answer"];
      


$urlref = $row["resource_url"];

        echo "<table class='_width80'>
        <thead>
          <tr>
            <th>Record Details</th>
    <th>Information Held</th>
           
          </tr>
        </thead>
        <tbody>
        
        <tr>
    <th>Record:</th> 
    <th>{$row["resource_keyid"]}</th>
</tr> 

<tr>
    <th>Record Title:</th> 
    <th>{$row["resource_title"]}</th>
</tr> 

<tr>
    <th>Cain Resource:</th> 
    <th>$searchcain</th>
</tr> 

<tr>
    <th>Teacher Resource:</th> 
    <th>$searchteacher</th>
</tr> 

<tr>
    <th>URL:</th> 
    <th><a href='$urlref'>{$row["resource_url"]}</a href></th>
</tr> 

<tr>
    <th>Source:</th> 
    <th>$searchsource</th>
</tr> ";

// if column resource_sectionni in cain_resourceitems doesn't match a section in NI curriculum, it is set to zero, if not zero, display the linked title or sub section title
if ($row["resource_sectionni"] !=0){
    echo "
<tr>
    <th>Section GCSE:</th> 
    <th>$searchsecnititle</th>
</tr> 

<tr>
    <th>Sub Section GCSE:</th> 
    <th>$searchsubsecnititle</th>
</tr> ";
}

// if column resource_sectionjunior in cain_resourceitems doesn't match a section in Junior Cycle curriculum, it is set to zero, if not zero, display the linked title or sub section title

if ($row["resource_sectionjunior"] !=0){
    echo "
<tr>
    <th>Section Junior Cycle:</th> 
    <th>$searchsecjuniortitle</th>
</tr> ";
}

// if column resource_sectionleaving in cain_resourceitems doesn't match a section in Leaving Cert curriculum, it is set to zero, if not zero, display the linked title or sub section title

if ($row["resource_sectionleaving"] !=0){
    echo "
<tr>
    <th>Section Leaving Cert:</th> 
    <th>$searchsecleavingtitle</th>
</tr> 

<tr>
    <th>Sub Section Leaving Cert:</th> 
    <th>$searchsubsecleavingtitle</th>
</tr>";
}

/* redacted code, sub section junior not used in final implementation
<tr>
    <th>Sub Section Junior:</th> 
    <th>{$row["resource_subsectionjunior"]}</th>
</tr> 
*/
echo "
<tr>
    <th>Resource Available RoI:</th> 
    <th>$searchroi</th>
</tr>"; 

// if no year for the resource do not display the year field
if ($row["resource_year"] !=0){
echo "
<tr>
    <th>Resource Year:</th> 
    <th>{$row["resource_year"]}</th>
</tr> ";
}

echo "
<tr>
    <th>Resource Information:</th> 
    <th>{$row["resource_info"]}</th>
</tr> 

";
           
        // 2.33 in
    //echo "<p>$endpoint</p>";
}

?>

  </tbody>
</table>

<!-- back button uses session user_type variable to check if NI or RoI user and directs back to the accordion appropriate for that jurisdiction-->
<?php
if ($_SESSION['user_type'] == "1"){
echo '<a href="accordionni.php"><button class="_box">Back</button></a></br>';
}

if ($_SESSION['user_type'] == "2" || $_SESSION['user_type'] == "3"){
    echo '<a href="accordionroi.php"><button class="_box">Back</button></a></br>';
    }
?>

</div>

    </header>
   
</body>
<script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
</html>