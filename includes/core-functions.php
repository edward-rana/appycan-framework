<?php
/**
 * @package Core Functions
 * @author Edward Rana
 * @version 1.0.8
 * @since 1.0.0
 */

header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
session_start();

//Appycan framework version
define("APPYCAN_VERSION", "1.0.8");

$HOOK_ACTIONS = array();
$HOOK_FILTERS = array();

function uri_segments()
{

    global $uri_segments;

    return $uri_segments;

}

function query_segments()
{

    global $query_segments;

    return $query_segments;

}

function appycan_version(){
    return APPYCAN_VERSION;
}

function current_url($str = '')
{
    return trim("$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/') . $str;
}

function current_file($str = '')
{
    return CURRENT_FILE . $str;
}

function base_dir($str = '')
{

    return BASE_DIR . $str;

}

function base_url($str = '')
{

    return BASE_URL . $str;

}

function upload_url($str = '')
{

    return UPLOAD_URL . $str;

}

function upload_dir($str = '')
{

    return UPLOAD_DIR . $str;

}

function site_url($str = '')
{

    return SITE_URL . $str;

}

function themes_url($str = '')
{

    return THEMES_URL . $str;

}

function themes_dir($str = '')
{

    return THEMES_DIR . $str;

}

function theme_dir($str = '')
{

    return THEME_DIR . $str;

}

function theme_url($str = '')
{

    return THEME_URL . $str;

}

function add_action($hook, $callback_func)
{

    global $HOOK_ACTIONS;

    $HOOK_ACTIONS[][$hook] = array(
        'callback_func' => $callback_func
    );

}

function do_action($hook, $params = '')
{

    global $HOOK_ACTIONS;

    //print_r($HOOK_ACTIONS);
    foreach ($HOOK_ACTIONS as $HOOK_ACTION)
    {

        if (isset($HOOK_ACTION[$hook]))
        {
            if (!$params)
                $HOOK_ACTION[$hook]['callback_func']();
            else
                $HOOK_ACTION[$hook]['callback_func']($params); 
        }
    }
}

function add_filter($hook, $callback_func)
{

    global $HOOK_FILTERS;

    $HOOK_FILTERS[][$hook] = array(
        'callback_func' => $callback_func
    );

}

function apply_filter($hook, $params = '')
{

    global $HOOK_FILTERS;
    $return = $params;
    //print_r($HOOK_FILTERS);
    foreach ($HOOK_FILTERS as $HOOK_FILTER)
    {

        if (isset($HOOK_FILTER[$hook]))
        {
            if (!$params)
                $return = $HOOK_FILTER[$hook]['callback_func']();
            else
                $return = $HOOK_FILTER[$hook]['callback_func']($params); 
        }
    }

    return $return;
}

function set_session($key, $val)
{
    $_SESSION[$key] = $val;
}

function get_session($key, $destroy = false)
{
    if (!$destroy)
    {
        return @$_SESSION[$key];
    }
    else
    {
        $sess_val = @$_SESSION[$key];
        unset($_SESSION[$key]);
        return $sess_val;
    }
}

function set_cookie($name, $value, $expire = '', $path = '', $domain = '', $secure = false, $httponly = false)
{

    if (!$expire) $expire = time() + 86400 * 30;

    setcookie($name, $value, $expire);
}

function get_cookie($key, $destroy = false)
{
    if (!$destroy)
    {
        return @$_COOKIE[$key];
    }
    else
    {
        $cookie_val = @$_COOKIE[$key];
        set_cookie($key, '', 1);
        unset( $_COOKIE[$key] );
        
        return $cookie_val;
    }
}

function esc_attr($str)
{
    $strip_text = strip_tags($str);
    $result = preg_replace('/<(\w+)[^>]*>/', '<$1>', $strip_text);
    return $result;
}

function esc_script($str)
{
    $str = preg_replace('/<script[^>]*>/', '<code>', $str);
    $str = preg_replace('/<\/script[^>]*>/', '</code>', $str);
    return $str;
}

function is_email($str)
{
    if (!filter_var($str, FILTER_VALIDATE_EMAIL))
    {
        return false;
    }
    else
    {
        return true;
    }
}

function upload_file( $name, $args = array() ){

  $ext = strtolower(pathinfo($_FILES[$name]['name'], PATHINFO_EXTENSION));
  if( $ext == 'php' )
    return array('status' => 'error', 'msg' => 'Uploading PHP file is not allowed!');

  if( @$args['allowed_types'] ){
    if( strpos($args['allowed_types'], $ext) === false ){
      return array('status' => 'error', 'msg' => 'File type \''.$ext.'\' not allowed!');
    }
  }

  if( @$args['min_size'] && $_FILES[$name]['size'] < $args['min_size'] ){ //In Bytes
     return array('status' => 'error', 'msg' => 'File size can\'t be less than '.$args['min_size'].' Bytes');
  }

  if( @$args['size'] && $_FILES[$name]['size'] != $args['size'] ){ //In Bytes
     return array('status' => 'error', 'msg' => 'File size must be '.$args['size'].' Bytes');
  }

  if( @$args['max_size'] && $_FILES[$name]['size'] > $args['max_size'] ){ //In Bytes
     return array('status' => 'error', 'msg' => 'File size can\'t be greater than '.$args['max_size'].' Bytes');
  }

  $filename = md5($_FILES[$name]['name'].rand(100, 99999).uniqid()).time().'.'.$ext;

  if( $args['folder'] ){
        $target_file = upload_dir('/').$args['folder'].'/'.$filename;
        $filepath = $args['folder'].'/'.$filename;
  }
  else{
        $target_file = upload_dir('/').$filename;
        $filepath = $filename;
  }

  move_uploaded_file($_FILES[$name]["tmp_name"], $target_file);

  return array('status' => 'success', 'msg' => 'File Uploaded!', 'filename' => $filename, 'filepath' => $filepath);
}

function redirect( $url = '' ){
    if( $url ){
        header("Location: ".$url);
        exit;
    }
    else{
        header("Refresh: 0");
        exit;
    }
}

function appy_admin_url( $str = '' ){
    return site_url('/'.$GLOBALS['appy_admin_segment']).$str;
}

function appy_admin_theme_url( $str = '' ){
    return site_url('/Appy-Admin').$str;
}

function appy_admin_dir( $str = '' ){
    return base_dir('/Appy-Admin').$str;
}

function get_user( $args1, $args2 = '' ){
    $db = new DB;
    if( $args1 > 0 && !$args2 ){
        return @$db->where('id', '=', $args1)->get('appy_users')[0];
    }
    else{
        return @$db->where($args1, '=', $args2)->get('appy_users')[0];
    }
}

function get_file( $file_id ){
    $db = new DB;
    return @$db->where('id', '=', $file_id)->get('appy_files')[0];
}

function get_profile_picture( $user_id, $size = 'thumbnail', $return_default = true ){
    $size = apply_filter('profile_picture_size', $size);

    $picture = @get_file( get_user( $user_id )->picture );

    if( $picture && in_array($picture->extension, apply_filter('allowed_profile_picture_extensions', array('png', 'jpg', 'jpeg'))) ){
        return upload_url('/'.$picture->url);
    }
    elseif( $return_default ){
        return apply_filter('default_profile_picture_url', appy_admin_theme_url('/images/user.png'));
    }
    else{
        return '';
    }
}

function get_admin_menu_items( $position ){

    $menu_items = array();

    if( $position == 'left_sidebar' ){
        $menu_items = array(
            array('title' => 'Dashboard', 'url' => appy_admin_url(), 'icon' => 'home', 'hide' => false, 'has_sub_menu' => false),
            array('title' => 'Pages', 'url' => appy_admin_url('/pages/'), 'icon' => 'layers', 'hide' => false, 'has_sub_menu' => false),
            array('title' => 'Menu', 'url' => appy_admin_url('/menu'), 'icon' => 'widgets', 'hide' => false, 'has_sub_menu' => true, 
                  'sub_menu' => array(
                      array('title' => 'Sub menu1', 'url' => appy_admin_url('/sub-menu1'), 'icon' => '', 'hide' => false, 'has_sub_menu' => false),
                      array('title' => 'Sub menu2', 'url' => appy_admin_url('/sub-menu2'), 'icon' => '', 'hide' => false, 'has_sub_menu' => true, 'sub_menu' => array(
                                array('title' => 'Sub sub  menu1', 'url' => appy_admin_url('/sub-sub-menu1'), 'icon' => '', 'hide' => false, 'has_sub_menu' => false)
                            )
                  )
            )
          )
        );
    }

    return apply_filter('admin_menu_items', $menu_items);
}

function get_pages( $args= array()){
    $db = new DB;
    return $db->get('appy_pages');
}

function get_page( $args1, $args2 = '' ){
    $db = new DB;
    if( $args1 > 0 && !$args2 ){
        return $db->where('id', '=', $args1)->get('appy_pages')[0];
    }
    else{
        return $db->where($args1, '=', $args2)->get('appy_pages')[0];
    }
}

function update_page( $args ){
    if( $args['id'] && get_page( $args['id'] ) ){
        $db = new DB;
        $db->where('id', '=', $args['id']);
        unset( $args['id'] );
        return $db->update('appy_pages', $args);
    }
}

function delete_page( $id ){
    if( $id > 0 && get_page($id) ){
        $db = new DB;
        return $db->where('id', '=', $id)->delete('appy_pages');
    }
}

function try_echo( $str, $symbol = '-' ){
    if( !$str ){
        $str = $symbol;
    }

    echo $str;
}

function insert_page( $args ){
    $db = new DB;

    $default_args = array('title' => '', 'created_date' => date('Y-m-d H:i:s'), 'user_id' => 1);

    $args = array_merge($default_args, $args);

    return $db->insert('appy_pages', $args);
}

function this_page( $filename = ''){
    if( theme_dir('/page') == current_file() ){
        $filename = @query_segments()[0];
    }
    elseif( theme_dir('/index') != current_file() ){ 
        $filename = trim(str_replace(theme_dir(), '', current_file()), '/');
    }
    else{
        $filename = 'index';
    }

    if( $filename ){
        return @get_page('filename', $filename);
    }
}

function is_appy_admin_enabled(){
    if( @$GLOBALS['appy_admin_segment'] ){
        return true;
    }
    else{
        return false;
    }
}