<?php
include ('db/db.php');


//getting the main pic
function getMainPic(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$main_pic= $row["main_pic"];
		echo "<img src='img/$main_pic'>";
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
		echo "$price";
	}	
}

//getting the reason1
function getReason1(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$reason= $row["reason1"];
		echo "$reason";
	}	
}
//getting the reason2
function getReason2(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$reason2= $row["reason2"];
		echo "$reason2";
	}	
}
//getting the reason3
function getReason3(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$reason3= $row["reason3"];
		echo "$reason3";
	}	
}
//getting the reason4
function getReason4(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$reason4= $row["reason4"];
		echo "$reason4";
	}	
}
//getting the reason5
function getReason5(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$reason5= $row["reason5"];
		echo "$reason5";
	}	
}

?>
