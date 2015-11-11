<?php
include 'header.php';
?>

<?php
	if(isset($_POST['sub'])){
			$_SESSION['set_man'] = $_POST['name'];
			$sql = "INSERT INTO MANAGING_TEAM (member_id,member_name,member_com_id,password ) VALUES ('NULL' ,".$_POST['name']."','".$_POST['cid']."','".$_POST['pass']."'') ";
			header('Location: admin.php');
	}
?>

<!DOCTYPE html>
<html>
<body>

	<div class="container">
		<div class="row">
			<!--Add Member -->
			<h3>Add Member</h3>
			<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
				<table>
					<tr>
						<td>Member name</td>
						<td> <input type="text" name="name"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td> <input type="password" name="pass"></td>
					</tr>
					<tr>
						<td>Committee ID </td>
						<td> <input type="text" name="cid"></td>
					</tr>
					<tr>
						<td><input id="button" type="submit" name="sub" value="Add Manager"></td>
						<td><input type="reset" name="reset" value="Reset"/></td>
					</tr>
				</table>
					
				<input type="hidden" name="secondTime" value="false">
				<input type="hidden" name="error" value="false">

			</form>
		</div>
	<hr>
		<div class="row">
			<!--Add Event -->
			<h3>Add Event</h3>
			<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
				<table>
					<tr>
						<td>Event name</td>
						<td> <input type="text" name="event_name"></td>
					</tr>
					<tr>
						<td>Committee id</td>
						<td> <input type="text" name="event_com_id"></td>
					</tr>
					<tr>
						<td>Event Manager ID</td>
						<td> <input type="text" name="event_mgr_id"></td>
					</tr>
					<tr>
						<td>Event Date</td>
						<td> <input type="date" name="event_date"></td>
					</tr>
					<tr>
						<td>Event Location</td>
						<td> <input type="text" name="event_location"></td>
					</tr>
					<tr>
						<td>Event Description</td>
						<td> <textarea type="text" name="event_mgr_id" placeholder="Description of Event"></textarea></td>
					</tr>
					<tr>
						<td>Number Of Participant Per Team</td>
						<td> <input type="text" name="participants_req"></td>
					</tr>
					<tr>
						<td><input id="button" type="submit" name="add_event" value="Add Event"></td>
						<td><input type="reset" name="reset" value="Reset"/></td>
					</tr>
				</table>
					
				<input type="hidden" name="secondTime" value="false">
				<input type="hidden" name="error" value="false">
			</form>
		</div>
	<hr>
		<div class="row">
			<!-- Delete Event-->
			<h3>Delete Event</h3>
			<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
				<table>
					<tr>
						<td>Event ID</td>
						<td> <input type="text" name="delete_event_id"></td>
					</tr>
					<tr>
						<td>Event Name</td>
						<td> <input type="text" name="delete_event_name"></td>
					</tr>
					<tr>
						<td><input id="button" type="submit" name="delete_event" value="Delete Event"></td>
						<td><input type="reset" name="reset" value="Reset"/></td>
					</tr>
				</table>
					
				<input type="hidden" name="secondTime" value="false">
				<input type="hidden" name="error" value="false">

			</form>
		</div>
	<hr>
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
</body>
</html>

		
<?php
	include 'footer.php';	
	echo $_POST['name'];
?>
	

