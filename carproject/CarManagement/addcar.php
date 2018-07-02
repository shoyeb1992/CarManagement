<?php 
	include('include/header.php'); 
	$errmsg = '';
	if(isset($_POST['add_car']))
	{
		/* echo "<pre>";
		print_r($_POST); */
		
		$car_number 	= $_POST['car_number'];
		$brand 			= $_POST['brand'];
		$car_type 		= $_POST['car_type'];
		$file 			= $_FILES['car_image'];
		$car_image		= $file["name"];
		$mfg_date 		= $_POST['mfg_date'];
		$lat 			= $_POST['lat'];
		$lng 			= $_POST['lng'];
		
		
		//for file upload
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["car_image"]["name"]);
		move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file);
		
		
		$sql = sprintf("INSERT INTO car_details (car_number, brand, car_type, car_image, mfg_date, lat, lng) VALUES ('%s','%s','%s','%s','%s','%s','%s')", $car_number,$brand,$car_type,$car_image,$mfg_date,$lat,$lng);
		
		// INSERT INTO car_details (car_number, brand, car_type, car_image, mfg_date, lat, lng) VALUES ('%S','%S','%S','%S','%S','%S','%S');
		
		//echo $sql; die;
		
		$query = mysqli_query($conn,$sql);

		if($query)
		{
			header('Location:dashboard.php');
		}else{
			$errmsg = 'Data not inserted';
		}
	}
	
?>
<div class="container">
  <div class="row">
	<div class="col-md-6 col-md-push-3">
		<h1 class="text-center">Add New Car</h1>
		<p class="text-danger"><?php echo $errmsg;?></p>
  <form action="addcar.php" method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="form-group">
      <label for="car_number">Car Number:</label>
      <input type="text" class="form-control" id="car_number" placeholder="Enter Car Number" name="car_number" required>
    </div>
	
	<div class="form-group">
      <label for="brand">Brand:</label>
      <input type="text" class="form-control" id="brand" placeholder="Enter Brand" name="brand" required>
    </div>
	
	<div class="form-group">
      <label for="car_type">Car type:</label>
		<select class="form-control" id="car_type" name="car_type" required>
			<option value="Hatchback">Hatchback</option>
			<option value="Sedan">Sedan</option>
			<option value="Wagon">Wagon</option>
			<option value="Crossover">Crossover</option>
			<option value="SUV">SUV</option>
			<option value="Sport car">Sport car</option>
			<option value="Convertible">Convertible</option>
		</select>
    </div>
	
	<div class="form-group">
      <label for="car_image">Car Image:</label>
      <input type="file" class="form-control" id="car_image" name="car_image" required>
    </div>
	
	
	<div class="form-group">
      <label for="mfg_date">MFG date:</label>
      <input type="text" class="form-control" id="mfg_date" placeholder="Enter MFG date" name="mfg_date" required>
    </div>
	
	<div class="form-group">
      <label for="lat">Longitude:</label>
      <input type="text" class="form-control" id="lat" placeholder="Enter Longitude" name="lat" required>
    </div>
	
	<div class="form-group">
      <label for="lng">Latitude:</label>
      <input type="text" class="form-control" id="lng" placeholder="Enter Latitude" name="lng" required>
    </div>
    
    <input type="submit" class="btn btn-primary" name="add_car" value="Add New Car">&nbsp;&nbsp;&nbsp; <a href="dashboard.php" class="btn btn-primary">Cancel</a>
	<br><br>
  </form>
	</div>
  </div>
</div>
<script>
  $( function() {
    $( "#mfg_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
<?php include('include/footer.php')?> 