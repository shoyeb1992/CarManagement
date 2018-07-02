<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dabname = "car_management";

		$conn = mysqli_connect($servername, $username, $password,$dabname);

		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
?>