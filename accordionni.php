<?php

session_start();


$endpoint = "http://slivingston02.lampt.eeecs.qub.ac.uk/cain/api/allrecordsecapi.php?allsecfields";

$dataset = file_get_contents($endpoint);

$allinfo = json_decode($dataset, true);

include("connect.php");

//print_r($allinfo);
//echo ('hello2');
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
    <!--<link rel="stylesheet" href="../css/base.css">-->
   <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
<!--<link rel="stylesheet"
href="accordion5.css">-->
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
                <a class="nav-link" href="logout.php">Log Out</a>
              </li>
          </ul>

        </div>
      </nav>
      
          <div id="indent">


        <div class="col m12" id="bodytext">

        <h2>Records : GCSE</h2>




        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet"
href="accordion6.css">

<!-- Heading 1 O'Neill Years-->
<div class="accordion js-accordion">
    <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">The O'Neill Years</div> 
    <div class="accordion-body js-accordion-body">

    <!-- SubHeading 101 O'Neill's policies and actions to improve the economy-->
        <div class="accordion js-accordion">
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">O'Neill's policies and actions to improve the economy: successes and failures </div> 
             <div class="accordion-body js-accordion-body">
               <div class="accordion-body__contents">
              
               <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>

        
       
      </tr>
    </thead>
    <tbody>
      
        
        <?php
//if (is_array($allinfo) || is_object($allinfo))
//{
foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='101'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }
   // }
   // else // If $myList was not an array, then this block is executed. 

    }
    
?>
</tbody>
</table>
               </div><!-- end of sub accordion item body contents -->
             </div><!-- end of sub accordion item body -->
          </div><!-- end of sub accordion item -->

           <!-- SubHeading 102 O'Neill's attempts to improve community relations in Northern Ireland-->
          <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">O'Neill's attempts to improve community relations in Northern Ireland and the differing responses to his efforts </div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
               
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='102'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>
                
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>

              </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->

        <!-- SubHeading 103 O'Neill's attempts to improve relations with the Republic of Ireland-->
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">O'Neill's attempts to improve relations with the Republic of Ireland and the differing responses in Northern Ireland to his efforts </div> 
             <div class="accordion-body js-accordion-body">
               <div class="accordion-body__contents">
                
               <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>     
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='103'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>
                
        </div></tr> ";
    }

    }

?>
</tbody>
</table>

               </div><!-- end of sub accordion item body contents -->
             </div><!-- end of sub accordion item body -->
          </div><!-- end of sub accordion item -->
          
        </div><!-- end of sub accordion -->
      </div
      </div><!-- end of accordion body -->
    </div><!-- end of accordion item -->

<!-- Heading 2 The Campaign for Civil Rights-->
    <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">The Campaign for Civil Rights</div> 
    <div class="accordion-body js-accordion-body">

    <!-- SubHeading 201 The influence of the civil rights movement in the United States of America-->
        <div class="accordion js-accordion">
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">The influence of the civil rights movement in the United States of America on Northern Ireland</div> 
             <div class="accordion-body js-accordion-body">
               <div class="accordion-body__contents">
                
               <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th> 
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='201'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>  
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>

               </div><!-- end of sub accordion item body contents -->
             </div><!-- end of sub accordion item body -->
          </div><!-- end of sub accordion item -->

          <!-- SubHeading 202 Reasons for the emergence of the Northern Ireland Civil Rights Association-->
          <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">Reasons for the emergence of the Northern Ireland Civil Rights Association (NICRA), its demands and methods and the differing attitudes towards it </div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
              
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
     </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='202'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>               
        </div></tr> ";
    }

    }

?>
</tbody>
</table>
            </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->
         <!-- SubHeading 203 Early civil rights marches, including British government and police responses-->
         <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">Early civil rights marches, including British government and police responses, O'Neill's five-point reform programme and the differing responses to it </div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
              
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='203'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>
            </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->
         <!-- SubHeading 204 The effectiveness of NICRA-->
         <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">The effectiveness of NICRA </div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
              
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='204'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>
            </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->
         <!-- SubHeading 205 Reasons for the emergence of the People's Democracy-->
         <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">Reasons for the emergence of the People's Democracy: actions and impact </div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
               
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='205'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>
            </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->
        <!-- SubHeading 206 Reasons for the downfall of O'Neill-->
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">Reasons for the downfall of O'Neill</div> 
             <div class="accordion-body js-accordion-body">
               <div class="accordion-body__contents">
                
               <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='206'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>
                
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>
            </div><!-- end of sub accordion item body contents -->
             </div><!-- end of sub accordion item body -->
          </div><!-- end of sub accordion item -->
        </div><!-- end of sub accordion -->
      </div><!-- end of accordion body -->
    </div><!-- end of accordion item -->

