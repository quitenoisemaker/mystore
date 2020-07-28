	<?php
		// $conn =new mysqli('localhost', 'root', '' , 'skilled_db');
		$conn =new mysqli('localhost', 'root', '' , 'landing_page');
		if ($conn->connect_error) {
			echo "<b>Error:</b> Connection failed - $conn->connect_error";
		}
?>
	
			<!-- 
				<li><a href="#"><i class="fa fa-files-o"></i>Categories</a>
					<ul>
						<li><a href="create-category.php">Create Category</a></li>
						<li><a href="manage-category.php">Manage Category</a></li>
					</ul>
				</li> -->

				<?php 


				$sql = "SELECT * from  product";
						$result=$conn->query($sql);
						
		                if($result->num_rows >0){
								        
						while ( $row = $result->fetch_assoc()){ ?>

							<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
						

						<li><a href="#"><i class="fa fa-users"></i>Product</a>
					<ul>
						
						<li><a href="insert-details.php?id=<?php echo $row['product_id'];?>">Insert Product Deatails </a></li>
						<li><a href="insert-image.php"></i>Insert Product Images</a>
					</ul>
				</li>
					<li><a href="mail-list.php"><i class="fa fa-desktop"></i> Mailing List</a></li>
				
				

				<!-- <li><a href="manage-subscribers.php"><i class="fa fa-table"></i> Manage Subscribers</a></li> -->

			</ul>
		</nav>

						}
					}


				?>

				
			
			