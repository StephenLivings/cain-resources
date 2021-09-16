<?php


//if(!isset($_SESSION['admin_name'])){

   //// header("Location: ../index.php");
//}

include("connect.php");

//$currentuser = $_SESSION['admin_name'];

$id = $_GET['keyid'];



//$_SESSION['keyid'] = $id;

//echo $id;
//$_SESSION['keyid'] = $id;

$arg = $conn->real_escape_string($_GET['keyid']);

$sql = "SELECT * FROM cain_resourceitems WHERE resource_keyid=$id";

$result2 = $conn->query($sql);


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
       CAIN In The Curriculum</title>
</head>
<body>


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



</div>

<!-- title displayed and user name hown when logged in-->

<p><h3>Delete Record</h3></p>
<?php
//$user = $_SESSION['admin_name'];
//echo "<p><h5>$user logged in</h5></p>";

?>

<?php


while($row = $result2->fetch_assoc()){
    $deleterecordkey = $row['resource_keyid'];
echo "<div style='background:#fcf5cb'>
<article>
	 		<form method='post' action='deleterecord.php?keyid=$deleterecordkey' name='deleterecord'>

             <id='keyid'>
			Do you want to delete :</br>
    		Record Code*: {$row['resource_keyid']} </br>
   			 
			
    		Record Title*: {$row['resource_title']}</br>
            
    		  
    		
    		
<button type='submit' class='btn btn-success'>Confirm Delete Record</button>";
echo "</div>";

}            






?>



</body>
</html>


