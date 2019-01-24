<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');

?>

<?php require($_SERVER['DOCUMENT_ROOT'] . "/kps/sb-php/header.php"); ?>

		<div class="dropdown">

			<button onclick="myFunction(this)" class="dropbtn">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</button>
			  
		</div>

		<div id="myDropdown" class="dropdown-content">
			 <a class="active" href="sbhome.php">Home</a>
			 <a href="nursery.php">Nursery School</a>
			 <a href="primary.php">Primary School</a>
			 <a href="admission.php">Admission</a>
			 <a href="staff.php">Our Staff</a>
			 <a href="about.php">About Us</a>
			 <a href="scontact.php">Contact</a>
			 <a href="login.php">Login</a>
		</div>


			<script>
			/* When the user clicks on the button, 
			toggle between hiding and showing the dropdown content */
			function myFunction(x) {
				document.getElementById("myDropdown").classList.toggle("show");
				x.classList.toggle("change");
			}

			// Close the dropdown if the user clicks outside of it
			/*window.onclick = function(event) {
			  if (!event.target.matches('.dropbtn')) {

				var dropdowns = document.getElementsByClassName("dropdown-content");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
				  var openDropdown = dropdowns[i];
				  if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
				  }
				}
			  }
			}*/
			</script>
		
		<div id="wrap">
			<ul>
			  <li><a class="active" href="sbhome.php">Home</a></li>
			  <li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Program</a>
				<div class="dropdown-content">
				  <a href="nursery.php">Nursery School</a>
				  <a href="primary.php">Primary School</a>
				</div>
			  </li>
			  <li><a href="admission.php">Admission</a></li>
			  <li><a href="staff.php">Our Staff</a></li>
			  <li><a href="about.php">About Us</a></li>
			  <li><a href="scontact.php">Contact</a></li>
			  <li><a href="login.php">Login</a></li>
			</ul>
			
		</div>
		
	<div class="all2">	
		<div class="corner" style="background-color: brown;">
			<h2 class="h" style="background-color: blue;">	
					<p style="color:white;text-align:center;"><b>Calendar</b></p>
			</h2>

			<?php

				$select_calendar = "SELECT * FROM calender ORDER BY day";
									 
				$calendar = mysqli_query($connection, $select_calendar) or die(mysqli_error($connection));
				$count = mysqli_num_rows($calendar);
			
			?>	
							
					<?php if ($count == 0): ?>
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
								
								<hr>

							<?php endforeach; ?>
							<p style="color:white;text-align:center;">

								<a href="calendar2.php">
									<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Mode 2</button>
								</a>
								<a href="sbhome.php">
									<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Go Back</button>
								</a>
							</p>

						</p>
					<?php endif; ?>
			
		
		</div>
		
		
		
		
		<div class="corner" style="background-color: brown;margin-top:30px; ">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:;"><b>Creative Corner</b></p>
			</h2>
					<p style="color:white;text-align:center;padding:20px;">
						<marquee behavior="scroll" direction="left" scrolldelay="800" scrollamount="100">
							<img src="http://localhost/sb/sb-images/images-7.jpeg" width="150" height="108" alt="Cup of tea anyone?">
							<img src="http://localhost/sb/sb-images/images.jpeg" width="150" height="108" alt="Cup of tea anyone?">
							<img src="http://localhost/sb/sb-images/images.png" width="150" height="108" alt="Cup of tea anyone?">
						</marquee>
					</p>
		
		</div>

	</div>

<?php require($_SERVER['DOCUMENT_ROOT'] . "/kps/sb-php/footer.php"); ?>