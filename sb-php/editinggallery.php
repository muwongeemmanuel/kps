<?php  //Start the Session
	session_start();
 	require('connect.php');
	//3. If the form is submitted or not.
	//3.1 If the form is submitted
	if ( isset($_POST['catergory']) and isset($_FILES['image']['name']) ){

		//3.1.1 Assigning posted values to variables.
		$catergory 		= $_POST['catergory'];
		$id 			= $_POST['id'];
		//$image 			= $_POST['image'];

		if (!empty($_FILES['image']['name'])) {
			# code...
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

				$update_gallery = "UPDATE gallery SET catergory='$catergory',image='$encoded_image' WHERE id = ".$id;

				$result = mysqli_query($connection, $update_gallery) or die(mysqli_error($connection)); 
				
	       }
	       else{
				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
				$_SESSION['changinggallery'] = "Sorry, Details not Successfully Edited. Image File type not allowed.";
				//echo "Invalid Login Credentials.";
				header('Location: gallery.php');
				}	
		}
		else{

			$update_gallery = "UPDATE gallery SET catergory='$catergory' WHERE id = ".$id;
			$result = mysqli_query($connection, $update_gallery) or die(mysqli_error($connection));



		}
		
		if ($result == true){

			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changinggallery'] = "Details Successfully Edited";
			//echo "Invalid Login Credentials.";
			header('Location: gallery.php');
			//include "C:/xampp/htdocs/sb/sb-php/admin.php";
			 
		}
		else{
				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
				$_SESSION['changinggallery'] = "Sorry, Details not Successfully Edited. Please try again using appriopriate words where necessary.";
				//echo "Invalid Login Credentials.";
				header('Location: gallery.php');
		}
		
	}
	else{
				// If any of the inputs is empty
				$_SESSION['changinggallery'] = "Sorry, Details not Successfully Edited. Please do not leave any input empty.";
				//echo "Invalid Login Credentials.";
				header('Location: gallery.php');
		}
		
?>