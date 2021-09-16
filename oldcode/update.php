<?php
include('includes/functions.php');

if (isset($_POST['btnUpdate'])):
    update($_POST['temp_name'],$_POST['id']);
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
        <input type ="text" name="id" value="<?php echo $updaterecord['temp_keyid']; ?>">       
    <label for "temp_name">Name</label>
    <input type="text" name="temp_name" id="temp_name" value="<?php echo $updaterecord['temp_name']; ?>">
    <br>
    <button name="btnUpdate">Update Record</button>
</form>

<?php else: ?>
    <h1>User is not set. Try again.</h3>
    <?php endif; ?>

</body>
</html>