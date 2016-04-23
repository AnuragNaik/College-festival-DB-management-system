<?php
	include 'header.php';

	if(isset($_SESSION['d'])){
		echo "<script> alert('Result Not Declared Yet .. Redirecting to HomePage')</script>";
		unset($_SESSION['d']);
	}
	
?>
<?php
		include 'slider.php';	
	?>
		
	<?php
		include 'footer.php';	
	?>
	