<!-- Heading 3 A Deteriorating Situation, 1969-72-->
      <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">A Deteriorating Situation, 1969-72</div> 
    <div class="accordion-body js-accordion-body">
      <!-- SubHeading 301 Increasing tensions and violence, summer 1969-->
        <div class="accordion js-accordion">
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">Increasing tensions and violence, summer 1969</div> 
             <div class="accordion-body js-accordion-body">
               <div class="accordion-body__contents">
                
               <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='301'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>
                
        </div></tr> ";
    }

    }
    

?>
</tbody>
</table>
            
            </div><!-- end of sub accordion item body contents -->
             </div><!-- end of sub accordion item body -->
          </div><!-- end of sub accordion item -->
            <!-- SubHeading 302 The reasons for and consequences of the intervention of the Irish and British governments-->
          <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">The reasons for and consequences of the intervention of the Irish and British governments</div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
              
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='302'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>               
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>
           
            </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->
        <!-- SubHeading 303 The re-emergence of the Irish Republican Army (IRA)-->
         <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">The re-emergence of the Irish Republican Army (IRA), the split in the IRA and the objectives of the newly formed Provisional IRA</div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
              
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='303'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }

    }
    


?>
</tbody>
</table>
         
            </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->
        <!-- SubHeading 304 The re-emergence of the Ulster Volunteer Force (UVF) and its objectives-->
         <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">The re-emergence of the Ulster Volunteer Force (UVF) and its objectives, and the setting up of the Ulster Defence Association (UDA) and its objectives</div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
              
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='304'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }

    }

?>
</tbody>
</table>
     
            </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->
        <!-- SubHeading 305 Reasons for and effects of internment, escalation of violence, civil rights protests-->
         <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">Reasons for and effects of internment, escalation of violence, civil rights protests against internment, and Bloody Sunday and responses to it</div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
             
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='305'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>
         
            </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->
        <!-- SubHeading 306 Reasons for the fall of Stormont and the introduction of direct rule-->
         <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">Reasons for the fall of Stormont and the introduction of direct rule</div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
              
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='306'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>
           
            </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->
        <!-- SubHeading 307 Reaction in Northern Ireland and in the Republic of Ireland to the British government's decision to suspend Stormont-->
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">Reaction in Northern Ireland and in the Republic of Ireland to the British government's decision to suspend Stormont</div> 
             <div class="accordion-body js-accordion-body">
               <div class="accordion-body__contents">
                
               <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='307'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }

    }
    

?>
</tbody>
</table>
  
            </div><!-- end of sub accordion item body contents -->
             </div><!-- end of sub accordion item body -->
          </div><!-- end of sub accordion item -->
        </div><!-- end of sub accordion -->
      </div><!-- end of accordion body -->
    </div><!-- end of accordion item -->

<!-- Heading 4 The Search For a Political Solution - Attempt at Power-Sharing, 1973-74-->
       <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">The Search For a Political Solution - Attempt at Power-Sharing, 1973-74</div> 
    <div class="accordion-body js-accordion-body">
 <!-- SubHeading 401 The reasons for and responses to the introduction of a power-sharing Executive to Northern Ireland and a Council of Ireland-->
        <div class="accordion js-accordion">
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">The reasons for and responses to the introduction of a power-sharing Executive to Northern Ireland and a Council of Ireland</div> 
             <div class="accordion-body js-accordion-body">
               <div class="accordion-body__contents">
              
               <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='401'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>
                
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>
           
            </div><!-- end of sub accordion item body contents -->
             </div><!-- end of sub accordion item body -->
          </div><!-- end of sub accordion item -->
           <!-- SubHeading 402 The effects of the Ulster Workers' Council strike on the attempt at power-sharing in Northern Ireland-->
          <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">The effects of the Ulster Workers' Council strike on the attempt at power-sharing in Northern Ireland</div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
              
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
     </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='402'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>
       
            </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->
         <!-- SubHeading 403 The reintroduction of direct rule-->
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">The reintroduction of direct rule</div> 
             <div class="accordion-body js-accordion-body">
               <div class="accordion-body__contents">
           
               <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='403'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>
            </div></tr> ";
    }

    }
    
