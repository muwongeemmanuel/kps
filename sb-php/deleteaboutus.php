<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');

?>

<?php
			//3.1.2 Checking the values are existing in the database or not
		if (empty($_GET['aboutus'])) {
			# code...
			$aboutus = false;
		} else{
			$id = $_GET['aboutus'];
			//deleting file in the folder first
			$select_aboutus = "SELECT * FROM us WHERE id = ".$id;
			$aboutus = mysqli_query($connection, $select_aboutus) or die(mysqli_error($connection));
			$count = mysqli_num_rows($aboutus);
?>
			<?php
				foreach ($aboutus as $aboutus){

					if (empty($aboutus['filepath']) and empty($aboutus['filename'])) {
						# code...
						$deletefile = true;
					}
					else{

						$deletefile = unlink($aboutus['filepath']);
					}


					if (!$deletefile) {
						# code...
						//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
						$_SESSION['changingaboutus'] = "Sorry, No details of About Us have been deleted.";
						//echo "Invalid Login Credentials.";
						header('Location: aboutus.php');
						die();
					}
				}

			?>
<?php
			$delete_notification = "DELETE FROM us WHERE id = ".$id;
								 
			$notification = mysqli_query($connection, $delete_notification) or die(mysqli_error($connection));

		}
?>	
		

<?php
	
	if (!$aboutus){

		//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingaboutus'] = "Sorry, No details of About Us have been deleted.";
			//echo "Invalid Login Credentials.";
			header('Location: aboutus.php');
		//include "C:/xampp/htdocs/sb/sb-php/admin.php";
				 
	}
	else{
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingaboutus'] = "Details deleted sucessfully.";
			//echo "Invalid Login Credentials.";
			header('Location: aboutus.php');
	}
?>