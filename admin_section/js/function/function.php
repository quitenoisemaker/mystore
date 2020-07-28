<?php
include ('db/db.php');


//getting the categories
function getCats(){
	global $conn;
	$sql = "SELECT * FROM category";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$cat_name= $row["category_name"];
		echo "<option value='$cat_name'>$cat_name</option>";
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