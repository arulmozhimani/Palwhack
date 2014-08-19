<?php
ob_start();
?>
<?php
$email = $_POST['email'];
include('drive/DB.php');
$mkquery = "SELECT * FROM users WHERE email = '$email'";
$query = mysql_query($mkquery) or die("fail");
$count = mysql_num_rows($query);
echo $count;
?>