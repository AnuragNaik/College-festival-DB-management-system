<?php			
include('connection.php');
session_start();

$i = $_SESSION['part_req'];
$j = $_SESSION['eventid'];
	
//echo $row1[0];
//echo $_SESSION['eventname'];

$error = ""; 
 
if (isset($_POST['part_register']))
{

	$cname = trim($_POST['college_name']);
	$pnum = $_POST['phone_num'];


    $count =1;

    	$name = trim( $_POST["$count"]);

    	if ((!ctype_alpha(str_replace(array(" ","'", "-"), "",$name))) || empty($name)) { 
			$error .= '<p class="error">Invalid Member name.</p>';
		}
		


	 if(empty($cname))
    	$error .= '<p class="error">Please enter a college name.</p>';
    
	if (!ctype_digit($pnum) OR strlen($pnum) != 10) 
	{
			$error .= '<p class="error">Enter a valid 10 digit phone number.</p>';
		}
		
		



}
		

if(isset($_POST['part_register']) && $error == "")
	{	
			//UPDATE  `db_b130974cs`.`EVENT` SET  `num_participants` =  '1' WHERE  `EVENT`.`event_id` =1;

			$name = trim( $_POST["$count"]);
			$sql = "INSERT INTO PARTICIPANTS (name, part_id, contact, college) VALUES ('".$name."', NULL, '".$pnum."' ,'".$cname."')";
					//INSERT INTO `PARTICIPANTS`(`name`, `part_id`, `contact`, `college`) VALUES ([value-1],[value-2],[value-3],[value-4])
			$result = mysqli_query($conn,$sql);
			
			
				


		$_SESSION['partName'] = $name;
		//echo "<script> alert('No error')</script>";
		header('Location: new_reg.php');		
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="js/myjs.js"></script>
  	<style>
	  	p.error {background: #ffd; color: red;}
		p.error:before {content: "Error: ";}
		p.success {background: #ffd; color: green;}
		p.success:before {content: "Success: ";}
		p.error, p.success {font-weight: bold;}
	</style>
</head>	
<body>
	<!--
	<?php
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
		<a href='logout.php'>Logout</a>";
	}
?>
 -->

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

	<?=$error?>
	<form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
		<fieldset class="scheduler-border">
			<legend class="scheduler-border">Participant Registration</legend> 
		<?php
		$sql = "SELECT participants_req FROM EVENT WHERE event_name= '".$_SESSION['eventname']."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$i = $row[0];
		$_SESSION['part_req'] = $i;

		$count=1;

			echo "<div class=\"form-group\" id=\"first\">
				<label class=\"control-label col-sm-2\" for=\"reg_name\">Name:</label>	 
				<div class=\"col-sm-8\">  	 	
					<input type=\"text\" class=\"form-control\" placeholder=\"Enter name\" name=\"$count\"/>
				</div>	
			</div>"	;

		?>

			
			<div class="form-group" >
				<label class="control-label col-sm-2" for="college_name">College Name:</label>	 
				<div class="col-sm-8">  	 	
					<input type="text" class="form-control" placeholder="Enter College Name" name="college_name"/>
				</div>	
			</div>		
			
			<div class="form-group" >
				<label class="control-label col-sm-2" for="contact_no">Mobile Number:</label>	 
				<div class="col-sm-8">  	 	
					<input type="text" class="form-control" placeholder="Mobile Number" name="phone_num"/>
				</div>	
			</div>		
				
			<div class="form-group" >
					<button  type="submit" class="btn btn-default" name="part_register">Register</button>
			</div>
			
		</fieldset>
	</form>

	</div>
</div>	

</body>
</html>
	

