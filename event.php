		<?php
			include('header.php');
			
		?>

		<?php

			$sql="SELECT event_name FROM EVENT";
			$result= mysqli_query($conn, $sql);
			if(isset($_POST['formSubmit'])) 
			{
				$event_name = $_POST['event_list'];
				
				if(!isset($event_name) || $event_name=="select_event") 
				{
					echo "<script>alert(\"Please Select an Event first!\");</script>";
				}
				else{
					
					$_SESSION['eventname']= $event_name;

					$sql = "SELECT event_id FROM `EVENT` WHERE event_name='".$event_name."'";
					$result1= mysqli_query($conn, $sql);
					$row1=mysqli_fetch_array($result1); 
					$_SESSION['eventid']=$row1[0];

					header('Location: details.php');
				}	 
			}
			
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
			 <input type="submit" name="formSubmit" value="See Details">
	</div>		
		</form>
</div>		

		<?php
			//echo $_SESSION['eventname'];
			include('footer.php');
		?>
		
