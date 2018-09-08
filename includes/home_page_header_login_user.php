 <script type="text/javascript">
$(document).ready(function() {
	var s = $("#sticker");
	var pos = s.position();					   
	$(window).scroll(function() {
		var windowpos = $(window).scrollTop();
		if (windowpos >= pos.top) {
			s.addClass("stick");
		} else {
			s.removeClass("stick");	
		}
	});
});
</script>
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
				<div class="container search">
					<form action="#">
						<div class="input-group">
							<input type="text" class="form form-control" placeholder="Search here.." name="search">
							<div class="input-group-btn">
								<button class="btn btn-default btn-style" type="submit">Search</button>
							</div>
						</div>
					</form>
				</div>
				<ul class="nav navbar-nav navbar-right user">
							<li>
								<?php   
								if ($session_user_status == "Admin"){
									echo "<a  href='./admin_panel.php'> $db_username</a>";
								}
								else {
									echo "<a  href='./member_panel.php'> $db_username</a>";
								}
							?>
							</li>
							<li style="margin-top:5px;font-size:25px;color:green;"><i class="fas fa-ellipsis-v"></i></li>
					<li><a href="./logout.php">LogOut</a></li></br>
				</ul>	
			</div>
	</nav>
	<div id="sticker" class="jumbotron anti_jumbotron">
		
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