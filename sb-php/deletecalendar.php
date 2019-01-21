<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');

?>

<?php
			//3.1.2 Checking the values are existing in the database or not
		if (empty($_GET['calendar'])) {
			# code...
			$calendar = false;
		} else{
			$date = $_GET['calendar'];

			$delete_calendar = "DELETE FROM calender WHERE day = '".$date."'";
								 
			$calendar = mysqli_query($connection, $delete_calendar) or die(mysqli_error($connection));

		}
?>	
		

<?php
	
	if (!$calendar){

		//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingcalendar'] = "Sorry, No details of calendar have been deleted.";
			//echo "Invalid Login Credentials.";
			header('Location: managecalendar.php');
		//include "C:/xampp/htdocs/sb/sb-php/admin.php";
				 
	}
	else{
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingcalendar'] = "Details deleted sucessfully.";
			//echo "Invalid Login Credentials.";
			header('Location: managecalendar.php');
	}
?>