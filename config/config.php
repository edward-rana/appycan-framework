<?php 
/**
* @package Config
* @author Edward Rana
* @version 1.0.8
* @since 1.0.0
*/

define("DB_HOSTNAME", "localhost");

define("DB_USERNAME", "DB_USERNAME");

define("DB_PASSWORD", "DB_PASSWORD");

define("DB_DATABASE", "DATABASE_NAME");

date_default_timezone_set("Asia/Kolkata"); //India time (GMT+5:30)

/**----------------------------------------------------------------------*
* BASE_URL can be defined manually
*------------------------------------------------------------------------*
* If not defined manually then will fetch from SERVER on every page load 
*------------------------------------------------------------------------*
* BASE_URL and SITE_URL is same
**-----------------------------------------------------------------------*/

//define( "BASE_URL", 'https://yoursite.com' );

/**----------------------------------------------------------------------*
* Global array, use/modify anywhere
**-----------------------------------------------------------------------*/
$GLOBALS = array(
	/**------------------------------------------------------------------*
	* Define folder name of your current theme
	**-------------------------------------------------------------------*/
	'current_theme' 	    => 'my-theme-name', //Can be changed by filter
	//'current_theme' 	   => 'Appy-StoreTheme',

	/**------------------------------------------------------------------*
	* Define 404 page filename without extension
	**-------------------------------------------------------------------*/
	'404_page' 			     => '404-page',

	/**------------------------------------------------------------------*
	* Site name
	**-------------------------------------------------------------------*/
	'site_name' 		     => 'Appycan',

	/**------------------------------------------------------------------*
	* Site title suffix. Will append to site title
	**-------------------------------------------------------------------*/
	'site_title_suffix' 	 => ' - Appycan',

	/**------------------------------------------------------------------*
	* Super admin url first segment //Can be changed by filter
	**-------------------------------------------------------------------*/
	//'appy_admin_segment' 	 => 'super-admin',
);
