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
	<link rel="stylesheet" href="post_style.css">
<link rel="stylesheet" href="sitename.css">	
	<script src="js/bootstrap.js"></script>
	
    <link rel="icon" href="images/logo.png">
    <title>Contact US</title>
	<?php
		include 'includes/db.php';
	?>
	
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
		<section>
			<div class="container templete_section">
				<div class="row">
					<div class="col-md-6 contact">
						<h2>Contact US</h2>
						<hr/>
						<?php
						include('includes/db.php');
							if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
				}
				
				if(isset($_POST['submit'])){
					$date=time();
					$msg_name=$_POST['name'];
					$msg_email=$_POST['email'];
					$msg_message=$_POST['message'];
										
					$msg_query = "INSERT INTO message (name,email,message,date)
					VALUES ('$msg_name','$msg_email','$msg_message','$date')";
					
					if (mysqli_query($conn, $msg_query)) {
						
						$msg= "Your message has been sent!";
					}
					
					else {
						$msg= "Error ";
					}

					
				}
				
		?>
						
						<div class="row">
								<div class="col-xs-12">
								<span><p style="color:red;"><?php if(isset($msg)){echo $msg;}?></p></span>
									<form method="post">
										<div class="form-group">
											<label for="full-name">Full Name:</label>
											<input type="text" id="name" name="name" class="form-control" placeholder="Write Your Full Name..">
										</div>
										<div class="form-group">
											<label for="email">Email:</label>
											<input type="email" id="email" name="email" class="form-control" placeholder="Type Your Email Address..">
										</div>
										<div class="form-group">
											<label for="message">Message:</label>
											<textarea type="text" id="comment" name="message" class="form-control" cols="100" rows="8" placeholder="Write Your Message.."></textarea>
										</div>
										<input type="submit" name="submit" class="btn btn-success btn-group-justified	" value="SEND">
									</form>
								</div>
							</div>				
						
					</div>
					
					<?php include 'includes/home_page_popular.php'?>
					<?php include 'includes/home_page_social.php'?>
				</div>
			</div>
		</section>
	<?php include 'includes/home_page_footer.php'?>
	</div>
  </body>
</html>