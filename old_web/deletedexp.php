<?php
ob_start();
?>
<?php
$id = $_GET['id'];
include('drive/DB.php');
mysql_query("DELETE FROM dexp WHERE eid='$id'") or die("uanble to delete");
header("Location: DailyExp.php");

?>