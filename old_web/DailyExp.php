<?php
ob_start();
?>
<?php
include('header.php');
if(isset($_POST['submit'])){
			$paid = $_POST['paid'];
			$reason = $_POST['reason'];
			$date = $_POST['date'];
			$reasonother = $_POST['oreason'];
			if($reason == 'other'){
				$reason = $reasonother;
				}
			mysql_query("INSERT INTO dexp(oid,paid,reason,date) VALUES('$userid','$paid','$reason','$date')") or die('Query Failed');
			
			
		}
?>
<div class="span3" style="background:#fff;border-radius:3px;">
<p style="padding-left:10px;padding-top:10px;font-weight:bold">Add New Expense</p>
<ul>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<input type="text" placeholder="Paid" name="paid">
<select id="selectdrop" name="reason">
<?php
$listreason = mysql_query("select * from reasons");
while($row = mysql_fetch_array($listreason)){
    echo'<option value="'.$row['reasons'].'">'.$row['reasons'].'</option>';	
	}
?>
<option value="other">Other</option>
</select>
<textarea placeholder="Reason"  name="oreason" style="display:none" id="oreason"></textarea>
<input type="text" id="Datepicker1" placeholder="Date" name="date"><br />
<input type="submit" value="Add" class="btn" name="submit" >

</form>
</ul>

</div>
<div class="span6" style="background:#fff;border-radius:3px;padding:20px">

<table class="table table-striped">
<thead>
  <th>Date</th>
  <th>Paid</th>
  <th>Reason</th>
  <th>Remove</th>
</thead>
<tbody>
<?php
if(isset($_GET['page'])){
	$pagn = $_GET['page'];
	

	$str = $pagn*5;	
	
		
		
	
	
	$expdata = mysql_query("SELECT * FROM dexp WHERE oid='$userid' LIMIT $str,5");

	}else{
		$expdata = mysql_query("SELECT * FROM dexp WHERE oid='$userid' LIMIT 0,5");
		}
		
	while($row = mysql_fetch_array($expdata)){
	echo'<tr>';
	echo'<td>'.$row['date'].'</td><td>'.$row['paid'].'</td><td>'.$row['reason'].'</td><td style="padding-left: 30px;"><a href="deletedexp.php?id='.$row['eid'].'" class="icon-remove"></a></td>';
	echo'</tr>';
	}
	
	
?>
</tbody>

</table>
<?PHP

$Rexpdata = mysql_query("SELECT * FROM dexp WHERE oid='$userid'");
$totalrow =  mysql_num_rows($Rexpdata);
	$page = $totalrow/5;
	if($totalrow >5){
		echo'<div class="pagination pull-right">
  <ul>';
  for($i=0;$i<$page;$i++){
   $pno = $i+1;
   echo'<li><a href="DailyExp.php?&page='.$i.'">'.$pno.'</a></li>';
   
  }
  echo'</ul>
</div>';
		}
?>
</div>

<div class="span3" style="background:#fff;border-radius:3px;">
<p style="padding-left:10px;padding-top:10px;font-weight:bold">Total Spent on</p>
<ul>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

<input type="text" id="Datepicker2" placeholder="Date" name="datec"><br />
<input type="submit" value="Find" class="btn" name="find" >

</form>
</ul>

<?php

if(isset($_POST['find'])){
	$fdate = $_POST['datec'];
	echo '<p>Total Spent on <b>'.$fdate. '</b>';
	echo'<table class="table table-bordered">
<thead>
  <th>Reason</th>
  <th>Paid</th>
</thead>
<tbody>';
	
	$totalexp = mysql_query("select * from dexp where date='$fdate' and oid='$userid'");
	$expcount =  mysql_num_rows($totalexp);
	 $sum=0;
	while($row = mysql_fetch_array($totalexp)){
		$sum=$sum+ $row["paid"];
		echo'<tr>';
	echo'<td>'.$row['reason'].'</td><td>'.$row['paid'].'</td>';
	echo'</tr>';
		
		};
		echo'</tbody>
</table>';
	echo '<hr> <p style="text-align:right;margin-top:-15px;"><b>Rs. '. $sum.'</b></p>';
}
?>


</div>
</div>
<div class="site-footer" style="margin-top:50px;">
</div>
<script type="text/javascript">
$(function() {
	$( "#Datepicker1,#Datepicker2" ).datepicker(); 
});
$("#selectdrop").change(function(){
	if($(this).val() == 'other'){
		$("#oreason").show();
		}else{
			$("#oreason").hide();
			}
	})
</script>
</body>
</html>