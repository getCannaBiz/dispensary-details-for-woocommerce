<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://cannabizsoftware.com
 * @since      1.0.0
 *
 * @package    Dispensary_Details
 * @subpackage Dispensary_Details/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Dispensary_Details
 * @subpackage Dispensary_Details/includes
 * @author     CannaBiz Software <contact@cannabizsoftware.com>
 */
class Dispensary_Details_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'dispensary-details',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
