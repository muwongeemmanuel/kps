<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');

?>

<?php
			//3.1.2 Checking the values are existing in the database or not
		if (empty($_GET['notification'])) {
			# code...
			$calendar = false;
		} else{
			$date = $_GET['notification'];
			//deleting file in the folder first
			$select_notification = "SELECT * FROM notification WHERE day = '".$date."'";
			$notification = mysqli_query($connection, $select_notification) or die(mysqli_error($connection));
			$count = mysqli_num_rows($notification);
?>
			<?php
				foreach ($notification as $notification){

					if (empty($notification['filepath']) and empty($notification['filename'])) {
						# code...
						$deletefile = true;
					}
					else{

						$deletefile = unlink($notification['filepath']);
					}


					if (!$deletefile) {
						# code...
						//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
						$_SESSION['changingnotification'] = "Sorry, No details of notification have been deleted.";
						//echo "Invalid Login Credentials.";
						header('Location: managenotification.php');
						die();
					}
				}

			?>
<?php
			$delete_notification = "DELETE FROM notification WHERE day = '".$date."'";
								 
			$notification = mysqli_query($connection, $delete_notification) or die(mysqli_error($connection));

		}
?>	
		

<?php
	
	if (!$notification){

		//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingnotification'] = "Sorry, No details of notification have been deleted.";
			//echo "Invalid Login Credentials.";
			header('Location: managenotification.php');
		//include "C:/xampp/htdocs/sb/sb-php/admin.php";
				 
	}
	else{
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingnotification'] = "Details deleted sucessfully.";
			//echo "Invalid Login Credentials.";
			header('Location: managenotification.php');
	}
?>