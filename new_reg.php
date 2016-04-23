<?php
		include 'header.php';	
	?>
	
	<?php
		
		if(isset($_SESSION['teamName']))
		{
			$sql = "SELECT team_id, team_name from TEAM where team_name = '".$_SESSION['teamName']."'";
			$result = mysqli_query($conn,$sql);

			if (mysqli_num_rows($result) > 0) 
			{
				//echo "Registration details for ".$_SESSION["teamName"]. " are:-<br>";
				echo "<div class='container'>
				<h3>Registration Successful</h3>
				<div class='row col-md-2'>
				</div>
				<div class='row col-md-9'>
					<div class='table-responsive'>
					<table class='table'>
					<tr>
						<td><h4>Team-ID</h4></td>
						<td><h4>Team Name</h4></td>
					</tr>";
					
				$row = mysqli_fetch_assoc($result); 
				
					echo "<tr>
							<td>".$row['team_id']."</td>
							<td> ".$row['team_name']."</td>
						</tr>";
				
				echo "<tr><td colspan='2' style='text-align:center;'>Please make a note of your unique Team-ID for future reference.</td></tr>
				</table><br></div>
				</div>
				<div class='row col-md-2'>
				</div>
				</div>";
			}
			else
			{
				echo "Unsuccessful Team Registration";
			}
			unset($_SESSION['teamName']);
		}
		
		else if(isset($_SESSION['partName']))
		{
			$sql = "SELECT name, part_id from PARTICIPANTS where name = '".$_SESSION['partName']."'";
			$result = mysqli_query($conn,$sql);

			if (mysqli_num_rows($result) > 0) 
			{
				//echo "Registration details for ".$_SESSION["teamName"]. " are:-<br>";
				echo "<div class='container'>
				<h3>Participant Registration Successful</h3>
				<div class='row col-md-2'>
				</div>
				<div class='row col-md-9'>
					<div class='table-responsive'>
					<table class='table'>
					<tr>
						<td><h4>Participant-ID</h4></td>
						<td><h4>Participant Name</h4></td>
					</tr>";
					
				$row = mysqli_fetch_assoc($result); 
				
					echo "<tr>
							<td>".$row['part_id']."</td>
							<td> ".$row['name']."</td>
						</tr>";
				
				echo "<tr><td colspan='2' style='text-align:center;'>Please make a note of your Participant-ID for future reference.</td></tr>
					  <tr><td colspan='2' style='text-align:center;'>You can register for any event using this ID.</td></tr>
				</table><br></div>
				</div>
				<div class='row col-md-2'>
				</div>
				</div>";
			}
			else
			{
				echo "Unsuccessful Participant Registration";
			}
			
			unset($_SESSION['partName']);
			
		}
		
		else
		{
			echo "ERROR";
		}

    ?>
		

	
<!DOCTYPE html>
<html>
<head>
	<title>Admins Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="js/myjs.js"></script>

  		<style >
			.table input button textarea select{
			
			width:100% !important;
		}

		h3{
			text-decoration: underline ;
			text-align: center;
		}

		.container{
			border-bottom: 2px solid black;
			border-left: 2px solid black;
		}

		#footer{
			border-left: 2px solid black;	
		}
		</style>
</head>	
</html>

		
	<?php
		include 'footer.php';	
	?>
