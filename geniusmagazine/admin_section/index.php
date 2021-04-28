<?php
include('../function/function.php');


if (!isset($_SESSION['username'])) {
  header('location: login');
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/sparker/admin_section/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:12:23 GMT -->
<?php include ('include/header.php'); ?>
	  <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card dashboard text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-money"></i>
              </div>
              <div class="mr-5"><h5>Total Sales</h5></div>
            </div>
            <a class="card-footer text-white clearfix small z-1 text-center" href="#">
              
                <?php
                  $total=0;
                  $get_total=mysqli_query($conn, "SELECT * FROM `online_payment`");
                while ( $row_total=mysqli_fetch_array($get_total)) {
                  $total+=$row_total['amount'];
                }
                
                echo "<p class='' style='font-size: 30px'>NGN " .number_format($total, 2)."</p>"; 

                 ?>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card dashboard text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-money"></i>
              </div>
				<div class="mr-5"><h5>
          <?php $month = date('F'); 
          echo $month ?> Sales</h5></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <?php
                $total=0;

                $first_day=date('Y-m-01');
                $last_day=date('Y-m-t');
                  $get_total=mysqli_query($conn, "SELECT * FROM `online_payment`");
                while ( $row_total=mysqli_fetch_array($get_total)) {
                  if (($row_total['date_created'] >= $first_day )&& ($row_total['date_created'] <= $last_day)) {
                    # code...
                    $total+=$row_total['amount'];
                  }
                  
                }
                echo "<p class='' style='font-size: 30px'>NGN " .number_format($total, 2)."</p>"; 
               ?>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card dashboard text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar-check-o"></i>
              </div>
              <div class="mr-5"><h5>Total Order</h5></div>
            </div>
            <a class="card-footer text-white clearfix small z-1 text-center" href="#">
              <?php

                  $get_total=mysqli_query($conn, "SELECT COUNT(*) FROM `online_payment`");
                $row_total=mysqli_fetch_array($get_total);
                
                echo "<p class='' style='font-size: 30px'>" .$row_total['COUNT(*)']."</p>"; 

                 ?>
            </a>
          </div>
        </div>
		</div>
		<!-- /cards -->
		<h2></h2>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-bar-chart"></i>Statistic</h2>
			</div>
		 <canvas id="myAreaChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
		</div>
	  </div>
	  <!-- /.container-fluid-->
   	</div>
    <!-- /.container-wrapper-->
    <?php include('include/footer.php'); ?>
	
</body>

<!-- Mirrored from www.ansonika.com/sparker/admin_section/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:12:24 GMT -->
</html>
