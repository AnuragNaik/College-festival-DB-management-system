<?php			
 	include('header.php');
?>

<div id="item">
<div class="container">

<form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Registration Form</legend> 
	 <div class="form-group" id="first">
		<label class="control-label col-sm-2" for="reg_name">Name:</label>	 
		<div class="col-sm-8">  	 	
	 		<input type="text" class="form-control" placeholder="Enter your name" name="reg_name"/>
		</div>	
	</div>	
	
	 
	 <div class="form-group" >
		<label class="control-label col-sm-2" for="team_name">Team Name:</label>	 
		<div class="col-sm-8">  	 	
	 		<input type="text" class="form-control" placeholder="Enter Team Name" name="team_name"/>
		</div>	
	</div>	
	
	 <div class="form-group" >
		<label class="control-label col-sm-2" for="college_name">College Name:</label>	 
		<div class="col-sm-8">  	 	
	 		<input type="text" class="form-control" placeholder="Enter College Name" name="college_name"/>
		</div>	
	</div>		
	
	 <div class="form-group" >
		<label class="control-label col-sm-2" for="contact_no">Mobile Number:</label>	 
		<div class="col-sm-8">  	 	
	 		<input type="text" class="form-control" placeholder="Mobile Number" name="college_name"/>
		</div>	
	</div>		
		
	 <div class="form-group" >
			<button  type="submit" class="btn btn-default" name="formSubmit">Register</button>
	</div>
</fieldset>
</form>

</div>
</div>
<?php			
	include('footer.php');		
?>