?>
</tbody>
</table>
         
            </div><!-- end of sub accordion item body contents -->
             </div><!-- end of sub accordion item body -->
          </div><!-- end of sub accordion item -->
        </div><!-- end of sub accordion -->
      </div><!-- end of accordion body -->
    </div><!-- end of accordion item -->
    <!-- Heading 5 Changing Republican Strategy-->
       <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">Changing Republican Strategy</div> 
    <div class="accordion-body js-accordion-body">
    <!-- SubHeading 501 The reasons for the hunger strikes, 1980-81-->
        <div class="accordion js-accordion">
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">The reasons for the hunger strikes, 1980-81</div> 
             <div class="accordion-body js-accordion-body">
               <div class="accordion-body__contents">
               
               <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>  
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='501'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>
          
            </div><!-- end of sub accordion item body contents -->
             </div><!-- end of sub accordion item body -->
          </div><!-- end of sub accordion item -->
           <!-- SubHeading 502 The impact of the hunger strikes, including change in Republican strategy-->
          <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">The impact of the hunger strikes, including change in Republican strategy</div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
  
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='502'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>

            </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->
        <!-- SubHeading 503 The effect of Sinn Fein's electoral success on the SDLP-->
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">The effect of Sinn Fein's electoral success on the SDLP</div> 
             <div class="accordion-body js-accordion-body">
               <div class="accordion-body__contents">
            
               <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='503'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>               
        </div></tr> ";
    }

    }
    
?>
</tbody>
</table>
         
            </div><!-- end of sub accordion item body contents -->
             </div><!-- end of sub accordion item body -->
          </div><!-- end of sub accordion item -->
        </div><!-- end of sub accordion -->
      </div><!-- end of accordion body -->
    </div><!-- end of accordion item -->

    <!-- Heading 6 Changing Relations - Towards Closer Co-operation-->
       <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">Changing Relations - Towards Closer Co-operation</div> 
    <div class="accordion-body js-accordion-body">
      <!-- SubHeading 601 Reasons for closer co-operation between the Irish and British governments in the 1980s-->
        <div class="accordion js-accordion">
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">Reasons for closer co-operation between the Irish and British governments in the 1980s</div> 
             <div class="accordion-body js-accordion-body">
               <div class="accordion-body__contents">
              
               <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='601'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>
        </div></tr> ";
    }

    }


?>
</tbody>
</table>
        
            </div><!-- end of sub accordion item body contents -->
             </div><!-- end of sub accordion item body -->
          </div><!-- end of sub accordion item -->
            <!-- SubHeading 602 The terms of the Anglo-Irish Agreement-->
          <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">The terms of the Anglo-Irish Agreement</div> 
            <div class="accordion-body js-accordion-body">
              <div class="accordion-body__contents">
           
              <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='602'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>               
        </div></tr> ";
    }

    }

  
?>
</tbody>
</table>
         
            </div><!-- end of sub accordion item body contents -->
            </div><!-- end of sub accordion item body -->
         </div><!-- end of sub accordion item -->
         <!-- SubHeading 603 Its significance for relations between Britain, Northern Ireland and the Republic of Ireland and for how Northern Ireland would be governed-->
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">Its significance for relations between Britain, Northern Ireland and the Republic of Ireland and for how Northern Ireland would be governed</div> 
             <div class="accordion-body js-accordion-body">
               <div class="accordion-body__contents">
              
               <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='603'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>               
        </div></tr> ";
    }

    }
    
  
?>
</tbody>
</table>
           
            </div><!-- end of sub accordion item body contents -->
             </div><!-- end of sub accordion item body -->
          </div><!-- end of sub accordion item -->
        </div><!-- end of sub accordion -->
      </div><!-- end of accordion body -->
    </div><!-- end of accordion item -->

  <!-- Heading 7 The Downing Street Declaration, 1993-->
    <div class="accordion__item js-accordion-item">
        <div class="accordion-header js-accordion-header">The Downing Street Declaration, 1993</div> 
      <div class="accordion-body js-accordion-body">
