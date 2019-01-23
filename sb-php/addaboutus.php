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
		
	<div class="all2">	
		
		
		<div class="corner" style="background-color: brown;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>Add About Us</b></p>
			</h2>
					
					<div style="color:white;text-align:;padding-left: 20px;">
							
						<a href="aboutus.php">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">
								Go Back
							</button>
						</a>
					</div>

					<div style="color:white;text-align:;padding-left:40px;">
						<form name="addingaboutus" method="post" action="addingaboutus.php" enctype="multipart/form-data"
								 style="background-color:;text-align:;padding-bottom:0px;">

							<p><label style="color:white;">Catergory : <br>
								<select name="catergory">
								  <option value="not selected">***please select the catergory***</option>
								  <option value="About Us">About Us</option>
								  <option value="Admission">Admission</option>
								  <option value="Day Care">Day Care</option>
								  <option value="Mission Statement">Mission Statement</option>
								  <option value="Nursery">Nursery</option>
								  <option value="Primary">Primary</option>
								  <option value="Welcome">Welcome</option>
								</select>
							</label></p>

							<p><label style="color:white;">Title : <br>
								<input type="text" name="title" placeholder="Eligibility" id="title"/>
							</label></p>

							<p><label style="color:white;">Description : <br>
							<textarea name="description" placeholder="Write whats going on Your here..." rows="10"></textarea>
							</label></p>

							<p><label style="color:white;">Associated File : <br>
								<input type="file" id="files" name="file" />
							</label></p>
							
							<p style="text-align: center;">
								<input class="submit" type="submit" name="submit" value="Add">
							</p>

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