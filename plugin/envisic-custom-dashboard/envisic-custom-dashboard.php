<?php
/*
Plugin Name: Envisic Custom Dashboard
Plugin URL: http://www.envisic.nl
Description: Custom dashboard for wordpress - based on work by Remi Corson - http://remicorson.com
Version: 0.2
Author: Herko Baarslag
Author URI: http://www.envisic.nl
Contributors: corsonr
Text Domain: rc_scd
*/

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/

// plugin folder url
if(!defined('RC_SCD_PLUGIN_URL')) {
	define('RC_SCD_PLUGIN_URL', plugin_dir_url( __FILE__ ));
}

/*
|--------------------------------------------------------------------------
| MAIN CLASS
|--------------------------------------------------------------------------
*/

class rc_sweet_custom_dashboard {
 
	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/
 
	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
    function __construct() {
	
    add_action('admin_menu', array( &$this,'rc_scd_register_menu') );
    add_action('load-index.php', array( &$this,'rc_scd_redirect_dashboard') );
 
	} // end constructor
 
	function rc_scd_redirect_dashboard() {
	
		if( is_admin() ) {
			$screen = get_current_screen();
			
			if( $screen->base == 'dashboard' ) {

				wp_redirect( admin_url( 'index.php?page=custom-dashboard' ) );
			
				
			}
		
		}
		

	}
	
	
	
	function rc_scd_register_menu() {
		add_dashboard_page( 'Welkom', 'Welkom', 'read', 'custom-dashboard', array( &$this,'rc_scd_create_dashboard') );
	}
	
	function rc_scd_create_dashboard() {
		include_once( 'custom-dashboard.php'  );
	}

 
}
 
// instantiate plugin's class
$GLOBALS['sweet_custom_dashboard'] = new rc_sweet_custom_dashboard();

?>