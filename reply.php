<?php
include("connect.php");
//session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>-->
<link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
<link rel="stylesheet" href="css/body.css">
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100">
<!--<link rel="stylesheet" href="carousel.css">-->

<style>

</style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-logo">
            <img src="img/cainlogo.png" alt="CAIN in the Curriculum" height="60" width="221" />
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link" href="frontindex.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="dashboard.php" id="about">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="forumindex.php">Forum</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Log Out</a>
              </li>
          </ul>

        </div>
      </nav>



<div id="indent">

<?php
include 'forumnavbar.php';  
  ?>

        <div id="userbar">
		<h1>CAIN In The Curriculum Forum</h1>
        <?php
        
 	if($_SESSION['signed_in'])
 	{
 	 	echo 'Hello ' . $_SESSION['user_name'] . '. Not you? <a href="logout.php">Log out</a></br>';
 	}
 	else
 	{
 		echo '<a href="forumsignin.php">Sign in</a> or <a href="forumsignup.php">create an account</a>.';
 	}
?>
          


<?php

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	//do not allow someone to be calling the file directly
	echo 'This file cannot be called directly.';
}
else
{
	//check session value for sign in status
	if(!$_SESSION['signed_in'])
	{
		echo 'You must be signed in to post a reply.';
	}
	else
	{
        // create a variable for checking for SQL injection - variable used in first line of VALUES 7 lines below
        $reply = $_POST['reply-content'];
		//a real user posted a real reply
        $sql = "INSERT INTO 
                    cain_categories_posts(post_content,
                          post_date,
                          post_topic,
                          post_by) 
                VALUES ('" . mysqli_real_escape_string($conn, $reply) . "',
                        NOW(),
                        " . mysqli_real_escape_string($conn, $_GET['id']) . ",
                        " . $_SESSION['user_id'] . ")";
                         
        $result = mysqli_query($conn, $sql);
						
		//$result = mysql_query($sql);
						
		if(!$result)
		{
			echo 'Your reply has not been saved, please try again later.';
		}
		else
		{
			echo 'Your reply has been saved, check out <a href="forum_topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
		}
	}
}

include 'forumfooter.php';
?>
</div>
</body>
</html>