<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');
	
?>

<?php require($_SERVER['DOCUMENT_ROOT'] . "/kps/sb-php/header.php"); ?>

		<div class="dropdown">

			<button onclick="myFunction(this)" class="dropbtn" style="background-color:;">
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
		
	<div class="all">	
		<div class="welcome" style="background-color: brown;">
			<h2 class="h" style="background-color: blue;">	
					<p style="color:white;text-align:center;"><b>Welcome</b></p>
			</h2>
			<?php
	
				$select_welcome = "SELECT description FROM us WHERE catergory ='Welcome'";
									 
				$welcome = mysqli_query($connection, $select_welcome) or die(mysqli_error($connection));
				$count = mysqli_num_rows($welcome);

			?>
			<?php if ($count==0): ?>

				<p style="color:white;text-align:center;padding:20px;">
					
					No Welcome message added yet. Contact the MGT.

				</p>

			<?php else: ?>

				<?php foreach ($welcome as $welcome): ?>

					<p style="color:white;text-align:center;padding:20px;">
						<?php echo e($welcome['description']); ?></br>
					</p>
					
				<?php endforeach; ?>

			<?php endif; ?>
			
		
		</div>
		<div class="t">	
			<div class="inner">	
				<p class="bu" style="padding:10px;text-align:center;margin:5px auto;">

					<?php
							
						$select_gallery = "SELECT image FROM gallery WHERE catergory ='Rotate'";
											 
						$gallery = mysqli_query($connection, $select_gallery) or die(mysqli_error($connection));
						$count = mysqli_num_rows($gallery);

					?>
					<?php foreach ($gallery as $gallery): ?>

						<img class="slides" src="<?php echo e($gallery['image']); ?>" alt="not here" style="width:100%">
						
					<?php endforeach; ?>
				
				</p>
			</div>
		</div>		
					<script>
					var Index = 0;
					carous();

					function carous() {
						var i;
						var y = document.getElementsByClassName("slides");
						for (i = 0; i < y.length; i++) {
						   y[i].style.display = "none";  
						}
						Index++;
						if (Index > y.length) {Index = 1}    
						y[Index-1].style.display = "block";  
						setTimeout(carous, 2000); // Change image every 2 seconds
					}
					</script>
		

					<script>
					var myIndex = 0;
					carousel();

					function carousel() {
						var i;
						var x = document.getElementsByClassName("mySlides");
						for (i = 0; i < x.length; i++) {
						   x[i].style.display = "none";  
						}
						myIndex++;
						if (myIndex > x.length) {myIndex = 1}    
						x[myIndex-1].style.display = "block";  
						setTimeout(carousel, 2000); // Change image every 2 seconds
					}
					</script>
		
		<div class="mission" style="background-color: purple;">
			<h2 style="background-color: green;">	
					<p style="color:white;text-align:;"><b>Mission Statement</b></p>
			</h2>
			<?php
			
				$select_mission = "SELECT description FROM us WHERE catergory ='Mission Statement'";
									 
				$mission = mysqli_query($connection, $select_mission) or die(mysqli_error($connection));
				$count = mysqli_num_rows($mission);

			?>
			<?php if ($count==0): ?>

				<p style="color:white;text-align:center;padding:20px;">
					
					No Mission Statement added yet. Contact the MGT.

				</p>

			<?php else: ?>

				<?php foreach ($mission as $mission): ?>

					<p style="color:white;text-align:center;padding:20px;">
						<?php echo e($mission['description']); ?></br>
					</p>
					
				<?php endforeach; ?>

			<?php endif; ?>
		
		</div>
		
		<div class="calender" style="background-color: indigo;">
			<h2 style="background-color: blue;">	
					<p class="c" style="color:white;"><b>School Calendar</b></p>
			</h2>
					<p style="color:white;text-align:center;padding:0px;">
						<?php
							
							$year = date("Y");
							$month = date("n")-1;

							//$select_calendar = "SELECT * FROM calender WHERE day = '".$date."'";
							$select_calendar = "SELECT * FROM calender WHERE YEAR(`day`) >= '".$year."' AND MONTH(`day`) >= '".$month."' ORDER BY day";
												 
							$calendar = mysqli_query($connection, $select_calendar) or die(mysqli_error($connection));
							$count = mysqli_num_rows($calendar);

							$limit = 0;
						?>
						<?php foreach ($calendar as $calendar): ?>

							<?php echo e($calendar['description']); ?><br>
							<?php echo e($calendar['day']); ?><br>
							<?php if ($limit++ > 1) break; ?>

							

						<?php endforeach; ?>
						
						<a href="calendar1.php" style="color:green;">Read More</a>
					</p>

		
		</div>
		
		<div class="notice" style="background-color: #34495e;">
			<h2 style="background-color: indigo;">	
					<p style="color:white;text-align:;"><b>Notice Board</b></p>
			</h2>
					<p style="color:white;text-align:left;padding:0px;margin-left:20px; ">
						<?php
							
							$year = date("Y");
							$month = date("n")-1;

							//$select_calendar = "SELECT * FROM calender WHERE day = '".$date."'";
							$select_notification = "SELECT * FROM notification WHERE YEAR(`day`) >= '".$year."' AND MONTH(`day`) >= '".$month."'AND type = 'Normal' ORDER BY day";
												 
							$notification = mysqli_query($connection, $select_notification) or die(mysqli_error($connection));
							$count = mysqli_num_rows($notification);

							$limit = 0;
						?>
						<?php foreach ($notification as $notification): ?>

							<?php echo e($notification['description']); ?><br>
							<a href="download.php?file=<?php echo e($notification['filepath']);?>" style="color:purple;">

								<?php echo e($notification['filename']);?><br>
								
							</a>
							
							<?php if ($limit++ > 1) break; ?>

						<?php endforeach; ?>
						
						<p style="text-align: center;"><a href="notification.php" style="color:green;">Read More</a></p>
					</p>

		
		</div>
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:;"><b>Creative Corner</b></p>
			</h2>
					<p style="color:white;text-align:center;padding:20px;">
						<marquee behavior="scroll" direction="left" scrolldelay="800" scrollamount="100">

							<?php
							
								$select_gallery = "SELECT image FROM gallery WHERE catergory ='Creative'";
													 
								$gallery = mysqli_query($connection, $select_gallery) or die(mysqli_error($connection));
								$count = mysqli_num_rows($gallery);

							?>
							<?php foreach ($gallery as $gallery): ?>

								<img src="<?php echo e($gallery['image']); ?>" width="150" height="108" alt="Creative">
								
							<?php endforeach; ?>
							
						</marquee>
					</p>
		
		</div>

	</div>

<?php require($_SERVER['DOCUMENT_ROOT'] . "/kps/sb-php/footer.php"); ?>