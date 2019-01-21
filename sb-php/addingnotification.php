<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');
	
?>

<?php
	if ( isset($_POST['date']) and isset($_POST['description']) and isset($_POST['catergory']) ){

		$description = $_POST['description'];
		$catergory = $_POST['catergory'];
		$date = $_POST['date'];
		$fileName = $_FILES['file']['name'];

		$fileTarget = $_SERVER['DOCUMENT_ROOT'] . "/kps/sb-files/".$fileName;
		$fileExistsFlag = 0; 
		
		/* 
		*	Checking whether the file already exists in the destination folder 
		*/

			
			foreach(glob("$fileTarget") as $filename) {
			    
			    $fileExistsFlag = $fileExistsFlag + 1;
			    
			}

		
		/*
		* If file is not present in the destination folder
		*/
		if($fileExistsFlag == 0) { 

			$tempFileName = $_FILES["file"]["tmp_name"];

			$result = move_uploaded_file($tempFileName,$fileTarget);
			/*
			*	If file was successfully uploaded in the destination folder
			*/
			if($result) { 

				$query = "INSERT INTO notification(day,description,filepath,filename,type) VALUES('$date','$description','$fileTarget','$fileName','$catergory')";
				$result = mysqli_query($connection, $query) or die("Error by Muwonge : ".mysqli_error($connection));

				if ($result == true){

					//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
						$_SESSION['addingnotification'] = "Notice Successfully added";
						//echo "Invalid Login Credentials.";
						header('Location: addnotification.php');
					//include "C:/xampp/htdocs/sb/sb-php/admin.php";
					 
				}
				else{
						//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
						$_SESSION['addingnotification'] = "Sorry, Notification not Successfully added. Please try again using appriopriate date format displayed where necessary.";
						//echo "Invalid Login Credentials.";
						header('Location: addnotification.php');
				}
			}
			else { 

				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
				$_SESSION['addingnotification'] = "Sorry, Notification not Successfully added. There was an error in uploading your file.";
				//echo "Invalid Login Credentials.";
				header('Location: addnotification.php');
			}
			mysqli_close($connection);
		}
		elseif (!empty($_POST['description']) and !empty($_POST['date']) and !empty($_POST['catergory']) and empty($_FILES['file']['name'])){
			# code...
			$query = "INSERT INTO notification(day,description,type) VALUES('$date','$description','$catergory')";
			$result = mysqli_query($connection, $query) or die("Error by Muwonge : ".mysqli_error($connection));

			if ($result == true){

				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
					$_SESSION['addingnotification'] = "Notice Successfully added";
					//echo "Invalid Login Credentials.";
					header('Location: addnotification.php');
				//include "C:/xampp/htdocs/sb/sb-php/admin.php";
				 
			}
			else{
					//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
					$_SESSION['addingnotification'] = "Sorry, Notification not Successfully added. Please try again using appriopriate date format displayed where necessary.";
					//echo "Invalid Login Credentials.";
					header('Location: addnotification.php');
			}
		}
		/*
		* If file is already present in the destination folder
		*/
		else {
			
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['addingnotification'] = "File ".$fileName." already exists in your folder. Please rename the file and try again.";
			//echo "Invalid Login Credentials.";
			header('Location: addnotification.php');
			mysqli_close($connection);
		} 
		
	}
	else{
		// If any of the inputs is empty
		$_SESSION['addingnotification'] = "Sorry, Notification not Successfully added. Please do not leave any input empty.";
		//echo "Invalid Login Credentials.";
		header('Location: addnotification.php');
		}
		
?>