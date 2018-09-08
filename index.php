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
	
	<link rel="stylesheet" href="sitename.css">
	<link href="css/all.css" type="text/css" rel="stylesheet" media="screen" />
	<link rel="stylesheet" href="style.css">
	
	
<script src="js/jquery.js"></script>	
	<script src="js/bootstrap.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	
    <link rel="icon" href="images/logo.png">
    <title>My Blog</title>
	<script>
		function toggleSidebar(){
			document.getElementById("sidebar").classList.toggle("active");
		}
	</script>
  </head>
  <body>
 
	<?php 
	include 'includes/db.php';
	$num_of_post=3;
	if(isset($_GET['page'])){
		$page_id=$_GET['page'];
	}
	else{
		$page_id=1;
	}
	if(isset($_POST['search'])){
		$search_title=$_POST['search-title'];
		$all_post_query="select * from post where status='Publish' and tags like '%$search_title%'";
	}
	else{
		$all_post_query="select * from post where status='Publish'";
	}
	
	
	
	$all_post_run=mysqli_query($conn,$all_post_query);
	$all_post=mysqli_num_rows($all_post_run);
	$total_page=ceil($all_post/$num_of_post);
	
	$post_start_from=($page_id-1)*$num_of_post;
	
	?>
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
					<div class="col-md-6 ">
						<?php
						include 'includes/db.php';
						if(isset($_POST['search'])){
							$search_title=$_POST['search-title'];
							
							$query="select * from post where status='Publish' and tags like '%$search_title%' order by id desc limit $post_start_from,$num_of_post";
							$run=mysqli_query($conn,$query);
						}
						else{
						$query="select * from post where status='Publish'order by id desc limit $post_start_from,$num_of_post";
						$run=mysqli_query($conn,$query);
						}
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
										<a href="post.php?post_id=<?php echo $id;?>"><h3><?php echo ucfirst($title); ?></h3></a>
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
										<a href="post.php?post_id=<?php echo $id;?>"><img src="<?php echo $post_image;?>" alt="post image"/></a>
										<p><?php echo substr($description,0,200);?><a href="post.php?post_id=<?php echo $id;?>">....Read more</a></p>
									
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
						
						<nav aria-label="Page navigation example" id="pagination">
						  <ul class="pagination">
							<?php
								for($i=1;$i<=$total_page;$i++){
									echo "<li class='".($page_id==$i?'active':'')."'><a href='index.php?page=".$i."'>$i</a></li>";
								}
							?>
						  </ul>
						</nav>
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