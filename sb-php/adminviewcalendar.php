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
			 <a class="active" href="managecalendar.php">Calendar</a>
			 <a href="notification.html">Notification</a>
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
			  <li><a class="active" href="managecalendar.php">Calendar</a></li>
			  <li><a href="notification.html">Notification</a></li>
			  <li><a href="logout.php">Log Out</a></li>
			</ul>
			
		</div>
		
	<div class="all2">	
		
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>View Calendar</b></p>
			</h2>
					<!--<p style="color:white;text-align:center;">
						<a href="admin.php">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Go Back
							</button>
						</a>
					</p> -->

					<?php
								//3.1.2 Checking the values are existing in the database or not
							if (empty($_GET['calendar'])) {
								# code...
								$calendar = false;
							} else{
								$date =  $_GET['calendar'];

								$select_calendar = "SELECT * FROM calender WHERE day = '".$date."'";
													 
								$calendar = mysqli_query($connection, $select_calendar) or die(mysqli_error($connection));
								$count = mysqli_num_rows($calendar);

							}
					?>	
							
					<?php if (!$calendar): ?>
						<p style="color:white;text-align:center;padding:20px;">
							Sorry, No details of calendar have been added yet.
						</p>
					<?php else: ?>
						
						<p style="color:white;text-align:;padding:px;">


							<?php foreach ($calendar as $calendar): ?>

								<p style="color:white;text-align:;padding-left:20px;margin:40px;">

									<p style="color:white;padding-left:20px;">Date: <?php echo e($calendar['day']); ?></p>
									<p style="color:white;padding-left:20px;">Description: <?php echo e($calendar['description']); ?></p>
								</p>
								<p style="color:white;text-align:center;">
									<a href="managecalendar.php">
										<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Go Back</button>
									</a>
									<a href="deletecalendar.php?calendar=<?php echo $calendar['day']; ?>">
										<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Delete</button>
									</a>
									
									<a href="editcalendar.php?calendar=<?php echo $calendar['day']; ?>">
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