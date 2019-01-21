<?php  //Start the Session
	
	session_start();
 	require('connect.php');
	
?>
<?php	
	if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['contact']) and isset($_POST['comment'])) {
		
		
		$contact 	= $_POST['contact'];
		$comment 	= $_POST['comment'];

		$to = "emailour75@gmail.com"; // this is your Email address
	    $from = $_POST['email']; // this is the sender's Email address
	    $name 		= $_POST['name'];
	    $subject = "Submission from website";
	    $subject2 = "Copy of your comment Submission";
	    $message = $name . " wrote the following:" . "\n\n" . $comment."\n\n". $contact;
	    $message2 = "Here is a copy of your comment " . $name . "\n\n" . $comment;

	    $headers = "From:" . $from;
	    $headers2 = "From:" . $to;
	    mail($to,$subject,$message,$headers);
	    mail($from,$subject2,$message2,$headers2);

		// the message
		$msg = "First line of text\nSecond line of text";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);

		// send email
		$result = mail("emailour75@gmail.com","My subject",$msg); 
		if ($result == true) {
			# code...
			//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
		$_SESSION['contacting'] = "Message successfully sent. Thank you ".$name." !!! We'll contact you shortly";
		//echo "Invalid Login Credentials.";
		header('Location: scontact.php');
		}

		
	}
	else{
				//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
				$_SESSION['contacting'] = "Incorrect or invalid Input(s), Please try again with valid details.";
				//echo "Invalid Login Credentials.";
				header('Location: scontact.php');
		}
?>
