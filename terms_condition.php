<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" href="css/bootstrap.css">	
	<link rel="stylesheet" href="css/bootstrap.min.js">
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="sitename.css">
	
<script src="js/jquery.js"></script>	
	<script src="js/bootstrap.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
    <link rel="icon" href="images/logo.png">
    <title>My Blog</title>
	<script>
		function toggleSidebar(){
			document.getElementById("sidebar").classList.toggle("active");
		}
	</script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="terms_condition.css">
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:2200,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
  </head>
  <body>
	<div id="wrapper">
	<?php
	require_once('includes/db.php');
	ob_start();
	session_start();
	if(!isset($_SESSION['username'])){
		 include 'includes/home_page_header.php';
	}
	else{
	$session_user=$_SESSION['username'];
	$session_user_status=$_SESSION['status'];
	$query="SELECT * FROM members WHERE username='$session_user'";
	$run=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($run);
					$db_id=$row['id'];
					$db_name=$row['name'];
					$db_mobile=$row['mobile'];
					$db_email=$row['email'];
					$db_username=$row['username'];
					$db_status=$row['status'];
					$db_pp=$row['pp'];
	include 'includes/home_page_header_login_user.php';
	}
?>

			<div class="para">
				
					<div class="">
						<div id="slider">
							<a href="#"><img src="images/slideshow/s3.jpg" alt="nature 1"/></a>
							<a href="#"><img src="images/slideshow/s1.png" alt="nature 2"/></a>
							<a href="#"><img src="images/slideshow/s2.jpg" alt="nature 3"/></a>
							<a href="#"><img src="images/slideshow/s4.jpg" alt="nature 4"/></a>
						</div>
					</div>
					<div class="templete">
						<h3>Terms & Condition</h3>
						<p>
							The following terms and conditions (“Terms”) govern all use of the WordPress.com website and all content, services, and products available at or through the website, including, but not limited to, Jetpack (“Jetpack”), VaultPress (“VaultPress”), and WordPress.com VIP (“VIP Service”), (taken together, our “Services”). Our Services are offered subject to your acceptance without modification of all of the terms and conditions contained herein and all other operating rules, policies (including, without limitation, Automattic’s Privacy Policy) and procedures that may be published from time to time by Automattic (collectively, the “Agreement”). You agree that we may automatically upgrade our Services, and these Terms will apply to any upgrades. If you reside in the United States or Brazil, your agreement is with Automattic Inc. (US), and if you reside outside of the United States or Brazil, your agreement is with Aut O’Mattic Ltd. (Ireland) (each, “Automattic” or “we”).

Please read this Agreement carefully before accessing or using our Services. By accessing or using any part of our Services, you agree to become bound by the Terms of this Agreement. If you do not agree to all the Terms of this Agreement, then you may not access or use any of our Services. If these Terms are considered an offer by Automattic, acceptance is expressly limited to these Terms.

Our Services are not directed to children younger than 13, and access and use of our Services is only offered to users 13 years of age or older. If you are under 13 years old, please do not register to use our Services. Any person who registers as a user or provides their personal information to our Services represents that they are 13 years of age or older.

Use of our Services requires a WordPress.com account. You agree to provide us with complete and accurate information when you register for an account. You will be solely responsible and liable for any activity that occurs under your username. You are responsible for keeping your password secure.
						</p>
					</div>
				
			
				
			
			</div>
			<?php include 'includes/home_page_footer.php'?>
  </body>
</html>