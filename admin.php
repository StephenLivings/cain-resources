
<?php

session_start();
include 'connect.php';

      if ($_SESSION['user_level'] == "1"){
          echo 'admin';
header("Location: adminadmit.php");
    } else {
        header("Location: dashboard.php");
    }
    ?>

