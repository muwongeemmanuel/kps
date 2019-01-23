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
			 <a href="sbhome.php">Home</a>
			 <a class="active" href="nursery.php">Nursery School</a>
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
			  <li><a href="sbhome.php">Home</a></li>
			  <li class="dropdown">
				<a class="active" href="javascript:void(0)" class="dropbtn">Program</a>
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
					<p style="color:white;text-align:center;"><b>Nursery School</b></p>
			</h2>

			<?php

				$select_nursery = "SELECT * FROM us WHERE catergory='Nursery'";
									 
				$nursery = mysqli_query($connection, $select_nursery) or die(mysqli_error($connection));
				$count = mysqli_num_rows($nursery);
			
			?>	
							
			<?php if ($count == 0): ?>
				<p style="color:white;text-align:center;padding:20px;">
					Sorry, No details of Nursery School have been added yet.
				</p>
			<?php else: ?>
				
				<p style="color:white;text-align:;padding:px;">


					<?php foreach ($nursery as $nursery): ?>

						<p style="color:white;text-align:;padding-left:20px;margin:40px;">

							<h3 class="h" style="background-color: brown;">
								<p style="color:white;padding-left:20px;"><?php echo e($nursery['title']); ?></p>
							</h3>
							<p style="color:white;padding-left:20px;"><?php echo e($nursery['description']); ?></p>
							<P style="color:white;padding-left:20px;">
								<a href="download.php?file=<?php echo e($nursery['filepath']);?>" style="color:purple;text-decoration: none;">
									<?php echo e($nursery['filename']);?><br>
								</a>
							</P>
						</p>
						
						<!--<hr>-->

					<?php endforeach; ?>
					

				</p>
			<?php endif; ?>
			
		
		</div>
		
		
		
		
		<div class="corner" style="background-color: brown;margin-top:30px; ">
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