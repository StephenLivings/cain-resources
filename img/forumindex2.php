<!--Code with help from https://code.tutsplus.com/tutorials/how-to-create-a-phpmysql-powered-forum-from-scratch--net-10188-->
<!-- Page used depracated code and had many errors but gave good basis to help develop forum  -->
<!-- code lines 57 - 90 devised by myself-->

<?php

//session_start();
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
            <img src="img/cainforumlogo.png" alt="CAIN in the Curriculum" height="60" width="454" />
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
              <a class="nav-link" href="about.html">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="forumindex.php">Forum</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="logout.php">Log Out</a>
              </li>
          </ul>

        </div>
      </nav>
      <div id="background">
          <div id="indent">

<?php

include 'connect.php';
include 'forumheader.php';
 
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
    else
    {
        //table

        echo '<table border="1">
              <tr>
                <th>Category</th>
                <th>Last topic</th>
              </tr>'; 
             
        while($row = mysqli_fetch_assoc($result))
      
        
        {               
            echo '<tr>';
                echo '<td class="leftpart">';
                $newkeyid = $row['cat_keyid'];
                
                    echo '<h3><a href="forum_category.php?id='?><?php echo $newkeyid ?> <?php echo'">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
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
    }
}
 
include 'forumfooter.php';
?>
</div>
</div>
</body>