<?php
	include 'header.php';
?>

		<div class="container">
			<h3>Update Event</h3>
			<div class="row col-md-2">
			</div>
			<div class="row col-md-9">
				<div class="table-responsive">
					<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
						<table class="table">
							<tr>
								<td>Event Id</td>
								<td> <input type='text' name='event_id' ></td>
							</tr>
							<tr>
								<td>Team Id</td>
								<td> <input type='text' name='winner_team_id' ></td>
							</tr>
								
								<td colspan='2' style='text-align:center;'><input id='button' type='submit' name='upload_event' value='Update Event'>
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

				<div class="row">
			<!-- Upload Event Results-->
			<h3>Upload Results</h3>
			<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
				<table>
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
				$sql = "SELECT * FROM EVENT WHERE event_id= '".$_POST['result_event_id']."' ;";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)){
					$sql = "SELECT * FROM TEAM WHERE team_id='".$_POST['result_team_id']."'";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)){
						$sql = "UPDATE EVENT SET winner_team_id='".$_POST['result_team_id']."'". "WHERE event_id='".$_POST['result_event_id']."'";
						$result=mysqli_query($conn, $sql);
						$_SESSION['c']='c';
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
		?>
	</div>