<?php
	include 'header.php';

	$sql="SELECT event_name FROM EVENT";
	$result= mysqli_query($conn, $sql);
	$flag=0;
?>
<div id="item">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">		
		<div class="form-group" > 	 	
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
			<input type="submit" name="formSubmit" value="Get Result">
		</div>		
	</form>


	<?php
		if(isset($_POST['formSubmit'])) {
			$event_name = $_POST['event_list'];	
			if(!isset($event_name) || $event_name=="select_event"){
				echo "<script>alert(\"Please Select an Event first!\");</script>";
			}
			else{
				$_SESSION['eventname']= $event_name;
				$sql = "SELECT winner_team_id FROM `EVENT` WHERE event_name='".$event_name."'";
				$result1= mysqli_query($conn, $sql);
				$row1=mysqli_fetch_array($result1); 
				$win_id=$row1[0];
				if($win_id==NULL){
					$_SESSION['d']='d';
					header('Location: home.php');
				}
				else{
					$sql = "SELECT team_name FROM TEAM WHERE team_id='".$win_id."';";
					$result= mysqli_query($conn, $sql);
					$row=mysqli_fetch_array($result);
					$team_name= $row[0];

					$sql= "SELECT name, college FROM PARTICIPANTS , TEAM_PART WHERE PARTICIPANTS.part_id = TEAM_PART.part_id AND team_id='".$win_id."';";
					$result= mysqli_query($conn, $sql);
					/*$row= mysqli_fetch_array($result);
			*/
					$flag=1;

				}
			}
		}
	?>
	<div class="container">
		<div class="row col-md-2">
		</div>
		<div class="row col-md-9">
			<div class="table-responsive">
				<table class="table">
					<?php
						if($event_name!=NULL){
							echo "
								<tbody>
									<tr>
										<td class=\"first_col\">Event Name</td>
										<td class=\"sec_col\">$event_name</td>
									</tr>";
										
						}	
						if($team_name!=NULL){
							echo "
							
									<tr>
										<td class=\"first_col\">Winning Team Name</td>
										<td class=\"sec_col\">$team_name</td>
								</tr>";
						}			
					?>
					</tbody>
				</table>
			</div>
		</div>	
		<div class="row col-md-2">
		</div>
	</div>

	<div class="container">
		<div class="row col-md-2">
		</div>
		<div class="row col-md-9">
			<div class="table-responsive">
				<table class="table">
					<tbody>
						
						<?php
							if($flag){
								echo "<tr>
										<td>SI</td>
										<td>Name</td>
										<td>College Name</td>
										</tr>";
								$count=1;
								while($row= mysqli_fetch_array($result)){
								
									echo "<tr>
										<td id =\"count\">". $count.".</td>
										<td class=\"first_col\">".$row[0]."</td>
										<td class=\"sec_col\">".$row[1]."</td>
									</tr>";
									$count++;
								}	
							}		
						?>
					</tbody>
				</table>
			</div>
		</div>	
		<div class="row col-md-2">
		</div>
	</div>
</div>

<?php	
include 'footer.php';	
?>
