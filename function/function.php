<?php
session_start();

$conn =new mysqli('localhost', 'root', '' , 'ecommerce_db');
		// $conn =new mysqli('localhost', 'servdqvt_serviceswise', 'dequiet1' , 'servdqvt_skilled_db');
		if ($conn->connect_error) {
			echo "<b>Error:</b> Connection failed - $conn->connect_error";
		}


//getting the user IP address
function getIp(){
	$ip = $_SERVER['REMOTE_ADDR'];
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	return $ip;
}

//pagination
function bootstrap_paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url){
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $right_links    = $current_page + 3;
        $previous       = $current_page - 2; //previous link
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        if($current_page > 1){
            $previous_link = ($previous==0)?1:$previous;
            $pagination .= '<li class="page-item"><a class="page-link" href="'.$page_url.'&page=1" title="First">«</a></li>'; //first link
            $pagination .= '<li class="page-item"><a class="page-link" href="'.$page_url.'&page='.$previous_link.'" title="Previous">Previous</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li class="page-item"><a class="page-link" href="'.$page_url.'&page='.$i.'">'.$i.'</a></li>';
                    }
                }
            $first_link = false; //set first link to false
        }
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="page-item active"><a class="page-link" href="#!">'.$current_page.'</a></li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="page-item active"><a class="page-link" href="#!">'.$current_page.'</a></li>';
        }else{ //regular current link
            $pagination .= '<li class="page-item active"><a class="page-link" href="#!">'.$current_page.'</a></li>';
        }
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li class="page-item"><a class="page-link" href="'.$page_url.'&page='.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){
                $next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li class="page-item"><a class="page-link" href="'.$page_url.'&page='.$next_link.'" >Next</a></li>'; //next link
                $pagination .= '<li class="page-item"><a class="page-link" href="'.$page_url.'&page='.$total_pages.'" title="Last">»</a></li>'; //last link
        }
    }
    return $pagination; //return pagination links
}

//cart
function cart(){
	if (isset($_GET['add_cart'])) {
		global $conn;
		$ip = getIp();
		$pro_id= $_GET['add_cart'];

		$sql = "SELECT * FROM cart where ip_add='$ip' and p_id='$pro_id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "";
		}
		else{
			$sql="insert into cart(p_id,ip_add,qty)
		values ('".$pro_id."','".$ip."','1')";
			if ($conn->query($sql) === true){
			echo "<script>window.open('index','_self')</script>";
			}
		}
	}
}
//getting the total added items
function total_items(){
	if (isset($_GET['add_cart'])) {
	global $conn;
	$ip = getIp();
	$sql = "SELECT * FROM cart where ip_add='$ip'";
		$result = $conn->query($sql);
		$count_items = $result->num_rows;
}else{
	global $conn;
	$ip = getIp();
	$sql = "SELECT * FROM cart where ip_add='$ip'";
		$result = $conn->query($sql);
		$count_items = $result->num_rows;
}
echo "$count_items";
}

//getting the total price in the cart
function total_price(){
	$total=0;
	global $conn;
	$ip = getIp();
	$sql = "SELECT * FROM cart where ip_add='$ip'";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$pro_id= $row["p_id"];
		$pro_price= "SELECT * FROM products where product_id='$pro_id'";
		$result2 = $conn->query($pro_price);
		while($row2=$result2->fetch_assoc()){
			$product_price= array($row2["product_price"]);
			$values = array_sum($product_price);
			$total +=$values;
			}
	}
	echo number_format($total) ;
}

//getting the updated cart
function total_price2(){
	global $conn;
	$ip = getIp();
	$total=0;
	$get_cart =mysqli_query($conn, "SELECT * FROM `cart` WHERE `ip_add`='$ip'");
	while ( $row_cart=mysqli_fetch_array($get_cart)) {
		# code...

		$quantity= $row_cart["qty"];
		$product_id=$row_cart['p_id'];	

	$get_price =mysqli_query($conn, "SELECT * FROM `products` WHERE `product_id`='$product_id'");
	while ( $row_price = mysqli_fetch_array($get_price)) {
	
		$price= $row_price["product_price"];

	//get the subtotal
	$sub_total=$price * $quantity;

	$total +=$sub_total;
	}
	
	}
	

	return $total;

	
}


//getting the categories
function getCats(){
	global $conn;
	$sql = "SELECT * FROM categories";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$cat_id= $row["cat_id"];
		$cat_title= $row["cat_title"];
		echo "<li><a href ='index?cat=$cat_id'>$cat_title</a></li>";
	}	
}


//getting the updated cart
function getUpdateItem($product_id){
	global $conn;
	$ip = getIp();
	$get_qty =mysqli_query($conn, "SELECT * FROM `cart` WHERE `ip_add`='$ip' AND `p_id`='$product_id'");
	$row_qty=mysqli_fetch_array($get_qty);
	$quantity= $row_qty["qty"];	

	$get_price =mysqli_query($conn, "SELECT * FROM `products` WHERE `product_id`='$product_id'");
	$row_price = mysqli_fetch_array($get_price);
	$price= $row_price["product_price"];

	//get the subtotal
	$sub_total=$price * $quantity;

	return $sub_total;
}

