<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://www.wpdispensary.com
 * @since             1.0.0
 * @package           WPD_Details
 *
 * @wordpress-plugin
 * Plugin Name:       Dispensary Details for WooCommerce
 * Plugin URI:        https://www.wpdispensary.com/downloads/dispensary-details-for-woocommerce
 * Description:       Add additional details to your dispensary items being sold through WooCommerce. Brought to you by <a href="https://www.wpdispensary.com" target="_blank">WP Dispensary</a>.
 * Version:           1.2.0
 * Author:            WP Dispensary
 * Author URI:        https://www.wpdispensary.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpd-details
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'DISPENSARY_DETAILS_VERSION', '1.2.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpd-details-activator.php
 */
function activate_wpd_details() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpd-details-activator.php';
	WPD_Details_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpd-details-deactivator.php
 */
function deactivate_wpd_details() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpd-details-deactivator.php';
	WPD_Details_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpd_details' );
register_deactivation_hook( __FILE__, 'deactivate_wpd_details' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpd-details.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpd_details() {

	$plugin = new WPD_Details();
	$plugin->run();

}
run_wpd_details();
