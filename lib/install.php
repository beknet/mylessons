<?php
/* Install plugin && Create tables
============================================================*/
register_activation_hook( __FILE__, 'mylessons_install' );
function mylessons_install() {
  add_option( 'mylessons_db_version', BEKLESS_VERSION);
  add_option( 'Activated_Plugin', BEKLESS_PLUGIN );
} // end function

add_action( 'init', 'create_bekless' );
function create_bekless() {
	// Add new type post
  register_post_type( 'mylessons',
    array(
      'labels' => array(
        'name' => 'myLessons',
        'all_items' => 'Все уроки',
        'singular_name' => 'Урок',
        'add_new' => 'Добавить урок',
        'add_new_item' => 'Добавить новый урок',
        'edit' => 'Редактировать урок',
        'edit_item' => 'Редактировать урок',
        'new_item' => 'Новый урок',
        'view' => 'Просмотр',
        'view_item' => 'Просмотреть новый урок',
        'search_items' => 'Найти урок',
        'not_found' => 'Нет результатов поиска',
        'not_found_in_trash' => 'Нет результатов поиска',
        'parent' => 'Parent'
      ),
      'public' => true,
      'rewrite' => array( 'slug' => 'mylessons', 'width_front' => false ),
      //'capability_type' => 'page',
      'supports' => array( 'title', 'editor', 'thumbnail', 'post-formats', 'custom-fields' ),
      'taxonomies' => array( '' ),
      'menu_icon' => 'dashicons-cloud',

      'has_archive' => true
    )
  );
  // Add new taxonomy
  register_taxonomy( 'type_mylessons', array( 'mylessons' ),
    array(
      'hierarchical' => true,
      'labels' => array(
        'name' => 'Каталог тренингов',
        'all_items' => 'Все тренинги',
        'singular_name' => 'Тренинг',
        'search_items' => 'Поиск тренингов',
        'parent_item' => 'Parent קטגוריה',
        'parent_item_colon' => 'Parent קטגוריה:',
        'edit_item' => 'Редактировать тренинг',
        'update_item' => 'Обновить тренинг',
        'add_new_item' => 'Добавить новый тренинг',
        'new_item_name' => 'Название нового тренинга',
        'menu_name' => 'Каталог тренингов'
      ),
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'catalog-mylessons' )
    )
  );

} // end create_less
