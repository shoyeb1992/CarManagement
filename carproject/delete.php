<?php 
		include('include/header.php');	
		$sql = sprintf("DELETE FROM car_details WHERE id=%d", $_GET['id']);		
		$query = mysqli_query($conn,$sql);
		
		header('Location:dashboard.php');
		
?>