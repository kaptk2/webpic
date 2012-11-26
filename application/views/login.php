	<div class="span9">
		<p>
			<?php if($this->session->flashdata('error')) : ?>
				<div class="alert">
					<a class="close" data-dismiss="alert">×</a>
					<?=$this->session->flashdata('error')?>
				</div>
			<?php endif; ?>
		</p>
		    <div class="hero-unit">
				<h1>Not Already A User?</h1>
				<p>Get started with Webpic by signing up!</p>
				<p>
					<form method="POST" action="<?=site_url('/signup')?>">
					  <fieldset>
						<legend>Signup</legend>
						<label>User Name</label>
						<input type="text" name="user" placeholder="E-Mail Address">
						<label>Password</label>
						<input type="password" name="password1" placeholder="Password">
						<label>Confirm Password</label>
						<input type="password" name="password2" placeholder="Password Again">
						<br>
						<button type="submit" class="btn btn-primary btn-large">Signup</button>
					  </fieldset>
					</form>
				</p>
				<p>
					<!--Scroller Start-->
					<div id="slider" class="carousel slide">
						<div class="carousel-inner">
							<?php
							$images = glob("/home/cscrmc/csc380.coaldiver.org/carterj/webpic/users/jacob/default/*.jpg");
							foreach($images as $image)
							{
								$image = 'http://csc380.coaldiver.org/carterj/webpic/users/jacob/default/'.basename($image);
								echo '<div class="item"><img src="'.$image.'"></div>';
							}
							?>
						</div>
						<a class="carousel-control left" href="#slider" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#slider" data-slide="next">&rsaquo;</a>
						<script type="text/javascript">
							$(document).ready(function(){
								$(".slider").carousel({
									interval: 1000
								});
							});
						</script>
					</div>
					<!--End of Scroller-->
				</p>
			</div>
	</div><!--/span-->
</div><!--/row-->

