<?php

$endpoint="https://cain-resources.herokuapp.com/api/api.php?allfields";

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
