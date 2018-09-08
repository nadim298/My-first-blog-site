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
	
</head>
<body>
	<div id="wrapper">
		<section>
		<?php include 'includes/user_header.php'?>
		
		<?php include 'includes/user_profile.php'?>
		<?php include 'includes/admin_sidebar.php'?>
		<div class="container">
			<div class="maincontent_addpost">
				<div class="md-col-9">
					<h2>Catagories</h2><hr/>
					
				</div>
			<?php
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());	
			}
			if(isset($_POST['submit'])){
						$catagory=$_POST['catagory'];
						
						$sql = "INSERT INTO catagory (catagory)
						VALUES ('$catagory')";
						
						if (mysqli_query($conn, $sql)) {
							$msg="Catagory addes successfully !";
						}
						else {
							$msg="Failed";
						}
						
					}
		?>
		<?php
			if(isset($_GET['del_id'])){
				$del_id=$_GET['del_id'];
				$del_query="delete from catagory where id=$del_id";
				mysqli_query($conn,$del_query);
				$msg="Catagory has been deleted";
			}
		?>
			<div class="row">
				<div class="col-md-6">
					<form method="post">
						<div class="form-group">
							<label for="catagory">Catagory Name:</label>
							<input class="form-control " type="text" placeholder="Catagory Name" name="catagory">
						</div>
						<input class="form-control btn btn-success"type="submit" value="Add new catagory" name="submit">
					</form><br/><br/><br/><br/>
					<span><p style="color:red;"><?php if(isset($msg)){echo $msg;}?></p></span>
				</div>
				<div class="col-md-6">
					<table class="table">
					<?php
						$query="select * from catagory";
						$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
							
						
					?>
						<thead>
							<tr>
								<th>Sr</th>
								<th>Catagory Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						
						<tbody>
						<?php
							while($row=mysqli_fetch_array($run)){
								$catagory_id=$row['id'];
								$catagory_name=$row['catagory'];
							
						?>
							
							<tr>
								<td><?php echo $catagory_id;?></td>
								<td><?php echo $catagory_name;?></td>
								<td><a href="#">Edit</a></td>
								<td><a href="add_catagory.php?del_id=<?php echo $catagory_id;?>">Delete</a></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
					<?php
						}	
						else{
							echo'No catagory is found';
						}
						mysqli_close($conn);
					?>
				</div>
			</div>
			</div>
			</div>
		</section>
		<?php include 'includes/user_footer.php'?>
	</div>
</body>
</html>
