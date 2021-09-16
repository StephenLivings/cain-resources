
<?php
//sesion_start();




include("connect.php");

$current = "SELECT * FROM cain_resourceitems";

$result = $conn->query($current);

if(!$result){
    echo $conn->error;
}

$userdetails = $result->fetch_assoc();

$sqlquery2 = "SELECT * FROM cain_resource_sources";
$result2 = $conn -> query($sqlquery2);

$sqlquery3 = "SELECT * FROM cain_yesno";
$result3 = $conn -> query($sqlquery3);

$sqlquery4 = "SELECT * FROM cain_sections_ni";
$result4 = $conn -> query($sqlquery4);

$sqlquery5 = "SELECT * FROM cain_section_junior";
$result5 = $conn -> query($sqlquery5);

$sqlquery6 = "SELECT * FROM cain_section_leaving";
$result6 = $conn -> query($sqlquery6);

$sqlquery7 = "SELECT * FROM cain_subsecni";
$result7 = $conn -> query($sqlquery7);

$sqlquery8 = "SELECT * FROM cain_subsecleaving";
$result8 = $conn -> query($sqlquery8);

$sqlquery9 = "SELECT * FROM cain_yesno";
$result9 = $conn -> query($sqlquery9);

$sqlquery10 = "SELECT * FROM cain_yesno";
$result10 = $conn -> query($sqlquery10);

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
<div class="col m12" id="bodytext">

<p><h2>Create New Record</h2></p>

<p>All fields must be completed.</p>
<!--<div class="container" style="background:#e6c0fc">-->
<div style="background:#fcf5cb">
<div id="indent">
<article>
    <form method="post" action="createrecord.php" name="record add">

    <label for="resourcetitle">Resource Title:</label>
    <input id="resource_title" name="resource_title" type="text" maxlength="10000" required="required" value="" placeholder="Enter the record's title"><br>

    <label for="resourcecain">CAIN Resource</label>
    <select class="form" name="resource_cain">
        <option>Select answer</option>
        <?php
        while ($row = $result3->fetch_assoc())
        {
            $yesnokeyid= $row['yesno_keyid'];
            $yesnoanswer= $row['yesno_answer'];
        
            echo "<option value='$yesnokeyid'> $yesnoanswer </option>";

        }
        ?>      
    </select>

    <label for="resourceteacher">Teacher Resource</label>
    <select class="form" name="resource_teacher">
        <option>Select answer</option>
        <?php
        while ($row = $result9->fetch_assoc())
        {
            $yesnokeyid= $row['yesno_keyid'];
            echo ('$yesnokeyid');
            $yesnoanswer= $row['yesno_answer'];
        
            echo "<option value='$yesnokeyid'> $yesnoanswer </option>";

        }
        ?>      
    </select>
        


    <label for="resourceurl">Resource URL</label>
    <input id="resource_url" name="resource_url" type="text" width="400" maxlength="1000" required="required" value="" placeholder="Enter the record's url"><br>

    <label for="resourcesource">Resource Source</label>
    <select class="form" name="resource_source">
        <option>Select answer</option>
        <?php
        while ($row = $result2->fetch_assoc())
        {
            $sourceskeyid= $row['sources_keyid'];
            $sourceslocation= $row['sources_location'];
        
            echo "<option value='$sourceskeyid'> $sourceslocation </option>";

        }
        ?>      
    </select>

    <label for="resourcesectionni">Resource Section GCSE</label>
    <select class="form" name="resource_sectionni">
        <option>Select answer</option>
        <option value="0">No link</option>
        <?php
        while ($row = $result4->fetch_assoc())
        {
            $sectionnikeyid= $row['section_ni_keyid'];
            $sectionnititle= $row['section_ni_title'];
        
            echo "<option value='$sectionnikeyid'> $sectionnititle </option>";

        }
        ?>      
    </select>

    <label for="resourcesubsectionni">Resource Sub Section GCSE</label>
    <select class="form" name="resource_subsectionni">
        <option>Select answer</option>
        <option value="0">No link</option>
        <?php
        while ($row = $result7->fetch_assoc())
        {
            $subseckeyid= $row['subsec_keyid'];
            $subsectitle= $row['subsec_title'];
        
            echo "<option value='$subseckeyid'> $subsectitle </option>";

        }
        ?>      
    </select>

    <label for="resourcesectionjunior">Resource Section Junior Cycle</label>
    <select class="form" name="resource_sectionjunior">
        <option>Select answer</option>
        <option value="0">No link</option>
        <?php
        while ($row = $result5->fetch_assoc())
        {
            $sectionjuniorkeyid= $row['section_junior_keyid'];
            $juniortitle= $row['junior_title'];
        
            echo "<option value='$sectionjuniorkeyid'> $juniortitle </option>";

        }
        ?>      
    </select>

    
    <label for="resourcesectionleaving">Resource Section Leaving Cert</label>
    <select class="form" name="resource_sectionleaving">
        <option>Select answer</option>
        <option value="0">No link</option>
        <?php
        while ($row = $result6->fetch_assoc())
        {
            $sectionleavingkeyid= $row['section_leaving_keyid'];
            $leavingtitle= $row['leaving_title'];
        
            echo "<option value='$sectionleavingkeyid'> $leavingtitle </option>";

        }
        ?>      
    </select>

    <label for="resourcesubsectionleaving">Resource Sub Section Leaving Cert</label>
    <select class="form" name="resource_subsectionleaving">
        <option>Select answer</option>
        <option value="0">No link</option>
        <?php
        while ($row = $result8->fetch_assoc())
        {
            $subsecleavingkeyid= $row['subsecleaving_keyid'];
            $subsecleavingtitle= $row['subsecleaving_title'];
        
            echo "<option value='$subsecleavingkeyid'> $subsecleavingtitle </option>";

        }
        ?>      
    </select>

    <label for="resourceinirl">Resource Available in Republic of Ireland</label>
    <select class="form" name="resource_in_irl">
        <option>Select answer</option>
        <?php
        while ($row = $result10->fetch_assoc())
        {
            $yesnokeyid= $row['yesno_keyid'];
            $yesnoanswer= $row['yesno_answer'];
        
            echo "<option value='$yesnokeyid'> $yesnoanswer </option>";

        }
        ?>      
    </select>

    <label for="resourceyear">Resource Year</label>
    <input id="resource_year" name="resource_year" type="text" maxlength="4" required="required" value="" placeholder="Enter the resource's year"><br>

    <label for="resourceinfo">Resource Information</label>
    <input id="resource_info" name="resource_info" type="text" maxlength="20000" required="required" value="" placeholder="Enter the resource's information"><br>

    <div id="butpos">

<input id="but2" name="reset" type="reset" value="Reset" style="background:#FFFFFF">
<input id="but" name="submit" type="submit" value="Save" style="background:#FFFFFF">	
</div>
</form>		
</article>
</div>
                            
<div class="clearfloat"> </div>


<!-- end of main content -->
</div>
</div>
</div>


</body>
</html>