<?php  //Start the Session
	
	session_start();
 	require('connect.php');
 	require('escape.php');
	
?>

<?php
	if ( isset($_POST['date']) and isset($_POST['description']) and isset($_POST['catergory']) ){

		//$description = $_POST['description'];
		$description = mysqli_real_escape_string($connection, $_POST['description']);
		$catergory = $_POST['catergory'];
		$date = $_POST['date'];
		$fileName = $_FILES['file']['name'];

		//original values
		$id = $_POST['id'];
		$originalfilepath = $_POST['originalfilepath'];

		if (!empty($originalfilepath)) {
			# code...

			unlink($originalfilepath);
		}

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

				//$query = "INSERT INTO notification(day,description,filepath,filename,type) VALUES('$date','$description','$fileTarget','$fileName','$catergory')";
				$query = "UPDATE notification SET day='$date',description='$description',filepath='$fileTarget',filename='$fileName',type='$catergory' WHERE id =  ".$id;
				$result = mysqli_query($connection, $query) or die("Error by Muwonge : ".mysqli_error($connection));

				if ($result == true){

					//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
						$_SESSION['changingnotification'] = "Notice Successfully edited 1";
						//echo "Invalid Login Credentials.";
						header('Location: managenotification.php');
					//include "C:/xampp/htdocs/sb/sb-php/admin.php";
					 
				}
				else{
						//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
						$_SESSION['changingnotification'] = "Sorry, Notification not Successfully edited. Please try again using appriopriate date format displayed where necessary.";
						//echo "Invalid Login Credentials.";
						header('Location: managenotification.php');
				}
			}
			else { 

				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
				$_SESSION['changingnotification'] = "Sorry, Notification not Successfully edited. There was an error in uploading your file.";
				//echo "Invalid Login Credentials.";
				header('Location: managenotification.php');
			}
			mysqli_close($connection);
		}
		elseif (!empty($_POST['description']) and !empty($_POST['date']) and !empty($_POST['catergory']) and empty($_FILES['file']['name'])){
			# code...
			//$query = "INSERT INTO notification(day,description,type) VALUES('$date','$description','$catergory')";
			$query = "UPDATE notification SET day='$date',description='$description',filepath='',filename='',type='$catergory' WHERE id = ".$id;
			$result = mysqli_query($connection, $query) or die("Error by Muwonge : ".mysqli_error($connection));

			if ($result == true){

				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
					$_SESSION['changingnotification'] = "Notice Successfully edited 2";
					//echo "Invalid Login Credentials.";
					header('Location: managenotification.php');
				//include "C:/xampp/htdocs/sb/sb-php/admin.php";
				 
			}
			else{
					//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
					$_SESSION['changingnotification'] = "Sorry, Notification not Successfully edited. Please try again using appriopriate date format displayed where necessary.";
					//echo "Invalid Login Credentials.";
					header('Location: managenotification.php');
			}
		}
		/*
		* If file is already present in the destination folder
		*/
		else {
			
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$_SESSION['changingnotification'] = "File ".$fileName." already exists in your folder. Please rename the file and try again.";
			//echo "Invalid Login Credentials.";
			header('Location: managenotification.php');
			mysqli_close($connection);
		} 
		
	}
	else{
		// If any of the inputs is empty
		$_SESSION['changingnotification'] = "Sorry, Notification not Successfully edited. Please do not leave any input empty.";
		//echo "Invalid Login Credentials.";
		header('Location: managenotification.php');
		}
		
?>