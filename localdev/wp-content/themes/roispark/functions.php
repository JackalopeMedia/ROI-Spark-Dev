<?php 
/*******************************/
/* Define Constants */
/*******************************/	
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT.'/img');

	
	
	
	
/*******************************/
/* Clients - Widget */
/*******************************/		
	
if (function_exists('register_sidebar')) {

	register_sidebar(array(
		'name' => 'Clients-home',
		'id'   => 'widgetized-area',
		'description'   => 'This is a widgetized area.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));

}

/*******************************/
/* Clients - Full Pager - Widget */
/*******************************/		
	
if (function_exists('register_sidebar')) {

	register_sidebar(array(
		'name' => 'Clients-full',
		'id'   => 'widgetized-area-full',
		'description'   => 'This is a widgetized area.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));

}

/*******************************/
/* About Us - Full Pager - Widget */
/*******************************/		
	
if (function_exists('register_sidebar')) {

	register_sidebar(array(
		'name' => 'about-us-area',
		'id'   => 'about-us-area',
		'description'   => 'This is a widgetized area.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));

}

/*******************************/
/* Contact Page Section - Widget */
/*******************************/		
	
if (function_exists('register_sidebar')) {

	register_sidebar(array(
		'name' => 'contact-us-area',
		'id'   => 'contact-us-area',
		'description'   => 'This is a widgetized area.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));

}

/*******************************/
/* Sidebar Testimonials - Widget */
/*******************************/		
	
if (function_exists('register_sidebar')) {

	register_sidebar(array(
		'name' => 'testimonial-area',
		'id'   => 'testimonial-area',
		'description'   => 'This is a widgetized area.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));

}
	
/*******************************/
/* Add Menus */
/*******************************/	
function register_my_menus() {
	register_nav_menus(array(
		'main-menu' => 'Main Menu',
		'category-menu' => 'Category Menu'
	));
}

add_action('init', 'register_my_menus');



/*******************************/
/* Add Theme Support for Post Thumbnails */
/*******************************/	
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(181, 83);
}


/*******************************/
/* Add Meta Boxes to the Posts */
/*******************************/	
add_action('add_meta_boxes', 'custom_add_meta_box');

function custom_add_meta_box() {
	add_meta_box(
		'portfolio_details',		// ID
		'Portfolio Entry Details',	// Title
		'custom_display_meta_box',	// Callback
		'post',						// Targeted Post type
		'normal'					// Position				
	);
}

function custom_display_meta_box($post) {
	$portfolio_description = get_post_meta($post->ID, 'portfolio_description', true);
	$portfolio_link = get_post_meta($post->ID, 'portfolio_link', true);
	$portfolio_quote = get_post_meta($post->ID, 'portfolio_quote', true);
	$portfolio_quote_author = get_post_meta($post->ID, 'portfolio_quote_author', true);
	
	// Security Check
	wp_nonce_field('portfolio_meta_nonce', 'portfolio_nonce');
	
	// Display fields
	?>
	
	<p>
		<label for="portfolio_description">Project Description:</label>
		<textarea class="widefat" name="portfolio_description" id="portfolio_description" cols="30" rows="10"><?php echo $portfolio_description; ?></textarea>
	</p>
	
	<p>
		<label for="portfolio_link">Link:</label><br />
		<input type="text" name="portfolio_link" id="portfolio_link" value="<?php echo $portfolio_link; ?>" />
	</p>
	
	<p>
		<label for="portfolio_quote">Quote:</label>
		<textarea class="widefat" name="portfolio_quote" id="portfolio_quote" cols="30" rows="10"><?php echo $portfolio_quote; ?></textarea>
	</p>
	
	<p>
		<label for="portfoliio_quote_author">Quote Author:</label><br />
		<input type="text" name="portfolio_quote_author" id="portfolio_quote_author" value="<?php echo $portfolio_quote_author; ?>" />
	</p>
	
	<?php
}

add_action('save_post', 'custom_save_portfolio_details');

function custom_save_portfolio_details($post_id) {
	// If we're doing an autosave, return
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	
	// If nonce is not present or invalid, return
	if (!isset($_POST['portfolio_nonce']) || !wp_verify_nonce($_POST['portfolio_nonce'], 'portfolio_meta_nonce')) return;
	
	// Save/Update Data
	if (isset($_POST['portfolio_description']) && $_POST['portfolio_description'] != '') {
		update_post_meta($post_id, 'portfolio_description', esc_html($_POST['portfolio_description']));
	}
	if (isset($_POST['portfolio_link']) && $_POST['portfolio_link'] != '') {
		update_post_meta($post_id, 'portfolio_link', esc_url($_POST['portfolio_link']));
	}
	if (isset($_POST['portfolio_quote']) && $_POST['portfolio_quote'] != '') {
		update_post_meta($post_id, 'portfolio_quote', esc_html($_POST['portfolio_quote']));
	}
	if (isset($_POST['portfolio_quote_author']) && $_POST['portfolio_quote_author'] != '') {
		update_post_meta($post_id, 'portfolio_quote_author', esc_html($_POST['portfolio_quote_author']));
	}
}
?>