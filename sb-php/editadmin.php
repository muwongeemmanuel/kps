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
			 <a class="active" href="staff_admin.html">Staff</a>
			 <a href="gallery.php">Gallery</a>
			 <a href="managecalendar.php">Calendar</a>
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
			  <li><a class="active" href="staff_admin.html">Staff</a></li>
			  <li><a href="gallery.php">Gallery</a></li>
			  <li><a href="managecalendar.php">Calendar</a></li>
			  <li><a href="managenotification.php">Notification</a></li>
			  <li><a href="aboutus.php">About Us</a></li>
			  <li><a href="logout.php">Log Out</a></li>
			</ul>
			
		</div>
<?php
	
	if (!isset($_GET['admin'])) {
		# code...
		//
			//$_SESSION['changingstaff'] = "Sorry, No details of staff have been deleted.";
			
			header('Location: settings.php');
			die();
		//include "C:/xampp/htdocs/sb/sb-php/admin.php";
	}

	$username = $_GET['admin']; 
	$select_admin = "SELECT * FROM login WHERE username = '$username'";
	//$insert_staff = "INSERT INTO `staff` VALUES('$staffID','$fullname','$description','$catergory','$title','$image')";
	$admin = mysqli_query($connection, $select_admin) or die(mysqli_error($connection));
	$count = mysqli_num_rows($admin);

?>
	
	<div class="all2">	
		
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>Edit Your Settings</b></p>
			</h2>
					<div style="color:white;text-align:;padding-left: 20px;">
							<a href="settings.php">
									<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Go Back</button>
							</a>
					</div>
					<div style="color:white;text-align:;padding-left:40px;">
						<form name="editingadmin" method="post" action="editingadmin.php" enctype="multipart/form-data"
								 style="background-color:;text-align:;padding-bottom:0px;">
							<?php foreach ($admin as $admin): ?>
								<p><label style="color:white;">Username : <br>
									<input type="text" name="username" placeholder="Your name" id="username" value="<?php echo e($admin['username']); ?>"/>
								</label></p>
								<p><label style="color:white;">Email : <br>
									<input type="text" name="email" placeholder="name@gmail.com" id="fullname" value="<?php echo e($admin['email']); ?>"/>
								</label></p>
								<p><label style="color:white;">Telephone : <br>
										<input type="text" name="telephone" placeholder="+256756769220" id="telephone" value="<?php echo e($admin['telephone']); ?>"/>
								</label></p>
								<!-- hidden input-->
								<input type="hidden" name="originalusername" value="<?php echo e($admin['username']); ?>" />
								
								<p style="text-align: center;">
									<input class="submit" type="submit" name="submit" value="Change">
								</p>
							<?php endforeach; ?>
						</form>
									
					</div>

					<div style="color:white;text-align:right;padding:20px;">
							
						<a href="settings.php">
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