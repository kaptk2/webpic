<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <div class="well sidebar-nav">
        <ul class="nav nav-list">
          <li class="nav-header">Actions</li>
          <li class="active"><a href="<?=site_url('/signup')?>">Sign Up</a></li>
          <li><a href="#">View Terms of Service</a></li>
        </ul>
        <form method="POST" action="<?=site_url('/dashboard')?>">
          <fieldset>
            <legend>Login</legend>
            <input type="text" name="user" placeholder="E-Mail Address">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" class="btn">Login</button>
          </fieldset>
        </form>
      </div><!--/.well -->
    </div><!--/span-->
