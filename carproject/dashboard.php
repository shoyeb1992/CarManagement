<?php 
	session_start();
	include('include/header.php'); 
?>  
<div class="container-fluid text-center" id="main-div">    
  <div class="row content">
    <div class="col-md-12 text-left"> 
      <h1>Welcome to Car Management System</h1>
	  <a href="addcar.php" class="btn btn-primary btn-lg">Add New Car</a>
	  <br><br><br>
	  
      <div id="tbdata"></div>
	  
    </div>
  </div>
</div>

<script>
		if(typeof(EventSource)!==undefined)
		{
			var source = new EventSource('server-data.php');
			source.onmessage = function(event)
			{
				var JSONObject = JSON.parse(event.data);
				console.log(JSONObject);
				
				console.log(JSONObject.length);
				
				var html = "<table class='table'><th>Sr. No</th><th>Car Number</th><th>Brand</th><th>Car Type</th><th>Car Image</th><th>MFG date</th><th>Longitude</th><th>Latitude</th><th>Action</th>";
				var cnt = 0;
				for(var i=0; i<JSONObject.length; i++)
				{
					cnt = i+1;
					html +='<tr><td>'+cnt+'</td>';
					html +='<td>'+JSONObject[i].car_number+'</td>';
					html +='<td>'+JSONObject[i].brand+'</td>';
					html +='<td>'+JSONObject[i].car_type+'</td>';
					html +='<td><img src="uploads/'+JSONObject[i].car_image+'" height="50" width="50"></td>';
					html +='<td>'+JSONObject[i].mfg_date+'</td>';
					html +='<td>'+JSONObject[i].lat+'</td>';					
					html +='<td>'+JSONObject[i].lng+'</td>';
					html +='<td><a href="edit.php?id='+JSONObject[i].id+'" class="btn btn-primary">Edit</a> <a href="delete.php?id='+JSONObject[i].id+'" class="btn btn-danger">Delete</a></td></tr>';

				}
				html += "</table>";
				document.getElementById('tbdata').innerHTML='';
				document.getElementById('tbdata').innerHTML=html;
			}
			
		}else{
			document.getElementById('tbdata').innerHTML='Sorry your browser does not support  server-sent event';
		}
	</script>
<?php include('include/footer.php')?>
