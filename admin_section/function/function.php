<?php
include ('db/db.php');


//getting the categories
function getName(){
	global $conn;
	$sql = "SELECT * FROM customer";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$fullname= $row["name"];
		echo "<option value='$fullname'>$fullname</option>";
	}	
}

//getting the location
function getLoc(){
	global $conn;
	$sql = "SELECT * FROM location";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$location_name= $row["location_name"];
		echo "<option value='$location_name'>$location_name</option>";
	}	
}
?>