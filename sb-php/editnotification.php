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
			 <a href="creative.html">Creative Corner</a>
			 <a href="managecalendar.php">Calendar</a>
			 <a class="active" href="managenotification.php">Notification</a>
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
			  <li><a href="creative.html">Creative Corner</a></li>
			  <li><a href="managecalendar.php">Calendar</a></li>
			  <li><a class="active" href="managenotification.php">Notification</a></li>
			  <li><a href="logout.php">Log Out</a></li>
			</ul>
			
		</div>

	<?php
	
	if (!isset($_GET['notification'])) {
		# code...
		//
			//$_SESSION['changingstaff'] = "Sorry, No details of staff have been deleted.";
			
			header('Location: managenotification.php');
			die();
		//include "C:/xampp/htdocs/sb/sb-php/admin.php";
	}

	$date = $_GET['notification']; 
	$select_notification = "SELECT * FROM notification WHERE day = '".$date."'";
	//$insert_staff = "INSERT INTO `staff` VALUES('$staffID','$fullname','$description','$catergory','$title','$image')";
	$notification = mysqli_query($connection, $select_notification) or die(mysqli_error($connection));
	$count = mysqli_num_rows($notification);

?>
		
	<div class="all2">	
		
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>Edit Notification</b></p>
			</h2>
					
					<div style="color:white;text-align:;padding-left: 20px;">
							
						<a href="managenotification.php">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">
								Go Back
							</button>
						</a>
					</div>

					<div style="color:white;text-align:;padding-left:40px;">
						<form name="addingnotification" method="post" action="addingnotification.php" enctype="multipart/form-data"
								 style="background-color:;text-align:;padding-bottom:0px;">
							<?php foreach ($notification as $notification): ?>

								<p><label style="color:white;">Description : <br>
								<textarea name="description" placeholder="School will be closed on monday as pupils will be on a trip...." rows="10"><?php echo e($notification['description']); ?></textarea>
								</label></p>

								<p><label style="color:white;">Catergory : <br>
									<select name="catergory">
									  <option value="not selected">***please select the catergory***</option>
									  <option value="Urgent" <?php if ($notification['type'] == 'Urgent') echo 'selected="selected"'; ?> >Urgent</option>
									  <option value="Normal" <?php if ($notification['type'] == 'Normal') echo 'selected="selected"'; ?> >Normal</option>
									</select>
								</label></p>

								<p><label style="color:white;">End Date : <br>
									<input type="Date" name="date" id="date" placeholder="Year-Month-Day e.g <?php echo date("Y-m-d"); ?>" value="<?php echo e($notification['day']); ?>" min="" max=""/>
								</label></p>

								<p><label style="color:white;">Associated File : <br>
									<input type="file" id="files" name="file" value="<?php echo e($notification['filename']); ?>" />
								</label></p>
								<!-- hidden input-->
								<input type="hidden" name="originaldate" value="<?php echo e($notification['day']); ?>" />
								
								<p style="text-align: center;">
									<input class="submit" type="submit" name="submit" value="Edit">
								</p>
							<?php endforeach; ?>

						</form>
									
					</div>

					<div style="color:white;text-align:right;padding:20px;">
						<a href="managenotification.php">
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