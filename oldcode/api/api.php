<?php

header('Content-Type: application/json');

$cleardb_server = "eu-cdbr-west-01.cleardb.com";
$cleardb_username = "b58663ddf59ae8";
$cleardb_password = "1077328e";
$cleardb_db = "heroku_b909e35f617b419";
$active_group = 'default';
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

if($conn->connect_error){
    echo "not connected".$conn->connect_error;
}else{
    echo "connection to DB found.";
}


//$response = array();

            // used in conjunction with structure index.php to retrieve iall information about schools
if(isset($_GET['allfields'])){

$response1 =array();

//$sql = "SELECT school_id, school_code,school_name, school_type, address_a, town, zip_code, phone, fax, first_land_not_eng_pc, eng_learner_pc, av_sat_reading, av_sat_writing, av_sat_maths, grades FROM school_details";
$sql = "SELECT * FROM `heroku_b909e35f617b419`.`cain_resourceitems`";


$result1 = mysqli_query($conn,$sql);

if(!$result1){
    echo $conn->error;
}else{

    while ($row = mysqli_fetch_assoc($result1)){

        $response1[] = $row;
        
    }

    //print_r ($json_array);
echo json_encode($response1);
    //echo '<pre>';
//print_r ($json_array[]);
       //echo'';
}
} else {
    echo 'there was a problem';
}

            // used in conjunction with graph genderindex.php to retrive information calculate averages for genders and sats
if(isset($_GET['malefemale'])){

    $response2 =array();

    //$sql = "SELECT school_id, school_code,school_name, school_type, address_a, town, zip_code, phone, fax, first_land_not_eng_pc, eng_learner_pc, av_sat_reading, av_sat_writing, av_sat_maths, grades FROM school_details";
    $sql = "SELECT male_pc, female_pc, av_sat_reading, av_sat_writing, av_sat_maths FROM school_details WHERE school_type=3";
    
    
    $result2 = mysqli_query($conn,$sql);
    
    if(!$result2){
        echo $conn->error;
    }else{
    
        while ($row = mysqli_fetch_assoc($result2)){
    
            $response2[] = $row;
            
        }
    
        //print_r ($json_array);
    echo json_encode($response2,JSON_NUMERIC_CHECK);
        //echo '<pre>';
    //print_r ($json_array[]);
           //echo'';
    }
    }

                // used in conjunction with graph ethnicindex.php to retrive information calculate averages for ethnicity and sats
    if(isset($_GET['ethnic'])){

        $response3 =array();
    
        //$sql = "SELECT school_id, school_code,school_name, school_type, address_a, town, zip_code, phone, fax, first_land_not_eng_pc, eng_learner_pc, av_sat_reading, av_sat_writing, av_sat_maths, grades FROM school_details";
        $sql = "SELECT afri_american_pc, asian_pc, hispanic_pc, white_pc, nat_am_pc, av_sat_reading, av_sat_writing, av_sat_maths FROM school_details WHERE school_type=3";
        
        
        $result3 = mysqli_query($conn,$sql);
        
        if(!$result3){
            echo $conn->error;
        }else{
        
            while ($row = mysqli_fetch_assoc($result3)){
        
                $response3[] = $row;
                
            }
        
            //print_r ($json_array);
        echo json_encode($response3,JSON_NUMERIC_CHECK);
            //echo '<pre>';
        //print_r ($json_array[]);
               //echo'';
        }
        }

    // used in conjunction with graph needsindex.php to retrive information calculate averages for disadvantage factors, needs and sats
        if(isset($_GET['needs'])){

            $response4 =array();
        
            //$sql = "SELECT school_id, school_code,school_name, school_type, address_a, town, zip_code, phone, fax, first_land_not_eng_pc, eng_learner_pc, av_sat_reading, av_sat_writing, av_sat_maths, grades FROM school_details";
            $sql = "SELECT first_land_not_eng_pc, eng_learner_pc, stud_disability_pc, high_needs_pc, econ_disad_pc, av_sat_reading, av_sat_writing, av_sat_maths FROM school_details WHERE school_type=3";
            
            
            $result4 = mysqli_query($conn,$sql);
            
            if(!$result4){
                echo $conn->error;
            }else{
            
                while ($row = mysqli_fetch_assoc($result4)){
            
                    $response4[] = $row;
                    
                }
            
                //print_r ($json_array);
            echo json_encode($response4,JSON_NUMERIC_CHECK);
                //echo '<pre>';
            //print_r ($json_array[]);
                   //echo'';
            }
            }

            // used in conjunction with graph sizeindex.php to retrive information calculate averages for sizes and sats
            if(isset($_GET['size'])){

                $response5 =array();
            
                //$sql = "SELECT school_id, school_code,school_name, school_type, address_a, town, zip_code, phone, fax, first_land_not_eng_pc, eng_learner_pc, av_sat_reading, av_sat_writing, av_sat_maths, grades FROM school_details";
                $sql = "SELECT av_class_size, num_students, fte_count, av_exp_per_pupil, av_sat_reading, av_sat_writing, av_sat_maths FROM school_details WHERE school_type=3";
                
                
                $result5 = mysqli_query($conn,$sql);
                
                if(!$result5){
                    echo $conn->error;
                }else{
                
                    while ($row = mysqli_fetch_assoc($result5)){
                
                        $response5[] = $row;
                        
                    }
                
                    //print_r ($json_array);
                echo json_encode($response5,JSON_NUMERIC_CHECK);
                    //echo '<pre>';
                //print_r ($json_array[]);
                       //echo'';
                }
                }

