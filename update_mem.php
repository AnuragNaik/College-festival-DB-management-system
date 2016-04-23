<?php
			session_start();
include('connection.php');
			
		?>
		
<!DOCTYPE html>
<html>
<head>
	<title>Update Manager</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="js/myjs.js"></script>

  		<style >
			.table input button textarea select{
			
			width:100% !important;
		}

		h3{
			text-decoration: underline ;
			text-align: center;
		}

		.container{
			border-bottom: 2px solid black;
			border-left: 2px solid black;
		}

		#footer{
			border-left: 2px solid black;	
		}
		</style>
</head>	
<body>
	
		<div class="container">
			<h3>Update Manager</h3>
			<div class="row col-md-2">
			</div>
			<div class="row col-md-9">
				<div class="table-responsive">
					<form method="POST" action="<?php echo $_SESSION['PHP_SELF']?>" >
						<table class="table">
							<?php
								$sql = "Select * from MANAGING_TEAM where member_id = '".$_SESSION['mid']."'";
								//$sql = "Select * from MANAGING_TEAM where member_id = '12'";
								$result = mysqli_query($conn,$sql);
								
								$row = mysqli_fetch_assoc($result);
	
							echo "<tr >
								<td>Member name</td>
								<td> <input type='text' placeholder='Enter Member Name' name='name' value='".$row['member_name']."'></td>
							</tr>
							<tr>
								<td>Password</td>
								<td> <input type='password' placeholder='Enter Password'  name='pass' value='".$row['password']."'></td>
							</tr>
							<tr>
								<td>Committee ID </td>
								<td> <input type='text' placeholder='Enter Committee Id' name='cid' value='".$row['member_com_id']."'></td>
							</tr>
							<tr>
								<td>Mobile Number </td>
								<td> <input type='text' placeholder='Enter Mobile Number' name='mobile' value='".$row['contact']."'></td>
							</tr>
							<tr>
								<td colspan='2' style='text-align:center;'><input id='button' type='submit' name='update_mem' value='Update Member'>
									<input type='reset' name='reset' value='Reset'/>
								</td>
							</tr>
						</table>
							
						<input type='hidden' name='secondTime' value='false'>
						<input type='hidden' name='error' value='false'>
						</form>";
						?>
						
						<?php
							if(isset($_POST['update_mem'])){
								if($_POST['name']=="" ||$_POST['cid']==""|| $_POST['pass']=="" || $_POST['mobile']==""){
									echo "<script> alert('Error: Please Fill ALL the Fields')</script>";
								}
								else{
									$sql = "SELECT * FROM MANAGING_TEAM WHERE member_name='".$_POST['name']."' AND member_com_id='".$_POST['cid']."' AND password='".$_POST['pass']."';";
									$result= mysqli_query($conn, $sql);
									
									if (!ctype_digit($_POST['mobile']) OR strlen($_POST['mobile']) != 10) 
									{
										echo "<script>alert('Enter a valid 10 digit phone number.')</script>";
										header('Location: admin.php');
									}
									
									if(mysqli_num_rows($result)>0){
										echo "<script> alert('Error: Member Already Exists')</script>";
										header('Location: admin.php');
									}
									else{
										$sql= "SELECT * FROM MANAGING_TEAM WHERE member_com_id='".$_POST['cid']."';";
										$result=mysqli_query($conn, $sql);
										if(mysqli_num_rows($result)>0){
											//echo "<p>password=".$_POST['pass']."contact=".$_POST['mobile']."</p>";
											$sql = "UPDATE MANAGING_TEAM SET member_name='".$_POST['name']."',member_com_id ='".$_POST['cid']."',password='".$_POST['pass']."',contact ='".$_POST['mobile']."' WHERE member_id='".$_SESSION['mid']."'";
											$result=mysqli_query($conn, $sql);
											$_SESSION['um'] = 'd';
											header('Location: admin.php');
										}
										else{
											echo "<script> alert('Error: Invalid Committee ID')</script>";
											header('Location: admin.php');
										}
									}
								}
							}
						?>
				</div>
			</div>
			<div class="row col-md-2">
			</div>
	</div>
	
</body>
</html>

<?php
	include 'footer.php';	
?>
