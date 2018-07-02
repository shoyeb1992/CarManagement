<?php
	include('include/dbconnection.php'); 
	header('Content-Type: text/event-stream');	
	header('Cache-Control: no-cache');
	
	$sql = "SELECT * FROM car_details";	
	$query = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_all($query,MYSQLI_ASSOC);
	$someJSON = json_encode($row);
	echo "data: ".$someJSON." \n\n";
	flush();
?>