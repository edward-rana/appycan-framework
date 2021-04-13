<?php if( !defined("BASE_URL") ) die("Direct access of this file is not allowed");
  //Add action hook here & do action in header.php for site title of this page
  add_action('site_title', function(){
    echo 'Admin Area';
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
    <h1>Welcome to Admin Area</h1>
    <p>Simple core PHP lite version framework for maximum speed</p> 
  </div>

   <?php require_once 'navbar.php'; ?>
   
    <div class="row">

      <div class="col-sm-12">
        <p class="text-muted">&#8921; Accessing this page from <code>"<?php echo theme_dir('/admin/index.php'); ?>"</code> file, for url <code>"<?php echo site_url('/admin'); ?>"</code></p>
      </div>

       <div class="col-sm-12">
        <p class="text-muted">To create a new page for admin (or you can create other folders into <code>"<?php echo theme_dir(); ?>"</code> folder), just create a new php file into <code>"this folder (here admin)"</code> and to access this new page, browse the url like this <code>"<?php echo site_url('/{folder_name}/{created_filename}'); ?>"</code>. Here is an example if you browse <code>"<?php echo site_url('/admin/login'); ?>"</code> then will be excuted this file <code>"<?php echo theme_dir('/admin/login.php'); ?>"</code>. We have already created a login page for example, you can check it <a href="<?php echo site_url('/admin/login'); ?>"> Admin Login </a></p>
      </div>


      <div class="col-sm-12">
         <p class="text-muted">To check request segments click here</p>
        <a href="<?php echo current_url('/seg1/seg2/seg3/'); ?>"><b>Check Request Segments</b></a>
      </div>

      <?php if( query_segments() ){ ?>
      	<div class="col-sm-12">
      		<b><?php echo count(query_segments()).' Segments are requested..' ?></b>
        	<pre><?php print_r(query_segments()); ?></pre>
    	</div>
  	  <?php } ?>

    </div>

</div>

<?php require_once 'footer.php'; ?>

