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
						<h3>About Us</h3>
						<div class="row single_row">
							<div class="row heading">
								<h2>Oveview</h2>
							</div>
							<div class="row details">
								<p>
									ECT News Network is one of the largest e-business and technology news publishers in the United States. Our network of business and technology news publications attracts a targeted audience of buyers and decision-makers who need timely industry news and reliable analysis.

The network currently includes several e-business and technology news sites: the E-Commerce Times®, TechNewsWorld™, CRM Buyer™ and LinuxInsider™. ECT News also publishes the E-Commerce Minute™ and the Tech News Flash™ daily newsletters and the ECT News Network Weekly Newsletter™.

These publications are some of the most respected and widely-read business and technology news sites of the Internet age. ECT News Network features an award-winning team of journalists who produce daily news and industry analysis. Content throughout ECT News Network covers the following areas:


								</p>
							</div>
						</div>
						<div class="row single_row">
							<div class="row heading">
								<h2>Services</h2>
							</div>
							<div class="row details">
							<ul>
								<li>Third Party Services are not vetted, endorsed, or controlled by Automattic.</li>
								<li>Any use of a Third Party Service is at your own risk, and we shall not be responsible or liable to anyone for Third Party Services.</li>
								<li>Your use is solely between you and the respective third party (“Third Party”) and will be governed by the Third Party’s terms and policies. It is your responsibility to review the Third Party’s terms and policies before using a Third Party Service.</li>
								<li>Some Third Party Services may request or require access to your (yours, your visitors’, or customers’) data. If you grant access, your data will handled in accordance with the Third Party’s privacy policy and practices. We do not have control over how a Third Party Service may use your data. You should carefully review Third Party Services’ data collection, </li>
								<li>Third Party Services may not work appropriately with your website, and we may not be able to provide support for issues caused by any Third Party Services.</li>
								<li>If you have questions or concerns about how a Third Party Service operates, or need support, please contact the Third Party directly.</li>
								
							</ul>
							</div>
						</div>
						
					</div>
				
			</div>
			<?php include 'includes/home_page_footer.php'?>
  </body>
</html>