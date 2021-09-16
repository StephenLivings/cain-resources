<?php

//$endpoint = "http://slivingston02.lampt.eeecs.qub.ac.uk/cain/api/playwithapi2.php?allfields";
$endpoint = "http://slivingston02.lampt.eeecs.qub.ac.uk/cain/api/onerecordapi.php?onekeyid";

$response = file_get_contents($endpoint);

$comments = json_decode($response, true);

include("connect.php");

print_r($comments);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

foreach($comments as $row){

    $sql2 = "SELECT `yesno_answer` FROM `cain_yesno` INNER JOIN `cain_resourceitems` ON cain_yesno.yesno_keyid = {$row['resource_cain']}";
    $res2 = $conn->query($sql2);
    $row2 = $res2->fetch_assoc();
    $searchcain=$row2["yesno_answer"];

    $sql3 = "SELECT `yesno_answer` FROM `cain_yesno` INNER JOIN `cain_resourceitems` ON cain_yesno.yesno_keyid = {$row['resource_teacher']}";
    $res3 = $conn->query($sql3);
    $row3 = $res3->fetch_assoc();
    $searchteacher=$row3["yesno_answer"];

    $sql4 = "SELECT `sources_location` FROM `cain_resource_sources` INNER JOIN `cain_resourceitems` ON cain_resource_sources.sources_keyid = {$row['resource_source']}";
    $res4 = $conn->query($sql4);
    $row4 = $res4->fetch_assoc();
    $searchsource=$row4["sources_location"]; 

    $sql5 = "SELECT `section_ni_title` FROM `cain_sections_ni` INNER JOIN `cain_resourceitems` ON cain_sections_ni.section_ni_keyid = {$row['resource_sectionni']}";
    $res5 = $conn->query($sql5);
    $row5 = $res5->fetch_assoc();
    $searchsecnititle=$row5["section_ni_title"]; 

    $sql6 = "SELECT `junior_title` FROM `cain_section_junior` INNER JOIN `cain_resourceitems` ON cain_section_junior.section_junior_keyid = {$row['resource_sectionjunior']}";
    $res6 = $conn->query($sql6);
    $row6 = $res6->fetch_assoc();
    $searchsecjuniortitle=$row6["junior_title"]; 

    $sql7 = "SELECT `leaving_title` FROM `cain_section_leaving` INNER JOIN `cain_resourceitems` ON cain_section_leaving.section_leaving_keyid = {$row['resource_sectionleaving']}";
    $res7 = $conn->query($sql7);
    $row7 = $res7->fetch_assoc();
    $searchsecleavingtitle=$row7["leaving_title"];

    $sql8 = "SELECT `subsec_title` FROM `cain_subsecni` INNER JOIN `cain_resourceitems` ON cain_subsecni.subsec_keyid = {$row['resource_subsectionni']}";
    $res8 = $conn->query($sql8);
    $row8 = $res8->fetch_assoc();
    $searchsubsecnititle=$row8["subsec_title"]; 

    //$sql9 = "SELECT `junior_title` FROM `cain_section_junior` INNER JOIN `cain_resourceitems` ON cain_section_junior.section_junior_keyid = {$row['resource_sectionjunior']}";
    //$res9 = $conn->query($sql9);
    //$row9 = $res9->fetch_assoc();
    //$searchsecjuniortitle=$row9["junior_title"]; 

    $sql10 = "SELECT `subsecleaving_title` FROM `cain_subsecleaving` INNER JOIN `cain_resourceitems` ON cain_subsecleaving.subsecleaving_keyid = {$row['resource_subsectionleaving']}";
    $res10 = $conn->query($sql10);
    $row10 = $res10->fetch_assoc();
    $searchsubsecleavingtitle=$row10["subsecleaving_title"];

    $sql11 = "SELECT `subsecleaving_title` FROM `cain_subsecleaving` INNER JOIN `cain_resourceitems` ON cain_subsecleaving.subsecleaving_keyid = {$row['resource_subsectionleaving']}";
    $res11 = $conn->query($sql11);
    $row11 = $res11->fetch_assoc();
    $searchroi=$row11["subsecleaving_title"];

    $sql12 = "SELECT `yesno_answer` FROM `cain_yesno` INNER JOIN `cain_resourceitems` ON cain_yesno.yesno_keyid = {$row['resource_in_irl']}";
    $res12 = $conn->query($sql12);
    $row12 = $res12->fetch_assoc();
    $searchroi=$row12["yesno_answer"];

    echo "<p>ID : {$row["resource_keyid"]}</p>";
    echo "<p>Title : {$row["resource_title"]}</p>";
    echo "<p>CAIN Resource : $searchcain</p>";
    echo "<p>Teacher Resource : $searchteacher</p>";
    echo "<p>URL : {$row["resource_url"]}</p>";
    echo "<p>Source: $searchsource</p>";
    echo "<p>Section GCSE : $searchsecnititle</p>";
    echo "<p>Section Junior : $searchsecjuniortitle</p>";
    echo "<p>Section Leaving : $searchsecleavingtitle</p>";
    echo "Sub Section GCSE : <p>$searchsubsecnititle</p>";
    echo "<p>{$row["resource_subsectionjunior"]}</p>";
    echo "<p>Sub SEction Leaving : $searchsubsecleavingtitle</p>";
    echo "<p>Resource Available in RoI : $searchroi</p>";
    echo "<p>Resource Year : {$row["resource_year"]}</p>";
    echo "<p>Resource Info : {$row["resource_info"]}</p>";
    echo "<p>**************************** </p>";

}

?>
    
</body>
</html>
