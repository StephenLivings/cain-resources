<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
<link rel="stylesheet" href="css/body.css">
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100">
<body>

<div id="forummenu">
    <div id="indent">
        <div id="padding">
        <style id="navbar">
          a:link {
        color: #770101;
      }
      /* visited link */
      a:visited {
        color: #B3412F;
      }
      /* mouse over link */
      a:hover {
        color: #017777;
      }
      /* selected link */
      a:active {
        color: #000000;
      }  

      </style>
        <p><a class="item" href="create.php">Create A New Record</a>   -
        <a class="item" href="deleteindex.php">Delete A Record</a>   -
        <a class="item" href="updateindex.php">Update An Existing Record</a></p>

        <p><a class="item" href="updatepostindex.php">Amend a Post</a>   -
        <a class="item" href="deleteuserindex.php">Delete A User</a>   -
        <a class="item" href="updateuserindex.php">Update An Existing User</a></p>

        
        </div>
        </div>
        </div>

        <div id="userbar">
        <div id="indent">
        
        
        <?php
        
 	if($_SESSION['signed_in'])
 	{
 	 	echo 'Hello ' . $_SESSION['user_name'] . '. Not you? <a href="logout.php" >Log out</a>';
 	}
 	else
 	{
 		echo '<a href="forumsignin.php">Sign in</a> or <a href="forumsignup.php">create an account</a>.';
 	}
     
     ?>
     
    </div>
    </div>
   
        
</body>
</html>

        