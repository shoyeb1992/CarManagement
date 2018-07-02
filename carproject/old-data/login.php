<?php 
	session_start();
	include('include/header.php'); 
	$errmsg = '';
	if(isset($_POST['login']))
	{
		$user_id 	= $_POST['user_id'];
		$password 	= $_POST['password'];
		$sql = "SELECT * FROM users WHERE user_id='$user_id' AND password=MD5('$password')";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($query);

		if($row['user_id']==$user_id && $row['password']==md5($password))
		{
			$_SESSION['user_id'] = $user_id;
			header('Location:dashboard.php');
		}else{
			$errmsg = 'User id or password invalid!';
		}
	}
	
?>
<div class="container" id="login">
  <div class="row">
	<div class="col-md-6 col-md-push-3">
	<br><br>
		<h1 class="text-center">User Login</h1>
		<p class="text-danger"><?php echo $errmsg;?></p>
  <form action="login.php" method="post">
    <div class="form-group">
      <label for="user_id">User Id:</label>
      <input type="text" class="form-control" id="user_id" placeholder="Enter user id" name="user_id">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <button type="submit" class="btn btn-default" name="login">Login</button>
  </form>
	</div>
  </div>
</div>
<?php include('include/footer.php')?> 