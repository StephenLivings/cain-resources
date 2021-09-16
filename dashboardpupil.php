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


<div id ="navbar">
<div class="row">
<div class="col-sm-3">
<div id="indent">
  
    <h3>Graphs</h3>
<img style="width:100%" src="img/graph.png" alt="Image of graph of voting">
    <a href="westminster_perc.php">Westminster Elections Percentage Vote</a></br>
    <a href="westminster_seats.php">Westminster Elections Number of Seats</a></br>
    <a href="assembly_percent.php">Assembly Elections Percentage Vote</a></br>
</br>

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
</div>
</div>
<!-- Middle Column-->
<!-- display curriculum documents and Dr Millikens CAIN document relevant to jurisdiction-->
  <div class="col-sm-6">
  <h3>CAIN In The Curriculum</h3>
<?php
    echo '<h3><a href="accordionroi.php">Resources Mapped To Curriculum</a href></br>';

    
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

        echo '
        <h3>Ireland News</h3>
        Courtesy of RTE News</br>';
        
        $xml = simplexml_load_file("http://www.rte.ie/rss/news.xml");
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
            $content = $itm->children('media', true)->content;

            //$contentattr = $content->attributes();
            //print_r("$contentattr->url");
            $contentattrurl = $content->attributes()->url;
            
            // publich to table
            echo '<tr><td><a href="'.$url.'">'.$title.'</a href></td><td>'.$date.'</td>';
            echo '<td><img src="'.$contentattrurl.'" width = "100" height="57" alt="image of news story"></td>';
            echo'</tr>';
            
        if($i == 6) break;
        }
        echo '</table>';

?>
</div>

<!-- Right column-->
<!-- display 5  most popular resources-->
  <div class="col-sm-3">


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
</div>
