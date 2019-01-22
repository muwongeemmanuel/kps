<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');

?>

<?php
	$select_calendar = "SELECT * FROM calender";
						 
	$calendar = mysqli_query($connection, $select_calendar) or die(mysqli_error($connection));
	$count = mysqli_num_rows($calendar);
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
			 <a class="active"  href="sbhome.php">Home</a>
			 <a href="nursery.php">Nursery School</a>
			 <a href="primary.php">Primary School</a>
			 <a href="admission.php">Admission</a>
			 <a href="staff.php">Our Staff</a>
			 <a href="about.php">About Us</a>
			 <a href="scontact.php">Contact</a>
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
			  <li><a class="active"  href="sbhome.php">Home</a></li>
			  <li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Program</a>
				<div class="dropdown-content">
				  <a href="nursery.php">Nursery School</a>
				  <a href="primary.php">Primary School</a>
				</div>
			  </li>
			  <li><a href="admission.php">Admission</a></li>
			  <li><a href="staff.php">Our Staff</a></li>
			  <li><a href="about.html">About Us</a></li>
			  <li><a href="scontact.php">Contact</a></li>
			  <li><a href="login.php">Login</a></li>
			</ul>
			
		</div>
		
	<div class="all2">	
		<div class="corner" style="background-color: brown;">
			<h2 class="h" style="background-color: blue;">	
					<p style="color:white;text-align:center;"><b>Calendar</b></p>
			</h2>

				<p style="color:white;text-align:center;padding:0px;">
<?php
$monthNames = Array("January", "February", "March", "April", "May", "June", "July", 
"August", "September", "October", "November", "December");
?>

<?php
if (!isset($_REQUEST["month"])) {

	$_REQUEST["month"] = date("n");
} 
if (!isset($_REQUEST["year"])) {

	$_REQUEST["year"] = date("Y");
} 
?>

<?php
$cMonth = $_REQUEST["month"];
$cYear = $_REQUEST["year"];
 
$prev_year = $cYear;
$next_year = $cYear;
$prev_month = $cMonth-1;
$next_month = $cMonth+1;
 
if ($prev_month == 0 ) {
    $prev_month = 12;
    $prev_year = $cYear - 1;
}
if ($next_month == 13 ) {
    $next_month = 1;
    $next_year = $cYear + 1;
}
if ($prev_year < date("Y") ) {
    
    $prev_year = date("Y");
    $prev_month = date("n");

}
?>

