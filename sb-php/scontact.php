<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');
	
?>


<?php require($_SERVER['DOCUMENT_ROOT'] . "/kps/sb-php/header.php"); ?>
		
		<div class="dropdown">

			<button onclick="myFunction(this)" class="dropbtn">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</button>
			  
		</div>

		<div id="myDropdown" class="dropdown-content">
			 <a href="sbhome.php">Home</a>
			 <a href="nursery.php">Nursery School</a>
			 <a href="primary.php">Primary School</a>
			 <a href="admission.php">Admission</a>
			 <a href="staff.php">Our Staff</a>
			 <a href="about.php">About Us</a>
			 <a class="active" href="scontact.php">Contact</a>
			 <a href="login.php">Login</a>
		</div>


			<script>
			/* When the user clicks on the button, 
			toggle between hiding and showing the dropdown content */
			function myFunction(x) {
				document.getElementById("myDropdown").classList.toggle("show");
				x.classList.toggle("change");
			}

			// Close the dropdown if the user clicks outside of it
			/*window.onclick = function(event) {
			  if (!event.target.matches('.dropbtn')) {

				var dropdowns = document.getElementsByClassName("dropdown-content");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
				  var openDropdown = dropdowns[i];
				  if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
				  }
				}
			  }
			}*/
			</script>
		
		<div id="wrap">
			<ul>
			  <li><a href="sbhome.php">Home</a></li>
			  <li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Program</a>
				<div class="dropdown-content">
				  <a href="nursery.php">Nursery School</a>
				  <a href="primary.php">Primary School</a>
				</div>
			  </li>
			  <li><a href="admission.php">Admission</a></li>
			  <li><a href="staff.php">Our Staff</a> </li>
			  <li><a href="about.html">About Us</a></li>
			  <li><a class="active" href="scontact.php">Contact</a></li>
			  <li><a href="login.php">Login</a></li>
			</ul>
			
		</div>
		
	<div class="all2">	
		<div class="corner" style="background-color: brown;">
			<h2 class="h" style="background-color: blue;">	
					<p style="color:white;text-align:center;"><b>Talk To Us</b></p>
			</h2>
				<div style="background-color: ;text-align:center;">
					<form method="post" action="contacting.php" style="background-color:;text-align:;padding-bottom:50px;">

						<p><label style="color:white;">Name : <br>
							<input type="text" name="name" placeholder="Your Name" id="yourname"/>
						</label></p>
						<p><label style="color:white;">Email : <br>
							<input type="text" name="email" placeholder="emma@gmail.com" id="email"/>
						</label></p>
						<p><label style="color:white;">Telephone Contact : <br>
							<input type="text" name="contact" placeholder="+256-773586691" id="contact"/>
						</label></p>
						<p><label style="color:white;">Comment : <br>
							<textarea name="comment" placeholder="Comments here..." rows="10"></textarea>
						</label></p>
						<p>
							<input class="submit" type="submit" name="submit" value="Send">
						</p>
					
					</form>
			</div>
		
		</div>

	</div>

<?php require($_SERVER['DOCUMENT_ROOT'] . "/kps/sb-php/footer.php"); ?>