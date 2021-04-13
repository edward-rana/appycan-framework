<?php if( !defined("BASE_URL") ) die("Direct access of this file is not allowed");
/**
 * Theme Name: My Theme
 * Author: Edward Rana
 * Description: This is the demo theme for Appycan framework
 */

add_filter('site_name', function(){
	return 'My Theme';
});

add_filter('site_title_suffix', function(){
	return ' - My Theme';
});

function get_menu_items( $role = 'user', $position = 'navbar' ){

	$menu_items = array();

	if( $role == 'user' ){
		if( $position == 'navbar' ){

			$menu_items[] = array('title' => 'Home', 'url' => site_url(), 'icon' => 'fa fa-home');
			$menu_items[] = array('title' => 'User Login', 'url' => site_url('/login'), 'icon' => 'fa fa-signin');
			$menu_items[] = array('title' => 'Admin Area', 'url' => site_url('/admin'), 'icon' => 'fa fa-user');
			$menu_items[] = array('title' => 'Login', 'url' => site_url('/admin/login'), 'icon' => 'fa fa-signin');
			// $menu_items[] = array('title' => 'Super Admin', 'url' => site_url('/'.@$GLOBALS['appy_admin_segment']), 'icon' => 'fa fa-signin');

		}
		elseif( $position == 'sidebar' ){
			//Return menu items if want..
		}
		//Add more if needed

	}
	elseif( $role == 'admin' ){
		if( $position == 'navbar' ){

			$menu_items[] = array('title' => 'Home', 'url' => site_url(), 'icon' => 'fa fa-home');
			$menu_items[] = array('title' => 'User Login', 'url' => site_url('/login'), 'icon' => 'fa fa-signin');
			$menu_items[] = array('title' => 'Admin Area', 'url' => site_url('/admin'), 'icon' => 'fa fa-user');
			$menu_items[] = array('title' => 'Login', 'url' => site_url('/admin/login'), 'icon' => 'fa fa-signin');
			// $menu_items[] = array('title' => 'Super Admin', 'url' => site_url('/'.@$GLOBALS['appy_admin_segment']), 'icon' => 'fa fa-signin');
		}
		elseif( $position == 'sidebar' ){
			//Return menu items if want..
		}
		//Add more if needed
	}

	return $menu_items;
}