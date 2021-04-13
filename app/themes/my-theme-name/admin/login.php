<?php  #Dynamic Page
if( !defined("BASE_URL") ) die("Direct access of this file is not allowed");
$page = this_page();
//Hook for site title in header.php
add_action('site_title', function(){
  echo 'Login Here';
});

add_action('before_head_tag_end', function(){
		?>
		<style>
			.copyright{
				padding: 10px;
				margin: 30px 0 10px 0;
				background-color: #e9ecef;
				border-radius: 3px;
			}
			.copyright i{
				font-size: 14px;
			}
		</style>
		<?php
});

require_once 'header.php'; 

?>
<div class="container">
  <div class="jumbotron text-center">
    <h1>Welcome to Login Example</h1>
    <p>Simple core PHP lite version framework for maximum speed</p> 
  </div>
  
   <?php require_once 'navbar.php'; ?>

    <div class="row">
      <div class="col-sm-6">
        <form method="post">
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" id="email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" id="pwd">
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox"> Remember me
            </label>
          </div>
          <button type="submit" class="btn btn-success">Login</button>
        </form>
      </div>
     
    </div>

</div>

<?php require_once 'footer.php'; ?>

