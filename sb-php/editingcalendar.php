<?php  //Start the Session
	session_start();
 	require('connect.php');
	//3. If the form is submitted or not.
	//3.1 If the form is submitted
	if ( isset($_POST['date']) and isset($_POST['description']) ){

		//3.1.1 Assigning posted values to variables.
		$date 		= $_POST['date'];
		$description	= $_POST['description'];
		$originaldate	= $_POST['originaldate'];

		$update_calendar = "UPDATE calender SET day='$date',description='$description' WHERE day = '".$originaldate."'";
		$result = mysqli_query($connection, $update_calendar) or die(mysqli_error($connection));

 
		if ($result == true){

			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingcalendar'] = "Details Successfully Edited";
			//echo "Invalid Login Credentials.";
			header('Location: managecalendar.php');
			//include "C:/xampp/htdocs/sb/sb-php/admin.php";
			 
		}
		else{
				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
				$_SESSION['changingcalendar'] = "Sorry, Details not Successfully Edited. Please try again using appriopriate words where necessary.";
				//echo "Invalid Login Credentials.";
				header('Location: managecalendar.php');
		}
		
	}
	else{
				// If any of the inputs is empty
				$_SESSION['changingcalendar'] = "Sorry, Details not Successfully Edited. Please do not leave any input empty.";
				//echo "Invalid Login Credentials.";
				header('Location: managecalendar.php');
		}
		
?>