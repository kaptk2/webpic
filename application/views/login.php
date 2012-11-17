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
			</div>
	</div><!--/span-->
</div><!--/row-->
