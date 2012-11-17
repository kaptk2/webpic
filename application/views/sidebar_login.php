<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <div class="well sidebar-nav">
        <form method="POST" action="<?=site_url('/dashboard')?>">
          <fieldset>
            <legend>Login</legend>
            <label>User Name</label>
            <input type="text" name="user" placeholder="E-Mail Address">
            <label>Password</label>
            <input type="password" name="password">
            <br />
            <button type="submit" class="btn">Login</button>
          </fieldset>
        </form>
      </div><!--/.well -->
    </div><!--/span-->
