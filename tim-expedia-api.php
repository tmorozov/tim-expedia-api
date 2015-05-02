<?php
/*
Plugin Name: Tim Expedia Api
Description: This plugin allows to query Expedia Affiliate Network API
Author: Tymur Morozov
Version: 1.0
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

define( 'TIMEXPAPI_VERSION', '1.0' );
define( 'TIMEXPAPI__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'TIMEXPAPI__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


// add Options Page
require_once( TIMEXPAPI__PLUGIN_DIR . 'options-page.php' );
new TimExpediaApiOptionsPage;

// if ( is_admin() ) {
// }

// register search widget
require_once( TIMEXPAPI__PLUGIN_DIR . 'widget-search.php' );
function register_timexpapi_widgets() {
  register_widget("TimExpediaApiSearchWidget");
}
add_action( 'widgets_init', 'register_timexpapi_widgets' );