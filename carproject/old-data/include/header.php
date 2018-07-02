<?php
	include('include/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car Mamnagement System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/mapstyle.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="myNavbar">
     
      <ul class="nav navbar-nav navbar-right">
		<?php 
			if($_SESSION['user_id']!='')
			{?>
			<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		<?php 
			}else{
				?>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			<?php }
		?>
        
		
      </ul>
    </div>
  </div>
</nav>