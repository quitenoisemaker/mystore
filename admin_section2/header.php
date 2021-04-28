<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/sparker/admin_section/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:53 GMT -->
<?php include ('include/header.php'); ?>
<form>
		<div class="box_general">
			<h4>Header</h4>
			
			<div class="list_general">
				<ul>
					<li>	
					<h6>Site Title </h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Site title" name="site_title">
					</div>
					</li>
					<li>	
					<h6>Site Description </h6>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Site description" name="site_desc">
					</div>
					</li>
					<li>	
					<h6>Site Icon </h6>
					<small class="text-muted">Site Icons are what you see in browser tabs and bookmark bars. Upload one here!<br>

					Site Icons should be square and at least 512 × 512 pixels.</small>
					<div class="form-group">
						<div class="p-2">
						<img class=' rounded-circle' src='img/item_3.jpg' width="100" alt='' id='image_display'>
						</div>
						<div class="p-2">
						<button class="btn btn-success btn-sm " onclick="triggerClick()">Change image</button></div>
						<input type="file" accept="image/*" name="myfile" onchange="displayImage(this)" id="myfile" class="form-control" style="display: none;">
					</div>
					</li>
				
				</ul>
			</div>
		</div>
		<div class="float-right">
		<button type="submit" class="btn_1 medium" name="submit">Save</button>
		</div>
		</form>
		<!-- /box_general-->
		
		<!-- /pagination-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- /container-wrapper-->
    <?php include('include/footer.php'); ?>

    <script>
    	function triggerClick() {
  document.querySelector('#myfile').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#image_display').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
    </script>
	
</body>

<!-- Mirrored from www.ansonika.com/sparker/admin_section/messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:14:56 GMT -->
</html>
