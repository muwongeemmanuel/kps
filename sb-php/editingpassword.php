<?php  //Start the Session
	session_start();
 	require('connect.php');
 	require('escape.php');
	//3. If the form is submitted or not.
	//3.1 If the form is submitted
	if ( isset($_POST['password1']) 		&& !empty($_POST['password1']) and
		 isset($_POST['password2']) 		&& !empty($_POST['password2']) and
		 isset($_POST['password3']) 		&& !empty($_POST['password3']) ){

		//3.1.1 Assigning posted values to variables.
		$password1 		= $_POST['password1'];
		$password2 		= $_POST['password2'];
		$password3 		= $_POST['password3'];
		$username = $_SESSION['username'];

		//3.1.2 Checking the values are existing in the database or not
		$query = "SELECT * FROM `login` WHERE username='$username' and password='$password1'";
		 
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		$count = mysqli_num_rows($result);
		//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
		if ($count == 1){

			if ($password2==$password3) {
				# code...

				//$insert_date = "INSERT INTO `calender` VALUES('$date','$description')";
		        $update_admin = "UPDATE login SET password='$password2' WHERE username = '$username'";
				$result = mysqli_query($connection, $update_admin) or die(mysqli_error($connection));
				
				//$count = mysqli_num_rows($result);
				//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
				if ($result == true){

					//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
						$_SESSION['changingadmin'] = "Password Successfully changed";
						//echo "Invalid Login Credentials.";
						header('Location: settings.php');
					//include "C:/xampp/htdocs/sb/sb-php/admin.php";
					 
				}
				else{
						//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
						$_SESSION['changingadmin'] = "Sorry, Password not Successfully changed.";
						//echo "Invalid Login Credentials.";
						header('Location: editpassword.php');
				}
			}
			else{
				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
				$_SESSION['changingadmin'] = "Sorry, Password not Successfully changed. New Passwords are different.";
				//echo "Invalid Login Credentials.";
				header('Location: editpassword.php');
			}
			
		}
		if ($count == 0) {
			# code...
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingadmin'] = "Sorry,  Old Password is Incorrect !!!";
			//echo "Invalid Login Credentials.";
			header('Location: editpassword.php');
		}

		
	}
	else{
				// If any of the inputs is empty
				$_SESSION['changingadmin'] = "Sorry, Password not Successfully changed. Please do not leave any input empty.";
				//echo "Invalid Login Credentials.";
				header('Location: editpassword.php');
		}
		
?>