//getting the brands
function getBrands(){
	global $conn;
	$sql = "SELECT * FROM brands";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$brand_id= $row["brand_id"];
		$brand_title= $row["brand_title"];
		echo "<li><a href ='index?brand=$brand_id'>$brand_title</a></li>";
	}	
}
function getPro(){
	if (!isset($_GET['cat'])) {
		if (!isset($_GET['brand'])) {
	global $conn;
	$sql = "SELECT * FROM products order by RAND() LIMIT 0,6";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$pro_id= $row["product_id"];
		$pro_cat= $row["product_cat"];
		$pro_brand= $row["product_brand"];
		$pro_title= $row["product_title"];
		$pro_price= $row["product_price"];
		$pro_image= $row["product_image"];
		echo "<div id='single_product'>
				<h3>$pro_title</h3>
				<img style='border: 2px solid black;' src='admin_area/product_images/$pro_image' width='180' height='180' />
				<p><b>Price: $$pro_price</b></p>
				<a href='details?pro_id=$pro_id' style='float: left;'>Details</a>
				<a href='index?add_cart=$pro_id'><button style='float: right;'>Add to cart</button></a>
			</div>";
	}

	}
	}
}

function getCatPro(){
	if (isset($_GET['cat'])) {
		$cat_id = $_GET['cat'];
	global $conn;
	$sql = "SELECT * FROM products where product_cat='$cat_id'";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$pro_id= $row["product_id"];
		$pro_cat= $row["product_cat"];
		$pro_brand= $row["product_brand"];
		$pro_title= $row["product_title"];
		$pro_price= $row["product_price"];
		$pro_image= $row["product_image"];
		echo "<div id='single_product'>
				<h3>$pro_title</h3>
				<img style='border: 2px solid black;' src='admin_area/product_images/$pro_image' width='180' height='180' />
				<p><b> $$pro_price</b></p>
				<a href='details?pro_id=$pro_id' style='float: left;'>Details</a>
				<a href='index?pro_id=$pro_id'><button style='float: right;'>Add to cart</button></a>
			</div>";
	}

	}
}

function getBrandPro(){
	if (isset($_GET['brand'])) {
		$brand_id = $_GET['brand'];
	global $conn;
	$sql = "SELECT * FROM products where product_brand='$brand_id'";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$pro_id= $row["product_id"];
		$pro_cat= $row["product_cat"];
		$pro_brand= $row["product_brand"];
		$pro_title= $row["product_title"];
		$pro_price= $row["product_price"];
		$pro_image= $row["product_image"];
		echo "<div id='single_product'>
				<h3>$pro_title</h3>
				<img style='border: 2px solid black;' src='admin_area/product_images/$pro_image' width='180' height='180' />
				<p><b> $$pro_price</b></p>
				<a href='details?pro_id=$pro_id' style='float: left;'>Details</a>
				<a href='index?pro_id=$pro_id'><button style='float: right;'>Add to cart</button></a>
			</div>";
	}

	}
}


function image_crop($source_image, $destination, $tn_w = 100, $tn_h = 100, $quality = 90){
        $info = getimagesize($source_image);
        $imgtype = image_type_to_mime_type($info[2]);
        switch ($imgtype) {
            case 'image/jpeg':
                $source = imagecreatefromjpeg($source_image);
                break;
            case 'image/jpg':
                $source = imagecreatefromjpeg($source_image);
                break;
            case 'image/JPG':
                $source = imagecreatefromjpeg($source_image);
                break;
            case 'image/gif':
                $source = imagecreatefromgif($source_image);
                break;
            case 'image/png':
                $source = imagecreatefrompng($source_image);
                break;
            case 'image/PNG':
                $source = imagecreatefrompng($source_image);
                break;
            default:
                die('Invalid image type.');
        }
        $src_w = imagesx($source);
        $src_h = imagesy($source);
        $src_ratio = $src_w / $src_h;
        if ($tn_w / $tn_h > $src_ratio) {
            $new_h = $tn_w / $src_ratio;
            $new_w = $tn_w;
        } else {
            $new_w = $tn_h * $src_ratio;
            $new_h = $tn_h;
        }
        $x_mid = $new_w / 2;
        $y_mid = $new_h / 2;
        $newpic = imagecreatetruecolor(round($new_w), round($new_h));
        imagecopyresampled($newpic, $source, 0, 0, 0, 0, $new_w, $new_h, $src_w, $src_h);
        $final = imagecreatetruecolor($tn_w, $tn_h);
        imagecopyresampled($final, $newpic, 0, 0, $x_mid - $tn_w / 2, $y_mid - $tn_h / 2, $tn_w, $tn_h, $tn_w, $tn_h);
        if (Imagejpeg($final, $destination, $quality)) {
            return true;
        }
        return false;
    }
?>
