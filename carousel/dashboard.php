<?php

session_start();
include 'connect.php';

$sql = "SELECT
cat_keyid,
cat_name,
cat_description
FROM
cain_forum_categories";

$result = mysqli_query($conn, $sql);

$sql2 = "SELECT
cain_forum_topics.topic_keyid,
cain_forum_topics.topic_subject,
cain_forum_topics.topic_cat,
cain_categories_posts.post_content,
cain_categories_posts.post_date,
cain_categories_posts.post_topic
FROM
cain_forum_topics
INNER JOIN
cain_categories_posts
ON
cain_categories_posts.post_topic = cain_forum_topics.topic_keyid";

if(!$result)
{
echo 'The categories could not be displayed, please try again later.';
}
else
{
if(mysqli_num_rows($result) == 0)
{
echo 'No categories defined yet.';
}
}
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
    
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
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


<div class="row">
<div class="col-sm-3">
    <h4>Graphs</h4>
<img style="width:100%" src="img/graph.png">
    Westminster Elections Percentage Vote</br>
    Westminster Elections Number of Seats</br>
    Assembly Elections Percentage Vote</br>
</div>
  <div class="col-sm-6">
  <h3>CAIN In The Curriculum</h3>
  Dr Matthew Milliken, Ulster University had undertaken work to map resources from the CAIN website to the History curriculum on 'The Troubles.' This has been supplemented with resources from other sources, including BBC, RTE, UTV and Ulster Museum. </br>

<?php
if ($_SESSION['user_type'] == "1"){
echo 'You are a Northern Ireland teacher.</br>';
echo '<a href="pdf/nihistory.pdf">PDF of Dr Millikens work on linking CAIN resource to GCSE History</a href></br>';
echo '<a href="https://ccea.org.uk/key-stage-4/gcse/subjects/gcse-history-2017">CCEA GCSE History Syllabus</a href>';
}

if ($_SESSION['user_type'] == "2" || $_SESSION['user_type'] == "3"){
    echo 'You are from Republic.</br>';
    echo '<a href="pdf/roihistory.pdf">PDF of Dr Millikens work on linking CAIN resource to Junior Cycle and Leaving Certificate History</a href></br>';
    echo '<a href="https://www.curriculumonline.ie/getmedia/34acdfbe-fcbf-47c2-a7ea-1e430df58e06/Junior-Cycle-History-Specification.pdf">Junior Cycle History Syllabus</a href></br>';    
    echo '<a href="https://www.curriculumonline.ie/getmedia/da556505-f5fb-4921-869f-e0983fd80e50/SCSEC20_History_syllabus_eng.pdf">Leaving Certificate History Syllabus</a href></br>';    
    echo '<a href="https://www.curriculumonline.ie/getmedia/973412c2-a98e-4131-8ae4-79e4f7790d4d/SCSEC20_History-guidelines_eng_1.pdf">Leaving Certificate History Guidelines For Teachers</a href></br>';    

    
}
?>
      
      <h3>Latest Forum Posts</h3>
  <!-- code for forum latest posts-->

  <?php

echo '<table border="2">
<tr>
  <th>Category</th>
  <th>Last topic</th>
</tr></table>'; 


        echo '<table border="2">
              <tr>
                <th>Category</th>
                <th>Last topic</th>
              </tr>'; 
             
        while($row = mysqli_fetch_assoc($result))
      
        
        {               
            echo '<tr>';
                echo '<td class="leftpart">';
                $newkeyid = $row['cat_keyid'];
                
                    echo '<div id="largertext"><a href="forum_category.php?id='?><?php echo $newkeyid ?> <?php echo'">' . $row['cat_name'] . '</a></div>';
                echo '</td>';
                echo '<td class="rightpart">';

                $sql2 = "SELECT
                cain_forum_topics.topic_keyid,
                cain_forum_topics.topic_subject,
                cain_forum_topics.topic_cat,
                cain_categories_posts.post_content,
                MAX(cain_categories_posts.post_date) AS post_date,
                cain_categories_posts.post_topic
                FROM
                cain_forum_topics
                INNER JOIN
                cain_categories_posts
                ON
                cain_categories_posts.post_topic = cain_forum_topics.topic_keyid
                WHERE
           cain_forum_topics.topic_cat = $newkeyid;";

            $result2 = mysqli_query($conn, $sql2);
            while($row2 = mysqli_fetch_assoc($result2))
            {



                            echo '<a href="forum_topic.php?id=' . $row2['topic_keyid'] . '">'?><?php echo $row2['topic_subject'] ?><?php echo'</a> ';
                            
                            //echo ' at '.$row2['post_date'];
                            echo ' at '.date('d-m-Y H:i:s', strtotime($row2['post_date']));
                       
                        }
                            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';

 

?>
</div>

  <div class="col-sm-3">
      <?php echo 'col-sm-4'; ?>
Other test text</div>
</div>
<div class="col-sm-3">
      <?php echo 'col-sm-3'; ?>
Other test text</div>
</div></div>
