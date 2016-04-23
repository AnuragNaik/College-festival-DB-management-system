<?php
session_start();
include('connection.php');
if( isset( $_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = mysqli_query($conn , 'Select * from MANAGING_TEAM where member_id="'.$username.'" and password="'.$password.'"');
	
	if( mysqli_num_rows($result) >= 1)
	{
		$_SESSION['username'] = $username;
		header('Location: admin.php');
	}
	else
		echo "Member_id invalid or password invalid";
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php
		echo "<title>". $_SESSION['eventname']." :Details</title>";
	?>
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

	<div id="list" class="container">
		<div class="row">
		<div class="col-md-2"></div>
		<div class="clo-md-8">
			<ul id="navi" class="nav nav-tabs">
				<li><a href="home.php">Home</a></li>
				<li><a href="part_reg.php">Get Fest ID</a></li>
				<li><a href="event.php">Events</a></li>
				<li><a href="result.php">Results</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</div>
		<div class="col-md-2"></div>
		</div>
	</div>

<div id="item">
	<div class="container">
		<div class="row col-md-2">
		</div>
		<div class="row col-md-9">
			<div class="table-responsive">
				<table class="table">
					<?php
						$event_name = $_SESSION['eventname'];
						$sql = "SELECT event_com_id, event_mgr_id, event_date, event_location, num_participants,event_description, participants_req FROM EVENT WHERE event_name= '$event_name'";
						$result= mysqli_query($conn, $sql);
					
						if(mysqli_num_rows($result)>0){
							
							$row= mysqli_fetch_array($result);		
							$detail['date']= $row[2];
							$detail['location']= $row[3];
							$detail['number_part']= $row[4];
							$detail['description']= $row[5];
							$detail['participants_req']= $row[6];
							$sql="SELECT member_name FROM MANAGING_TEAM WHERE member_id= $row[1];";
							$result= mysqli_query($conn, $sql);
							$mgr_name= mysqli_fetch_array($result);	
							
							$sql="SELECT com_name FROM COMMITTEE WHERE com_id= $row[0];";
							$result= mysqli_query($conn, $sql);
							$com_name= mysqli_fetch_array($result);	
										
								echo "
									<tbody>
									<tr id= \"event_name\">
										<td class=\"first_col\">Event Name</td>
										<td class=\"sec_col\">$event_name</td>
									</tr>";
								echo "<tr id= \"com_id\">
										<td class=\"first_col\">Organising Committee</td>
										<td class=\"sec_col\">$com_name[0]</td>
									</tr>";
								echo "<tr id= \"mgr_id\">
										<td class=\"first_col\">Event Manager</td>
										<td class=\"sec_col\">$mgr_name[0]</td>
									</tr>";
								echo "<tr id= \"date\">
										<td class=\"first_col\">Event Date</td>
										<td class=\"sec_col\">".$detail['date']."</td>
									</tr>";
								echo "<tr id= \"location\">
										<td class=\"first_col\">Event Location</td>
										<td class=\"sec_col\">".$detail['location']."</td>
									</tr>";
								echo "<tr id= \"number_part\">
										<td class=\"first_col\">Team Registered</td>
										<td class=\"sec_col\">".$detail['number_part']."</td>
									</tr>";	
								echo "<tr id= \"participants_req\">
										<td class=\"first_col\">Number Of Members Per Team</td>
										<td class=\"sec_col\">".$detail['participants_req']."</td>
									</tr>";
								echo "<tr id= \"description\" >
										<td class=\"first_col\">Description</td>
										<td class=\"sec_col\">".$detail['description']."</td>
									</tr>
								</tbody>";	
							/*	echo "<p id= \"com_id\">Committee Name:  ". $com_name[0]."</p>";
								echo "<p id=\"mgr_id\">Event Manager: ".$mgr_name[0]."</p>";
								echo "<p id=\"date\">event Date: ".$detail['date']."</p>";
								echo "<p id=\"location\">Event Location: ".$detail['location']."</p>";
								echo "<p id=\"number_part\">Team Registered: ".$detail['number_part']."</p>";
								echo "<p id=\"description\">Description:\n\t\t ".$detail['description']."</p>";*/
						}		
						else{
							echo "<script>alert(\"invalid event name!!\");</script>";
						}
					?>
				</table>
			</div>
		</div>	
		<div class="row col-md-2">
		</div>
	</div>
	<div>
		<form name="register" action="registration.php">
			<input type="submit" value="Register for Event"/>
		</form>
	</div>
</div>
<!--
<?php
echo $event_name;
?>
-->
<div id="footer" class="container">
	<h4>Footer notes</h4>
</div>
</div>
</body>
</html>