// posting information about school - author must have level 1 id

if($_SERVER["REQUEST_METHOD"]==="POST"){
    if(isset($_GET['addschool'])){
    $post1 = $_POST['school_code'];
    $post2 = $_POST['school_name'];
    $post3 = $_POST['school_type'];
    $post4 = $_POST['school_address'];
    $post5 = $_POST['school_town'];
    $post6 = $_POST['school_zip'];
    $post7 = $_POST['school_phone'];
    $post8 = $_POST['school_fax'];
    $post9 = $_POST['landnoteng'];
    $post10 = $_POST['eng_learn'];
    $post11 = $_POST['disability'];
    $post12 = $_POST['high_needs'];
    $post13 = $_POST['econ_disadv'];
    $post14 = $_POST['afri_am'];
    $post15 = $_POST['asian'];
    $post16 = $_POST['hispanic'];
    $post17 = $_POST['white'];
    $post18 = $_POST['nat_am'];
    $post19 = $_POST['male'];
    $post20 = $_POST['female'];
    $post21 = $_POST['total_classes'];
    $post22 = $_POST['av_class_size'];
    $post23 = $_POST['no_of_students'];
    $post24 = $_POST['fte_count'];
    $post25 = $_POST['av_exp_pupil'];
    $post26 = $_POST['sat_reading'];
    $post27 = $_POST['sat_writing'];
    $post28 = $_POST['sat_maths'];
    $post29 = $_POST['grades'];

    //$post30 = $_POST['grades'];

    $sql = "INSERT INTO school_details (`school_code`,`school_name`,`school_type`,`address_a`,`town`,`zip_code`,`phone`,`fax`,`first_land_not_eng_pc`,`eng_learner_pc`,`stud_disability_pc`,`high_needs_pc`,`econ_disad_pc`,`afri_american_pc`,`asian_pc`,`hispanic_pc`,`white_pc`,`nat_am_pc`,`male_pc`,`female_pc`,`total_classes`,`av_class_size`,`num_students`,`fte_count`,`av_exp_per_pupil`,`av_sat_reading`,`av_sat_writing`,`av_sat_maths`,`grades`) VALUES ('$post1','$post2','$post3','$post4','$post5','$post6','$post7','$post8','$post9','$post10','$post11','$post12','$post13','$post14','$post15','$post16','$post17','$post18','$post19','$post20','$post21','$post22','$post23','$post24','$post25','$post26','$post27','$post28','$post29')";
    
    $result6 = mysqli_query($conn,$sql);
// if information has been successfully posted a page for user is displayed informing them of this
    if (!$result6){
        echo $conn->error;
    }else {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='https://rawgit.com/outboxcraft/beauter/master/beauter.min.css'>
            <link rel='stylesheet' href='../css/base.css'>
           <link rel='stylesheet'
            href='https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100'>
          
            <title>
               TRIMS</title>
        </head>
        <body>
        
            <ul class='topnav' id='myTopnav2' id='companyheaderadmin' style='background:#9003fc'>
                <li><a href='#' class='brand'>TRIMS ADMIN</a></li>
                <li><a href='schooldetails.php' class='active'>Enter School Details</a></li>
        
                <li> <a href='schoolstoedit.php'>Amend School Details</a></li>
        
                    <li> <a href='logout.php'>Log Out</a></li>
              
                  </div>
                </li>
        
                
                <li class='-icon'>
                  <a href='javascript:void(0);' onclick='topnav('myTopnav2')'>☰</a>
                </li>
              
              </ul>
        
        ";
        echo "<h3>School Record added successfully</h3>";
        echo"<a href='schooldetails.php'>Go to school details</a>";
    }
 }
}

