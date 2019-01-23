<?php  //Start the Session
	session_start();
 	require('connect.php');
	//3. If the form is submitted or not.
	//3.1 If the form is submitted
	if ( isset($_POST['admission']) 		&& !empty($_POST['admission']) and
		 isset($_POST['developement']) 		&& !empty($_POST['developement']) and
		 isset($_POST['soya_milk']) 		&& !empty($_POST['soya_milk']) and
		 isset($_POST['morning_afternoon']) 		&& !empty($_POST['morning_afternoon']) and
		 isset($_POST['morning_evening']) 		&& !empty($_POST['morning_evening']) and
		 isset($_POST['shirt_short']) 		&& !empty($_POST['shirt_short']) and
		 isset($_POST['dress']) 		&& !empty($_POST['dress']) and
		 isset($_POST['sweater']) 		&& !empty($_POST['sweater']) and
		 isset($_POST['socks']) 		&& !empty($_POST['socks']) and
		 isset($_POST['sports_wear']) 		&& !empty($_POST['sports_wear']) and
		 isset($_POST['day_care_day']) 		&& !empty($_POST['day_care_day']) and
		 isset($_POST['day_care_term']) 		&& !empty($_POST['day_care_term']) and
		 isset($_POST['semi_boarding']) 		&& !empty($_POST['semi_boarding']) ){

		//3.1.1 Assigning posted values to variables.
		$admission 		= $_POST['admission'];
		$developement 		= $_POST['developement'];
		$soya_milk 		= $_POST['soya_milk'];
		$morning_afternoon 		= $_POST['morning_afternoon'];
		$morning_evening 		= $_POST['morning_evening'];
		$shirt_short 		= $_POST['shirt_short'];
		$dress 		= $_POST['dress'];
		$sweater 		= $_POST['sweater'];
		$socks 		= $_POST['socks'];
		$sports_wear 		= $_POST['sports_wear'];
		$day_care_day 		= $_POST['day_care_day'];
		$day_care_term 		= $_POST['day_care_term'];
		$semi_boarding 		= $_POST['semi_boarding'];
		$id	= $_POST['id'];

		$update_fees = "UPDATE fees SET admission='$admission',developement='$developement',soya_milk='$soya_milk',morning_afternoon='$morning_afternoon',morning_evening='$morning_evening',shirt_short='$shirt_short',dress='$dress',sweater='$sweater',socks='$socks',sports_wear='$sports_wear',day_care_day='$day_care_day',day_care_term='$day_care_term',semi_boarding='$semi_boarding' WHERE id = ".$id;
		$result = mysqli_query($connection, $update_fees) or die(mysqli_error($connection));

 
		if ($result == true){

			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingfees'] = "Details Successfully Edited";
			//echo "Invalid Login Credentials.";
			header('Location: viewfees.php');
			//include "C:/xampp/htdocs/sb/sb-php/admin.php";
			 
		}
		else{
				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
				$_SESSION['changingfees'] = "Sorry, Details not Successfully Edited. Please try again using appriopriate inputs where necessary.";
				//echo "Invalid Login Credentials.";
				header('Location: viewfees.php');
		}
		
	}
	else{
				// If any of the inputs is empty
				$_SESSION['changingfees'] = "Sorry, Details not Successfully Edited. Please do not leave any input empty.";
				//echo "Invalid Login Credentials.";
				header('Location: viewfees.php');
		}
		
?>