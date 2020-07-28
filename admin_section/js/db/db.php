<?php
		$conn =new mysqli('localhost', 'root', '' , 'skilled_db');
		//check if any error
		if ($conn->connect_error) {
			echo "<b>Error:</b> Connection failed - $conn->connect_error";
		}
?>