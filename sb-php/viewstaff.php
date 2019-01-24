<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');

?>


<?php require($_SERVER['DOCUMENT_ROOT'] . "/kps/sb-php/header_admin.php"); ?>

		<div class="dropdown">

			<button onclick="myFunction(this)" class="dropbtn">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</button>
			  
		</div>

		<div id="myDropdown" class="dropdown-content">
			 <a class="active" href="admin.php">Staff</a>
			 <a href="gallery.php">Gallery</a>
			 <a href="managecalendar.php">Calender</a>
			 <a href="notification.html">Notification</a>
			 <a href="aboutus.php">About Us</a>
			 <a href="logout.php">Log Out</a>
		</div>


			<script>
			/* When the user clicks on the button, 
			toggle between hiding and showing the dropdown content */
			function myFunction(x) {
				document.getElementById("myDropdown").classList.toggle("show");
				x.classList.toggle("change");
			}

			</script>
		
		<div id="wrap">
			<ul>
			  <li><a class="active" href="admin.php">Staff</a></li>
			  <li><a href="gallery.php">Gallery</a></li>
			  <li><a href="managecalendar.php">Calender</a></li>
			  <li><a href="notification.html">Notification</a></li>
			  <li><a href="aboutus.php">About Us</a></li>
			  <li><a href="logout.php">Log Out</a></li>
			</ul>
			
		</div>
		
	<div class="all2">	
		
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>Manage Staff</b></p>
			</h2>
					<!--<p style="color:white;text-align:center;">
						<a href="admin.php">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Go Back
							</button>
						</a>
					</p> -->

					<?php
								//3.1.2 Checking the values are existing in the database or not
							if (empty($_GET['staff'])) {
								# code...
								$staff = false;
							} else{
								$id = $_GET['staff'];

								$select_staff = "SELECT * FROM staff WHERE id = ".$id;
													 
								$staff = mysqli_query($connection, $select_staff) or die(mysqli_error($connection));
								$count = mysqli_num_rows($staff);

							}
					?>	
							
					<?php if (!$staff): ?>
						<p style="color:white;text-align:center;padding:20px;">
							Sorry, No details of staff have been added yet.
						</p>
					<?php else: ?>
						
						<p style="color:white;text-align:;padding:px;">
							
							

							<?php foreach ($staff as $staff): ?>

							
							<p class="left-h" style=" text-align:;padding-left:20px;margin:20px;">
								<img src= "<?php echo e($staff['image']); ?>" height="150" width="150" alt="not here" style = "border-radius: 10px;">
							</p>
							<p style="color:white;text-align:;padding-left:20px;margin:40px;">

								<p style="color:white;padding-left:20px;">Fullnames: <?php echo e($staff['fullnames']); ?></p>
								<p style="color:white;padding-left:20px;">Catergory: <?php echo e($staff['catergory']); ?></p>
								<p style="color:white;padding-left:20px;">Position: <?php echo e($staff['title']); ?></p>
								<p style="color:white;padding-left:20px;">Description: <?php echo e($staff['description']); ?></p>
							</p>
							<p style="color:white;text-align:center;">
								<a href="admin.php">
									<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Go Back</button>
								</a>
								<a href="deletestaff.php?staff=<?php echo $staff['id']; ?>">
									<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Delete</button>
								</a>
								
								<a href="editstaff.php?staff=<?php echo $staff['id']; ?>">
									<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Edit</button>
								</a>
							</p>
							<hr>

							<?php endforeach; ?>

						</p>
					<?php endif; ?>		
					
		
		</div>

	</div>

<?php require($_SERVER['DOCUMENT_ROOT'] . "/kps/sb-php/footer.php"); ?>