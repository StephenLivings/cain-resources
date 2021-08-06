<?php
echo 'Code works in php';
include('connlocal.php');
echo 'Code works to connlocal.pph';

//$query = " SELECT school_id, school_code, school_name, school_type FROM school_details";

$query = "SELECT resource_keyid,resource_title FROM cain_resourceitems";
echo $query;
$result=$conn->query($query);

if(!$result){
    echo $conn->error;
  }else{
  
    while($row = $result->fetch_assoc()){
  
      //echo "<p>{$row['school_id']}</p>";
      $row_id= $row['resource_keyid'];
  
      echo "<tr><div class=''>
      <th>{$row["school_code"]}</th>
                  <th>{$row["resource_keyid"]}</th>
                  <th>{$row["resource_title"]}</th>
          </div></tr> ";
  
  
    }
  
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">

   <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100">


    <title>All Linked Resources on The Troubles</title>
   <?php 
   //include('theme/header-scripts.php'); 
   ?>
</head>
<body>

    <div class="container fluid">
    <h1>All Records</h1>



    <table class="table datatable">
    <div class="col m12" id="bodytext">
    <table class="_width100">
        <thead>
            <tr>

            <th>ID</th>
            <th>Resource Title</th>
</tr>
</thead>

<tbody>
<?php
if(!$result){
  echo $conn->error;
}else{

  while($row = $result->fetch_assoc()){

    //echo "<p>{$row['school_id']}</p>";
    $row_id= $row['resource_keyid'];

    echo "<tr><div class=''>
    <th>{$row["school_code"]}</th>
                <th>{$row["resource_keyid"]}</th>
                <th>{$row["resource_title"]}</th>
        </div></tr> ";


  }

}
?>
</tbody>
</table>
</div>






</body>
</html>

