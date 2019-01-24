<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');
	
	//$_SESSION['username'] = $username;
	//checking if the session is still valid.
	if (isset($_SESSION['username'])){

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
			 <a href="managenotification.php">Notification</a>
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
			  <li><a href="managenotification.php">Notification</a></li>
			  <li><a href="aboutus.php">About Us</a></li>
			  <li><a href="logout.php">Log Out</a></li>
			</ul>
			
		</div>
		
	<div class="all2">	
		
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>Manage Staff</b></p>
			</h2>
					<p style="color:white;text-align:center;">

						<a href="addstaff.php">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">
								Add Staff
							</button>
						</a>
						
						<?php if ($_SESSION['title'] == 'admin'): ?>

							<a href="manageadmin.php">
								<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">
									Admin
								</button>
							</a>

						<?php endif;?>

						<a href="settings.php">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">
								Settings
							</button>
						</a>
				</p>

					<?php
								//3.1.2 Checking the values are existing in the database or not
							$select_staff = "SELECT * FROM `staff`";
							 
							$result = mysqli_query($connection, $select_staff) or die(mysqli_error($connection));
							$count = mysqli_num_rows($result);
					?>	
							
					<?php if ($count == 0): ?>
						<p style="color:white;text-align:center;padding:20px;">
							Sorry, No details of staff have been added yet.
						</p>
					<?php else: ?>
						
						<p style="color:white;text-align:;padding:px;">
							
							
							<table>
								
									<tr>
										<th>StaffID</th> <th>Fullnames</th> <th>Position</th> <th></th> <th></th> <th></th>
									</tr>
									<?php foreach ($result as $staff): ?>
										<tr>
											<td><?php echo $staff['id']; ?></td>
											<td><?php echo $staff['fullnames']; ?></td>
											<td><?php echo $staff['title']; ?></td>
											<td>
												<a href="viewstaff.php?staff=<?php echo $staff['id']; ?>">
													<button class = "submit" style = "background-color:blue;color:white;border-radius:5px;">View
													</button>
												</a>
											</td>
											<td>
												<a href="editstaff.php?staff=<?php echo $staff['id']; ?>">
													<button class = "submit" style = "background-color:blue;color:white;border-radius:5px;">Edit
													</button>
												</a>
													
											</td>
											<td>
												<a href="deletestaff.php?staff=<?php echo $staff['id']; ?>">
													<button class = "submit" style = "background-color:blue;color:white;border-radius:5px;">Delete
													</button>
												</a>
											</td>
										</tr>
									<?php endforeach; ?>
								

							</table>

						</p>
					<?php endif; ?>		
					
		
		</div>

	</div>	

		<?php require($_SERVER['DOCUMENT_ROOT'] . "/kps/sb-php/footer.php"); ?>

<?php 
	
	}

	else{
			//f the user session has expired
			$_SESSION['login_fail'] = "Your Session has expired, please login again.";
			//echo "Your Session has expired, please login again.";
			header('Location: login.php');
	}

?>