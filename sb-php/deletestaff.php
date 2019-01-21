<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');

?>

<?php
			//3.1.2 Checking the values are existing in the database or not
		if (empty($_GET['staff'])) {
			# code...
			$staff = false;
		} else{
			$id = $_GET['staff'];

			$delete_staff = "DELETE FROM staff WHERE id = ".$id;
								 
			$staff = mysqli_query($connection, $delete_staff) or die(mysqli_error($connection));

		}
?>	
		

<?php
	
	if (!$staff){

		//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingstaff'] = "Sorry, No details of staff have been deleted.";
			//echo "Invalid Login Credentials.";
			header('Location: admin.php');
		//include "C:/xampp/htdocs/sb/sb-php/admin.php";
				 
	}
	else{
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingstaff'] = "Details deleted sucessfully.";
			//echo "Invalid Login Credentials.";
			header('Location: admin.php');
	}
?>