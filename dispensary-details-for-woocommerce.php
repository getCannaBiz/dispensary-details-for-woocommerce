<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://cannabizsoftware.com
 * @since             1.0.0
 * @package           Dispensary_Details
 *
 * @wordpress-plugin
 * Plugin Name:       Dispensary Details for WooCommerce
 * Plugin URI:        https://cannabizsoftware.com/product/dispensary-details-for-woocommerce
 * Description:       Add additional details to your dispensary items being sold through WooCommerce. Brought to you by <a href="https://cannabizsoftware.com" target="_blank">CannaBiz Software</a>.
 * Version:           1.0.0
 * Author:            CannaBiz Software
 * Author URI:        https://cannabizsoftware.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dispensary-details
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define version constant.
define( 'DISPENSARY_DETAILS_VERSION', '1.0.0' );

// Check if Composer's autoloader is already registered globally.
if ( ! class_exists( 'RobertDevore\WPComCheck\WPComPluginHandler' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

use RobertDevore\WPComCheck\WPComPluginHandler;

new WPComPluginHandler( plugin_basename( __FILE__ ), 'https://robertdevore.com/why-this-plugin-doesnt-support-wordpress-com-hosting/' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dispensary-details-activator.php
 */
function activate_dispensary_details() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dispensary-details-activator.php';
	Dispensary_Details_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dispensary-details-deactivator.php
 */
function deactivate_dispensary_details() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dispensary-details-deactivator.php';
	Dispensary_Details_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dispensary_details' );
register_deactivation_hook( __FILE__, 'deactivate_dispensary_details' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dispensary-details.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dispensary_details() {

	$plugin = new Dispensary_Details();
	$plugin->run();

}
run_dispensary_details();
