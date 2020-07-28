<?php
		// $conn =new mysqli('localhost', 'root', '' , 'skilled_db');
		$conn =new mysqli('localhost', 'root', '' , 'landing_page');
		if ($conn->connect_error) {
			echo "<b>Error:</b> Connection failed - $conn->connect_error";
		}
?>