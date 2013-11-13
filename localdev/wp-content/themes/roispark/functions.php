<?php 
/*******************************/
/* Define Constants */
/*******************************/	
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT.'/img');

	
	
	
/*******************************/
/* Add Menus */
/*******************************/	
function register_my_menus() {
	register_nav_menus(array(
		'main-menu' => 'Main Menu'
	));
}

add_action('init', 'register_my_menus');
?>