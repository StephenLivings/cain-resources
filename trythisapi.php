<?php

$endpoint="api/api.php?allfields";

$dataset = file_get_contents($endpoint);

$allinfo = json_decode($dataset, true);



?>

<div class="col m12" id="bodytext">

<h2>Schools</h2>

<table class="_width100">
<thead>
<tr>
<th>School Code</th>
<th>School Name</th>
<th>School Type</th>

</tr>
</thead>
<tbody>

<th>name</th>
        <th>url</th>
       
       
      </tr>
    </thead>
    <tbody>
      
        
        <?php

foreach($allinfo as $row){

    //echo "<p>{$row['school_code']}{$row['school_name']}{$row['school_type']}";


    //echo "<p>{$row['school_id']}</p>";
    $row_id= $row['resource_keyid'];

    echo "<tr><div class=''>
    <th>{$row["resource_title"]}</th>
                <th><a href='school.php?keyid=$row_id'>{$row["resource_url"]}</a></th>
             
        </div></tr> ";

    }
  




?>
  </tbody>
</table>



 
    </header>
   


</body>
<script src="https://rawgit.com/outboxcraft/beauter/master/beauter.min.js"></script>
</html>