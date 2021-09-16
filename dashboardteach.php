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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://rawgit.com/outboxcraft/beauter/master/beauter.min.css">
<link rel="stylesheet" href="css/body.css">
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=DM+Sans|Roboto:wght@100">
<!--<link rel="stylesheet" href="carousel.css">-->
<title>CAIN In The Curriculum</title>
<style>
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

      <!-- left column-->
<!-- display the graphs section-->
<div class="row">
<div class="col-sm-3">
<div id="indent">
    <h3>Graphs</h3>
<img style="width:100%" src="img/graph.png" alt="picture of grpah of election results">
    <a href="westminster_perc.php">Westminster Elections Percentage Vote</a></br>
    <a href="westminster_seats.php">Westminster Elections Number of Seats</a></br>
    <a href="assembly_percent.php">Assembly Elections Percentage Vote</a></br>
</br>
    <!--http://feeds.bbci.co.uk/news/northern_ireland/rss.xml-->
    <?php
    //check for northern ireland teacher - if so display the newsfeed
if ($_SESSION['user_type'] == "1"){

    echo '
        <h3>Northern Ireland News</h3>
        Courtesy of BBC News</br>';
        
        $xml = simplexml_load_file("http://feeds.bbci.co.uk/news/northern_ireland/rss.xml#");
        //print_r($xml);
        
        echo '<table>';
        
        // counter $i to collect the top six  stories
        $i = 0;
        // loop through each item in the xml
        foreach ($xml->channel->item as $itm){
        $i++;
            $title = $itm->title;
            $url = $itm->link;
            $date = $itm->pubDate;
            // publich to table
            echo '<tr><td><a href="'.$url.'">'.$title.'</a href></td><td>'.$date.'</td></tr>';
        if($i == 6) break;
        }
        echo '</table>';
        
        
}
?>
</div>
</div>
<!-- Middle Column-->
<!-- display curriculum documents and Dr Millikens CAIN document relevant to jurisdiction-->
  <div class="col-sm-6">
  <h3>CAIN In The Curriculum</h3>
  Dr Matthew Milliken, Ulster University had undertaken work to map resources from the CAIN website to the History curriculum on 'The Troubles.' This has been supplemented with resources from other sources, including BBC, RTE, UTV and Ulster Museum. </br>

<?php
// check if user is a Northern Ireland teacher
if ($_SESSION['user_type'] == "1"){
echo '</br>';
echo '<a href="pdf/nihistory.pdf">PDF of Dr Millikens work on linking CAIN resource to GCSE History</a href></br>';
echo '<a href="https://ccea.org.uk/key-stage-4/gcse/subjects/gcse-history-2017">CCEA GCSE History Syllabus</a href></br>';
echo '</br>';
}

// check if the user is a Republic of Ireland teacher or pupil
if ($_SESSION['user_type'] == "2" || $_SESSION['user_type'] == "3"){
    echo 'You are from Republic.</br>';
    echo '<a href="pdf/roihistory.pdf">PDF of Dr Millikens work on linking CAIN resource to Junior Cycle and Leaving Certificate History</a href></br>';
    echo '<a href="https://www.curriculumonline.ie/getmedia/34acdfbe-fcbf-47c2-a7ea-1e430df58e06/Junior-Cycle-History-Specification.pdf">Junior Cycle History Syllabus</a href></br>';    
    echo '<a href="https://www.curriculumonline.ie/getmedia/da556505-f5fb-4921-869f-e0983fd80e50/SCSEC20_History_syllabus_eng.pdf">Leaving Certificate History Syllabus</a href></br>';    
    echo '<a href="https://www.curriculumonline.ie/getmedia/973412c2-a98e-4131-8ae4-79e4f7790d4d/SCSEC20_History-guidelines_eng_1.pdf">Leaving Certificate History Guidelines For Teachers</a href></br>';    
    
}

// display the relevant message for to search resources by curriculum topics and subtopics
if ($_SESSION['user_type'] == "1"){
    echo '<h3><a href="accordionni.php">Resources Mapped To GCSE Curriculum</a href></br>';
}

if ($_SESSION['user_type'] == "2" || $_SESSION['user_type'] == "3"){
    echo '<h3><a href="accordionroi.php">Resources Mapped To Curriculum</a href></br>';
}
    
?>
<!-- display the latest forum posts section -->
      
      <h3>Latest Forum Posts</h3>
  <!-- code for forum latest posts-->

  <?php
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
                            echo '<a href="forum_topic.php?id=' . $row2['topic_keyid'] . '" title="Link to forum topic">'?><?php echo $row2['topic_subject'] ?><?php echo'</a> ';
                            
                            echo ' at '.date('d-m-Y H:i:s', strtotime($row2['post_date']));
                       
                        }
                            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';

 

?>
<h5>Contact Us</h5>
If you have difficulty in using the site, or have a query or suggestion of a resource to add to the database please <a href="contact.php">contact us</a href>.
</div>

<!-- Right column-->
<!-- display 5  most popular resources-->
  <div class="col-sm-3">
  <h3>Top 5 Popular Resources</h3>
  <?php
$endpoint = "http://slivingston02.lampt.eeecs.qub.ac.uk/cain/api/allrecordapi.php?popular";

$dataset = file_get_contents($endpoint);

$allinfo = json_decode($dataset, true);

include("connect.php");
?>

<table class="_width100">
    <thead>
      <tr>

        <th>Topic</th>
        <th>Source</th>

        
       
      </tr>
    </thead>
    <tbody>
<?php

foreach($allinfo as $row){



                $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
                $res4 = $conn->query($sql4);
                $row4 = $res4->fetch_assoc();
                $searchsource=$row4["sources_location"]; 


    $row_id= $row['resource_keyid'];

    echo "<tr><div class=''>
    
    <th><a href='onerecordalone.php?keyid=$row_id'>{$row["resource_title"]}</a></th>
    <th>$searchsource</th>
                
        </div></tr> ";

    }
   
    ?>
    </tbody>
</table>

<!-- conduct a search,by topic, of the database for resources-->
<h3>Search Records</h3>

<label>
<form action="search.php" method="GET">
	<input type="text" name="query" />
	<input type="submit" value="Search" />
</form>
  </label>

<!-- view all records in database, no matter which jurisdiction-->
 <h3>View All Records</h3>

 <a href="listallrecords.php">View all items held on the database.</a> Some items may only be visible by viewing all records as they are only linked for the 
 <?php 
 if ($_SESSION['user_type'] == "1"){
echo 'Junior Cycle or Leaving Certificate curriculum</br>';
}
if ($_SESSION['user_type'] == "2" || $_SESSION['user_type'] == "3"){
    echo 'GCSE History in Northern Ireland';
}
?>
</div>

</div>

</div>

</div>

