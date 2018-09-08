<div class="jumbotron">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div id="name" class="pull-right">
						<h3><?php echo $db_name;?></h3>
					</div>
				</div>
				<div class="col-md-3">
					<div id="pp" class="pull-right">
						<img src="<?php echo $db_pp;?>" alt="Profile Photo">
					</div>
				</div>
				<div class="col-md-5">
					<div class="row">
						<div class="col-sm-8">
							<div id="details" class="pull-left">
								<p>ID: <?php echo $db_id;?></p>
								<p>Username: <?php echo $db_username;?></p>
								<p>Email: <?php echo $db_email;?></p>
								<p>Telephone: <?php echo $db_mobile;?></p>
							</div>
						</div>
						<div class="col-sm-4">
							<div id="buttons">
								<div class="row">
									<a href="./edit_profile.php"><button class="btn btn-primary" type="submit">Edit Profile</button></a>
									
									<?php   
								if ($session_user_status == "Admin"){
									echo "<a  href='./admin_inbox.php'><button class='btn btn-primary' type='submit' >Inbox</button></a>";
								}
								else {
									echo "<a  href='./member_inbox.php'><button class='btn btn-primary' type='submit' >Inbox</button></a>";
								}
							?>
									
								</div>
								
							</div>
						</div>
					</div>
					</div>
					
			</div>			
		</div>
	</div>