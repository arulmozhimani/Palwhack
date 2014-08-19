<?php
ob_start()
;?>
<html>
<head>
	<title>Palwhack</title>
	<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>
<div class="row-fluid">
<?php

include('drive/DB.php');
session_start();
if(isset($_SESSION['userid'])){
header('Location: Dashboard.php');
	}else{
if(isset($_POST['submit'])){
	
	$email = $_POST['email'];
	$password = sha1($_POST['pass']);
	if(!empty($email) && !empty($password)){	 
	$query = mysql_query("SELECT * FROM users WHERE email='$email' AND password = '$password'") or die("query failed");
	$status = mysql_num_rows($query);
	if($status == 0){
		echo '<div class="alert-success" style="padding-top: 15px;height: 39px;text-align: center;">Login Failed Please enter valid username and password</div>';
		}else{
			while ($row = mysql_fetch_array($query)){
				  $name_User = $row['name'];
				  $id_usr = $row['usrid'];	
				  $_SESSION['userid'] = $id_usr;
				   $_SESSION['role'] = $row['usrid'];	
				  header('Location: Dashboard.php');		
				}
	echo '<div class="alert-success">Login Sucess - Welcome '.$name_User.' </div>';
	     
			}
	
	}else{
		echo '<div class="alert-success">Please fill all the fields ..</div>';

		}
	 
	
	}
	}
?>
<div class="span3 offset4 mtm">
<center><img src="img/logo.png" width="150px"/></center>
<form style="margin-top:30px;" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<center><input type="email" placeholder="Email" name="email" required></center><br>
<center><input type="password" placeholder="*******" name="pass" required></center><br>
<center><input type="submit" class="btn btn-inverse" value="Login" name="submit"></center>
<p align="center" style="margin-top:15px;">New to Palwhack <a href="Register.php">Click here</a></p>
</form>
</div>
</div>
<div class="site-footer">
</div>
</body>
</html>