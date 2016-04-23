<?php
	include 'header.php';
?>

<?php
if( isset( $_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = mysqli_query($conn , 'Select * from MANAGING_TEAM where member_id="'.$username.'" and password="'.$password.'"');
	
	if( mysqli_num_rows($result) >= 1)
	{
		$_SESSION['username'] = $username;
		header('Location: add_man_form.php');
	}
	else
		echo "Member_id or password invalid";
}

	if(isset($_SESSION['a'])){
		echo "<script> alert('Manager added successfully')</script>";
		unset($_SESSION['a']);
	}
	if(isset($_SESSION['b'])){
		echo "<script> alert('Event Deleted successfully')</script>";
		unset($_SESSION['b']);
	}
	if(isset($_SESSION['c'])){
		echo "<script> alert('Result Posted successfully')</script>";
		unset($_SESSION['c']);
	}
	if(isset($_SESSION['e'])){
		echo "<script> alert('Manager Deleted successfully')</script>";
		unset($_SESSION['e']);
	}
	if(isset($_SESSION['r'])){
		echo "<script> alert('Result Already Uploaded')</script>";
		unset($_SESSION['r']);
	}
	/*if(isset($_SESSION['ea'])){
		echo "<script> alert('Event Added Successfully')</script>";
		unset($_SESSION['ea']);
	}*/
	if(isset($_SESSION['eu'])){
		echo "<script> alert('Event Updated Successfully')</script>";
		unset($_SESSION['eu']);
	}
	if(isset($_SESSION['um'])){
		echo "<script> alert('Manager Updated Successfully')</script>";
		unset($_SESSION['um']);
	}
	if(isset($_SESSION['eve'])){
		echo "<script> alert('Please select an event first')</script>";
		unset($_SESSION['eve']);
	}
?>

<html>
<head>
	<title>Administrators Page</title>
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
<body>
	<?php
	if(!isset($_SESSION['username']))
	{
	echo "<div class='container'>
			<h3>Admin Login</h3>
			<div class='row col-md-2'>
			</div>
			<div class='row col-md-9'>
				<div class='table-responsive'><table class='table'>
	<form method='post' action=" .$_SERVER['PHP_SELF']. " >
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
	<br></div>
			</div>
			<div class='row col-md-2'>
			</div>
	</div>
	</form>	";
	}
	else
	{
		echo "Welcome, ".$_SESSION['username'].".";
		echo "<br>
		<a href='logout.php'>Logout</a>
		<a href='add_man_form.php'>Admin Home</a>";
	}
	?>

</body>
</html>

<?php
		include 'footer.php';	
?>
