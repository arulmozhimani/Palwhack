<?php
ob_start();
?>
<?php
include('../header.php');
?>
<div class="span9 offset1" style="background:#fff;min-height:30px;">
<div class="span4">
<p>Add Reason</p>
<?php
if(isset($_POST['preason'])){
	$reason = $_POST['reason'];
mysql_query("INSERT INTO reasons(reasons) values('$reason')");
echo"Added Sucessfully";
	
	}
?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<input type="text" name="reason" placeholder="Reason">
<input type="submit" name="preason" value="add" class="btn btn-info">
</form>
</div>
</div>
</div>
<div class="site-footer" style="margin-top:50px;">
</div>
<script type="text/javascript">
$(function() {
	$( "#Datepicker1,#Datepicker2" ).datepicker(); 
});
</script>
</body>
</html>