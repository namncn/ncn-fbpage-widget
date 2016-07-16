<?php
/*
Plugin Name: NCN Facebook Page Widget
Plugin URI: http://facebook.com/12a4.love.t
Author: Nam NCN
Author URI: http://facebook.com/truongvannam.ncn
Version: 1.0.0
Description: Facebook page widget plugin by Nam NCN. You can use on sidebar.
Tags: widget, facebook..
Text Domain: namncn
Domain Path: /languages/
*/

define( 'NCN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'NCN_DIR_URL', plugin_dir_url( __FILE__ ) );

load_plugin_textdomain( 'namncn', false, NCN_DIR_PATH . '/languages' );

if ( ! function_exists( 'ncn_loader' ) ) {
	/**
	 * Require file.
	 */
	function ncn_loader() {
		require_once NCN_DIR_PATH . '/inc/ncn-fbpage-widget-class.php';
		require_once NCN_DIR_PATH . '/vendor/wm-settings/plugin.php';
		require_once NCN_DIR_PATH . '/inc/ncn-fbpage-widget-setting.php';
	}
	add_action( 'plugins_loaded', 'ncn_loader' );
}