<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');

?> 

<?php
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
			 <a href="staff_admin.html">Staff</a>
			 <a href="gallery.php">Gallery</a>
			 <a href="managecalendar.php">Calendar</a>
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
			  <li><a href="staff_admin.html">Staff</a></li>
			  <li><a href="gallery.php">Gallery</a></li>
			  <li><a href="managecalendar.php">Calendar</a></li>
			  <li><a href="managenotification.php">Notification</a></li>
			  <li><a class="active" href="aboutus.php">About Us</a></li>
			  <li><a href="logout.php">Log Out</a></li>
			</ul>
			
		</div>
<?php
	
	if (!isset($_GET['fees'])) {
		# code...
		//
			//$_SESSION['changingstaff'] = "Sorry, No details of staff have been deleted.";
			
			header('Location: aboutus.php');
			die();
		//include "C:/xampp/htdocs/sb/sb-php/admin.php";
	}

	$id = $_GET['fees']; 
	$select_fees = "SELECT * FROM fees WHERE id = ".$id;
	//$insert_staff = "INSERT INTO `staff` VALUES('$staffID','$fullname','$description','$catergory','$title','$image')";
	$fees = mysqli_query($connection, $select_fees) or die(mysqli_error($connection));
	$count = mysqli_num_rows($fees);

?>
	
	<div class="all2">	
		
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>Edit Fees Structure</b></p>
			</h2>
					<div style="color:white;text-align:;padding-left: 20px;">
							<a href="viewfees.php">
									<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Go Back</button>
							</a>
					</div>
					<div style="color:white;text-align:;padding-left:40px;">
						<form name="editingfees" method="post" action="editingfees.php" enctype="multipart/form-data"
								 style="background-color:;text-align:;padding-bottom:0px;">
							<?php foreach ($fees as $fees): ?>
								<p><label style="color:white;">Admission Fee : <br>
								<input type="text" placeholder="30000" name="admission" value="<?php echo e($fees['admission']); ?>"/>
								</label></p>
								<p><label style="color:white;">Development Fee : <br>
									<input type="text" placeholder="30000" name="developement" value="<?php echo e($fees['developement']); ?>"/>
								</label></p>
								<p><label style="color:white;">Soya/Milk Porridge : <br>
									<input type="text" placeholder="30000" name="soya_milk" value="<?php echo e($fees['soya_milk']); ?>"/>
								</label></p>
								<p><label style="color:white;">Morning-Afternoon : <br>
									<input type="text" placeholder="30000" name="morning_afternoon" value="<?php echo e($fees['morning_afternoon']); ?>"/>
								</label></p>
								<p><label style="color:white;">Morning-Evening : <br>
									<input type="text" placeholder="30000" name="morning_evening" value="<?php echo e($fees['morning_evening']); ?>"/>
								</label></p>
								<p><label style="color:white;">Shirt + Short : <br>
									<input type="text" placeholder="30000" name="shirt_short" value="<?php echo e($fees['shirt_short']); ?>"/>
								</label></p>
								<p><label style="color:white;">Dress : <br>
									<input type="text" placeholder="30000" name="dress" value="<?php echo e($fees['dress']); ?>"/>
								</label></p>
								<p><label style="color:white;">Sweater : <br>
									<input type="text" placeholder="30000" name="sweater" value="<?php echo e($fees['sweater']); ?>"/>
								</label></p>
								<p><label style="color:white;">Socks (2 Pairs) : <br>
									<input type="text" placeholder="30000" name="socks" value="<?php echo e($fees['socks']); ?>"/>
								</label></p>
								<p><label style="color:white;">Sports Wear : <br>
									<input type="text" placeholder="30000" name="sports_wear" value="<?php echo e($fees['admission']); ?>"/>
								</label></p>
								<p><label style="color:white;">Day Care per day : <br>
									<input type="text" placeholder="30000" name="day_care_day" value="<?php echo e($fees['day_care_day']); ?>"/>
								</label></p>
								<p><label style="color:white;">Day Care per term : <br>
									<input type="text" placeholder="30000" name="day_care_term" value="<?php echo e($fees['day_care_term']); ?>"/>
								</label></p>
								<p><label style="color:white;">Semi-Boarding : <br>
									<input type="text" placeholder="30000" name="semi_boarding" value="<?php echo e($fees['semi_boarding']); ?>"/>
								</label></p>
								<!-- hidden input-->
								<input type="hidden" name="id" value="<?php echo e($fees['id']); ?>" />
								
								<p style="text-align: center;">
									<input class="submit" type="submit" name="submit" value="Change">
								</p>
							<?php endforeach; ?>
						</form>
									
					</div>

					<div style="color:white;text-align:right;padding:20px;">
							
						<a href="viewfees.php">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">
								Go Back
							</button>
						</a>
					</div>
		
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