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
				<h2 class="d-inline-block">Online payment</h2>
				
			</div>
			<div class="list_general">
			    <div class="container table-responsive">
			   <table class="table" id="table_id">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">email</th>
      
      <th scope="col">Amount</th>
      <th scope="col">Reference No.</th>
      <th scope="col">Order date</th>
    </tr>
  </thead>
  <tbody>
      
      <?php 
                                      
                                    //get online payment
                                    $online_payment=mysqli_query($conn, "SELECT * FROM online_payment ORDER BY id desc");
                                    while($row_payment=mysqli_fetch_array($online_payment)){ 
                                    ?>
    <tr>
      <th scope="row"><?php echo $row_payment['email']  ?></th>
      
      <td><?php echo $row_payment['amount']  ?></td>
      <td><?php echo $row_payment['reference_no']  ?></td>
      <td><?php echo format_date($row_payment['date_created'])  ?></td>
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
    <?php include('include/footer.php'); ?>
	
</body>

<!-- Mirrored from www.ansonika.com/sparker/admin_section/listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:58 GMT -->
</html>
