<?php 
/**
 * @package Init
 * @author Edward Rana
 * @version 1.0.8
 * @since 1.0.0
 */

require_once 'config/config.php';
require_once 'urls.php';
require_once 'database/connection.php';
require_once 'core-functions.php';

if( file_exists(theme_dir('/functions.php')) )
   require_once theme_dir('/functions.php');

require_once 'routing.php';