<!-- SubHeading 701 The Hume-Adams initiative-->
          <div class="accordion js-accordion">
            <div class="accordion__item js-accordion-item">
               <div class="accordion-header js-accordion-header">The Hume-Adams initiative</div> 
               <div class="accordion-body js-accordion-body">
                 <div class="accordion-body__contents">
                 
                 <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='701'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>
                
        </div></tr> ";
    }

    }


?>
</tbody>
</table>
    
                </div><!-- end of sub accordion item body contents -->
               </div><!-- end of sub accordion item body -->
            </div><!-- end of sub accordion item -->
            <!-- SubHeading 702 The Downing Street Declaration-->
            <div class="accordion__item js-accordion-item">
                <div class="accordion-header js-accordion-header">The Downing Street Declaration</div> 
                <div class="accordion-body js-accordion-body">
                  <div class="accordion-body__contents">
                
                  <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='702'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }

    }

  

?>
</tbody>
</table>
           
                </div><!-- end of sub accordion item body contents -->
                </div><!-- end of sub accordion item body -->
             </div><!-- end of sub accordion item -->
             <!-- SubHeading 703 The key terms and responses to the Declaration in Northern Ireland and its significance for paving the way for the ceasefires-->
            <div class="accordion__item js-accordion-item">
               <div class="accordion-header js-accordion-header">The key terms and responses to the Declaration in Northern Ireland and its significance for paving the way for the ceasefires</div> 
               <div class="accordion-body js-accordion-body">
                 <div class="accordion-body__contents">
           
                 <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='703'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }

    }
    
  

?>
</tbody>
</table>
 
                </div><!-- end of sub accordion item body contents -->
               </div><!-- end of sub accordion item body -->
            </div><!-- end of sub accordion item -->
          </div><!-- end of sub accordion -->
        </div><!-- end of accordion body -->
      </div><!-- end of accordion item -->

<!-- Heading 8 The Good Friday Agreement, 1998-->
      <div class="accordion__item js-accordion-item">
        <div class="accordion-header js-accordion-header">The Good Friday Agreement, 1998</div> 
      <div class="accordion-body js-accordion-body">
        <!-- SubHeading 801 The key terms and responses to the Agreement, including the referendum-->
          <div class="accordion js-accordion">
            <div class="accordion__item js-accordion-item">
               <div class="accordion-header js-accordion-header">The key terms and responses to the Agreement, including the referendum</div> 
               <div class="accordion-body js-accordion-body">
                 <div class="accordion-body__contents">
                
                 <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='801'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>
        </div></tr> ";
    }

    }

  

?>
</tbody>
</table>
  
                </div><!-- end of sub accordion item body contents -->
               </div><!-- end of sub accordion item body -->
            </div><!-- end of sub accordion item -->
            <!-- SubHeading 802 The significance of the Agreement for relations between Britain, Northern Ireland and the Republic of Ireland-->
            <div class="accordion__item js-accordion-item">
               <div class="accordion-header js-accordion-header">The significance of the Agreement for relations between Britain, Northern Ireland and the Republic of Ireland</div> 
               <div class="accordion-body js-accordion-body">
                 <div class="accordion-body__contents">
             
                 <table>
               <thead>
      <tr>
        <th>ID </th>
        <th>Record Title</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 

    $row_id= $row['resource_keyid'];

$subsection = $row['resource_subsectionni'];

    if ($subsection=='802'){
    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>                
        </div></tr> ";
    }

    }

?>
</tbody>
</table>
          
                </div><!-- end of sub accordion item body contents -->
               </div><!-- end of sub accordion item body -->
            </div><!-- end of sub accordion item -->
          </div><!-- end of sub accordion -->
        </div><!-- end of accordion body -->
      </div><!-- end of accordion item -->
  </div><!-- end of accordion -->
  
     

  <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script src=
"accordion5.js">
</script>
  
<!--Code for accordion adapted from https://codepen.io/LewisBriffa/pen/qjwqLb-->     