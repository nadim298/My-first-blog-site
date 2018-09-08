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
				$del_query="delete from members where id=$id";
				mysqli_query($conn,$del_query);
			}
			else if($bulk=='admin'){
				$admin_query="update members set status='Admin' where id=$id";
				mysqli_query($conn,$admin_query);
			}
			else if($bulk=='member'){
				$member_query="update members set status='Member' where id=$id";
				mysqli_query($conn,$member_query);
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
		<div>
		
		
		<?php include 'includes/admin_sidebar.php'?>
		<?php
		$query="SELECT * FROM members WHERE id !=$db_id order by id desc";
						$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
						
						
						
		?>

		<form action="" method="post">
			<div class="row maincontent_addpost">
				<center><h3>Member's Details</h3></center>
				<hr/>
			<div class="col-sm-12">
				
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
								<select name="bulk" id="bulk" class="form-control">
									<option value="delete">Delete</option>
									<option value="admin">Promote to admin</option>
									<option value="member">Demote to member</option>
									<option value="Block">Block</option>
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
					<th>Name</th>
					<th>Date</th>
					<th>Username</th>
					<th>Image</th>
					<th>Status</th>
					<th>Email</th>
					<th>Mobile</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while($row=mysqli_fetch_array($run)){
					$id=$row['id'];
					$name=$row['name'];
					$date=getdate($row['registration_date']);
							$day=$date['mday'];
							$month=substr($date['month'],0,3);
							$year=$date['year'];
					$username=$row['username'];
					$image=$row['pp'];
					$status=$row['status'];
					$email=$row['email'];
					$mobile=$row['mobile'];
				
			?>
				<tr>
					<td><input type="checkbox" class="checkbox" name="checkbox[]"value="<?php echo $id;?>"></td>
					<td><?php echo $id;?></td>
					<td><?php echo ucfirst($name);?></td>
					<td><?php echo "$day $month $year";?></td>
					<td><?php echo $username;?></td>
					<td><img src="<?php echo $image;?>" width="30px" alt=""></td>
					<td><?php echo $status;?></td>
					<td><?php echo $email;?></td>
					<td><?php echo $mobile;?></td>
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
		</div>
		</section>
		<div class="row">
			<?php include 'includes/user_footer.php'?>
		</div>
		
	</div>
</body>
</html>
