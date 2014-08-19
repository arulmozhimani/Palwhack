<html>
<head>
	<title>Palwhack</title>
	<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
<script src="jQueryAssets/bootstrap.js"></script>
<meta name="viewport" content="initial-scale=1, maximum-scale=1">

</head>
<body>
<div class="row-fluid">
<?php

include('drive/DB.php');
session_start();
if(isset($_SESSION['userid'])){
	echo'    <div class="navbar alert-success">
    <div class="navbar pos-fix" style="max-width:960px;margin:auto">
	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
    <a class="brand"  style="margin-left:10px;" href="index.php"><img src="img/palwhack_white.png" width="120px"/></a>
	
<div class="nav-collapse collapse">


    <ul class="nav">

    <li><a href="DailyExp.php">Daily Expense Sheet</a></li>
	<li><a href="MonthlyExp.php">Monthly Expense Sheet</a></li>
	<li><a href="#">Gang Expense Sheet</a></li>
	<li><a href="#">Credit</a></li>
	<li><a href="#">Debit</a></li>
	
    </ul>
	<a href="logout.php"  class="btn pull-right top-fix res-fix" style="margin-right:10px">Logout</a>
    </div>
	</div>
    </div>';
	   $userid = $_SESSION['userid'];
       $query = mysql_query("SELECT * FROM users WHERE usrid='$userid'");
	   while ($row = mysql_fetch_array($query)){
		    $name_User = $row['name'];
				 
		   }
		 
		 
	}else{
		header('Location: index.php');

	}
	
?>

<p style="width:95%;margin:auto;border-bottom:thin solid #fff;padding-bottom:3px;margin-bottom:15px;">Welcome <?php echo '<b>'.$name_User.'</b>' ?>
<?php  
if($_SESSION['role']==1){
		echo'<a href="pal-admin/index.php"  class="btn pull-right top-fix res-fix" style="margin-top:-10px!important">Admin</a>';
		}
		?>
</p>