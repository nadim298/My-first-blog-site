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
				$del_query="delete from message where id=$id";
				mysqli_query($conn,$del_query);
				$msg="Delete successfull !";
			}
			else if($bulk=='read'){
				$read_query="update message set status='Read' where id=$id";
				mysqli_query($conn,$read_query);
				
			}
			else if($bulk=='unread'){
				$unread_query="update message set status='unread' where id=$id";
				mysqli_query($conn,$unread_query);
				$msg="Changed to unread!";
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
		<?php include 'includes/admin_sidebar.php'?>
		<?php
		$query="select * from message order by id desc";
						$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
						
						
						
		?>
		<form action="" method="post">
			<div class="row maincontent_addpost">
			<div class="col-sm-12">
				
					<div class="row">
						<div class="col-xs-4">
						
							<div class="form-group">
							
								<select name="bulk" id="bulk" class="form-control">
									<option value="delete">Delete</option>
									<option value="read">Mark as read</option>
									<option value="unread">Mark as unread</option>
								</select>
							</div>
							
						</div>
						<div class="col-xs-8">
							<input type="submit" class="btn btn-success" value="Apply">
							<span class="pull-right"><p style="color:red;"><?php if(isset($msg)){echo $msg;}?></p></span>
						</div>
					</div>
				
				<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th></th>
					<th>Sr </th>
					<th>Name</th>
					<th>Date</th>
					<th>Email</th>
					<th>Message</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while($row=mysqli_fetch_array($run)){
					$id=$row['id'];
					$name=$row['name'];
					$date=getdate($row['date']);
							$day=$date['mday'];
							$month=substr($date['month'],0,3);
							$year=$date['year'];
					$email=$row['email'];
					$message=$row['message'];
					$status=$row['status'];
				
			?>
				<tr>
					<td><input type="checkbox" class="checkbox" name="checkbox[]"value="<?php echo $id;?>"></td>
					<td><?php echo $id;?></td>
					<td><?php echo ucfirst($name);?></td>
					<td><?php echo "$day $month $year";?></td>
					<td><?php echo $email;?></td>
					<td><?php echo $message;?></td>
					<td><?php echo $status;?></td>
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
		</form>
			</div>
			
		</div>
		
		</section>
		<?php include 'includes/user_footer.php'?>
	</div>
</body>
</html>
