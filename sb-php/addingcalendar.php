<?php  //Start the Session
	session_start();
 	require('connect.php');
	//3. If the form is submitted or not.
	//3.1 If the form is submitted
	if ( isset($_POST['date']) and isset($_POST['description']) ){

		//3.1.1 Assigning posted values to variables.
		$date 		= $_POST['date'];
		$description	= $_POST['description'];

		
        $insert_date = "INSERT INTO `calender` VALUES('$date','$description')";

		$result = mysqli_query($connection, $insert_date); //or die(mysqli_error($connection));
		//$count = mysqli_num_rows($result);
		//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
		if ($result == true){

			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
				$_SESSION['addingcalendar'] = "Date Successfully added";
				//echo "Invalid Login Credentials.";
				header('Location: addcalendar.php');
			//include "C:/xampp/htdocs/sb/sb-php/admin.php";
			 
		}
		else{
				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
				$_SESSION['addingcalendar'] = "Sorry, Date not Successfully added. Please try again using appriopriate date format displayed where necessary.";
				//echo "Invalid Login Credentials.";
				header('Location: addcalendar.php');
		}
		
	}
	else{
				// If any of the inputs is empty
				$_SESSION['addingcalendar'] = "Sorry, Date not Successfully added. Please do not leave any input empty.";
				//echo "Invalid Login Credentials.";
				header('Location: addcalendar.php');
		}
		
?>