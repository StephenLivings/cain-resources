<?php
include('includes/functions.php');

if (isset($_POST['btnUpdate'])):
    update($_POST['resource_title'],
    //$_POST['resource_cain'],
    $_POST['id']);
endif;
$record = (isset($_GET['id'])) ? selectSingle($_GET['id']) : false;
$updaterecord = selectSingle($_GET['id']);
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
    <?php include('theme/header.php'); ?>
    <?php if ($record != false) : ?>
    <h1>Update</h1>

    <form action="" method="post">
        <input type ="text" name="id" value="<?php echo $updaterecord['id']; ?>"><br>       
    <label for "resource_title">Name</label>
    <input type="text" name="resource_title" id="resource_title" value="<?php echo $updaterecord['resource_title']; ?>"><br>
    <label for "resource_cain">CAIN Resource</label>
   <!-- <input type="form" name="resource_cain" id="resource_cain" value="<?php echo $updaterecord['resource_cain']; ?>"><br>
    <select class="form" name="resource_cain" id="resource_cain">
    <option>Select type</option>
<option value="0">No</option>
<option value="1">Yes</option>
</select>-->

    <br>
    <button name="btnUpdate">Update Record</button>
</form>

<?php else: ?>
    <h1>User is not set. Try again.</h3>
    <?php endif; ?>

</body>
</html>