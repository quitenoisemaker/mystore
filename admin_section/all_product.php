<?php
include('../function/function.php');


if (!isset($_SESSION['username'])) {
  header('location: login');
}

function format_date($date){
        return date('D, M jS Y', strtotime($date));
    }
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/sparker/admin_section/listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:58 GMT -->
<?php include ('include/header.php'); ?>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">All Product</h2>
				
			</div>
			<div class="list_general">
			    <div class="container table-responsive">
			   <table class="table" id="table_id">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Image</th>
      
      <th scope="col"> Title</th>
      <th scope="col">Price (&#x20A6 )</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      
      <?php 
                                      
                                    //get online payment
                                    $get_product=mysqli_query($conn, "SELECT * FROM products ORDER BY product_id desc");
                                    while($row_payment=mysqli_fetch_array($get_product)){ 
                                    ?>
    <tr>
      <th scope="row"><img src="product_images/<?php echo "resized_". $row_payment['product_image']?>" width="50px"> </th>
      
      <td><?php echo $row_payment['product_title']  ?></td>
      <td><?php echo number_format($row_payment['product_price'])?></td>
      <td><a href="edit_product?id=<?php echo $row_payment['product_id']  ?>" class="btn btn-sm btn-warning">Edit</a> <a href="all_product?del=<?php echo $row_payment['product_id']?>" onclick="return confirm('Do you want to delete');" class="btn btn-sm btn-danger" >Delete</a></td>
    </tr>
    
      <?php } ?>
                                
                                         
                            
   
  </tbody>
</table>
                
                </div>
			
			</div>
		</div>
	
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- /container-wrapper-->
    <?php include('include/footer.php');

      if(isset($_GET['del'])){
  
      $id=$_GET['del'];

      $ck=mysqli_query($conn,"SELECT * FROM `products` WHERE product_id ='$id' ");
  $ftch=mysqli_fetch_array($ck);

      $sql = "DELETE from products where product_id =$id";
      $result = $conn->query($sql);


      unlink('product_images/'.$ftch['product_image']);
      unlink('product_images/resized_'.$ftch['product_image']);
       
      echo "<script>alert('Product has been deleted')</script>";
          echo "<script>window.open('all_product','_self')</script>";
      }
     ?>
	
</body>

<!-- Mirrored from www.ansonika.com/sparker/admin_section/listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:58 GMT -->
</html>
