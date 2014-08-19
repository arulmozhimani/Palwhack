<?php
ob_start();
?>
<html>
<head>
	<title>Palwhack</title>
	<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>
<div class="row-fluid">

<?php
include('drive/DB.php');
if(isset($_POST['submit'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = sha1($_POST['pass']);
	if(!empty($name) && !empty($email) && !empty($password)){	 
	mysql_query("INSERT INTO users (name,email,password) VALUES('$name','$email','$password')") or die("query failed");
	echo '<div class="alert-success">Signup sucessfull - <a href="index.php" style="color:#fff">Click here</a> </div>';
	}else{
		echo '<div class="alert-error">Please fill all the fields ..</div>';

		}
	 
	
	}

?>
<div class="span3 offset4 mtm">
<center><img src="img/logo.png" width="150px"/></center>
<form style="margin-top:30px;" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<center><input type="text" placeholder="Name" name="name" required></center><br>
<center><input type="email" placeholder="Email" name="email" required id="email"></center><br>
<center><input type="text" placeholder="*******" name="pass" required></center><br>
<center><input type="submit" class="btn btn-inverse" value="Signup" name="submit"></center>
<p align="center" style="margin-top:15px;">Already a part of Palwhack  <a href="index.php">Login here</a></p>
</form>
</div>
</div>
<div class="site-footer">
</div>
<script>
$("#email").blur(function(){
	var con = $(this).val();
$.post("checkmail.php",{
	email : con
	},function(data){
		if(data == 1){
	  $("#email").focus();
	  $("#email").val("");
		}
		})
	})
</script>
</body>
</html>