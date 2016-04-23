	<?php
			session_start();
include('connection.php');
			
		?>
		
<!DOCTYPE html>
<html>
<head>
	<title>Update Event</title>
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
	
		<div class="container">
			<h3>Update Event</h3>
			<div class="row col-md-2">
			</div>
			<div class="row col-md-9">
				<div class="table-responsive">
					<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
						<table class="table">
							<?php
								$sql = "Select * from EVENT where event_id = '".$_SESSION['eid']."'";
								//$sql = "Select * from EVENT where event_id = '21'";
								$result = mysqli_query($conn,$sql);
								
								$row = mysqli_fetch_assoc($result);
								
							echo "<tr>
								<td>Event name</td>
								<td> <input type='text' name='event_name' value='".$row['event_name']."'></td>
							</tr>
							<tr>
								<td>Committee id</td>
								<td> <input type='text' name='event_com_id' value='".$row['event_com_id']."'></td>
							</tr>
							<tr>
								<td>Event Manager ID</td>
								<td> <input type='text' name='event_mgr_id' value='".$row['event_mgr_id']."'></td>
							</tr>
							<tr>
								<td>Event Date</td>
								<td> <input type='date' name='event_date' value='".$row['event_date']."'></td>
							</tr>
							<tr>
								<td>Event Location</td>
								<td> <input type='text' name='event_location' value='".$row['event_location']."'></td>
							</tr>
							<tr>
								<td>Event Description</td>
								<td> <input type='text' name='discription' placeholder='Description of Event' value='".$row['event_description']."'></td>
							</tr>
							<tr>
								<td>Number Of Participant Per Team</td>
								<td> <input type='text' name='participants_req' value='".$row['participants_req']."'></td>
							</tr>
							<tr>
								
								<td colspan='2' style='text-align:center;'><input id='button' type='submit' name='update_event' value='Update Event'>
									<input type='reset' name='reset' value='Reset'/></td>
							</tr>
						</table>
						
						<input type='hidden' name='secondTime' value='false'>
						<input type='hidden' name='error' value='false'>";
						?>

						<?php
							if(isset($_POST['update_event'])){
								
									$desc =  $_POST['discription'];
									$loc =  $_POST['event_location'];
									$sql = "SELECT * FROM COMMITTEE WHERE com_id='".$_POST['event_com_id']."';";
									$result= mysqli_query($conn, $sql);
									if(mysqli_num_rows($result)>0){
										$sql = "SELECT * FROM MANAGING_TEAM WHERE member_id='".$_POST['event_mgr_id']."';";
										$result= mysqli_query($conn, $sql);
										if(mysqli_num_rows($result)>0){
											if(trim($desc) !=""){
												if($_POST['participants_req']>0){
													if(isset($_POST['event_date']) ||($_POST['event_date']!="")){
															if(trim($loc) !=""){
																$sql = "UPDATE EVENT SET event_name='".$_POST['event_name']."',event_com_id ='".$_POST['event_com_id']."',event_mgr_id='".$_POST['event_mgr_id']."',event_date ='".$_POST['event_date']."',event_location = '".$_POST['event_location']."',event_description = '".$_POST['discription']."',participants_req = '".$_POST['participants_req']."' WHERE event_id='".$_SESSION['eid']."'";
																$result= mysqli_query($conn, $sql);
																
																echo "<script> alert('Event Updated Successfully')</script>";
																$_SESSION['eu']='f';
																echo "lasdlasdl";
																header('Location: admin.php');
															}
															else{
																echo "<p>Please Fill Event Location</p>";	
															}
														}		
														else{
															echo "<p>Please Fill Event Date</p>";
														}	
													}
													else{
														echo "Error: Number of Participants per Team is Not Correct";
													}
												}
												else{
													echo "<p> Please Put some Discription Of Event</p>";
												}
											}
											else{
												echo "Error: member Does Not Exist";
											}
										}
										else{
											echo "Committee id Not Valid!!";
										}
									
									}
								
						?>
					</form>
				</div>
			</div>
			<div class="row col-md-2">
			</div>
		</div>
</body>
</html>

<?php
	include 'footer.php';	
?>
