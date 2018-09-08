<?php
	include 'includes/session.php';
?>
<?php
			
						 if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
				
				}
				
				if(isset($_POST['submit'])){
					$date=time();
					$title=$_POST['title'];
					$description=$_POST['description'];
					
					
					$image=$_FILES['post_image']['name'];
					$tmp_name=$_FILES['post_image']['tmp_name'];
					
					$status=$_POST['status'];
					
					if(empty($title) or empty($description) or empty($image)){
						$msg="All(*) fields are required!";
					}
					else{
						$sql = "INSERT INTO post (date,title,author,author_image, description,post_image,status,user_id)
					VALUES ('$date','$title','$db_name','$db_pp','$description','images/media/$image','$status','$db_id')";
					
					if (mysqli_query($conn, $sql)) {
						
						$msg="New record created successfully";
						$path="images/media/$image";
						if(move_uploaded_file($tmp_name,$path)){
							copy($path,"$path");
						}
					}
					
					else {
						$msg="Failed";
					}

					mysqli_close($conn);
					}
					
				}
				
		?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Post</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	
	<script src="js/bootstrap.js"></script>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<link rel="stylesheet" href="styleAdminPanel.css">
	<link rel="stylesheet" href="sitename.css">
	
</head>
<body>
	<div id="wrapper">
		<section>
			<?php include 'includes/user_header.php'?>
			<?php include 'includes/user_profile.php'?>
			<?php include 'includes/admin_sidebar.php'?>
		<div class="container">
			<div class="maincontent_addpost">
			<div class="row">
				<div class="md-col-9">
						<h2>Add Post</h2>
						
						<hr/>	
						<span class="pull-right"><p style="color:red;"><?php if(isset($msg)){echo $msg;}?></p></span>
				</div>
				
		
				
		
				<div class="col-xm-12">
					<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="title">Title: </label>
						<input class="form-control"type="text" name="title" placeholder="Post title..">
					</div>
					<div class="form-group">
						<textarea name="description" id="textarea" cols="100" rows="10"></textarea>
					</div>
					<div class="form-group">
						<label for="file">Select Image:</label>
						<input type="file" name="post_image">
					</div>
					<div class="form-group">
						<label for="catagory">Catagory:</label>
						<select class="form-control" name="catagory" id="catagory">
							<?php
								$cat_query="select * from catagory";
								$cat_run=mysqli_query($conn,$cat_query);
								if(mysqli_num_rows($cat_run)>0){
									while($cat_row=mysqli_fetch_array($cat_run)){
										$cat_name=$cat_row['catagory'];
										echo "<option value='".$cat_name."'>".ucfirst($cat_name)."</option>";
									}
								}
								else{
									echo"<center><h6>No catagory is here</h6></center>";
								}
								mysqli_close($conn);
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="tag">Tags: </label>
						<input type="text" name="tag" placeholder="Tags..">
					</div>
					<div class="form-group">
						<label for="status">Status:</label>
						<select name="status" id="status">
							<option value="Publish">Publish</option>
							<option value="Draft">Draft</option>
						</select>
					</div>
					<div class="form-group">
						<input class="btn btn-success" type="submit" value="submit" name="submit">
					</div>
					</form>
				</div>
			</div>
		
		</div>
		</div>
		</section>
		<?php include 'includes/user_footer.php'?>
	</div>
</body>
</html>
