<?php

session_start();

if(!isset($_SESSION['signed_in'])){

    header("Location: frontindex.html");
} else {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_level']);
    unset($_SESSION['user_type']);
    unset($_SESSION['signed_in']);
    header("Location: loggedout.php");
}
?>

