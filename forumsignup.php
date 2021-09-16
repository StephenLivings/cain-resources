

<?php

include 'connect.php';
//include 'forumheader.php';
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
        <!--<a class="navbar-brand" href="#">Navbar</a>-->
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
            <li class="nav-item active">
                <a class="nav-link" href="forumsignup.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="forumsignin.php">Sign In</a>
              </li>
          </ul>

        </div>
      </nav>
      <div id="background">
          <div id="indent">

<?php
 
echo '<h3>Register / Sign Up</h3>';
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo '<form method="post" action="">
        Username: <input type="text" name="user_name" /></br>
        Password: <input type="password" name="user_password"></br>
        Password again: <input type="password" name="user_pass_check"></br>
        E-mail: <input type="email" name="user_email"></br>
        School: <input type="text" name="user_school"></br>

        <label for="guessField">User Type</label>
        <select id="guessField" name="user_type">
          <option disabled selected value> -- select -- </option>
          <option value="1">NI Teacher</option>
          <option value="2">RoI Teacher</option>
          <option value="3">RoI Pupil</option>
        </select></br>


        <input type="submit" value="Register" />
     </form>';
}
else
{
    /* so, the form has been posted, we'll process the data in three steps:
        1.  Check the data
        2.  Let the user refill the wrong fields (if necessary)
        3.  Save the data 
    */
    $errors = array(); /* declare the array for later use */
     
    if(isset($_POST['user_name']))
    {
        //the user name exists
        if(!ctype_alnum($_POST['user_name']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if(strlen($_POST['user_name']) > 40)
        {
            $errors[] = 'The username cannot be longer than 40 characters.';
        }
    }
    else
    {
        $errors[] = 'The username field must not be empty.';
    }
     
     
    if(isset($_POST['user_password']))
    {
        if($_POST['user_password'] != $_POST['user_pass_check'])
        {
            $errors[] = 'The two passwords did not match.';
        }
    }
    else
    {
        $errors[] = 'The password field cannot be empty.';
    }

    if(!isset($_POST['user_type']))   //////////
    {
        $errors[] = 'A type of user must be selected.';
        //the user name exists
        //if($_POST['user_type'] != "1" || $_POST['user_type'] != "2" || $_POST['user_type'] != "3")
        //{
           // $errors[] = 'A type of user must be selected.';
        //}

    }
   
     
     
    if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array*/
    {
        echo 'A couple of fields are not filled in correctly.';
        echo '<ul>';
        foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
        {
            echo '<li>' . $value . '</li>'; /*  generates an error list */
        }
        echo '</ul>';
    }
    else
    {
        //the form has been posted without, so save it
        //mysqli_real_escape_string, to keep everything safe
        //the sha1 function hashes the password
        $sql = "INSERT INTO
                    cain_users(user_name, user_password, user_email ,user_date, user_level,user_school,user_type)
                VALUES('" . mysqli_real_escape_string($conn, $_POST['user_name']) . "',
                       '" . sha1($_POST['user_password']) . "',
                       '" . mysqli_real_escape_string($conn, $_POST['user_email']) . "',
                        NOW(),
                        0,
                        '" . mysqli_real_escape_string($conn, $_POST['user_school']) . "',
                        '" . mysqli_real_escape_string($conn, $_POST['user_type']) . "')";
               
             $result = mysqli_query($conn,$sql);
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
 
        }
        else
        {
 
            echo 'Successfully registered. You can now <a href="forumsignin.php">sign in</a> and start posting!';
        }
    }
}


include 'forumfooter.php';
?>
</div>
</div>
</body>