// posting information about users - author must have level 2 id
// name and email are encrypted using MD5
 if ($_SERVER["REQUEST_METHOD"]==="POST"){
    if(isset($_GET['adduser'])){
$postname = $_POST['username'];
$postemail = $_POST['email_address'];
$postlevel = $_POST['user_level'];

/*code to create random key - taken from https://github.com/kevinkabatra/PHP-API-Key-Generator/commit/951640e7b3ea01fa06301eb962c50f22eaabf33f*/


/* 
 * Copyright (c) 2015, Kevin Kabatra <kevinkabatra@gmail.com>
 * All rights reserved.
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 * 
 * 1. Redistributions of source code must retain the above copyright notice, 
 *    this list of conditions and the following disclaimer. 
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE 
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE 
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR 
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF 
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS 
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN 
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE 
 * POSSIBILITY OF SUCH DAMAGE.
 */

 /* 
 * The code follows the Follow Field Naming Conventions from the 
 * AOSP (Android Open Source Project) Code Style Guidelines for Contributors :
 *     Non-public, non-static field names start with m.
 *     Static field names start with s.
 *     Other fields start with a lower case letter.
 *     Public static final fields (constants) are ALL_CAPS_WITH_UNDERSCORES
 * Hyperlink: (too long for one line)
 *     http://source.android.com/source/code-style
 *     .html#follow-field-naming-conventions
 */

    //declare and set variables
    $output = null;

    /**
     * Generates a random integer between 48 and 122.
     * <p>
     * @return int Non-cryptographically generated random number.
     */
    function findRandom() {
        $mRandom = rand(48, 122);
        return $mRandom;
    }

    /**
     * Checks if $random equals ranges 48:57, 56:90, or 97:122.
     * <p>
     * This function is being used to filter $random so that when used in:
     * '&#' . $random . ';' it will generate the ASCII characters for ranges
     * 0:8, a-z (lowercase), or A-Z (uppercase).
     * <p>
     * @param int $mRandom Non-cryptographically generated random number.
     * @return int 0 if not within range, else $random is returned. 
     */
    function isRandomInRange($mRandom) {
        if(($mRandom >=58 && $mRandom <= 64) ||
                (($mRandom >=91 && $mRandom <= 96))) {
            return 0;
        } else {
            return $mRandom;
        }
    }   

    for($loop = 0; $loop <= 31; $loop++) {
        for($isRandomInRange = 0; $isRandomInRange === 0;){
            $isRandomInRange = isRandomInRange(findRandom());
        }
        $output .= html_entity_decode('&#' . $isRandomInRange . ';');
    }


$sql2 = "INSERT INTO school_authors (`username`,`email_address`,`user_type`,`key_id`)VALUES (MD5('$postname'),MD5('$postemail'),'$postlevel','$output')";
//$sql2 = "INSERT INTO school_authors (`username`,`email_address`)VALUES ('$postname','$postemail')";


$result7 = mysqli_query($conn,$sql2);

// if ifnromation has been successfully posted a page for user is displayed informing them of this
if (!$result7){
    echo $conn->error;
}else {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='https://rawgit.com/outboxcraft/beauter/master/beauter.min.css'>
        <link rel='stylesheet' href='../css/base.css'>
       <link rel='stylesheet'
        href='https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100'>
      
        <title>
           TRIMS</title>
    </head>
    <body>
    
        <ul class='topnav' id='myTopnav2' id='companyheaderadmin' style='background:#9003fc'>
            <li><a href='#' class='brand'>TRIMS ADMIN</a></li>
            <li><a href='schooldetails.php'>Enter School Details</a></li>
    
            <li><a href='userdetails.php'  class='active'>Enter User Details</a></li>
    
                <li> <a href='logout.php'>Log Out</a></li>
          
              </div>
            </li>
    
            
            <li class='-icon'>
              <a href='javascript:void(0);' onclick='topnav('myTopnav2')'>☰</a>
            </li>
          
          </ul>
    
    ";
    echo "<div class='row'>
    <div class='col m1'></div><div class='col m9'><h3>  User Record added successfully</h3>
    <button class='_box'><a href='userdetails.php'>  Go to user details</a></button></div></div>";
    //header("Location: userdetails.php");
}

}
}

