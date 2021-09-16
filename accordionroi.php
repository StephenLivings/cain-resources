<?php

session_start();


$endpoint = "http://slivingston02.lampt.eeecs.qub.ac.uk/cain/api/allrecordsecapi.php?allsecfields";

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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
    <!--<link rel="stylesheet" href="../css/base.css">-->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100">

    
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

        

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="accordion6.css">
<p></p>
<h2>Records : Junior Cycle</h2>
<p></p>
<div class="accordion js-accordion">
  <div class="accordion__item js-accordion-item">
    <div class="accordion-header js-accordion-header">The Causes</div> 
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

$subsectionjunior = $row['resource_sectionjunior'];

    if ($subsectionjunior=='1'){
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

  </div>
      
    </div
    </div><!-- end of accordion body -->
  </div><!-- end of accordion item -->


  <div class="accordion__item js-accordion-item">
    <div class="accordion-header js-accordion-header">The Course</div> 
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

$subsectionjunior = $row['resource_sectionjunior'];

    if ($subsectionjunior=='2'){
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

  </div>
      
    </div><!-- end of accordion body -->
  </div><!-- end of accordion item -->


    <div class="accordion__item js-accordion-item">
    <div class="accordion-header js-accordion-header">The Consequences</div> 
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

$subsectionjunior = $row['resource_sectionjunior'];

    if ($subsectionjunior=='3'){
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

  </div>
      
    </div><!-- end of accordion body -->
  </div><!-- end of accordion item -->

<p></p>
<h2>Leaving Certificate</h2>
<p></p>
<div class="accordion js-accordion">
    <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">Politics and Administration</div> 
    <div class="accordion-body js-accordion-body">

        <div class="accordion js-accordion">
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">From Brookeborough to O'Neill</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='101'){
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

          <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">The Civil Rights Movement</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='102'){
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
         <div class="accordion__item js-accordion-item">
          <div class="accordion-header js-accordion-header">Emergence of the Provisional IRA</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='103'){
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
       <div class="accordion__item js-accordion-item">
        <div class="accordion-header js-accordion-header">The fall of Stormont</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='104'){
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
     <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">Direct Rule</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='105'){
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
   <div class="accordion__item js-accordion-item">
    <div class="accordion-header js-accordion-header">Republican and Loyalist terrorism </div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='106'){
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
 <div class="accordion__item js-accordion-item">
  <div class="accordion-header js-accordion-header">Sunningdale and power-sharing</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='107'){
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
<div class="accordion__item js-accordion-item">
  <div class="accordion-header js-accordion-header">The Anglo-Irish Agreement 1985</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='108'){
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
<div class="accordion__item js-accordion-item">
  <div class="accordion-header js-accordion-header">The Republic - responses to the 'Troubles'.</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='109'){
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='110'){
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


    <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">The Sunningdale Agreement and the Power<!---Sharing Executive, 1973-74--></div> 
    <div class="accordion-body js-accordion-body">

        <div class="accordion js-accordion">
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">Sunningdale</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='201'){
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

          <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">UWC Strike</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='202'){
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


      <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">Society and the Economy</div> 
    <div class="accordion-body js-accordion-body">
      
        <div class="accordion js-accordion">
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">Impact of Welfare State; education, health, housing.</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='301'){
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

          <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">Social and economic developments prior to 1969.</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='302'){
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
         <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">Impact of the 'Troubles' on the economy</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='303'){
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
         <div class="accordion__item js-accordion-item">
          <div class="accordion-header js-accordion-header">Impact of the 'Troubles' on society - education, health, housing</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='304'){
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


       <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">The Coleraine University Controversy</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='401'){
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

    </div>
        
        </div><!-- end of sub accordion -->
      </div><!-- end of accordion body -->
    </div><!-- end of accordion item -->


       <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">Culture and Religion</div> 
    <div class="accordion-body js-accordion-body">

        <div class="accordion js-accordion">
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">Religious Affiliation and cultural identity</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='501'){
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
          <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">Ecumenism</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='502'){
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
          <div class="accordion__item js-accordion-item">
             <div class="accordion-header js-accordion-header">Cultural response to the 'Troubles'</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='503'){
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


       <div class="accordion__item js-accordion-item">
      <div class="accordion-header js-accordion-header">The Apprentice Boys of Derry</div> 
    <div class="accordion-body js-accordion-body">
      <!--<div class="accordion-body js-accordion-body">-->
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='601'){
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
        
        </div><!-- end of sub accordion -->
      </div><!-- end of accordion body -->
    </div><!-- end of accordion item -->


    <div class="accordion__item js-accordion-item">
        <div class="accordion-header js-accordion-header">Personalities</div> 
      <div class="accordion-body js-accordion-body">

          <div class="accordion js-accordion">
            <div class="accordion__item js-accordion-item">
               <div class="accordion-header js-accordion-header">Terence O'Neill</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='701'){
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
            <div class="accordion__item js-accordion-item">
                <div class="accordion-header js-accordion-header">Conn and Patricia McClusky</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='702'){
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
            <div class="accordion__item js-accordion-item">
               <div class="accordion-header js-accordion-header">Bernadette Devlin</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='703'){
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
            <div class="accordion__item js-accordion-item">
              <div class="accordion-header js-accordion-header">Ian Paisley</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='704'){
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
           <div class="accordion__item js-accordion-item">
               <div class="accordion-header js-accordion-header">Brian Faulkner</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='705'){
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
            <div class="accordion__item js-accordion-item">
              <div class="accordion-header js-accordion-header">John Hume</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='706'){
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
           <div class="accordion__item js-accordion-item">
               <div class="accordion-header js-accordion-header">James Molyneaux</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='707'){
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
           <div class="accordion__item js-accordion-item">
              <div class="accordion-header js-accordion-header">Margaret Thatcher</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='708'){
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
           <div class="accordion__item js-accordion-item">
              <div class="accordion-header js-accordion-header">Gerry Adams</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='709'){
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
           <div class="accordion__item js-accordion-item">
            <div class="accordion-header js-accordion-header">Seamus Heaney</div> 
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

$subsectionleaving = $row['resource_subsectionleaving'];

    if ($subsectionleaving=='710'){
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