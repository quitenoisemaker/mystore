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


<!-- Mirrored from www.ansonika.com/sparker/admin_section/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:53 GMT -->
<?php include ('include/header.php'); ?>
<form action="" method="POST" enctype="multipart/form-data">
		<div class="box_general p-3">
			<div class="list_general">
				<ul>
					
					<h6>Site Image 1 </h6>
					<small class="text-muted">

					Image should not be more than 200kb for better load time</small>
					<div class="form-group">
						<input type="file" name="myfile" class="" required >
					</div>
					<!-- Button -->
                                        <button class="btn btn-primary btn-sm text-white" name="submit">
                                            Submit
                                        </button>
					</li>
				
				</ul>
			</div>
		</div>
	
		</form>
		
		<form action="" method="POST" enctype="multipart/form-data">
		<div class="box_general p-3">
			<div class="list_general">
				<ul>
					
					<h6>Site Image 2</h6>
					<small class="text-muted">Image should be 600 x 900 pixels and not more than 200kb for better load time</small>
					<div class="form-group">
						<input type="file" name="myfile" class="" required >
					</div>
					<!-- Button -->
                                        <button class="btn btn-primary btn-sm text-white" name="submit2">
                                            Submit
                                        </button>
					</li>
				
				</ul>
			</div>
		</div>
	
		</form>
		<form action="" method="POST" enctype="multipart/form-data">
		<div class="box_general p-3">
			<div class="list_general">
				<ul>
					
					<h6>Site Image 3</h6>
					<small class="text-muted">Image should be 600 x 900 pixels and not more than 200kb for better load time.</small>
					<div class="form-group">
						<input type="file" name="myfile" class="" required >
					</div>
					<!-- Button -->
                                        <button class="btn btn-primary btn-sm text-white" name="submit3">
                                            Submit
                                        </button>
					</li>
				
				</ul>
			</div>
		</div>
	
		</form>
		<!-- /box_general-->
		
		<!-- /pagination-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- /container-wrapper-->
    <?php include('include/footer.php'); ?>

//     <script>
//     	function triggerClick() {
//   document.querySelector('#myfile').click();
// }
// function displayImage(e) {
//   if (e.files[0]) {
//     var reader = new FileReader();
//     reader.onload = function(e){
//       document.querySelector('#image_display').setAttribute('src', e.target.result);
//     }
//     reader.readAsDataURL(e.files[0]);
//   }
// }
//     </script>
	
</body>

 <?php

    if (isset($_POST['submit'])) {
         
          @$name = $_FILES['myfile'] ['name'];
          @$tmp_name = $_FILES['myfile'] ['tmp_name'];
          $extension = substr($name, strpos($name, '.') +1 );
          @$type = $_FILES['myfile'] ['type'];
          @$size = $_FILES['myfile'] ['size'];
        //   $max_size = 5000000;
              
        $location='../images/';    

        if (move_uploaded_file($tmp_name, $location.$name )){

                 
        $sql = "UPDATE photo SET photo='$name' WHERE id='1'";

        if(mysqli_query($conn, $sql)){
          echo "<script>alert('Subimitted successfully')</script>";
          // echo "<script>window.open('user_account.php','_self')</script>";
        }else{
          echo "<script>alert('Opp! Error')</script>";
        }
          
        } 

    }
    
    if (isset($_POST['submit2'])) {
         
          @$name = $_FILES['myfile'] ['name'];
          @$tmp_name = $_FILES['myfile'] ['tmp_name'];
          $extension = substr($name, strpos($name, '.') +1 );
          @$type = $_FILES['myfile'] ['type'];
          @$size = $_FILES['myfile'] ['size'];
        //   $max_size = 5000000;
              
        $location='../images/';    

        if (move_uploaded_file($tmp_name, $location.$name )){

                 
        $sql = "UPDATE photo SET photo='$name' WHERE id='2'";

        if(mysqli_query($conn, $sql)){
          echo "<script>alert('Subimitted successfully')</script>";
          // echo "<script>window.open('user_account.php','_self')</script>";
        }else{
          echo "<script>alert('Opp! Error')</script>";
        }
          
        } 

    }
    
    
    if (isset($_POST['submit3'])) {
         
          @$name = $_FILES['myfile'] ['name'];
          @$tmp_name = $_FILES['myfile'] ['tmp_name'];
          $extension = substr($name, strpos($name, '.') +1 );
          @$type = $_FILES['myfile'] ['type'];
          @$size = $_FILES['myfile'] ['size'];
        //   $max_size = 5000000;
              
        $location='../images/';    

        if (move_uploaded_file($tmp_name, $location.$name )){

                 
        $sql = "UPDATE photo SET photo='$name' WHERE id='3'";

        if(mysqli_query($conn, $sql)){
          echo "<script>alert('Subimitted successfully')</script>";
          // echo "<script>window.open('user_account.php','_self')</script>";
        }else{
          echo "<script>alert('Opp! Error')</script>";
        }
          
        } 

    }


  ?>


<!-- Mirrored from www.ansonika.com/sparker/admin_section/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:56 GMT -->
</html>
