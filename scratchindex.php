<?php

//$endpoint = "http://slivingston02.lampt.eeecs.qub.ac.uk/cain/api/playwithapi2.php?allfields";
$endpoint = "http://slivingston02.lampt.eeecs.qub.ac.uk/cain/api/playwithapi2.php";

$response = file_get_contents($endpoint);

$comments = json_decode($response, true);

//print_r($comments);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

foreach($comments as $row){

    echo "<p>{$row["resource_title"]}</p>";
   //echo "<p>{$row["resource_info"]}</p>";
   //echo "<p>{$row["school_name"]}</p>";
}

?>
    
</body>
</html>