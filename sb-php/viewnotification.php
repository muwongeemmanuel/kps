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
			 <a href="admin.php">Staff</a>
			 <a href="gallery.php">Gallery</a>
			 <a href="managecalendar.php">Calendar</a>
			 <a class="active" href="managenotification.php">Notification</a>
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
			  <li><a href="admin.php">Staff</a></li>
			  <li><a href="gallery.php">Gallery</a></li>
			  <li><a href="managecalendar.php">Calendar</a></li>
			  <li><a class="active" href="managenotification.php">Notification</a></li>
			  <li><a href="logout.php">Log Out</a></li>
			</ul>
			
		</div>
		
	<div class="all2">	
		
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>View Notification</b></p>
			</h2>
					<!--<p style="color:white;text-align:center;">
						<a href="admin.php">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Go Back
							</button>
						</a>
					</p> -->

					<?php
								//3.1.2 Checking the values are existing in the database or not
							if (empty($_GET['notification'])) {
								# code...
								$calendar = false;
							} else{
								$id =  $_GET['notification'];

								$select_notification = "SELECT * FROM notification WHERE id = ".$id;
													 
								$notification = mysqli_query($connection, $select_notification) or die(mysqli_error($connection));
								$count = mysqli_num_rows($notification);

							}
					?>	
							
					<?php if (!$notification): ?>
						<p style="color:white;text-align:center;padding:20px;">
							Sorry, No details of notification have been added yet.
						</p>
					<?php else: ?>
						
						<p style="color:white;text-align:;padding:px;">


							<?php foreach ($notification as $notification): ?>

								<p style="color:white;text-align:;padding-left:20px;margin:40px;">

									<p style="color:white;padding-left:20px;">Date: <?php echo e($notification['type']); ?></p>
									<p style="color:white;padding-left:20px;">Description: <?php echo e($notification['description']); ?></p>
									<p style="color:white;padding-left:20px;">
										<a href="download.php?file=<?php echo e($notification['filepath']);?>" style="color:purple;">

											<?php echo e($notification['filename']);?><br>
											
										</a>
									</p>
									<p style="color:white;padding-left:20px;">Date: <?php echo e($notification['day']); ?></p>
								</p>
								<p style="color:white;text-align:center;">
									<a href="managenotification.php">
										<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Go Back</button>
									</a>
									<a href="deletenotification.php?notification=<?php echo $notification['id']; ?>">
										<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Delete</button>
									</a>
									
									<a href="editnotification.php?notification=<?php echo $notification['id']; ?>">
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