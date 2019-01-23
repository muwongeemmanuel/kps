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
			 <a class="active" href="managecalendar.php">Calendar</a>
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
			  <li><a href="staff_admin.html">Staff</a></li>
			  <li><a href="gallery.php">Gallery</a></li>
			  <li><a class="active" href="managecalendar.php">Calendar</a></li>
			  <li><a href="managenotification.php">Notification</a></li>
			  <li><a href="aboutus.php">About Us</a></li>
			  <li><a href="logout.php">Log Out</a></li>
			</ul>
			
		</div>
<?php
	
	if (!isset($_GET['calendar'])) {
		# code...
		//
			//$_SESSION['changingstaff'] = "Sorry, No details of staff have been deleted.";
			
			header('Location: managecalendar.php');
			die();
		//include "C:/xampp/htdocs/sb/sb-php/admin.php";
	}

	$date = $_GET['calendar']; 
	$select_calendar = "SELECT * FROM calender WHERE day = '".$date."'";
	//$insert_staff = "INSERT INTO `staff` VALUES('$staffID','$fullname','$description','$catergory','$title','$image')";
	$calendar = mysqli_query($connection, $select_calendar) or die(mysqli_error($connection));
	$count = mysqli_num_rows($calendar);

?>
	
	<div class="all2">	
		
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>Edit Calendar</b></p>
			</h2>
					<div style="color:white;text-align:;padding-left: 20px;">
							<a href="managecalendar.php">
									<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Go Back</button>
							</a>
					</div>
					<div style="color:white;text-align:;padding-left:40px;">
						<form name="editingcalendar" method="post" action="editingcalendar.php" enctype="multipart/form-data"
								 style="background-color:;text-align:;padding-bottom:0px;">
							<?php foreach ($calendar as $calendar): ?>
								<p><label style="color:white;">Date Of Event : <br>
									<input type="Date" name="date" id="date" placeholder="Year-Month-Day e.g <?php echo date("Y-m-d"); ?>" value="<?php echo e($calendar['day']); ?>" min="" max=""/>
								</label></p>
								
								<p><label style="color:white;">Description : <br>
								<textarea name="description" placeholder="We are going to hold a swimming session...." rows="10">
									<?php echo e($calendar['description']); ?>
								</textarea>
								</label></p>
								<!-- hidden input-->
								<input type="hidden" name="originaldate" value="<?php echo e($calendar['day']); ?>" />
								
								<p style="text-align: center;">
									<input class="submit" type="submit" name="submit" value="Edit">
								</p>
							<?php endforeach; ?>
						</form>
									
					</div>

					<div style="color:white;text-align:right;padding:20px;">
							
						<a href="managecalendar.php">
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