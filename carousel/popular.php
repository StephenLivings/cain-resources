Find the most popular pages.

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


    $row_id= $row['topic_keyid'];

    echo "<tr><div class=''>
    
    <th>{$row["topic_subject"]}</th>
    <th>$searchsource</th>
                
        </div></tr> ";

    }

    ?>