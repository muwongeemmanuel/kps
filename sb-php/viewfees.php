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
			 <a href="admin.php">Staff</a>
			 <a href="gallery.php">Gallery</a>
			 <a href="managecalendar.php">Calender</a>
			 <a href="managenotification.php">Notification</a>
			 <a class="active" href="aboutus.php">About Us</a>
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
			  <li><a href="managecalendar.php">Calender</a></li>
			  <li><a href="managenotification.php">Notification</a></li>
			  <li><a class="active" href="aboutus.php">About Us</a></li>
			  <li><a href="logout.php">Log Out</a></li>
			</ul>
			
		</div>
		
	<div class="all2">	
		
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>Fees Structure</b></p>
			</h2>

					<div style="color:white;text-align:;padding-left: 20px;">
							
						<a href="aboutus.php">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">
								Go Back
							</button>
						</a>
					</div>

					<?php
								//3.1.2 Checking the values are existing in the database or not
							$select_fees = "SELECT * FROM `fees`";
							 
							$result = mysqli_query($connection, $select_fees) or die(mysqli_error($connection));
							$count = mysqli_num_rows($result);
					?>	
							
					<?php if ($count == 0): ?>
						<p style="color:white;text-align:center;padding:20px;">
							Sorry, No details of Fees Structure have been added yet.
						</p>
					<?php else: ?>
						
						<p style="color:white;text-align:;padding:px;">
							
							<?php foreach ($result as $fees): ?>

								<table>

									<tr>
										<th colspan="2" style="text-align: center;color: blue;">School Fees Class: Baby - P.1</th>
									</tr>
									<tr>
										<td>Admission Fee</td> <td><?php echo number_format($fees['admission'],0,".",",")." /="; ?></td>
									</tr>
									<tr>
										<td>Development Fee</td> <td><?php echo number_format($fees['developement'],0,".",",")." /="; ?></td>
									</tr>
									<tr>
										<td>Soya/Milk Porridge</td> <td><?php echo number_format($fees['soya_milk'],0,".",",")." /="; ?></td>
									</tr>
									<tr>
										<td>Morning-Afternoon</td> <td><?php echo number_format($fees['morning_afternoon'],0,".",",")." /="; ?></td>
									</tr>
									<tr>
										<td>Morning-Evening</td> <td><?php echo number_format($fees['morning_evening'],0,".",",")." /="; ?></td>
									</tr>
								</table>
								<table>
									<tr>
										<th colspan="2" style="text-align: center;color: blue;">Cost of Uniforms
											<?php 
												$cost = $fees['shirt_short'] + $fees['dress'] + $fees['sweater'] + $fees['socks'] + $fees['sports_wear'];
												echo number_format($cost,0,".",",")." /=";
											?>
											
										</th>
										
									</tr>
									<tr>
										<td>Shirt + Short</td> <td><?php echo number_format($fees['shirt_short'],0,".",",")." /="; ?></td>
									</tr>
									<tr>
										<td>Dress</td> <td><?php echo number_format($fees['dress'],0,".",",")." /="; ?></td>
									</tr>
									<tr>
										<td>Sweater</td> <td><?php echo number_format($fees['sweater'],0,".",",")." /="; ?></td>
									</tr>
									<tr>
										<td>Socks (2 Pairs)</td> <td><?php echo number_format($fees['socks'],0,".",",")." /="; ?></td>
									</tr>
									<tr>
										<td>Sports Wear</td> <td><?php echo number_format($fees['sports_wear'],0,".",",")." /="; ?></td>
									</tr>
								</table>
								<table>
									<tr>
										<th colspan="2" style="text-align: center;color: blue;">Day Care Services</th>
									</tr>
									<tr>
										<td>Day Care per day</td> <td><?php echo number_format($fees['day_care_day'],0,".",",")." /="; ?></td>
									</tr>
									<tr>
										<td>Day Care per term</td> <td><?php echo number_format($fees['day_care_term'],0,".",",")." /="; ?></td>
									</tr>
									<tr>
										<th colspan="2" style="text-align: center;color: blue;">Semi Boarding</th>
									</tr>
									<tr>
										<td>Per Week Mon-Fri </td> <td><?php echo number_format($fees['semi_boarding'],0,".",",")." /="; ?></td>
									</tr>
								</table>
							<?php endforeach; ?>
						
						</p>
					<?php endif; ?>

					<p style="color:white;text-align:center;">
						
						
						<a href="editfees.php?fees=<?php echo $fees['id']; ?>">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">
								Change
							</button>
						</a>
					</p>		
					
		
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