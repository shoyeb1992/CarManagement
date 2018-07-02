<?php 
		include('include/header.php');	
		$errmsg = '';
		$sql = sprintf("SELECT * FROM car_details WHERE id=%d", $_GET['id']);		
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);
		
		$car_number 	= $row['car_number'];
		$brand 			= $row['brand'];
		$car_type 		= $row['car_type'];
		$car_image		= $row["car_image"];
		$mfg_date 		= $row['mfg_date'];
		$lat 			= $row['lat'];
		$lng 			= $row['lng'];
		
			if(isset($_POST['add_car']))
			{
				
				$car_number 	= $_POST['car_number'];
				$brand 			= $_POST['brand'];
				$car_type 		= $_POST['car_type'];
				$file 			= $_FILES['car_image'];
				$car_image		= $file["name"];
				$mfg_date 		= $_POST['mfg_date'];
				$lat 			= $_POST['lat'];
				$lng 			= $_POST['lng'];
				$id 			=  $_POST['hidden_id'];
				
				
				//for file upload
				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["car_image"]["name"]);
				move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file);
				
				
				$sql = sprintf("UPDATE car_details SET car_number='%s', brand='%s', car_type='%s', car_image='%s', mfg_date='%s', lat='%s', lng='%s' WHERE id=%d", $car_number,$brand,$car_type,$car_image,$mfg_date,$lat,$lng, $id);
				
				$query = mysqli_query($conn,$sql);

				if($query)
				{
					header('Location:dashboard.php');
				}
			}
	
	
?>
<div class="container">
  <div class="row">
	<div class="col-md-6 col-md-push-3">
		<h1 class="text-center">Update Car details</h1>
  <form action="edit.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="hidden_id" value="<?php echo $row['id'];?>">
    <div class="form-group">
      <label for="car_number">Car Number:</label>
      <input type="text" class="form-control" id="car_number" placeholder="Enter Car Number" name="car_number" value="<?php echo $row['car_number'];?>" required>
    </div>
	
	<div class="form-group">
      <label for="brand">Brand:</label>
      <input type="text" class="form-control" id="brand" placeholder="Enter Brand" name="brand" value="<?php echo $row['brand'];?>" required>
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
	  <br> Old Image: <img src="uploads/<?php echo $row['car_image'];?>" height="80" width="100">
      <input type="file" class="form-control" id="car_image" name="car_image" value="" required>
    </div>
	
	
	<div class="form-group">
      <label for="mfg_date">MFG date:</label>
      <input type="text" class="form-control" id="mfg_date" placeholder="Enter MFG date" name="mfg_date" value="<?php echo $row['mfg_date'];?>" required>
    </div>
	
	<div class="form-group">
      <label for="lat">Longitude:</label>
      <input type="text" class="form-control" id="lat" placeholder="Enter Longitude" name="lat" value="<?php echo $row['lat'];?>" required>
    </div>
	
	<div class="form-group">
      <label for="lng">Latitude:</label>
      <input type="text" class="form-control" id="lng" placeholder="Enter Latitude" name="lng" value="<?php echo $row['lng'];?>" required>
    </div>
    
    <input type="submit" class="btn btn-primary" name="add_car" value="Update Car"> &nbsp;&nbsp;&nbsp; <a href="dashboard.php" class="btn btn-primary">Cancel</a>
	<br><br>
  </form>
	</div>
  </div>
</div>
<?php include('include/footer.php')?> 