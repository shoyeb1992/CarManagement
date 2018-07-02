<?php 
	header('Content-Type: text/event-stream');	
	header('Cache-Control: no-cache');
	$time = date('Y-d-m h:i:s');
	echo "data: The server time is: {$time}\n\n";
	flush();
?>