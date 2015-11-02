		<?php
			include('header.php');
		?>
<div id="item">
		<?php
			$sql="SELECT event_name FROM EVENT";
			
			$result= mysqli_query($conn, $sql);
			//echo (mysqli_num_rows($result));
		
			if(isset($_POST['formSubmit'])) 
			{
				$event_name = $_POST['event_list'];
			
				if(!isset($event_name) || $event_name=="select_event") 
				{
					echo "<script>alert(\"Please Select an Event first!\");</script>";
				}	 
			}
			
			?>
		<form action="details.php" method="POST">		
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
			include('footer.php');
		?>
		
