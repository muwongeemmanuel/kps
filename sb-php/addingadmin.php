<?php  //Start the Session
	session_start();
 	require('connect.php');
	//3. If the form is submitted or not.
	//3.1 If the form is submitted
	if ( isset($_POST['username']) 		&& !empty($_POST['username']) and
		 isset($_POST['password1']) 		&& !empty($_POST['password1']) and
		 isset($_POST['password2']) 		&& !empty($_POST['password2']) and
		 isset($_POST['title']) 		&& !empty($_POST['title']) and
		 isset($_POST['email']) 		&& !empty($_POST['email']) and
		 isset($_POST['telephone']) 		&& !empty($_POST['telephone']) ){

		//3.1.1 Assigning posted values to variables.
		$username 		= $_POST['username'];
		$password1 		= $_POST['password1'];
		$password2 		= $_POST['password2'];
		$title 		= $_POST['title'];
		$email 		= $_POST['email'];
		$telephone 		= $_POST['telephone'];


		if ($password1==$password2) {
			# code...

			//$insert_date = "INSERT INTO `calender` VALUES('$date','$description')";
	        $insert_admin = "INSERT INTO login(username,password,title,email,telephone) VALUES('$username','$password1','$title','$email','$telephone')";

			$result = mysqli_query($connection, $insert_admin);// or die(mysqli_error($connection));
			//$count = mysqli_num_rows($result);
			//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
			if ($result == true){

				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
					$_SESSION['addingadmin'] = "Admin Successfully added";
					//echo "Invalid Login Credentials.";
					header('Location: addadmin.php');
				//include "C:/xampp/htdocs/sb/sb-php/admin.php";
				 
			}
			else{
					//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
					$_SESSION['addingadmin'] = "Sorry, Admin not Successfully added. Username already exist !!!.";
					//echo "Invalid Login Credentials.";
					header('Location: addadmin.php');
			}
		}
		else{
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['addingadmin'] = "Sorry, Admin not Successfully added. Passwords are different.";
			//echo "Invalid Login Credentials.";
			header('Location: addadmin.php');
		}

        
		
	}
	else{
				// If any of the inputs is empty
				$_SESSION['addingadmin'] = "Sorry, Admin not Successfully added. Please do not leave any input empty.";
				//echo "Invalid Login Credentials.";
				header('Location: addadmin.php');
		}
		
?>