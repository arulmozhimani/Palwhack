<?php
ob_start();
?>
<?php

include('header.php');

	
?>
<div class="span4" style="background:#fff;border-radius:3px;">
<p style="padding-left:10px;padding-top:10px;font-weight:bold">Daily Expense Sheet</p>
<ul>
<table class="table table-striped" style="width:90%;">
<thead>
  <th>Date</th>
  <th>Paid</th>
  <th>View</th>
</thead>
<tbody style="text-align:center">
<?php
$expdata = mysql_query("SELECT * FROM dexp WHERE oid='$userid' order BY eid DESC LIMIT 0,5");
while($row = mysql_fetch_array($expdata)){
	echo'<tr>';
	echo'<td>'.$row['date'].'</td><td>'.$row['paid'].'</td><td>'.$row['reason'].'</td>';
	echo'</tr>';
	}
?>

</tbody>
</table>
</ul> 
</div>
<div class="span4"  style="background:#fff;border-radius:3px;">
<p style="padding-left:10px;padding-top:10px;font-weight:bold">Monthly Expense Sheet</p><ul>
<table class="table table-striped" style="width:90%;">
<thead>
  <th>Date</th>
  <th>Paid</th>
  <th>View</th>
</thead>
<tbody style="text-align:center">
<tr>
<td>
-
</td>
<td>
-
</td>
<td>
-
</td>
</tr>
</tbody>
</table>
   </ul>
</div>

<div class="span4"  style="background:#fff;border-radius:3px;">
<p style="padding-left:10px;padding-top:10px;font-weight:bold">Gang Expense Sheet</p>
<ul>
<table class="table table-striped" style="width:90%;">
<thead>
  <th>Date</th>
  <th>Paid</th>
  <th>View</th>
</thead>
<tbody style="text-align:center">
<tr>
<td>
-
</td>
<td>
-
</td>
<td>
-
</td>
</tr>
</tbody>
</table>
</ul>
</div>

</div>

<div class="site-footer">
</div>
</body>
</html>