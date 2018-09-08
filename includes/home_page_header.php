 <!----><script type="text/javascript">
$(document).ready(function() {
	var s = $("#sticker");
	var s2 = $("#sticker2");
	var pos = s.position();					   
	var pos2 = s2.position();					   
	$(window).scroll(function() {
		var windowpos = $(window).scrollTop();
		if (windowpos >= pos.top && windowpos >= pos2.top) {
			s.addClass("stick");
			s2.addClass("stick2");
		} else {
			s.removeClass("stick");	
			s2.removeClass("stick2");	
		}
	});
});
</script>
<nav class="navbar navbar-default navbar-inverse ">
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
				<div class="container search">
					<form action="index.php" method="post">
						<div class="input-group">
							<input type="text" class="form form-control" placeholder="Search here.." name="search-title">
							<div class="input-group-btn">
								<button class="btn btn-default btn-style" type="submit" name="search">Search</button>
							</div>
						</div>
					</form>
				</div>
				<ul class="nav navbar-nav navbar-right user">
					<li class="active" style="border-right:3px solid green;"><a href="#">Guest</a></li>
					<li><a href="signin.php">Sign In</a></li></br>
					<li style="margin-left:15px;"><a href="registration.php">Registration</a></li>
				</ul>	
			</div>
	</nav>
	<div id="sticker" class="jumbotron anti_jumbotron" >
		
		<div class="container">
			
				
				<div class="container topic">
				<ul class="nav nav-tabs">
							<li><a href="index.php">Home</a></li>
							<li><a href="contact_us.php">Contact</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="terms_condition.php">Term & Condition</a></li>
				</ul>
			</div>
		</div>	
	</div>
	<div id="menu_style">
	<div id="sticker2"  class="dropdown "  >
  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Catagories
  <span class="caret"></span></button>
  <ul class="dropdown-menu anti_dropdown_style" >
  <a href="index.php"><li>All Posts</li></a>	
  <?php
  
							
								$cat_query="select * from catagory";
								$cat_run=mysqli_query($conn,$cat_query);
								if(mysqli_num_rows($cat_run)>0){
									while($cat_row=mysqli_fetch_array($cat_run)){
										$cat_name=$cat_row['catagory'];
								
							?>
    <a href="catagory_post.php?cat_name=<?php echo $cat_name?>"><li><?php echo $cat_name;?></li></a>
	<?php 
			}
								}
								else{
									echo '<a href=""><li>No catagory</li></a>';
								}
								mysqli_close($conn);
	?>
  </ul>
</div>
</div>

