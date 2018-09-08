<?php
			include 'includes/db.php';
						 if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
				
				}
				
				if(isset($_POST['submit'])){
					$fullname=$_POST['fullname'];
					$registration_date=time();
					$mobile=$_POST['mobile'];
					$email=$_POST['email'];
					$address=$_POST['address'];
					$username=$_POST['username'];
					$password=$_POST['password'];
							
					
					$pp=$_FILES['pp']['name'];
					$tmp_name=$_FILES['pp']['tmp_name'];
					
					$sql = "INSERT INTO members (name,	registration_date,mobile,email,address,username,password,status,pp)
					VALUES ('$fullname','$registration_date','$mobile','$email','$address','$username','$password','Member','images/pp/$pp')";
					
					if (mysqli_query($conn, $sql)) {
						
						$msg="Registration successfull";
						$path="images/pp/$pp";
						if(move_uploaded_file($tmp_name,$path)){
							copy($path,"$path");
						}
					}
					
					else {
						$msg="Failed";
					}

					mysqli_close($conn);
				}
				
		?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.css">	
	<link rel="stylesheet" href="css/bootstrap.min.js">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="registration.css">
	<link rel="stylesheet" href="sitename.css">
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
	<nav class="navbar navbar-default navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-logo">
					<img src="images/logo.png" alt="logo"/>
				</div>
				<div class="navbar-header">
					<div class="stage">
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <a href="index.php"><div class="layer"></div></a>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
</div>
				</div>
				<ul class="nav navbar-nav navbar-right user">
					<li style="margin-left:15px;"><a href="signin.php">Sign In</a></li>
				</ul>	
			</div>
	</nav>

	<div class="form_container">
	<div class="title">
		<h1>Registration Form</h1>
	</div>
		
			<div class="formbox">
				<form method="post" enctype="multipart/form-data">
					<p>Full Name:</p><span class="pull-right"><p style="color:red;"><?php if(isset($msg)){echo $msg;}?></p></span>
					<input type="text" placeholder="Your Full Name.."  required="" name="fullname"/>
					<p>Telephone No.:</p>
					<input type="text" placeholder="Telephone No."  required="" name="mobile"/>
					<p>E-mail:</p><img src="" style="display:none"  id="image">
					<input type="email" placeholder="Your Email Address.."  required="" name="email"/>
					<p>Address:</p>
					<input type="text" placeholder="Type your address.."  required="" name="address"/>
					<p>Select Image:</p>
					
					<input type="file" name="pp" onchange="showImage.call(this)">
					<p>Username:</p>
					<input type="text" placeholder="Set a username.."  required="" name="username"/>
					<p>Password:</p>
					<input type="password" placeholder="Set a password.."  required="" name="password"/>
					<input type="submit" name="submit" value="Log in" />
				</form>
			</div>
	</div>
	<?php include 'includes/home_page_footer.php'?>
</body>
</html>