<?php

session_start();


$endpoint="http://slivingston02.lampt.eeecs.qub.ac.uk/trims/api/playwithapi2.php?allfields";

$dataset = file_get_contents($endpoint);

$allinfo = json_decode($dataset, true);

include("../comm/connect.php");

print_r($allinfo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
    <link rel="stylesheet" href="../css/base.css">
   <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100">
  
    <title>
       TRIMS</title>
</head>
<body>

    <ul class="topnav" id="myTopnav2" id="companyheader" style="background:#01036e">
    <li><a href="#beauter" class="brand">TRIMS</a></li>
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
        <li> <a href="#" class="active">School Details</a></li>
    <li> <a href="../contact.php" >Contact</a></li>
            <li> <a href="../admin/index.php">Log In</a></li>
          </div>
        </li>

        
        <li class="-icon">
          <a href="javascript:void(0);" onclick="topnav('myTopnav2')">☰</a>
        </li>
      
      </ul>



        <div class="col m12" id="bodytext">

        <h2>Schools</h2>

        <div class="col m4">
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <fieldset>
              <label for="guessField">Choose the Type of School</label>
              <select id="guessField" name="schooltype">
                <option disabled selected value> -- select -- </option>
                <option value="1">Elementary</option>
                <option value="2">Junior High</option>
                <option value="3">High</option>
                <option value="4">Middle</option>
                <option value="5">Pre-School</option>
                <option value="6">Other</option>
              </select>
              


          
              <!--<div class="float-right">-->
              <input class="button-primary" type="submit" value="save" id="savebutton">
            
              </div>
             
            </fieldset>
            
          </form>
<?php
          if(isset($_POST['schooltype'])){

$schtype = $_POST['schooltype'];

$_SESSION['schooltype'] = $schtype;

header("Location: indextype.php");

}?>

    <table class="_width100">
    <thead>
      <tr>
        <th>School Code</th>
        <th>School Name</th>
        <th>School Type</th>
       
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

    //echo "<p>{$row['school_code']}{$row['school_name']}{$row['school_type']}";

                //SELECT type_desc FROM `school_type` INNER JOIN `school_details` ON school_type.type_id = school_details.school_type;
                $sql2 = "SELECT `type_desc` FROM `school_type` INNER JOIN `school_details` ON school_type.type_id = {$row['school_type']}";
                $res2 = $conn->query($sql2);
                $row2 = $res2->fetch_assoc();
                $search2=$row2["type_desc"];

    //echo "<p>{$row['school_id']}</p>";
    $row_id= $row['school_id'];

    echo "<tr><div class=''>
    <th>{$row["school_code"]}</th>
                <th><a href='schoolapi.php?keyid=$row_id'>{$row["school_name"]}</a></th>
                <th>$search2</th>
        </div></tr> ";

    }

    if(isset($_POST['keyid'])){

      $schoolid = $_POST['keyid'];

      $_SESSION['idofschool'] = $schoolid;
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
            <id class="small">© TRIMS The Real Information Management System</id>
        </div>
    </div>
</footer>
<script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
</html>