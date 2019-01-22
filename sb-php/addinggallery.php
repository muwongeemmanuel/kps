<?php  //Start the Session
	session_start();
 	require('connect.php');
	//3. If the form is submitted or not.
	//3.1 If the form is submitted
	if ( isset($_POST['catergory']) 		&& !empty($_POST['catergory']) and
		 isset($_FILES['image']['name']) 			&& !empty($_FILES['image']['name']) ){

		//3.1.1 Assigning posted values to variables.
		//$staffID 		= $_POST['staffID'];
		$catergory 		= $_POST['catergory'];
		$title 			= $_POST['title'];

		//Allowed file type
        $allowed_extensions = array("jpg","jpeg","png","gif");
    
        //File extension
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    
        //Check extension
        if(in_array($ext, $allowed_extensions)) {
           //Convert image to base64
           $encoded_image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
           $encoded_image = 'data:image/' . $ext . ';base64,' . $encoded_image;
           //3.1.2 Checking the values are existing in the database or not
			$insert_gallery = "INSERT INTO gallery(image,catergory) VALUES('$encoded_image','$catergory')";

			$result = mysqli_query($connection, $insert_gallery); //or die(mysqli_error($connection));
			//$count = mysqli_num_rows($result);
			//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
			if ($result == true){

				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
					$_SESSION['addinggallery'] = "Details Successfully added";
					//echo "Invalid Login Credentials.";
					header('Location: addgallery.php');
				//include "C:/xampp/htdocs/sb/sb-php/admin.php";
				 
			}
			else{
					//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
					$_SESSION['addinggallery'] = "Sorry, Details not Successfully added. Please try again using appriopriate words where necessary.";
					//echo "Invalid Login Credentials.";
					header('Location: addgallery.php');
			}
       }
       else{
					//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
					$_SESSION['addinggallery'] = "Sorry, Details not Successfully added. Image File type not allowed.";
					//echo "Invalid Login Credentials.";
					header('Location: addgallery.php');
			}
		
	}
	else{
				// If any of the inputs is empty
				$_SESSION['addinggallery'] = "Sorry, Details not Successfully added. Please do not leave any input empty.";
				//echo "Invalid Login Credentials.";
				header('Location: addgallery.php');
		}
		
?>