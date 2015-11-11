<?php
include 'header.php';
?>

<?php
	
	if(isset($_POST['sub']))
	{
			$_SESSION['set_man'] = $_POST['name'];
			header('Location: admin.php');
	}
		
?>

<!DOCTYPE html>
<html>
<body>
	
<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
<table>
<tr>
	<td>Member ID</td>
	<td> <input type="text" name="mem_id"></td>
</tr>
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
</table>
	<td><input id="button" type="submit" name="sub" value="Add Manager"></td>
	<td><input type="reset" name="reset" value="Reset"/></td>

<input type="hidden" name="secondTime" value="false">
<input type="hidden" name="error" value="false">

</form>

</body>
</html>

		
<?php
	include 'footer.php';	
?>
	

