<?php
session_start();

$conn =new mysqli('localhost', 'doortvxk_emma', 'dequiet1_' , 'doortvxk_emma');
		// $conn =new mysqli('localhost', 'servdqvt_serviceswise', 'dequiet1' , 'servdqvt_skilled_db');
		if ($conn->connect_error) {
			echo "<b>Error:</b> Connection failed - $conn->connect_error";
		}


//getting the main pic
function getMainPic(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$main_pic= $row["main_pic"];
		echo "$main_pic";

	}	
}

//getting the product pic
function getPic1(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$pic1= $row["product_img1"];
		echo "<a href='img/$pic1' class='big'>
				<img src='img/$pic1'></a>";
	}	
}
//getting the product pic
function getPic2(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$pic1= $row["product_img2"];
		echo "<a href='img/$pic1' class='big'>
				<img src='img/$pic1'></a>";
	}	
}
//getting the product pic
function getPic3(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$pic1= $row["product_img3"];
		echo "<a href='img/$pic1' class='big'>
				<img src='img/$pic1'></a>";
	}	
}
//getting the product pic
function getPic4(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$pic1= $row["product_img4"];
		echo "<a href='img/$pic1' class='big'>
				<img src='img/$pic1'></a>";
	}	
}
//getting the product pic
function getPic5(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$pic1= $row["product_img5"];
		echo "<a href='img/$pic1' class='big'>
				<img src='img/$pic1'></a>";
	}	
}


//getting the title
function getTitle(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$title= $row["product_title"];
		echo "$title";
	}	
}

//getting the Product description
function getDes(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$desc= $row["product_desc"];
		echo "$desc";
	}	
}

//getting the Product price
function getPrice(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$price= $row["product_price"];
		echo number_format($price);
	}	
}

//getting the reasons
function getReason(){
	global $conn;
	$sql = "SELECT * FROM reason";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$reasons= $row["reasons"];
		echo "<li><i class='fa fa-chevron-right' style='color: red; padding: 10px'></i>$reasons</li>";
	}	
}

//getting the main_reasons
function getMainReason(){
	global $conn;
	$sql = "SELECT * FROM main_reason";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$header= $row["header"];
		echo "$header";
	}	
}

//getting the Subreasons
function getSubReason(){
	global $conn;
	$sql = "SELECT * FROM main_reason";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$sub= $row["sub_header"];
		echo "$sub";
	}	
}

//getting the call to action
function getCallHead(){
	global $conn;
	$sql = "SELECT * FROM call_to_action";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$head= $row["heading"];
		echo "$head";
	}	
}

function getCallText(){
	global $conn;
	$sql = "SELECT * FROM call_to_action";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$text= $row["text"];
		echo "$text";
	}	
}

function getPhotoTextHead(){
	global $conn;
	$sql = "SELECT * FROM photo_text";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$head= $row["heading"];
		echo "$head";
	}	
}

function getPhotoText(){
	global $conn;
	$sql = "SELECT * FROM photo_text";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$text= $row["text"];
		echo "$text";
	}	
}

?>
