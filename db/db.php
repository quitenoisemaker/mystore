<?php
		$conn =new mysqli('localhost', 'root', '' , 'landing_page');
		// $conn =new mysqli('localhost', 'servdqvt_serviceswise', 'dequiet1' , 'servdqvt_skilled_db');
		if ($conn->connect_error) {
			echo "<b>Error:</b> Connection failed - $conn->connect_error";
		}
?>