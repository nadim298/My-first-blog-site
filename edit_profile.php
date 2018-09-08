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
	<link rel="stylesheet" href="edit_profile.css">
	<script src="js/bootstrap.js"></script>
	<?php
		include 'includes/db.php';
	?>
<?php
			if(isset($_POST['submit'])){
					$fullname=$_POST['fullname'];
					$mobile=$_POST['mobile'];
					$email=$_POST['email'];
					$address=$_POST['address'];
					$username=$_POST['username'];
					$password=$_POST['password'];
					
					$pp=$_FILES['pp']['name'];
					$tmp_name=$_FILES['pp']['tmp_name'];
					
					$sql = "UPDATE `members` SET `name` = '$fullname', `mobile` = '$mobile', `email` = '$email', `address` = '$address', `username` = '$username', `password` = '$password', `pp` = 'images/pp/$pp' WHERE `members`.`id` = $db_id";
					
					if (mysqli_query($conn, $sql)) {
						
						$msg= "Your profile successfully updated !";
						$path="images/pp/$pp";
						if(move_uploaded_file($tmp_name,$path)){
							copy($path,"$path");
						}
					}
					
					else {
						$msg= "Failed to update !";
					}

					mysqli_close($conn);
				}
?>
<script>
		function showImage(){
			if(this.files && this.files[0]){
				if(this.files && this.files[0]){
					var obj=new FileReader();
					obj.onload=function(data){
						var image = document.getElementById("image");
						image.src=data.target.result;
						image.style.display="block";
						
					}
					obj.readAsDataURL(this.files[0]);
				}
			}
		}
	</script>
</head>
<body>
	<div id="wrapper">
		<section>
			<?php include 'includes/user_header.php'?>
			<?php include 'includes/user_profile.php'?>
			<?php
				if($session_user_status == "Admin"){
					 include 'includes/admin_sidebar.php';
				}
				else{
					 include 'includes/member_sidebar.php';
				}
			?>
			
		<div class="container">
			<div class="maincontent_addpost">
			<div class="row">
				<div class="md-col-9">
						<h2>Edit Your Details---></h2>
						
						<hr/>	
						
						<span class="pull-right"><p style="color:red;"><?php if(isset($msg)){echo $msg;}?></p></span>
				</div>
				<div class="col-xm-12">
					<div class="formbox">
				<form method="post" enctype="multipart/form-data">
					<p>Full Name:</p>
					<input type="text" value="<?php echo $db_name?>"  required="" name="fullname"/>
					<p>Telephone No.:</p>
					<input type="text" value="<?php echo $db_mobile?>"  required="" name="mobile"/>
					<p>E-mail:</p>	<img src="" style="display:none"  id="image">
					<input type="email" value="<?php echo $db_email?>"  required="" name="email"/>
					<p>Address:</p>
					<input type="text" value="<?php echo $db_address?>"  required="" name="address"/>
					<p>Select Image:</p>
					
					<input type="file" name="pp" value="<?php echo $db_pp?>"onchange="showImage.call(this)">
					<p>Username:</p>
					<input type="text" value="<?php echo $db_username?>"  required="" name="username"/>
					<p>Password:</p>
					<input type="password" value="<?php echo $db_password?>"  required="" name="password"/>
					<input type="submit" name="submit" value="Log in" />
				</form>
			</div>
				</div>
			</div>
		
		</div>
		</div>
		</section>
		<?php include 'includes/user_footer.php'?>
	</div>
</body>
</html>
