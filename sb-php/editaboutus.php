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
			  <li><a href="admin.php">Staff</a></li>
			  <li><a href="gallery.php">Gallery</a></li>
			  <li><a href="managecalendar.php">Calendar</a></li>
			  <li><a href="managenotification.php">Notification</a></li>
			  <li><a class="active" href="aboutus.php">About Us</a></li>
			  <li><a href="logout.php">Log Out</a></li>
			</ul>
			
		</div>

	<?php
	
	if (!isset($_GET['aboutus'])) {
		# code...
		//
			//$_SESSION['changingstaff'] = "Sorry, No details of staff have been deleted.";
			
			header('Location: aboutus.php');
			die();
		//include "C:/xampp/htdocs/sb/sb-php/admin.php";
	}

	$id = $_GET['aboutus']; 
	$select_aboutus = "SELECT * FROM us WHERE id = ".$id;
	$aboutus = mysqli_query($connection, $select_aboutus) or die(mysqli_error($connection));
	$count = mysqli_num_rows($aboutus);

?>
		
	<div class="all2">	
		
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>Edit About Us</b></p>
			</h2>
					
					<div style="color:white;text-align:;padding-left: 20px;">
							
						<a href="aboutus.php">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">
								Go Back
							</button>
						</a>
					</div>

					<div style="color:white;text-align:;padding-left:40px;">
						<form name="editingaboutus" method="post" action="editingaboutus.php" enctype="multipart/form-data"
								 style="background-color:;text-align:;padding-bottom:0px;">
							<?php foreach ($aboutus as $aboutus): ?>

								<p><label style="color:white;">Catergory : <br>
									<select name="catergory">
									  <option value="not selected">***please select the catergory***</option>
									  <option value="About Us" <?php if ($aboutus['catergory'] == 'About Us') echo 'selected="selected"'; ?>>About Us</option>
									  <option value="Admission" <?php if ($aboutus['catergory'] == 'Admission') echo 'selected="selected"'; ?>>Admission</option>
									  <option value="Day Care" <?php if ($aboutus['catergory'] == 'Day Care') echo 'selected="selected"'; ?>>Day Care</option>
									  <option value="Mission Statement" <?php if ($aboutus['catergory'] == 'Mission Statement') echo 'selected="selected"'; ?>>Mission Statement</option>
									  <option value="Nursery" <?php if ($aboutus['catergory'] == 'Nursery') echo 'selected="selected"'; ?>>Nursery</option>
									  <option value="Primary" <?php if ($aboutus['catergory'] == 'Primary') echo 'selected="selected"'; ?>>Primary</option>
									  <option value="Welcome" <?php if ($aboutus['catergory'] == 'Welcome') echo 'selected="selected"'; ?>>Welcome</option>
									</select>
								</label></p>

								<p><label style="color:white;">Title : <br>
									<input type="text" name="title" placeholder="Eligibility" id="title" value="<?php echo e($aboutus['title']); ?>"/>
								</label></p>

								<p><label style="color:white;">Description : <br>
								<textarea name="description" placeholder="Write whats going on Your here..." rows="10">
									<?php echo e($aboutus['description']); ?>
								</textarea>
								</label></p>

								<p><label style="color:white;">Associated File : <br>
									<input type="file" id="files" name="file" />
								</label></p>
								<!-- hidden input-->
								<input type="hidden" name="id" value="<?php echo e($aboutus['id']); ?>" />
								<input type="hidden" name="originalfilepath" value="<?php echo e($aboutus['filepath']); ?>" />
								
								<p style="text-align: center;">
									<input class="submit" type="submit" name="submit" value="Edit">
								</p>
							<?php endforeach; ?>

						</form>
									
					</div>

					<div style="color:white;text-align:right;padding:20px;">
						<a href="aboutus.php">
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