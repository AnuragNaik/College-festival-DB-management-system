<?php
		include 'header.php';	
	?>
	
	<?php

		$sql = "SELECT reg_id, reg_name, team_name, contact_no from REGISTRATION where team_name = '".$_SESSION['teamName']."'";
		$result = mysqli_query($conn,$sql);

		//echo $_SESSION['teamName'];
		if (mysqli_num_rows($result) > 0) 
		{
			echo "Registration details for ".$_SESSION["teamName"]. " are:-<br>";
			echo "<table>
				<tr>
    				<td><h4>Registration-ID</h4></td>
    				<td><h4>  Name</h4></td>
    			</tr>";
    		while($row = mysqli_fetch_assoc($result)) 
    		{
    			echo "<tr>
    					<td>".$row['reg_id']."</td>
    					<td> ".$row['reg_name']."</td>
    				</tr>";
    		}
    		
    		
    		echo "</table><br>Please make a note of your Registration ID's for future reference.";
    	}
    	else
    	{
    		echo "not found";
    	}

    ?>
		
		
	<?php
		include 'footer.php';	
	?>
