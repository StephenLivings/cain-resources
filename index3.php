<?php

include('connlocal.php');

$allRecords = selectAll();

function selectAll(){
   
   global $conn;

    $data = array();
    $stmt = $conn->prepare('SELECT * FROM `heroku_b909e35f617b419`.`cain_temp`');
  
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 0): 

    $_SESSION['message'] = array('type'=>'danger', 'msg'=>'There are no records currently stored in the database.');
else:
    while ($row = $result->fetch_assoc()){
        $data[] = $row;
    }
endif;
    $stmt->close();
    return $data;  
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
foreach ($allRecords as $record):
echo '
<tr>
    <td>'.$record['resource_keyid'].' </td>
    <td>'.$record['resource_title'].' </td>
    <td class="text-right">
    <a href="update.php?id='.$record['resource_keyid'].'">Update</a>
    <a href="delete.php?id='.$record['resource_keyid'].'">Delete</a>
</tr>
    ';
    endforeach;
?>
</tbody>
</table>
</div>






</body>
</html>

