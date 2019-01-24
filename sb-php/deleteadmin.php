<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');

?>

<?php
			//3.1.2 Checking the values are existing in the database or not
		if (empty($_GET['admin'])) {
			# code...
			$admin = false;
		} else{
			$username = $_GET['admin'];

			$delete_admin = "DELETE FROM login WHERE username = '$username'";
								 
			$admin = mysqli_query($connection, $delete_admin) or die(mysqli_error($connection));

		}
?>	
		

<?php
	
	if (!$admin){

		//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingadmin'] = "Sorry, No details of Admin have been deleted.";
			//echo "Invalid Login Credentials.";
			header('Location: manageadmin.php');
		//include "C:/xampp/htdocs/sb/sb-php/admin.php";
				 
	}
	else{
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingadmin'] = "Details deleted sucessfully.";
			//echo "Invalid Login Credentials.";
			header('Location: manageadmin.php');
	}
?>