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
			 <a href="nursery.php">Nursery School</a>
			 <a href="primary.php">Primary School</a>
			 <a href="admission.php">Admission</a>
			 <a class="active" href="staff.php">Our Staff</a>
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
				<a href="javascript:void(0)" class="dropbtn">Program</a>
				<div class="dropdown-content">
				  <a href="nursery.php">Nursery School</a>
				  <a href="primary.php">Primary School</a>
				</div>
			  </li>
			  <li><a href="admission.php">Admission</a></li>
			  <li><a class="active" href="staff.php">Our Staff</a></li>
			  <li><a href="about.php">About Us</a></li>
			  <li><a href="scontact.php">Contact</a></li>
			  <li><a href="login.php">Login</a></li>
			</ul>
			
		</div>
		
	<div class="all2">	
		<div class="corner" style="background-color: brown;">
			<h2 class="h" style="background-color: blue;">	
					<p style="color:white;text-align:center;"><b>Directors</b></p>
			</h2>

			<?php
					

					$select_staff = "SELECT * FROM staff WHERE catergory = 'Directors'";
										 
					$staff = mysqli_query($connection, $select_staff) or die(mysqli_error($connection));
					$count = mysqli_num_rows($staff);
			?>	


			<?php if ($count==0): ?>
				<p style="color:white;text-align:center;padding:20px;">
					No details of Administrator staff have been added yet.
				</p>
			<?php else: ?>
			
				<?php foreach ($staff as $director): ?>

					<p class="left-h" style=" text-align:;padding-left:20px;margin:20px;">
						<img src= "<?php echo e($director['image']); ?>" height="150" width="150" alt="not here" style = "border-radius: 10px;">
					</p>
					<p style="color:white;text-align:;padding-left:20px;margin:50px;">
						<p style="color:white;text-align:;padding-left:20px;"> <b><?php echo e($director['fullnames']); ?></b> </p>
						<p style="color:white;text-align:;left;padding-left:20px;"> <b><?php echo e($director['title']); ?></b> </p>
						<p style="color:white;text-align:;padding-left:20px;"> <?php echo e($director['description']); ?> </p>
					</p>
					
					<hr>
				<?php endforeach; ?>
			<?php endif; ?>
			
		
		</div>
		<div class="corner" style="background-color: brown; margin-top: 40px;">
			<h2 class="h" style="background-color: blue;">	
					<p style="color:white;text-align:center;"><b>Administrators</b></p>
			</h2>

			<?php
					

					$select_staff = "SELECT * FROM staff WHERE catergory = 'Administrators'";
										 
					$staff = mysqli_query($connection, $select_staff) or die(mysqli_error($connection));
					$count = mysqli_num_rows($staff);

				
			?>	
			
			<?php if ($count==0): ?>
				<p style="color:white;text-align:center;padding:20px;">
					No details of Administrator staff have been added yet.
				</p>
			<?php else: ?>

				<?php foreach ($staff as $administrator): ?>

					<p class="left-h" style=" text-align:;padding-left:20px;margin:20px;">
						<img src= "<?php echo e($administrator['image']); ?>" height="150" width="150" alt="not here" style = "border-radius: 10px;">
					</p>
					<p style="color:white;text-align:;padding-left:20px;margin:50px;">
						<p style="color:white;text-align:;padding-left:20px;"> <b><?php echo e($administrator['fullnames']); ?></b> </p>
						<p style="color:white;text-align:;left;padding-left:20px;"> <b><?php echo e($administrator['title']); ?></b> </p>
						<p style="color:white;text-align:;padding-left:20px;"> <?php echo e($administrator['description']); ?> </p>
					</p>
					
					<hr>
				<?php endforeach; ?>
				
			<?php endif; ?>

		</div>
		<div class="corner" style="background-color: brown; margin-top: 40px;">
			<h2 class="h" style="background-color: blue;">	
					<p style="color:white;text-align:center;"><b>Teaching Staff</b></p>
			</h2>

			<?php
					

					$select_staff = "SELECT * FROM staff WHERE catergory = 'Teaching Staff'";
										 
					$staff = mysqli_query($connection, $select_staff) or die(mysqli_error($connection));
					$count = mysqli_num_rows($staff);

				
			?>	
			
			<?php if ($count==0): ?>
				<p style="color:white;text-align:center;padding:20px;">
					No details of Teaching Staff staff have been added yet.
				</p>
			<?php else: ?>

				<?php foreach ($staff as $teaching): ?>

					<p class="left-h" style=" text-align:;padding-left:20px;margin:20px;">
						<img src= "<?php echo e($teaching['image']); ?>" height="150" width="150" alt="not here" style = "border-radius: 10px;">
					</p>
					<p style="color:white;text-align:;padding-left:20px;margin:50px;">
						<p style="color:white;text-align:;padding-left:20px;"> <b><?php echo e($teaching['fullnames']); ?></b> </p>
						<p style="color:white;text-align:;left;padding-left:20px;"> <b><?php echo e($teaching['title']); ?></b> </p>
						<p style="color:white;text-align:;padding-left:20px;"> <?php echo e($teaching['description']); ?> </p>
					</p>
					
					<hr>
				<?php endforeach; ?>
				
			<?php endif; ?>

		</div>
		<div class="corner" style="background-color: brown; margin-top: 40px;">
			<h2 class="h" style="background-color: blue;">	
					<p style="color:white;text-align:center;"><b>Non-Teaching Staff</b></p>
			</h2>

			<?php
					

					$select_staff = "SELECT * FROM staff WHERE catergory = 'Non-Teaching Staff'";
										 
					$staff = mysqli_query($connection, $select_staff) or die(mysqli_error($connection));
					$count = mysqli_num_rows($staff);

				
			?>	
			
			<?php if ($count==0): ?>
				<p style="color:white;text-align:center;padding:20px;">
					No details of Teaching Staff staff have been added yet.
				</p>
			<?php else: ?>

				<?php foreach ($staff as $nonteaching): ?>

					<p class="left-h" style=" text-align:;padding-left:20px;margin:20px;">
						<img src= "<?php echo e($nonteaching['image']); ?>" height="150" width="150" alt="not here" style = "border-radius: 10px;">
					</p>
					<p style="color:white;text-align:;padding-left:20px;margin:50px;">
						<p style="color:white;text-align:;padding-left:20px;"> <b><?php echo e($nonteaching['fullnames']); ?></b> </p>
						<p style="color:white;text-align:;left;padding-left:20px;"> <b><?php echo e($nonteaching['title']); ?></b> </p>
						<p style="color:white;text-align:;padding-left:20px;"> <?php echo e($nonteaching['description']); ?> </p>
					</p>
					
					<hr>
				<?php endforeach; ?>
				
			<?php endif; ?>

		</div>
		

	</div>

<?php require($_SERVER['DOCUMENT_ROOT'] . "/kps/sb-php/footer.php"); ?>