<table width="200">
	<tr align="center">
		<td bgcolor="#999999" style="color:blue">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="50%" align="left" style="text-align: ;">
						
						<a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>">
							<button class = "submit" style = "background-color:blue;color:white;border-radius:5px;">
								Previous
							</button>
						</a>
					</td>
					<td width="50%" align="right" style="text-align: right;">
						
						<a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>">
							<button class = "submit" style = "background-color:blue;color:white;border-radius:5px;">
								Next
							</button>
						</a>
					</td>
				</tr>	
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<table width="100%" border="0" cellpadding="2" cellspacing="2">
				<tr align="center">
					<td colspan="7" bgcolor="#999999" style="color:#FFFFFF;text-align: center;">
						<strong><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></strong>
					</td>
				</tr>
				<tr>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF;text-align: center;"><strong>Sun</strong></td>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF;text-align: center;"><strong>Mon</strong></td>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF;text-align: center;"><strong>Tue</strong></td>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF;text-align: center;"><strong>Wed</strong></td>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF;text-align: center;"><strong>Thu</strong></td>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF;text-align: center;"><strong>Fri</strong></td>
					<td align="center" bgcolor="#999999" style="color:#FFFFFF;text-align: center;"><strong>Sat</strong></td>
				</tr>

				<?php 

					$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
					$maxday = date("t",$timestamp);
					$thismonth = getdate ($timestamp);
					$startday = $thismonth['wday'];

					$today = date("d-n-Y");
					$day = date('d',strtotime($today));
					$month = date('n',strtotime($today));
					$year = date('Y',strtotime($today));

				?>
				<?php for ($i=0; $i<($maxday+$startday); $i++): ?>
				
				    <?php if (($i % 7) == 0 ): ?>

				    	<tr>

				    <?php endif; ?>

				    <?php if ($i < $startday): ?>

				    		<td></td>

				    <?php else: ?>

				    	

				    	<?php if ( $day==($i-1) and $month==$cMonth and $year==$cYear ): ?>

				    		<td align='center' valign='middle' height='20px' style="background-color:gray ; margin:20px;font-size:20px;text-align: center;">
				    			
				    				<?php echo $i - $startday + 1; ?> 
				    			
							</td>

				    	<?php elseif (!($count==0)): ?>

				    		<?php $iexecution = 0; ?>

							<?php foreach ($calendar as $dates): ?>
								<?php 

									$idate = $dates['day'];
									$iday = date('j',strtotime($idate));
									$imonth = date('n',strtotime($idate));
									$iyear = date('Y',strtotime($idate)); 

								?>
								<?php if ( $iday==($i+1) and $imonth==$cMonth and $iyear==$cYear ): ?>

							    	<td align='center' valign='middle' height='20px' style="background-color:green; margin:20px;font-size:20px;text-align: center;">
						    			<a href="viewcalendar.php?date=<?php echo $iyear . "-" . $imonth . "-" . $iday;?>" style="">
						    				<?php echo $i - $startday + 1; ?> 
						    			</a>
									</td>

									<?php $iexecution = $iexecution + 1; ?>

							    <?php endif; ?>
								
							<?php endforeach; ?>

							<?php if ($iexecution==0): ?>

								<td align='center' valign='middle' height='20px' style="background-color: ; margin:20px;font-size:20px;text-align: center;">
		    						<?php echo $i - $startday + 1; ?>
								</td>

							<?php endif; ?>


				    	<?php else: ?>

							<td align='center' valign='middle' height='20px' style="background-color: ; margin:20px;font-size:20px;text-align: center;">
		    					<?php echo $i - $startday + 1; ?>
							</td>

				    	<?php endif; ?>

				    <?php endif; ?>

				    <?php if (($i % 7) == 6 ): ?>

				    	</tr>

				    <?php endif; ?>
				<?php endfor; ?>
				
			</table>
		</td>
	</tr>
</table>
				</p>

				<p style="color:white;text-align:center;padding:0px;">
					
					<?php
						//$select_calendar = "SELECT * FROM calender WHERE day = '".$date."'";
						$select_calendar = "SELECT * FROM calender WHERE YEAR(`day`) = '".$_REQUEST["year"]."' AND MONTH(`day`) = '".$_REQUEST["month"]."'";
											 
						$calendar = mysqli_query($connection, $select_calendar) or die(mysqli_error($connection));
						$count = mysqli_num_rows($calendar);
					?>

					<?php foreach ($calendar as $calendar): ?>

						<p style="color:white;text-align:;padding-left:20px;margin:40px;">

							<p style="color:white;padding-left:20px;">Date: <?php echo e($calendar['day']); ?></p>
							<p style="color:white;padding-left:20px;">Description: <?php echo e($calendar['description']); ?></p>
						</p>
						
						<hr>

					<?php endforeach; ?>

				</p>
				<p style="color:white;text-align:center;">

					<a href="calendar1.php">
						<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Mode 1</button>
					</a>
					<a href="sbhome.php">
						<button class = "submit" style = "background-color:green;color:white;border-radius:5px;">Go Back</button>
					</a>
				</p>
				
		
		</div>
		
		<div class="corner" style="background-color: brown;margin-top:30px; ">
			<h2 style="background-color: green;">	
					<p class="cc" style="color:white;text-align:;"><b>Creative Corner</b></p>
			</h2>
					<p style="color:white;text-align:center;padding:20px;">
						<marquee behavior="scroll" direction="left" scrolldelay="800" scrollamount="100">
							<img src="http://localhost/sb/sb-images/images-7.jpeg" width="150" height="108" alt="Cup of tea anyone?">
							<img src="http://localhost/sb/sb-images/images.jpeg" width="150" height="108" alt="Cup of tea anyone?">
							<img src="http://localhost/sb/sb-images/images.png" width="150" height="108" alt="Cup of tea anyone?">
						</marquee>
					</p>
		
		</div>

	</div>	

<?php require($_SERVER['DOCUMENT_ROOT'] . "/kps/sb-php/footer.php"); ?>