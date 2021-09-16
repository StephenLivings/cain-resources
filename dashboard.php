

<?php

session_start();
include 'connect.php';


      if ($_SESSION['user_type'] == "2" || $_SESSION['user_type'] == "1"){
          header("Location: dashboardteach.php");
      }

      if ($_SESSION['user_type'] == "3"){
        header("Location: dashboardpupil.php");
    }
    ?>

