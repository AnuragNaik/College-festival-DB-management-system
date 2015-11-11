<?php
	include 'header.php';
?>

<?php
	if(isset($_SESSION['set_man'])){
		echo "<script> alert('Manager added successfully')</script>";
		unset($_SESSION['set_man']);
	}
?>

<html>
<head>
	<title>Administrators Page</title>
</head>
<body>
<table>
	<tr>
		<td><a href="add_man_form.php">Add a new manager</a></td><br>
	</tr>
	<tr>
		<td><a href="update_man_form.php">Update existing manager details</a></td><br>
	</tr>
	<tr>
		<td><a href="#">Add a new event </a></td><br>
	</tr>
	<tr>
		<td><a href="#">Update an existing event </a></td><br>
	</tr>
	<tr>
		<td><a href="#">Delete an event</a></td><br>
	</tr>
	<tr>
		<td><a href="#">Upload event results</a></td><br>
	</tr>
</table>

</body>
</html>

<?php
		include 'footer.php';	
?>
