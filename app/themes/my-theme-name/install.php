<?php if( !defined("BASE_URL") ) die("Direct access of this file is not allowed");

//Install the theme..

$db = new DB_Connection;
if( $db->is_table_exists('appy_products') ) //Table created for this Theme or not
{
	redirect(site_url());
}

echo 'Installing..';

$cols = array('id int NOT NULL PRIMARY KEY', 'name varchar(400) NOT NULL', 'slug varchar(400) NOT NULL', 'price int');
$db->create_table('appy_products', $cols);

echo '<br>Installed successfully!';