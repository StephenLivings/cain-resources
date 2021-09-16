<?php

session_start();
include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CAIN in the Curriculum</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
<link rel="stylesheet" href="css/body.css">
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100">
<link rel="stylesheet" href="carousel.css">

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
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="forumsignup.php">Register</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="forumsignin.php">Sign In</a>
              </li>
          </ul>

        </div>
      </nav>
      <div id="background">
          <div id="indent">

<?php
 


echo '<h3>Sign in</h3>';

//first, check if the user is already signed in. If that is the case, there is no need to display this page
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
	echo 'You are already signed in. You may <a href="logout.php">sign out</a> if necessary.';
}
else
{
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		/*the form hasn't been posted yet, display it
		   */
		echo '<form method="post" action="">
			Username: <input type="text" name="user_name" /></br>
			Password: <input type="password" name="user_pass"></br>
			<input type="submit" value="Sign in" />
		 </form>';
	}
	else
	{
		/* the form has been posted, process the data in three steps:
			1.	Check the data
			2.	Let the user refill the wrong fields (if necessary)
			3.	Varify if the data is correct and return the correct response
		*/
		$errors = array(); /* declare the array for later use */
		
		if(!isset($_POST['user_name']))
		{
			$errors[] = 'The username field must not be empty.';
		}
		
		if(!isset($_POST['user_pass']))
		{
			$errors[] = 'The password field must not be empty.';
		}
		
		if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
		{
			echo 'A couple of fields are not filled in correctly.';
			echo '<ul>';
			foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
			{
				echo '<li>' . $value . '</li>'; /* this generates an error list */
			}
			echo '</ul>';
		}
		else
		{
			//the form has been posted without errors, so save it
			//notice the use of mysql_real_escape_string, keep everything safe!
			//also notice the sha1 function which hashes the password
			$sql = "SELECT 
						`user_keyid`,
						`user_name`,
						`user_level`,
                        `user_type`
					FROM
						`cain_users`
					WHERE
						`user_name` = '" . mysqli_real_escape_string($conn, $_POST['user_name']) . "'
					AND
						`user_password` = '" . sha1($_POST['user_pass']) . "'";
						
			$result = mysqli_query($conn, $sql);
			if(!$result)
			{
				//something went wrong, display the error
				echo 'Something went wrong while signing in. Please try again later.';
				
			}
			else
			{
				//the query was successfully executed, there are 2 possibilities
				//1. the query returned data, the user can be signed in
				//2. the query returned an empty result set, the credentials were wrong
				if(mysqli_num_rows($result) == 0)
				{
					echo 'You have supplied a wrong user/password combination. Please try again.';
				}
				else
				{
					//set the $_SESSION['signed_in'] variable to TRUE
					$_SESSION['signed_in'] = true;
					
					//we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
					while($row = mysqli_fetch_assoc($result))
					{
						$_SESSION['user_id'] 	= $row['user_keyid'];
						$_SESSION['user_name'] 	= $row['user_name'];
						$_SESSION['user_level'] = $row['user_level'];
                        $_SESSION['user_type'] = $row['user_type'];
                        $_SESSION['signed_in'] = $row['user_keyid'];
					}
					
					echo 'Welcome, ' . $_SESSION['user_name'] . '. </br>
                    <a href="dashboard.php"><h4>Proceed to the dashboard</h4></a>.';
				}
			}
		}
	}
}

include 'forumfooter.php';
?>
</div>
</div>
</body>