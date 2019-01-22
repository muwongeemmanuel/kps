<!DOCTYPE html>
<html>
<head>
<title>KPS</title>
<!--<basefont size="12"> -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="http://localhost/kps/sb-css/widescreen.css" media="screen and (min-width:992px)" rel="stylesheet"> <!-- 1045 -->
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

<body  style="background-color:gray;margin:20px;font-size:20px;" id="body" <?php if (isset($_SESSION['login_fail']) or isset($_SESSION['contacting'])){ ?>onload ="mybody()" >

<script>
function mybody() {
	<?php if (!empty($_SESSION['login_fail'])): ?>
		window.alert("<?php echo $_SESSION['login_fail']; ?>");
		<?php unset($_SESSION['login_fail']); // remove it now we have used it ?>
	<?php endif; ?>
	<?php if (!empty($_SESSION['contacting'])): ?>
		window.alert("<?php echo $_SESSION['contacting']; ?>");
		<?php unset($_SESSION['contacting']); // remove it now we have used it ?>
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
		<div class="d" style="padding:px; color:blue;" >
				
			<h2 class=""  style="background-image:url(http://localhost/sb/sb-images/pencil1.png);">
			<marquee behavior="scroll" direction="left" >
				You are most welcome here at Kibuuka Preparatory School's website
				<?php
					
					$year = date("Y");
					$month = date("n")-1;

					//$select_calendar = "SELECT * FROM calender WHERE day = '".$date."'";
					$select_notification = "SELECT * FROM notification WHERE YEAR(`day`) >= '".$year."' AND MONTH(`day`) >= '".$month."'AND type = 'Urgent' ORDER BY day";
										 
					$notification = mysqli_query($connection, $select_notification) or die(mysqli_error($connection));
					//$count = mysqli_num_rows($notification);

					//$limit = 0;
				?>
				<?php foreach ($notification as $notification): ?>

					<i style="color:red;">******<?php echo e($notification['description']); ?>******</i>							
					<!--<?php if ($limit++ > 1) break; ?> -->

				<?php endforeach; ?>
				For more information check our website Notice board.
				
			</marquee>
			</h2>

			<!-- 
				<p class="budge"><img class="budge2" src="http://localhost/sb/sb-images/images-4.jpeg"  alt="not here"></p>
				<p class=""><img class="budge3" src="http://localhost/sb/sb-images/images-4.jpeg"  alt="not here"></p>
			-->

			
		</div>