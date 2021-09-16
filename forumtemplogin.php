<? php
include "connect.php";

$sql = "INSERT INTO cain_users (`user_name`,`user_password`,`user_email`,`user_date`,`user_level`)VALUES (`$_POST['bbc']`,`$_POST['bbcbbc']`,`'$_POST['bbc']'`,NOW(),0);";
$result = mysqli_query($conn,$sql);

    $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Successfully registered. You can now <a href="signin.php">sign in</a> and start posting! :-)';
        }

        ?>