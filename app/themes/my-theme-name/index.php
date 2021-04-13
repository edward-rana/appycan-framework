<?php #Dynamic Page
if( !defined("BASE_URL") ) die("Direct access of this file is not allowed");
$page = this_page();

//Define custom functions/class etc in a perticular page
require_once current_file('-helper.php');

//Add action hook here & do action in header.php for site title of this page
add_action('site_title', function(){
  echo 'Welcome';
});

//Writting css for this page in header before head tag end
add_action('before_head_end', function(){
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

require_once theme_dir('/header.php'); 

?>
<div class="container">
  <div class="jumbotron text-center">
    <h1>Welcome to Appycan framework</h1>
    <p>Simple core PHP lite version framework for maximum speed</p>
    <h2><?php echo apply_filter('site_name', $GLOBALS['site_name']); ?></h2>
  </div>

    <?php require_once 'navbar.php'; ?>
    
    <div class="row">
      <div class="col-sm-12 mb-4">
        <h3>Awesome! Coding is poetry</h3>
        <h1 class="badge badge-light">Now start your coding for your site..</h1>

        <?php if( @$GLOBALS['db_connection_failed'] ) { echo '<p class="alert alert-danger mt-2 text-danger">Database connection failed!'; } ?>

        <p class="text-muted">Change your site configuration and database detailes from <code>"<?php echo base_dir('/config/config.php'); ?>"</code> file.</p>

        <p class="text-muted">Current theme files are located at <code>"<?php echo theme_dir(); ?>"</code>. Remove all files from this <code>"theme folder"</code> and upload your theme files. Or you can upload theme in themes folder and define the theme folder name as current_theme in config file.</p>

        <p class="text-muted">Custom functions can be defined in <code>"functions.php"</code> file. Located at current theme folder.</p>

      </div>

      <div class="col-sm-12">
        <p class="text-muted">&#8921; Showing data from custom function in a perticular page <code>"<?php echo my_index_page_function(); ?>"</code></p>
      </div>

       <div class="col-sm-12">
        <p class="text-muted">&#8921; Accessing this page from <code>"<?php echo theme_dir('/index.php'); ?>"</code> file, for url <code>"<?php echo site_url(); ?>"</code></p>
      </div>

       <div class="col-sm-12">
        <p class="text-muted">To create a new page, just create a new php file into <code>"<?php echo theme_dir(); ?>"</code> folder and to access this new page, browse the url like this <code>"<?php echo site_url('/{created_filename}'); ?>"</code>. Here is an example if you browse <code>"<?php echo site_url('/login'); ?>"</code> then will be excuted this file <code>"<?php echo theme_dir('/login.php'); ?>"</code>. We have already created a user login page for example, you can check it <a href="<?php echo site_url('/login'); ?>"> User Login </a></p>
      </div>
     
    </div>

</div>

<?php require_once theme_dir('/footer.php'); ?>

