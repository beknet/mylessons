<?php
/* SHORTCODES
=========================================*/
add_shortcode('mylessons_last', 'shortcode_templ_mylessons_last_function');
function shortcode_templ_mylessons_last_function() {
  // [mylessons_last forcatid="5" count=""]
  wp_register_style( 'mylessons-mainstyle', plugins_url('/css/mylessons.css', __FILE__) );
  wp_enqueue_style( 'mylessons-mainstyle' );

  if($argmaker['forcatid']){ $catID  = $argmaker['forcatid']; }else{ $catID = null; }

  include plugin_dir_path( __FILE__ ) . 'templ/shortcode-templ-mylessons-last.php';
}

add_shortcode('mylessons_turbo', 'shortcode_templ_mylessons_turbo_function');
function shortcode_templ_mylessons_turbo_function( $argmaker ) {
  // [mylessons_turbo catid='' count='' grid='' title=''] [mylessons_turbo catid="5" count="1" grid=" title="]
  wp_register_style( 'mylessons-mainstyle', plugins_url('/css/mylessons.css', __FILE__) );
  wp_enqueue_style( 'mylessons-mainstyle' );

  //var_dump($argmaker);
  if($argmaker['catid']){ $catID  = $argmaker['catid'];           }else{ $catID = null; }
  if($argmaker['count']){ $count  = intval($argmaker['count']);   }else{ $count = null; }
  if($argmaker['grid'] ){ $grid   = intval($argmaker['grid']);    }else{ $grid  = null; }
  if($argmaker['title']){ $title  = trim($argmaker['title']);     }else{ $title = null; }

  include plugin_dir_path( __FILE__ ) . 'templ/shortcode-templ-mylessons-turbo.php';
}

add_shortcode('mylessons_page_all', 'shortcode_templ_mylessons_page_all');
function shortcode_templ_mylessons_page_all( $argtempl ) {
  //[mylessons_page_all]
  include plugin_dir_path( __FILE__ ) . 'templ/shortcode-templ-mylessons-page-all.php';
}