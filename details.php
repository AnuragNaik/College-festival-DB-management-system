
	<?php
		include('header.php');
	?>

<div id="item">
<?php
	if(isset($_POST['formSubmit'])) 
	{
		$event_name = $_POST['event_list'];
		
		if(!isset($event_name) || $event_name=="select_event") 
		{
			echo "<script>alert(\"Please Select an Event first!\");</script>";
		} 
		
		$sql = "SELECT event_com_id, event_mgr_id, event_date, event_location, num_participants,event_description FROM EVENT WHERE event_name= '$event_name'";
	//	echo $sql;
		$result= mysqli_query($conn, $sql);
	//	echo mysqli_num_rows($result);
		if(mysqli_num_rows($result)>0){
			$row= mysqli_fetch_array($result);		
			$detail['com_id']= $row[0];
			$detail['mgr_id']= $row[1];
			$detail['date']= $row[2];
			$detail['location']= $row[3];
			$detail['number_part']= $row[4];
			$detail['description']= $row[5];
			
				echo "<p id= \"event_name\">Event Name: $event_name</p>";
				echo "<p id= \"com_id\">committee id for Now:". $detail['com_id']."</p>";
				echo "<p id=\"mgr_id\">Event Manager: ".$detail['mgr_id']."</p>";
				echo "<p id=\"date\">event Date: ".$detail['date']."</p>";
				echo "<p id=\"location\">Event Location: ".$detail['location']."</p>";
				echo "<p id=\"number_part\">Team Registered: ".$detail['number_part']."</p>";
				echo "<p id=\"description\">Description:\n\t\t ".$detail['description']."</p>";
		 
		/*	foreach($detail as $x => $value){
				echo "$x =$value\n";
			}			
			*/
		}		
		else{
			echo "<script>alert(\"invalid event name!!\");</script>";
		}
	}
		
?>	
</div>


<div id="footer" class="container">
	<h4>Footer notes</h4>
</div>
</div>
</body>
</html>
