<?php
include('includes/functions.php')
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Linked Resources on The Troubles</title>
</head>
<body>
    <h1>All Resources</h1>
    <?php
formatcode(selectAll());
formatcode(selectSingle(13));
?>
</body>
</html>