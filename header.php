<?php
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Event Management</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="js/myjs.js"></script>
</head>	
<body>
	<?php
	/*
	if(!isset($_SESSION['username']))
	{
	echo "<form method='post' action=" .$_SERVER['PHP_SELF']. " >
	<table>
		<tr> 
			<td>Member-ID</td>	
			<td><input type='text' name ='username'</td>
		</tr>
		<tr> 
			<td>Password</td>	
			<td><input type='password' name ='password'</td>
		</tr>
			<td>&nbsp</td>	
			<td><input type='submit' name ='submit' value='Login'</td>
		</tr>
	</table>
	</form>	";
	}
	else
	{
		echo "Hello, ".$_SESSION['username'].".";
		echo "<br>
		<a href='logout.php'>Logout</a>
		<a href='admin.php'>Admin Home</a>";
	}
	*/
?>
<div id="wrapper">
	<div id="header">
		<h2>Welcome to EVENTS PANEL</h2>
	</div>

	<div id="list" class="container" >
		<div class="row">
		<div class="col-md-2"></div>
		<div class="clo-md-8">
			<ul id="navi" class="nav nav-tabs" >
				<li><a href="home.php" >Home</a></li>
				<li><a href="part_reg.php">Get Fest ID</a></li>
				<li><a href="event.php">Events</a></li>
				<li><a href="result.php">Results</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</div>
		<div class="col-md-2"></div>
		</div>
	</div>


</body>
</html>
