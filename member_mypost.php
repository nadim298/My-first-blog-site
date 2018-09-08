<?php
	include 'includes/session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Catagories</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="styleAdminPanel.css">
	<link rel="stylesheet" href="sitename.css">
	<script src="js/bootstrap.js"></script>
	<?php
		include 'includes/db.php';
	?>
	<?php
	if(isset($_POST['checkbox'])){
		foreach($_POST['checkbox'] as $id){
			$bulk=$_POST['bulk'];
			if($bulk=='delete'){
				$del_query="delete from post where id=$id";
				mysqli_query($conn,$del_query);
			}
			else if($bulk=='Publish'){
				$Publish_query="update post set status='Publish' where id=$id";
				mysqli_query($conn,$Publish_query);
			}
			else if($bulk=='Draft'){
				$draft_query="update post set status='Draft' where id=$id";
				mysqli_query($conn,$draft_query);
			}
		}
	}
?>
</head>
<body>
	<div id="wrapper">
		<section>
		<?php include 'includes/user_header.php'?>
		
		<?php include 'includes/user_profile.php'?>
		<?php include 'includes/member_sidebar.php'?>
		
		<?php
		$query="select * from post where user_id=$db_id order by id desc";
						$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
						
		?>
		<form action="" method="post">
		<div class="row maincontent_addpost">
		<center><h3>My Posts</h3></center>
				<hr/>
			<div class="col-sm-12">
				
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
								<select name="bulk" id="bulk" class="form-control">
									<option value="delete">Delete</option>
									<option value="Publish">Publish</option>
									<option value="Draft">Draft</option>
									
								</select>
							</div>
						</div>
						<div class="col-xs-8">
							<input type="submit" class="btn btn-success" value="Apply">
							
						</div>
					</div>
				
				<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th></th>
					<th>Sr </th>
					<th>Title</th>
					<th>Date</th>
					<th>Image</th>
					<th>Author</th>
					<th>Catagory</th>
					<th>Views</th>
					<th>Status</th>
					<th></th>
					
				</tr>
			</thead>
			<tbody>
			<?php
				while($row=mysqli_fetch_array($run)){
					$id=$row['id'];
					$title=$row['title'];
					$date=getdate($row['date']);
							$day=$date['mday'];
							$month=substr($date['month'],0,3);
							$year=$date['year'];
					
					$image=$row['post_image'];
					$author=$row['author'];
					$catagory=$row['catagory'];
					$views=$row['views'];
					$status=$row['status'];
				
			?>
				<tr>
					<td><input type="checkbox" class="checkbox" name="checkbox[]"value="<?php echo $id;?>"></td>
					<td><?php echo $id;?></td>
					<td><?php echo $title;?></td>
					<td><?php echo "$day $month $year";?></td>
					<td><img src="<?php echo $image;?>" width="30px" alt=""></td>
					<td><?php echo $author;?></td>
					<td><?php echo $catagory;?></td>
					<td><?php echo $views;?></td>
					<td><?php echo $status;?></td>
					<td><a href="post.php?post_id=<?php echo $id;?>" class="btn btn-block btn-primary">View Full</a></td>					
				</tr>
				<?php 				
					}				
				?>
			</tbody>
			</table>
			<?php 
				}
						else{
							echo '<center style="color:white;font-size:35px;">No post!</center>';
						}
			?>
			</div>
			
		</div>
		</form>
		</section>
		<?php include 'includes/user_footer.php'?>
	</div>
</body>
</html>
