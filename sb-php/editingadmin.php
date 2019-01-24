<?php  //Start the Session
	session_start();
 	require('connect.php');
	//3. If the form is submitted or not.
	//3.1 If the form is submitted
	if ( isset($_POST['username']) 		&& !empty($_POST['username']) and
		 isset($_POST['email']) 		&& !empty($_POST['email']) and
		 isset($_POST['telephone']) 		&& !empty($_POST['telephone']) ){

		//3.1.1 Assigning posted values to variables.
		$username 		= $_POST['username'];
		$email 		= $_POST['email'];
		$telephone 		= $_POST['telephone'];
		$originalusername	= $_POST['originalusername'];

		$update_admin = "UPDATE login SET username='$username',email='$email',telephone='$telephone' WHERE username = '$originalusername'";
		$result = mysqli_query($connection, $update_admin) or die(mysqli_error($connection));

 
		if ($result == true){

			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['username'] = $username;
			$_SESSION['changingadmin'] = "Details Successfully Edited";
			//echo "Invalid Login Credentials.";
			header('Location: settings.php');
			//include "C:/xampp/htdocs/sb/sb-php/admin.php";
			 
		}
		else{
				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
				$_SESSION['changingadmin'] = "Sorry, Details not Successfully Edited. Username already exist !!!";
				//echo "Invalid Login Credentials.";
				header('Location: settings.php');
		}
		
	}
	else{
				// If any of the inputs is empty
				$_SESSION['changingadmin'] = "Sorry, Details not Successfully Edited. Please do not leave any input empty.";
				//echo "Invalid Login Credentials.";
				header('Location: settings.php');
		}
		
?>