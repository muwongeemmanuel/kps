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
			 <a class="active" href="gallery.php">Gallery</a>
			 <a href="managecalendar.php">Calender</a>
			 <a href="notification.html">Notification</a>
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
			  <li><a class="active" href="gallery.php">Gallery</a></li>
			  <li><a href="managecalendar.php">Calender</a></li>
			  <li><a href="notification.html">Notification</a></li>
			  <li><a href="aboutus.php">About Us</a></li>
			  <li><a href="logout.php">Log Out</a></li>
			</ul>
			
		</div>
<?php
	
	if (!isset($_GET['gallery'])) {
		# code...
		//
			//$_SESSION['changingstaff'] = "Sorry, No details of staff have been deleted.";
			
			header('Location: gallery.php');
			die();
		//include "C:/xampp/htdocs/sb/sb-php/admin.php";
	}

	$id = $_GET['gallery']; 
	$select_gallery = "SELECT * FROM gallery WHERE id = ".$id;
	//$insert_staff = "INSERT INTO `staff` VALUES('$staffID','$fullname','$description','$catergory','$title','$image')";
	$gallery = mysqli_query($connection, $select_gallery) or die(mysqli_error($connection));
	$count = mysqli_num_rows($gallery);

?>
	
	<div class="all2">	
		
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>Edit Gallery</b></p>
			</h2>
					<div style="color:white;text-align:;padding-left: 20px;">
							<a href="gallery.php">
									<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Go Back</button>
							</a>
					</div>
					<div style="color:white;text-align:;padding-left:40px;">
						<form name="editinggallery" method="post" action="editinggallery.php" enctype="multipart/form-data"
								 style="background-color:;text-align:;padding-bottom:0px;">
						
							<?php foreach ($gallery as $gallery): ?>

								
								
								<p><label style="color:white;">Catergory : <br>
									<select name="catergory">
									  <option value="not selected">***please select the catergory***</option>
									  <option value="Budge" <?php if ($gallery['catergory'] == 'Budge') echo 'selected="selected"'; ?> >
									  	Budge
									  </option>
									  <option value="Creative"  <?php if ($gallery['catergory'] == 'Creative') echo ' selected="selected"'; ?> >
									  	Creative</option>
									  <option value="Design"  <?php if ($gallery['catergory'] == 'Design') echo ' selected="selected"'; ?> >
									  	Design</option>
									  <option value="Rotate"  <?php if ($gallery['catergory'] == 'Rotate') echo ' selected="selected"'; ?> >
									  	Rotate</option>
									</select>
								</label></p>
								<p style="text-align: center;"><label style="color:white;">Image : <br>
									<input type="file" id="files" name="image" /><br>
									<img id="image" style="width: 200px; height: 200px; background-color: white;border-radius: 10px;" src= "<?php echo e($gallery['image']); ?>" />
								</label></p>

								<!-- hidden input-->
								<input type="hidden" name="id" value="<?php echo e($gallery['id']); ?>" />
								<p style="text-align: center;">
									<input class="submit" type="submit" name="submit" value="Edit">
								</p>
							
							<?php endforeach; ?>
						
						</form>
									<!-- javascript that automatically displays the chosen image -->								
									<script type="text/javascript">
										document.getElementById("files").onchange = function () {
									    var reader = new FileReader();

									    reader.onload = function (e) {
									        // get loaded data and render thumbnail.
									        document.getElementById("image").src = e.target.result;
									    };

									    // read the image file as a data URL.
									    reader.readAsDataURL(this.files[0]);
									};
									</script>
					</div>

					<div style="color:white;text-align:right;padding:20px;">
							
						<a href="gallery.php">
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