<?php
/*
Plugin Name: Mylessons
Description: Плагин который позволяет создать свою закрытую тусовку, школу. Общайтесь со своими клиентами и зарабатывайте. Создавайте закрытые курсы с помощью плагина платформы Mylessons. Ведите обучение не в закрытой группе в вконтакте, а на своем собственном сайте.
Version: 1.0.0
Author: Bekker Y & Co.
Author URI: https://bekker.co.il
*/

define( 'BEKLESS_VERSION', '1.0.0' );
define( 'BEKLESS_PLUGIN', __FILE__ );
define( 'BEKLESS_PLUGIN_BASENAME', plugin_basename( BEKLESS_PLUGIN ) );
define( 'BEKLESS_PLUGIN_NAME', trim( dirname( BEKLESS_PLUGIN_BASENAME ), '/' ) );
define( 'BEKLESS_PLUGIN_DIR', untrailingslashit( dirname( BEKLESS_PLUGIN ) ) );
define( 'BEKLESS_PLUGIN_URL', untrailingslashit( plugins_url( '', BEKLESS_PLUGIN ) ) );
define( 'BEKLESS_PLUGIN_DIR_IMAGES', untrailingslashit( plugins_url( 'images', BEKLESS_PLUGIN ) ) );

$upload_dir = wp_upload_dir();

global $bekless_db_version;
global $upload_dir;
global $wpdb;


include_once( plugin_dir_path( __FILE__ ) . 'lib/install.php');
include_once( plugin_dir_path( __FILE__ ) . 'lib/functions.php');
include_once( plugin_dir_path( __FILE__ ) . 'lib/controller.php');
include_once( plugin_dir_path( __FILE__ ) . 'lib/shortcodes.php');
include_once( plugin_dir_path( __FILE__ ) . 'lib/updater.php' );


