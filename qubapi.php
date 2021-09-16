<?php

session_start();


$endpoint="http://slivingston02.lampt.eeecs.qub.ac.uk/cain/api/api2.php?allfields";

$dataset = file_get_contents($endpoint);

$allinfo = json_decode($dataset, true);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
    <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100">
  
    <title>
       TRIMS</title>
</head>
<body>

    <ul class="topnav" id="myTopnav2" id="companyheader" style="background:#01036e">
        <li><a href="#beauter" class="brand">TRIMS</a></li>
        <li><a href="index.html">Home</a></li>

        <li> <a href="#"  class="active">About</a></li>
        <li class="dropdown">
            <a href="data.html">Data</a>
            <div class="dropdown-content">
              <a href="gender.html">Gender</a>
              <a href="ethnicity.html">Ethnicity</a>
        
            </div>
          </li>
            <li> <a href="contact.html">Contact</a></li>
            <li> <a href="../admin/index.php">Log In</a></li>
          </div>
        </li>

        
        <li class="-icon">
          <a href="javascript:void(0);" onclick="topnav('myTopnav2')">☰</a>
        </li>
      
      </ul>



        <div class="col m12" id="bodytext">

        <h2>Schools</h2>

    <table class="_width100">
    <thead>
      <tr>
        <th>name</th>
        <th>url</th>

       
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

    //echo "<p>{$row['school_code']}{$row['school_name']}{$row['school_type']}";


    //echo "<p>{$row['school_id']}</p>";
    $row_id= $row['resource_keyid'];

    echo "<tr><div class=''>
    <th>{$row["resource_title"]}</th>
                <th><a href='school.php?keyid=$row_id'>{$row["sresource_url"]}</a></th>
                <th>{$row["school_type"]}</th>
        </div></tr> ";

    }

    if(isset($_POST['resource_keyid'])){

      $resourceid = $_POST['resource_keyid'];

      $_SESSION['idofresource'] = $resourceid; 
    }
  




?>
  </tbody>
</table>



 
    </header>
   


</body>
<script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
</html>