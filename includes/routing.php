<?php 
/**
 * @package Routing the url and including the perticular file
 * @author Edward Rana
 * @version 1.0.8
 * @since 1.0.0
 */

$seg_counter = 0;

//print_r($uri_segments);

if( @$uri_segments[0] != @$GLOBALS['appy_admin_segment'] || !@$GLOBALS['appy_admin_segment'] ){
	$Route_Theme_Dir = theme_dir();
}
else{
	unset($uri_segments[0]);
	$Route_Theme_Dir = base_dir('/Appy-Admin');
}

if( $uri_segments ){
foreach( $uri_segments as $uri_segment ){
	$next_seg = $seg_counter + 1;
 	if( isset( $uri_segments[$next_seg] ) )
 	{
 		if( file_exists( $Route_Theme_Dir.'/'.$uri_segment.'/'.$uri_segments[$next_seg].'.php' ) ){
 			$query_segments = array_slice($uri_segments, $next_seg+1);
 			//define( "CURRENT_URL", BASE_URL.'/'.implode('/', array_slice($uri_segments, 0, $next_seg+1) ) );
 			define( "CURRENT_FILE", $Route_Theme_Dir.'/'.$uri_segment.'/'.$uri_segments[$next_seg] );
 			require_once $Route_Theme_Dir.'/'.$uri_segment.'/'.$uri_segments[$next_seg].'.php';
 		}
 		elseif( file_exists( $Route_Theme_Dir.'/'.$uri_segment.'/index.php' ) ){
 			$query_segments = array_slice($uri_segments, $next_seg);
 			//define( "CURRENT_URL", BASE_URL.'/'.implode('/', array_slice($uri_segments, 0, $next_seg) ) );
 			define( "CURRENT_FILE", $Route_Theme_Dir.'/'.$uri_segment.'/index' );
 			require_once $Route_Theme_Dir.'/'.$uri_segment.'/index.php';
 		}
 		elseif( file_exists( $Route_Theme_Dir.'/'.$uri_segment.'.php' ) ){
 			$query_segments = array_slice($uri_segments, $next_seg);
 			//define( "CURRENT_URL", BASE_URL.'/'.implode('/', array_slice($uri_segments, 0, $next_seg) ) );
 			define( "CURRENT_FILE", $Route_Theme_Dir.'/'.$uri_segment );
 			require_once $Route_Theme_Dir.'/'.$uri_segment.'.php';
 		}
 		else{
 			$query_segments = array_slice($uri_segments, $seg_counter);
 			//define( "CURRENT_URL", BASE_URL.'/'.implode('/', array_slice($uri_segments, 0, $seg_counter) ) );
 			define( "CURRENT_FILE", $Route_Theme_Dir.'/'.$GLOBALS['404_page'] );
 			if( @$GLOBALS['404_page'] && file_exists( $Route_Theme_Dir.'/'.$GLOBALS['404_page'].'.php' ) )
				require_once $Route_Theme_Dir.'/'.$GLOBALS['404_page'].'.php';
			else
			  echo 'Not found!';
 		}
 		break;
 	}
 	else
 	{
 		if( file_exists( $Route_Theme_Dir.'/'.$uri_segment.'.php' ) ){
 			//define( "CURRENT_URL", BASE_URL.'/'.$uri_segment );
 			define( "CURRENT_FILE", $Route_Theme_Dir.'/'.$uri_segment );
		    require_once $Route_Theme_Dir.'/'.$uri_segment.'.php';
		}
		elseif( file_exists( $Route_Theme_Dir.'/'.$uri_segment.'/index.php' ) ){
			//define( "CURRENT_URL", BASE_URL.'/'.$uri_segment );
			define( "CURRENT_FILE", $Route_Theme_Dir.'/'.$uri_segment.'/index' );
			require_once $Route_Theme_Dir.'/'.$uri_segment.'/index.php';
		}
		else{
			//define( "CURRENT_URL", BASE_URL.'/'.$uri_segment );
			define( "CURRENT_FILE", $Route_Theme_Dir.'/'.$GLOBALS['404_page'] );
			if( @$GLOBALS['404_page'] && file_exists( $Route_Theme_Dir.'/'.$GLOBALS['404_page'].'.php' ) )
				require_once $Route_Theme_Dir.'/'.$GLOBALS['404_page'].'.php';
			else
			  echo 'Not found!';
		}
		break;
    }
	$seg_counter++;
  }
}
elseif( file_exists( $Route_Theme_Dir.'/index.php' ) ){
	define( "CURRENT_FILE", $Route_Theme_Dir.'/index' );
	require_once $Route_Theme_Dir.'/index.php';
}
else{
	echo '\'index.php is not found.';
}