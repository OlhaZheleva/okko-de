<?php
/**
* @package WordPress
* @subpackage clean
*/

// Підключення класичного редактора WP
add_filter('use_block_editor_for_post_type', '__return_false');

register_nav_menus( array( // Регистрируем 2 меню
	'top' => 'Верхнее меню',
	'left' => 'Нижнее'
) );

add_theme_support('post-thumbnails');
add_image_size('300-300', 300, 300, false);
add_image_size('161-234', 161, 234, false);

require_once get_template_directory() . '/inc/acf.php';
require_once get_template_directory() . '/inc/acf-helpers.php';

 
// add svg format
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');

?>