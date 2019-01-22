<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');

?>

<?php
			//3.1.2 Checking the values are existing in the database or not
		if (empty($_GET['gallery'])) {
			# code...
			$staff = false;
		} else{
			$id = $_GET['gallery'];

			$delete_gallery = "DELETE FROM gallery WHERE id = ".$id;
								 
			$gallery = mysqli_query($connection, $delete_gallery) or die(mysqli_error($connection));

		}
?>	
		

<?php
	
	if (!$gallery){

		//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changinggallery'] = "Sorry, No details of gallery have been deleted.";
			//echo "Invalid Login Credentials.";
			header('Location: gallery.php');
		//include "C:/xampp/htdocs/sb/sb-php/admin.php";
				 
	}
	else{
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changinggallery'] = "Details deleted sucessfully.";
			//echo "Invalid Login Credentials.";
			header('Location: gallery.php');
	}
?>