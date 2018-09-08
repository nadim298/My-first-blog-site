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
    <title>My Blog</title>
	<script>
		function toggleSidebar(){
			document.getElementById("sidebar").classList.toggle("active");
		}
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
		<section>
			<div class="container templete_section">
				<div class="row">
					<div class="col-md-6 templete_post">
						<?php
						include 'includes/db.php';
						if(isset($_GET['post_id'])){
							$post_id=$_GET['post_id'];
							$views_query="UPDATE `post` SET `catagory` = 'Computer', `views` = views+1 WHERE `post`.`id` =$post_id";
							mysqli_query($conn,$views_query);
						}
						$query="select * from post where status='Publish' and id=$post_id ";
						$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$id=$row['id'];
								$date=getdate($row['date']);
								$day=$date['mday'];
								$month=$date['month'];
								$year=$date['year'];
								
								$title=$row['title'];
								$author=$row['author'];
								$author_image=$row['author_image'];
								$post_image=$row['post_image'];
								$catagory=$row['catagory'];
								$tags=$row['tags'];
								$description=$row['description'];
								$views=$row['views'];
								$status=$row['status'];
							
					
						?>
						<div class="post">
							<div class="post_heading">
								<div class="row">
									<div class="col-md-2 post_date">
										<div class="day"><?php echo $day?></div>
										<div class="month"><?php echo $month?></div>
										<div class="year"><?php echo $year?></div>
									</div>
									<div class="col-md-8 post_title">
										<a href="#"><h3><?php echo ucfirst($title); ?></h3></a>
										<p>Written by: <span><?php echo $author;?></span></p>
										<div class="bottom">
											<span><i class="fas fa-folder"></i><a href="#"> <?php echo $catagory;?> </a></span>
											<span style="margin-left:5px;"><i class="fas fa-eye"></i><?php echo $views;?></span>
										</div>
									</div>
									<div class="col-md-2 writer_photo">
										<img src="<?php echo $author_image;?>" alt="image" class="img-circle">
									</div>
								</div>
							
							</div>
							<div class="single_post">
								<div class="row">
									
									<a href="post.html"><img src="<?php echo $post_image;?>" alt="post image"/></a>
									<p><?php echo $description;?></p>									
								</div>
								
							</div>
						</div>
						<?php
						}
						}
						else{
						echo '<center style="color:white;font-size:35px;">No post!</center>';
							}
						?>
						<div class="related_post">
							<div class="row">
								<h3>Related Posts</h3>
								<hr/>
								<?php
								$firstrow_query="select * from post where status='Publish' and catagory='$catagory' order by views desc limit 4";
						$fr_run=mysqli_query($conn,$firstrow_query);
						if(mysqli_num_rows($fr_run)>0){
							while($fr_row=mysqli_fetch_array($fr_run)){
								$fr_id=$fr_row['id'];
								
								$fr_date=getdate($fr_row['date']);
								$fr_day=$fr_date['mday'];
								$fr_month=$fr_date['month'];
								$fr_year=$fr_date['year'];
								
								$fr_title=$fr_row['title'];
								$fr_post_image=$fr_row['post_image'];
							?>
								<div class="col-sm-6 single_related_post">
									<div class="row">
										
											<div class="col-xs-4">
											<a href="post.php?post_id=<?php echo $fr_id;?>"><img style="margin-left:15px;" src="<?php echo $fr_post_image;?>" alt="post logo"></a>
											</div>
											<div class="col-xs-8 details">
											<a href="post.php?post_id=<?php echo $fr_id;?>"><h4><?php echo ucfirst($fr_title); ?></h4></a>
											<p><i class="fas fa-clock" style="margin-right:5px;"></i><?php echo "$fr_day $fr_month $fr_year";?></p>
											</div>
										</div>
								</div>
									<?php 
							}
											}
									?>
									
									
							</div>
						</div>
						<div class="comment">
							<h3>Comments</h3>
							
							
							<div class="row">
							<?php
								$cm_query="select * from comments where post_id=$post_id ";
						$cm_run=mysqli_query($conn,$cm_query);
						if(mysqli_num_rows($cm_run)>0){
							while($cm_row=mysqli_fetch_array($cm_run)){
								$cm_id=$cm_row['id'];
								$cm_name=$cm_row['name'];
								
								$cm_date=getdate($cm_row['date']);
								$cm_day=$cm_date['mday'];
								$cm_month=$cm_date['month'];
								$cm_year=$cm_date['year'];
								
								$cm_email=$cm_row['email'];
								$cm_pp=$cm_row['pp'];
								$cm_post_id=$cm_row['post_id'];
								$cm_comment=$cm_row['comment'];
							
						
							?>
								<div class="row single_comment">
									
									<div class="col-md-3 comment_design">
									<img src="<?php echo "$cm_pp";?>" alt="" class="img-circle">
								</div>
								<div class="col-md-9 ">
									<h3><?php echo "$cm_name";?></h3>
									<p><?php echo "$cm_comment";?></p>
								</div>
								
								</div>
								<?php
								
								?>
								<?php
								}
								}
						else{
							echo '<center>No comments yet!</center>';
						}
								?>
								
							</div>
							
							<hr/>
							<?php
			
				if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
				
				}
				
				if(isset($_POST['submit'])){
					$date=time();
					
					$name=$_POST['name'];
					$email=$_POST['email'];
					$comment=$_POST['comment'];
										
					$cm_sql = "INSERT INTO `comments` (`id`, `name`, `pp`, `email`, `post_id`, `date`, `comment`) 
					VALUES (NULL, '$name', 'images/pp/guest.png', '$email', '$post_id', '$date', '$comment')";
					
					if (mysqli_query($conn, $cm_sql)) {
						
						echo "New record created successfully";
					}
					
					else {
						echo "Error: " . $cm_sql . "<br>" . mysqli_error($conn);
					}

					
				}
				
		?>
						<div class="comment_box">
							<div class="row">
								<div class="col-xs-12">
									<form method="post">
										<div class="form-group">
											<label for="name">Full Name:</label>
											<input type="text" id="name" name="name" class="form-control" placeholder="Write Your Full Name..">
										</div>
										<div class="form-group">
											<label for="email">Email:</label>
											<input type="email" id="email" name="email" class="form-control" placeholder="Type Your Email Address..">
										</div>
										<div class="form-group">
											<label for="comment">Comments:</label>
											<textarea type="text" id="comment" name="comment" class="form-control" cols="100" rows="8" placeholder="comments.."></textarea>
										</div>
										<input type="submit" name="submit" class="btn btn-success btn-group-justified	" value="SEND">
									</form>
								</div>
							</div>
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