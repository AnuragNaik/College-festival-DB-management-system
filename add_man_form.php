<?php
			session_start();
include('connection.php');

echo "Welcome, ".$_SESSION['username'].".";
		echo "<br>
		<a href='logout.php'>Logout</a>";

			$sql="SELECT event_name FROM EVENT";
			$result= mysqli_query($conn, $sql);
			if(isset($_POST['update_event'])) 
			{
				$event_name = $_POST['event_list'];
				
				if(!isset($event_name) || $event_name=="select_event") 
				{
					echo "<script>alert(\"Error: Please Select an Event first!\");</script>";
					//$_SESSION['eve'] = 'a';
					//header('Location: admin.php');
				}
				else{
					
					$_SESSION['Ename']= $event_name;

					$sql = "SELECT event_id FROM `EVENT` WHERE event_name='".$event_name."'";
					$result1= mysqli_query($conn, $sql);
					$row1=mysqli_fetch_array($result1); 
					$_SESSION['eid']=$row1[0];

					header('Location: update_event.php');
				}	 
			}
			
		?>
		
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
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
	
	<div id="header">
		<h2>Welcome to EVENTS PANEL</h2>
	</div>
	<!-- Add Member !-->
		<div class="container">
			<h3>Add Manager</h3>
			<div class="row col-md-2">
			</div>
			<div class="row col-md-9">
				<div class="table-responsive">
					<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
						<table class="table">
							<tr>
								<td>Member name</td>
								<td> <input type='text' placeholder='Enter Member Name' name='name' ></td>
							</tr>
							<tr>
								<td>Password</td>
								<td> <input type='password' placeholder='Enter Password'  name='pass'></td>
							</tr>
							<tr>
								<td>Committee ID </td>
								<td> <input type='text' placeholder='Enter Committee Id' name='cid' ></td>
							</tr>
							<tr>
								<td>Mobile Number </td>
								<td> <input type='text' placeholder='Enter Mobile Number' name='mobile' ></td>
							</tr>
							<tr>
								<td colspan='2' style='text-align:center;'><input id='button' type='submit' name='add_mem' value='Add Member'>
									<input type='reset' name='reset' value='Reset'/>
								</td>
							</tr>
						</table>
							
						<input type='hidden' name='secondTime' value='false'>
						<input type='hidden' name='error' value='false'>
						</form>";
						
						
						<?php
							if(isset($_POST['add_mem'])){
								if($_POST['name']=="" ||$_POST['cid']==""|| $_POST['pass']=="" || $_POST['mobile']==""){
									echo "<script> alert('Error: Please Fill ALL the Fields')</script>";
								}
								else{
									$sql = "SELECT * FROM MANAGING_TEAM WHERE member_name='".$_POST['name']."' AND member_com_id='".$_POST['cid']."' AND password='".$_POST['pass']."';";
									$result= mysqli_query($conn, $sql);
									
									if (!ctype_digit($_POST['mobile']) OR strlen($_POST['mobile']) != 10) 
									{
										echo "<script>alert('Enter a valid 10 digit phone number.')</script>";
										//header('Location: admin.php');
									}
									
									if(mysqli_num_rows($result)>0){
										echo "<script> alert('Error: Member Already Exists')</script>";
										//header('Location: admin.php');
									}
									else{
										$sql= "SELECT * FROM MANAGING_TEAM WHERE member_com_id='".$_POST['cid']."';";
										$result=mysqli_query($conn, $sql);
										if(mysqli_num_rows($result)>0){
											//echo "<p>password=".$_POST['pass']."contact=".$_POST['mobile']."</p>";
											//$sql = "UPDATE MANAGING_TEAM SET member_name='".$_POST['name']."',member_com_id ='".$_POST['cid']."',password='".$_POST['pass']."',contact ='".$_POST['name']."' WHERE member_id='".$_SESSION['mid']."'";
											$sql = "INSERT INTO MANAGING_TEAM(member_id, member_name, member_com_id, password, contact) VALUES (NULL,'".$_POST['name']."','".$_POST['cid']."','".$_POST['pass']."','".$_POST['mobile']."')";
											$result=mysqli_query($conn, $sql);
											$_SESSION['a'] = 'd';
											header('Location: admin.php');
										}
										else{
											echo "<script> alert('Error: Invalid Committee ID')</script>";
											//header('Location: admin.php');
										}
									}
								}
							}
						?>
				</div>
			</div>
			<div class="row col-md-2">
			</div>
	</div>
	
	<!-- Update Member !-->
		<div class="container">
			<h3>Update Manager</h3>
			<div class="row col-md-2">
			</div>
			<div class="row col-md-9">
				<div class="table-responsive">
					<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
						<table class="table">
							<tr>
								<td>Manager-ID</td>
								<td> <input type='text' placeholder='Enter Member ID' name='man_id' ></td>
							</tr>
							<tr>
								<td colspan='2' style='text-align:center;'><input id='button' type='submit' name='up_mem' value='Update Manager'>
									<input type='reset' name='reset' value='Reset'/>
								</td>
							</tr>
						</table>
							
						<input type='hidden' name='secondTime' value='false'>
						<input type='hidden' name='error' value='false'>
						</form>";
						
						<?php
							
							if(isset($_POST['up_mem']))
							{
								$sql = "SELECT * FROM MANAGING_TEAM WHERE member_id = '".$_POST['man_id']."'";
								$result = mysqli_query($conn,$sql);
								
								if(mysqli_num_rows($result) > 0)
								{	
									$_SESSION['mid'] = $_POST['man_id'];
									header('Location: update_mem.php');
								}
								else
								{
									echo "<script> alert('Error: Invalid Manager ID')</script>";
									//header('Location: admin.php');
								}
							}
						?>
						
					</div>
			</div>
			<div class="row col-md-2">
			</div>
	</div>
	
	<!-- Delete manager !-->
	<div class="container">
			<h3>Delete Manager</h3>
			<div class="row col-md-2">
			</div>
			<div class="row col-md-9">
				<div class="table-responsive">
					<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
						<table class="table">
					<tr>
						<td>Member name</td>
						<td> <input type="text" name="member_name"></td>
					</tr>

					<tr>
						<td>Committee ID </td>
						<td> <input type="text" name="com_id"></td>
					</tr>
					<tr>
						<td><input id="button" type="submit" name="delete_member" value="Delete Member"></td>
						<td><input type="reset" name="reset" value="Reset"/></td>
					</tr>
				</table>
					
				<input type="hidden" name="secondTime" value="false">
				<input type="hidden" name="error" value="false">

			</form>

			<?php
				if(isset($_POST['delete_member']))
				{
					$sql = "SELECT * FROM MANAGING_TEAM WHERE member_name='".$_POST['member_name']."' AND member_com_id='".$_POST['com_id']."';";
					$result= mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0){
						$row= mysqli_fetch_array($result);
						$member_id= $row[0];
						
						$sql = "DELETE FROM MANAGING_TEAM WHERE member_name='".$_POST['member_name']."';";
						$result= mysqli_query($conn, $sql);

						$sql = "SELECT event_id FROM EVENT WHERE event_mgr_id='".$member_id."';";
						$result= mysqli_query($conn, $sql);

						while($r = mysqli_fetch_array($result)){
							echo $r[0];
							$sql= "UPDATE EVENT SET event_mgr_id='2' WHERE event_id='".$r[0]."';";
							$result= mysqli_query($conn, $sql);
						}
						echo "<script> alert('Deleted successfully')</script>";

					}
					else{
							echo "<script> alert('Member Does Not Exist')</script>;";
							//header('Location: admin.php');
					}
				}

			?>

		</div>
			</div>
			<div class="row col-md-2">
			</div>
	</div>
	
	<!-- Add Event !-->
	<div class="container">
			<h3>Add Event</h3>
			<div class="row col-md-2">
			</div>
			<div class="row col-md-9">
				<div class="table-responsive">
					<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
						<table class="table">
							<tr>
								<td>Event name</td>
								<td> <input type='text' name='event_name' ></td>
							</tr>
							<tr>
								<td>Committee id</td>
								<td> <input type='text' name='event_com_id' ></td>
							</tr>
							<tr>
								<td>Event Manager ID</td>
								<td> <input type='text' name='event_mgr_id' ></td>
							</tr>
							<tr>
								<td>Event Date</td>
								<td> <input type='date' name='event_date' ></td>
							</tr>
							<tr>
								<td>Event Location</td>
								<td> <input type='text' name='event_location' ></td>
							</tr>
							<tr>
								<td>Event Description</td>
								<td> <input type='text' name='description' ></td>
							</tr>
							<tr>
								<td>Number Of Participant Per Team</td>
								<td> <input type='text' name='participants_req' ></td>
							</tr>
							<tr>
								
								<td colspan='2' style='text-align:center;'><input id='button' type='submit' name='add_event' value='Add Event'>
									<input type='reset' name='reset' value='Reset'/></td>
							</tr>
						</table>
						
						<input type='hidden' name='secondTime' value='false'>
						<input type='hidden' name='error' value='false'>
						

						<?php
							if(isset($_POST['add_event'])){
								
									$sql = "Select * from EVENT where event_name = '".$_POST['event_name']."'";
									$result = mysqli_query($conn,$sql);
									
									if(mysqli_num_rows($result)>0)
										{
											echo "<script> alert('Error: Event already exists')</script>";
											//header('Location: admin.php');
										}
									else
									{
											
								
									$desc =  $_POST['description'];
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
																//$sql = "UPDATE EVENT SET event_name='".$_POST['event_name']."',event_com_id ='".$_POST['event_com_id']."',event_mgr_id='".$_POST['event_mgr_id']."',event_date ='".$_POST['event_date']."',event_location = '".$_POST['event_location']."',event_description = '".$_POST['discription']."',participants_req = '".$_POST['participants_req']."' WHERE event_id='".$_SESSION['eid']."'";
																$sql = "INSERT INTO EVENT(event_id, event_name, event_com_id, event_mgr_id, event_date, event_location, winner_team_id, num_participants, event_description, participants_req) VALUES(NULL,'".$_POST['event_name']."','".$_POST['event_com_id']."','".$_POST['event_mgr_id']."','".$_POST['event_date']."','".$_POST['event_location']."',NULL,0,'".$_POST['description']."','".$_POST['participants_req']."')";
																$result= mysqli_query($conn, $sql);
																
																echo $sql;
																echo "<script> alert('Event Added Successfully')</script>";
																$_SESSION['ea']='f';
																echo "lasdlasdl";
																header('Location: admin.php');
															}
															else{
																echo "<script> alert('Please Fill Event Location')</script>";	
															}
														}		
														else{
															echo "<script> alert('Fill event date')</script>";
														}	
													}
													else{
														echo "<script> alert('Invalid number of participats')</script>";
													}
												}
												else{
													echo "<script> alert('Enter some description')</script>";
												}
											}
											else{
												echo "<script> alert('Member doesnt exist')</script>";
											}
										}
										else{
											echo "<script> alert('Committee ID invalid')</script>";
										}
									
									}
								}
								
						?>
					</form>
				</div>
			</div>
			<div class="row col-md-2">
			</div>
		</div>
		
		
		<!-- Update Event !-->
		<div class="container">
			<h3>Update Event</h3>
			<div class="row col-md-2">
			</div>
			<div class="row col-md-9">
				<div class="table-responsive">
					<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
						<table class="table">
							
							<tr>
								<td>
									<select name='event_list'>
									<?php
										
										echo "<option value='select_event' selected=\"selected\">Select event</option>";
										while($row= mysqli_fetch_array($result)){
											echo "<option value='";
											echo $row[0];
											echo "'>";
											echo $row[0];
											echo "</option>";
										}
									?>
									</select>
								</td>
								<td> <input type='submit' name='update_event' value='Update Event' ></td>
							</tr>
							
						</table>
						
						<input type='hidden' name='secondTime' value='false'>
						<input type='hidden' name='error' value='false'>
						

					</form>
				</div>
			</div>
			<div class="row col-md-2">
			</div>
		</div>
		
		<div class="container">
			<h3>Upload Result</h3>
			<div class="row col-md-2">
			</div>
			<div class="row col-md-9">
				<div class="table-responsive">
			<!-- Upload Event Results-->
			<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
				<table class='table'>
					<tr>
						<td>Event ID</td>
						<td> <input type="text" name="result_event_id"></td>
					</tr>
					<tr>
						<td>Team Id</td>
						<td> <input type="text" name="result_team_id"></td>
					</tr>
					<tr>
						<td><input id="button" type="submit" name="upload_result" value="Upload Event Results"></td>
						<td><input type="reset" name="reset" value="Reset"/></td>
					</tr>
				</table>
					
				<input type="hidden" name="secondTime" value="false">
				<input type="hidden" name="error" value="false">
			</form>
		</div>
		<?php
			if(isset($_POST['upload_result'])){
				
				$sql = "Select winner_team_id from EVENT where event_id = '".$_POST['result_event_id']."'";
				$result = mysqli_query($conn,$sql);
				
				$row = mysqli_fetch_assoc($result);
				
				if( $row['winner_team_id'] != NULL)
				{
					//echo "asdasd";
					echo "<script> alert('Error: Results already declared')</script>";
						header('Location: admin.php');
					}
				else
				{
				$sql = "SELECT * FROM EVENT WHERE event_id= '".$_POST['result_event_id']."' ;";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)){
					$sql = "SELECT * FROM TEAM WHERE team_id='".$_POST['result_team_id']."'";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)){
						$sql = "UPDATE EVENT SET winner_team_id='".$_POST['result_team_id']."'". "WHERE event_id='".$_POST['result_event_id']."'";
						$result=mysqli_query($conn, $sql);
						header('Location: admin.php');
					}
					else{
						echo "Invalid Team ID";
					}
				}
				else{
					echo "No such Event Exist...Invalid Event ID";
				}
			}
		}
		?>
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
