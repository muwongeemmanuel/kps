<?php  //Start the Session
	
	session_start();
 	require('connect.php');
	
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
			 <a href="creative.html">Creative Corner</a>
			 <a href="managecalendar.php">Calender</a>
			 <a href="managenotification.php">Notification</a>
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
			  <li><a href="creative.html">Creative Corner</a></li>
			  <li><a href="managecalendar.php">Calendar</a></li>
			  <li><a href="managenotification.php">Notification</a></li>
			  <li><a href="logout.php">Log Out</a></li>
			</ul>
			
		</div>
		
	<div class="all2">	
		
		
		<div class="corner" style="background-color: blue;">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:center;"><b>Add Staff</b></p>
			</h2>
					<div style="color:white;text-align:;padding-left: 20px;">
							
						<a href="admin.php">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">
								Go Back
							</button>
						</a>
					</div>
					<div style="color:white;text-align:;padding-left:40px;">
						<form name="addingstaff" method="post" action="addingstaff.php" enctype="multipart/form-data"
								 style="background-color:;text-align:;padding-bottom:0px;">
							
							<p><label style="color:white;">Staff ID : <br>
								<input type="text" name="staffID" placeholder="sb001" id="StaffID"/>
							</label></p>
							<p><label style="color:white;">Fullname : <br>
								<input type="text" name="fullname" placeholder="Firstname Lastname" id="fullname"/>
							</label></p>
							<p><label style="color:white;">Description : <br>
							<textarea name="description" placeholder="S/he's a good caring teacher ..." rows="10"></textarea>
							</label></p>
							<p><label style="color:white;">Catergory : <br>
								<select name="catergory">
								  <option value="not selected">***please select the catergory***</option>
								  <option value="Directors">Directors</option>
								  <option value="Administrators">Administrators</option>
								  <option value="Teaching Staff">Teaching Staff</option>
								  <option value="Non-Teaching Staff">Non-Teaching Staff</option>
								</select>
							</label></p>
							<p><label style="color:white;">Title/Position : <br>
									<input type="text" name="title" placeholder="e.g headteacher" id="title"/>
							</label></p>
							<p style="text-align: center;"><label style="color:white;">Image : <br>
								<input type="file" id="files" name="image" /><br>
								<img id="image" style="width: 200px; height: 200px; background-color: white;text-align: center;" />
							</label></p>
							<p style="text-align: center;">
								<input class="submit" type="submit" name="submit" value="Save">
							</p>

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
						<a href="admin.php">
							<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">
								Go Back
							</button>
						</a>
					</div>
		
		</div>

	</div>	

<?php require($_SERVER['DOCUMENT_ROOT'] . "/kps/sb-php/header_admin.php"); ?>

<?php 
	
	}

	else{
			//f the user session has expired
			$_SESSION['login_fail'] = "Your Session has expired, please login again.";
			//echo "Your Session has expired, please login again.";
			header('Location: login.php');
	}

?>