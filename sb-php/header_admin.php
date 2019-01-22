<!DOCTYPE html>
<html>
<head>
<title>KPS</title>
<!--<basefont size="12"> -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="http://localhost/kps/sb-css/widescreen_admin.css" media="screen and (min-width:992px)" rel="stylesheet"> <!-- 1045 -->
<link href="http://localhost/kps/sb-css/smallscreen.css" media="screen and (max-width:991px)" rel="stylesheet">

<style type="text/css">

	
	.active{
		background-color:#4CAF50;
	}
	.l{padding-top:17px;}


	body, html {
	  height: 100%;
	  margin: 0;
	}

	.bg {
	  /* The image used */
	  background-image: url("http://localhost/sb/sb-images/images.jpeg");

	  /* Full height */
	  height: 100%; 

	  /* Center and scale the image nicely */
	  background-position: center;
	  background-repeat: no-repeat;
	  background-size: cover;
	}

	

	

	

</style>

</head>

<body  style="background-color:gray;margin:20px;font-size:20px;" id="body" 
<?php 
	if (isset($_SESSION['changingstaff']) or isset($_SESSION['addingstaff']) or isset($_SESSION['changingcalendar']) or isset($_SESSION['addingcalendar']) or isset($_SESSION['changingnotification']) or isset($_SESSION['addingnotification']) or isset($_SESSION['changinggallery']) or isset($_SESSION['addinggallery']) ){ 
?>onload ="mybody()" >

<script>
function mybody() {
	<?php if (!empty($_SESSION['changingstaff'])): ?>
		window.alert("<?php echo $_SESSION['changingstaff']; ?>");
		<?php unset($_SESSION['changingstaff']); // remove it now we have used it ?>
	<?php endif; ?>
	<?php if (!empty($_SESSION['addingstaff'])): ?>
		window.alert("<?php echo $_SESSION['addingstaff']; ?>");
		<?php unset($_SESSION['addingstaff']); // remove it now we have used it ?>
	<?php endif; ?>
	<?php if (!empty($_SESSION['changingcalendar'])): ?>
		window.alert("<?php echo $_SESSION['changingcalendar']; ?>");
		<?php unset($_SESSION['changingcalendar']); // remove it now we have used it ?>
	<?php endif; ?>
	<?php if (!empty($_SESSION['addingcalendar'])): ?>
		window.alert("<?php echo $_SESSION['addingcalendar']; ?>");
		<?php unset($_SESSION['addingcalendar']); // remove it now we have used it ?>
	<?php endif; ?>
	<?php if (!empty($_SESSION['changingnotification'])): ?>
		window.alert("<?php echo $_SESSION['changingnotification']; ?>");
		<?php unset($_SESSION['changingnotification']); // remove it now we have used it ?>
	<?php endif; ?>
	<?php if (!empty($_SESSION['addingnotification'])): ?>
		window.alert("<?php echo $_SESSION['addingnotification']; ?>");
		<?php unset($_SESSION['addingnotification']); // remove it now we have used it ?>
	<?php endif; ?>
	<?php if (!empty($_SESSION['changinggallery'])): ?>
		window.alert("<?php echo $_SESSION['changinggallery']; ?>");
		<?php unset($_SESSION['changinggallery']); // remove it now we have used it ?>
	<?php endif; ?>
	<?php if (!empty($_SESSION['addinggallery'])): ?>
		window.alert("<?php echo $_SESSION['addinggallery']; ?>");
		<?php unset($_SESSION['addinggallery']); // remove it now we have used it ?>
	<?php endif; ?>
	
}
</script>


<?php } ?>


<!-- muwonge -->

	
		<div class="hd" style="background-color: brown; padding:19px;">
			<h1>	
				
				<?php
							
					$select_gallery = "SELECT image FROM gallery WHERE catergory ='Budge'";
										 
					$gallery = mysqli_query($connection, $select_gallery) or die(mysqli_error($connection));
					$count = mysqli_num_rows($gallery);

					$limit = 0;
				?>
				<?php foreach ($gallery as $gallery): ?>

					
					<p class="left-h"><img src= "<?php echo e($gallery['image']); ?>" height="120" width="200" alt="not here"></p>
					
					<?php if ($limit++ > 1) break; ?>

				<?php endforeach; ?>

				<?php
								
					$select_gallery = "SELECT image FROM gallery WHERE catergory ='Design'";
										 
					$gallery = mysqli_query($connection, $select_gallery) or die(mysqli_error($connection));
					$count = mysqli_num_rows($gallery);

					$limit = 0;
				?>
				<?php foreach ($gallery as $gallery): ?>

					
					<p class="right-h"><img src= "<?php echo e($gallery['image']); ?>" height="120" width="200" alt="not here"></p>
					
					<?php if ($limit++ > 1) break; ?>

				<?php endforeach; ?>
				<p class="cent-h" style="color:blue;text-align:center;"><em><b>Kibuuka</br> Preparatory</br>School</em></b></p>
					
			</h1>
		</div>