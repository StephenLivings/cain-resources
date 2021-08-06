<?php

include("connlocal.php");

$endpoint="api/api.php?allfields";

$dataset = file_get_contents($endpoint);

$sql = "SELECT * FROM `heroku_b909e35f617b419`.`cain_resourceitems` WHERE resource_keyid=$arg";

$result2 = $conn->query($sql);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
    //<link rel="stylesheet" href="../css/base.css">
   <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100">
  
    <title>
       CAIN Resources</title>
</head>
<body>

<ul class="topnav" id="myTopnav2" id="companyheader" style="background:#01036e">

<li><a href="#" class="brand">CAIN</a></li>
<li><a href="../index.php">Home</a></li>

<li> <a href="../about.php">About</a></li>
<li class="dropdown">
  <a href="../data.php">Data</a>
  <div class="dropdown-content">
    <a href="../graphs/genderindex.php">Gender</a>
    <a href="../graphs/ethnicityindex.php">Ethnicity</a>
    <a href="../graphs/needsindex.php">Disadvantaged</a>
    <a href="../graphs/sizeindex.php">Size</a>
  </div>
</li>
    <li> <a href="index.php" class="active">Records</a></li>
    <li> <a href="../contact.php">Contact</a></li>
    <li> <a href="../admin/index.php">Log In</a></li>
      
          </div>
        </li>

        
        <li class="-icon">
          <a href="javascript:void(0);" onclick="topnav('myTopnav2')">☰</a>
        </li>
      
      </ul>



        <div class="col m12" id="bodytext">

        

<?php

while($row = $result2->fetch_assoc()){


        echo"<h2> {$row["school_name"]}</h2>";
       
/*
            //SELECT type_desc FROM `school_type` INNER JOIN `school_details` ON school_type.type_id = school_details.school_type;
            $sql2 = "SELECT `type_desc` FROM `school_type` INNER JOIN `school_details` ON school_type.type_id = {$row["school_type"]}";
            $res2 = $conn->query($sql2);
            $row2 = $res2->fetch_assoc();
            $search2=$row2["type_desc"];

            //SELECT `town_name` FROM `school_town` INNER JOIN `school_details` ON school_town.town_id = school_details.town;
           $sql3 = "SELECT `town_name` FROM `school_town` INNER JOIN `school_details` ON school_town.town_id = {$row["town"]}";
           $res3 = $conn->query($sql3);
            $row3 = $res3->fetch_assoc();
            $search3=$row3["town_name"];

            //SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = cain_resourceitems.resource_source;
            //SELECT `grade_type` FROM `school_grade` INNER JOIN `school_details` ON school_grade.id_grade = school_details.grades;
             */
           $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = cain_resourceitems.resource_source;";
           $res4 = $conn->query($sql4);
           $row4 = $res4->fetch_assoc();
           $searchsource=$row4["sources_location"]; 
     




        echo "<table class='_width80'>
        <thead>
          <tr>
            <th>Record</th>
    <th>Record of Troubles</th>
           
          </tr>
        </thead>
        <tbody>
        
        <tr>
    <th>Record Title:</th> 
    <th>{$row["resource_title"]}</th>
</tr> 

<tr>
    <th>CAIN Resource:</th> 
    <th>{$row["resource_cain"]}</th>
</tr> 

<tr>
    <th>Teacher Resource:</th> 
    //<th>$search2</th>
    <th>{$row["resource_teacher"]}</th>
</tr> 

<tr>
    <th>URL:</th> 
    <th>{$row["resource_url"]}</th>
</tr> 

<tr>
    <th>Source:</th> 
    <th>$searchsource</th>
</tr> 

<tr>
    <th>Section NI GCSE:</th> 
    <th>{$row["resource_sectionni"]}</th>
</tr> 

<tr>
    <th>Section Junior Cycle:</th> 
    <th>{$row["resource_sectionjunior"]}</th>
</tr> 

<tr>
    <th>Section in Leaving Cert:</th> 
    <th>{$row["resource_sectionleaving"]}</th>
</tr> 

<tr>
    <th>Sub Section NI GCSE:</th> 
    <th>{$row["resource_subsectionni"]}</th>
</tr> 

<tr>
    <th>Sub Section Junior Cycle:</th> 
    <th>{$row["resource_subsectionjunior"]}</th>
</tr> 

<tr>
    <th>Sub Section Leaving Cert:</th> 
    <th>{$row["resource_subsectionleaving"]}</th>
</tr> 

<tr>
    <th>Resource Available in RoI:</th> 
    <th>{$row["resource_in_irl"]}</th>
</tr> 

<tr>
    <th>Resource Year:</th> 
    <th>{$row["resource_year"]}</th>
</tr> 

<tr>
    <th>Resource Information:</th> 
    <th>{$row["resource_information"]}</th>
</tr> 

";
        
        
    



   
        // 2.33 in
    //echo "<p>$endpoint</p>";
   

}

?>

        
     <?php/*



//print_r($row);
     //echo"{$row[4]}";

    


  


*/

?>

  </tbody>
</table>
<a href="index.php"><button class="_box">Back</button></a>



 
    </header>
   


</body>
<script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
</html>