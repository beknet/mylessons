<?php
/* Controller pages templetes
=========================================*/
add_filter( 'template_include', 'include_template_function', 1 );
function include_template_function( $template_path ) {
  // Add new styles & js
  wp_register_style( 'mylessons-mainstyle', plugins_url('/css/mylessons.css', __FILE__) );
  wp_register_style( 'mylessons-lightbox', plugins_url('/css/lightbox.css', __FILE__) );
	wp_register_script('mylessons-js', plugins_url('js/lightbox.min.js', __FILE__), array('jquery'), '1.0', true );

	wp_enqueue_style( 'mylessons-mainstyle' );
  wp_enqueue_style( 'mylessons-lightbox' );
  wp_enqueue_script('mylessons-js');

  if ( get_post_type() == 'mylessons' ) {
    if ( is_single() ) {
      // Checks if the file exists in the theme first, otherwise serve the file from the plugin
      if ( $theme_file = locate_template( array ( 'templ/single-mylesson.php' ) ) ) {
        $template_path = $theme_file;
      } else {
        $template_path = plugin_dir_path( __FILE__ ) . 'templ/single-mylesson.php';
      }
    }elseif( is_archive() == 'mylessons' ){
    	$template_path = plugin_dir_path( __FILE__ ) . 'templ/catalog-mylessons.php';
    }
  }
  return $template_path;
}