<?php

session_start();

include("connect.php");

if(isset($_SESSION['resource_source'])){

  $resourcesource = $_SESSION['resource_source'];
}

$endpoint="http://slivingston02.lampt.eeecs.qub.ac.uk/cain/api/allrecordapi.php?allfields";

$dataset = file_get_contents($endpoint);

$allinfo = json_decode($dataset, true);

            $sql2 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = $resourcesource";
            $res2 = $conn->query($sql2);
            $row2 = $res2->fetch_assoc();
            $search2=$row2["sources_location"];

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
<title>CAIN In The Curriculum</title>
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
                <a class="nav-link" href="admin.php">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Log Out</a>
              </li>
          </ul>

        </div>
      </nav>



        <div class="col m12" id="bodytext">

        <?php echo "<h2>$search2 Resources</h2>"?>

        <table class="_width100">
    <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
 
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

    //echo "<p>{$row['school_code']}{$row['school_name']}{$row['school_type']}";




    //echo "<p>{$row['school_id']}</p>";
    $row_id= $row['resource_keyid'];
    $row_type_source = $row['resource_source'];

if ($resourcesource == $row_type_source){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
    <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
               
        </div></tr> ";
      }

    }

    if(isset($_POST['keyid'])){

      $schoolid = $_POST['keyid'];

      $_SESSION['idofschool'] = $schoolid;
    }
  




?>
  </tbody>
</table>



 
    </header>
   

    <a href="listallrecords.php"><button class="_box">List All Records</button></a>
</body>
<script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
</html>