if ($_SERVER["REQUEST_METHOD"]==="PUT" && isset($_GET['schooleditid'])) {
   
parse_str(file_get_contents("php://input"),$post_vars);
$newcode = $post_vars['school_code'];
$newname = $post_vars['school_name'];
$newtype = $post_vars['school_type'];
$newaddress = $post_vars['school_address'];
$newzip = $post_vars['school_zip'];
$newphone = $post_vars['school_phone'];
$newfax = $post_vars['school_fax'];
$newlangnoteng = $post_vars['landnoteng'];
$newenglearn = $post_vars['eng_learn'];
$newdisability = $post_vars['disability'];
$newhighneeds = $post_vars['high_needs'];
$newecondisadv = $post_vars['econ_disadv'];
$newafriam = $post_vars['afri_am'];
$newasian = $post_vars['asian'];
$newhispanic = $post_vars['hispanic'];
$newwhite = $post_vars['white'];
$newnatam = $post_vars['nat_am'];
$newmale = $post_vars['male'];
$newfemale = $post_vars['female'];
$newtotalclasses = $post_vars['total_classes'];
$newavclasssize = $post_vars['av_class_size'];
$newnumstudents = $post_vars['no_of_students'];
$newftecount = $post_vars['fte_count'];
$newavexppupil = $post_vars['av_exp_pupil'];
$newsatreading = $post_vars['sat_reading'];
$newsatwriting = $post_vars['sat_writing'];
$newsatmaths = $post_vars['sat_maths'];
//$newgrades = $post_vars['school_grades'];

$id = $_GET["schooleditid"];
$sql = "UPDATE school_details SET school_code='$newcode', school_name='$newname', school_type='$newtype', address_a = '$newaddress', zip_code = '$newzip', phone = '$newphone', fax = '$newfax', first_land_not_eng_pc = '$newlangnoteng', eng_learner_pc = '$newenglearn', stud_disability_pc = '$newdisability', high_needs_pc = '$newhighneeds', econ_disad_pc = '$newecondisadv', afri_american_pc = '$newafriam', asian_pc = '$newasian', hispanic_pc = '$newhispanic', white_pc = '$newwhite', nat_am_pc = '$newnatam', male_pc = '$newmale', female_pc = '$newfemale', total_classes = '$newtotalclasses', av_class_size = '$newavclasssize', num_students = '$newnumstudents', fte_count = '$newftecount', av_exp_per_pupil = '$newavexppupil', av_sat_reading = '$newsatreading', av_sat_writing = '$newsatwriting', av_sat_maths = '$newsatmaths' WHERE school_id='$id'";
echo $sql;
$result = mysqli_query($conn, $sql);

if (!$result){
echo $conn->error;
}
    
}


if ($_SERVER["REQUEST_METHOD"]==="DELETE" && isset($_GET['schooldeleteid'])) {
    $id = $_GET["schooldeleteid"];
    $sql = "DELETE FROM school_details WHERE school_id='$id'";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    
    if (!$result){
    echo $conn->error;
    }
        
    }








/*
echo "hello";
    $response2 = array();
    //$schoolid = $_GET['keyid'];
    
    $sql = "SELECT male_pc, female_pc, av_sat_reading, av_sat_writing, av_sat_maths FROM school_details";
    
    $result2 = mysqli_query($conn,$sql);
    
    
    
    if(!$res){
        echo $conn->error;
    }else{
    
        while ($row = $result2->fetch_assoc()){
    
            $response2[] = $row;
    
            
        }
        //echo '<pre>';
         echo json_encode($response2);
           //echo'';
    }
    }*/

    $conn->close();
        ?>
     