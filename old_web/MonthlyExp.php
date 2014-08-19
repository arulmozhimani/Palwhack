<?php
ob_start();
?>
<?php
include('header.php');
?>

<div class="span9 offset1" style="background:#fff;border-radius:3px;padding:20px">
<p>Monthly Expense Sheet</p>
<b>Total Spent for this month - Rs. 
<?php
$month =  date("m/d/y");
$seg_month = explode('/',$month);
$fetch_all = mysql_query("select * from dexp where date LIKE '$seg_month[0]%'");
$total_spent = 0;
while ($row = mysql_fetch_array($fetch_all)){
	$total_spent = $total_spent+$row['paid'];
	
	}

echo $total_spent;

?>
<a href="#" class="icon-eye-open" id="view_all_btn " style='margin-left:5px'></a> <a href="#" class="icon-eye-close hidden" id="close_view_all_btn" ></a></b><br>
<?php
$fetch_table = mysql_query("select * from dexp where date LIKE '$seg_month[0]%'");
    echo'<table class="table table-striped hidden span6" id="full_view">
<thead>
  <th>Date</th>
  <th>Paid</th>
  <th>Reason</th>

</thead>
<tbody>';
	while ($tabler = mysql_fetch_array($fetch_table)){
	echo '<tr><td>'.$tabler['date'].'</td><td>'.$tabler['paid'].'</td><td>'.$tabler['reason'].'</td></tr>';
	}?>
    </tbody></table>



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
	
	$("#view_all_btn").click(function(){
		$("#full_view").removeClass('hidden');
		$(this).addClass('hidden');
		$("#close_view_all_btn").removeClass('hidden');
		})
		$("#close_view_all_btn").click(function(){
		$("#full_view").addClass('hidden');
		$(this).addClass('hidden');
		$("#view_all_btn").removeClass('hidden');
		})
</script>
</body>
</html>