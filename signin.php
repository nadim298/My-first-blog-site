<?php
	include 'includes/db.php';
	ob_start();
	session_start();
	$conn=mysqli_connect($server,$username,$password,$database);
	if(!$conn){
		echo ("Error connection: ".mysqli_connect_error());
	}
	
	if(isset($_POST['submit'])){
			$user=$_POST['username'];
			$pass=$_POST['password'];
			
			$query=mysqli_query($conn,"SELECT * FROM members WHERE username='$user' AND password='$pass'");
			$member_status=mysqli_fetch_array($query);
			
			if($member_status['status']=="Admin"){
				header('location:admin_panel.php');
				$_SESSION['username']=$user;
				$_SESSION['status']="Admin";
			}
			else if($member_status['status']=="Member"){
				header('location:member_panel.php');
				$_SESSION['username']=$user;
				$_SESSION['status']="Member";
			}
			else{
				$msg="Invalid Details !";
			}
			
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
	<link rel="stylesheet" href="signin.css">
	<link rel="stylesheet" href="sitename.css">
	
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
					<li style="margin-left:15px;"><a href="registration.php">Registration</a></li>
				</ul>	
			</div>
	</nav>

	<div class="form_container">
	<div class="title">
		<h1>Sign In Form</h1>
	</div>
		<div class="left"></div>
		<div class="right">
			<div class="formbox">
			
				<form method="post">
				<span class="pull-right"><p style="color:red;"><?php if(isset($msg)){echo $msg;}?></p></span>
					<p>Username</p>
					<input type="text" placeholder="Username"  required="" name="username"/>
					<p>Password</p>
					<input type="password" placeholder="Password"  required="" name="password"/>
					<input type="submit" name="submit" value="Log in" />
				</form>
			</div>
		</div>
	</div>
	<?php include 'includes/home_page_footer.php'?>
</body>
</html>