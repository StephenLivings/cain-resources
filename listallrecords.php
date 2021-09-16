<?php

session_start();


$endpoint = "http://slivingston02.lampt.eeecs.qub.ac.uk/cain/api/allrecordapi.php?allfields";

$dataset = file_get_contents($endpoint);

$allinfo = json_decode($dataset, true);

include("connect.php");

//print_r($allinfo);

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
                <a class="nav-link" href="admin.php">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Log Out</a>
              </li>
          </ul>

        </div>
      </nav>


        <div class="col m12" id="bodytext">

        <h2>All Records</h2>

        <div class="col m4">
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <fieldset>
              <label for="guessField">Choose the Type of Record</label>
              <select id="guessField" name="resource_source">
                <option disabled selected value> -- select -- </option>
                <option value="1">CAIN</option>
                <option value="2">CAIN PRONI</option>
                <option value="3">CAIN NAI</option>
                <option value="4">Ulster Museum</option>
                <option value="5">BBC Bitesize</option>
                <option value="6">BBC Archive</option>
                <option value="7">BBC Rewind</option>
                <option value="8">Youtube</option>
                <option value="9">Incore</option>
                <option value="10">RTE Archives</option>
                <option value="11">UTV</option>
                <option value="12">NI SDFA</option>
                <option value="13">Studyclix</option>
                <option value="14">Studyclix Lagan College</option>
                <option value="15">UU</option>
                <option value="16">Other</option>
              </select>
              


          
              <!--<div class="float-right">-->
              <input class="button-primary" type="submit" value="filter" id="savebutton">
            
              </div>
             
            </fieldset>
            
          </form>
<?php
          if(isset($_POST['resource_source'])){

$resourcetype = $_POST['resource_source'];

$_SESSION['resource_source'] = $resourcetype;

header("Location: resourcetype.php");

}?>

    <table class="_width100">
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

    echo "<tr><div class=''>
    <th>{$row["resource_keyid"]}</th>
                <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
                <th>$searchsource</th>
                
                
        </div></tr> ";


    }
    

?>
</div>
  </tbody>
</table>



 
    </header>
   


</body>

<footer>
  <div class="row" id="companyheader">
        <div class="col m12" id="footertext">
            <id class="small">© CAIN In The Curriculum</id>
        </div>
    </div>
</footer>
<script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
</html>