<div class="col-md-4 templete_popular">
					<div class="widgets">
						<div class="popular">
							<h4>Popular Posts</h4>
							<hr/>
							<?php
							
						$query="select * from post where status='Publish' order by views desc limit 3";
						$run=mysqli_query($conn,$query);
						if(mysqli_num_rows($run)>0){
							while($row=mysqli_fetch_array($run)){
								$id=$row['id'];
								
								$date=getdate($row['date']);
								$day=$date['mday'];
								$month=$date['month'];
								$year=$date['year'];
								
								$title=$row['title'];
								$post_image=$row['post_image'];
							?>
							<div class="row">
								<div class="col-xs-4">
									<a href="post.php?post_id=<?php echo $id;?>"><img src="<?php echo $post_image;?>" alt="post logo"></a>
									
								</div>
								<div class="col-xs-8 details">
									<a href="post.php?post_id=<?php echo $id;?>"><h4><?php echo ucfirst($title); ?></h4></a>
									<p><i class="fas fa-clock" style="margin-right:5px;"></i><?php echo "$day $month $year";?></p>
								</div>					
							</div>
							<hr/>
							<?php
						}
						}
						else{
						echo '<center style="color:white;font-size:35px;">No post!</center>';
							}
						?>
						</div>
					</div>
				</div>