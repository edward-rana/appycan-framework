<?php 
/**
 * @package Url & Dir setups
 * @author Edward Rana
 * @version 1.0.8
 * @since 1.0.0
 */ 

$uri_segments = array();

$query_segments = array();

//print_r($_SERVER);
$query_string = '';

//print_r($_SERVER);

if( isset( $_SERVER['QUERY_STRING'] ) && strpos($_SERVER['QUERY_STRING'], 'path=') !== false ){

	$query_string = rtrim( str_replace('path=', '', $_SERVER['QUERY_STRING']), '/\\');
}

if( strpos($query_string, '&') !== false ){
	$query_string = explode('&', $query_string)[0];
}

$uri_segments = @array_filter( explode("/", $query_string, PHP_URL_PATH) );

if( !defined("BASE_URL") )

	define( "BASE_URL", $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST']. str_replace('/index.php', '', $_SERVER['PHP_SELF'] ) );


if( !defined("BASE_DIR") )

	define( "BASE_DIR", str_replace('/index.php', '', $_SERVER['SCRIPT_FILENAME']) );

if( !defined("SITE_URL") )

	define( "SITE_URL", BASE_URL );

if( !defined("APP_URL") )

	define( "APP_URL", BASE_URL.'/app' );

if( !defined("APP_DIR") )

	define( "APP_DIR", BASE_DIR.'/app' );

if( !defined("THEMES_URL") )

	define( "THEMES_URL", APP_URL.'/themes' );

if( !defined("THEMES_DIR") )

	define( "THEMES_DIR", APP_DIR.'/themes' );

if( !defined("PLUGINS_URL") )

	define( "PLUGINS_URL", APP_URL.'/plugins' );

if( !defined("PLUGINS_DIR") )

	define( "PLUGINS_DIR", APP_DIR.'/plugins' );

if( !defined("UPLOAD_URL") )

	define( "UPLOAD_URL", APP_URL.'/uploads' );

if( !defined("UPLOAD_DIR") )

	define( "UPLOAD_DIR", APP_DIR.'/uploads' );


if( !defined("THEME_URL") ){
	define( "THEME_URL", THEMES_URL.'/'.$GLOBALS['current_theme'] );
}

if( !defined("THEME_DIR") ){
	define( "THEME_DIR", THEMES_DIR.'/'.$GLOBALS['current_theme'] );
}