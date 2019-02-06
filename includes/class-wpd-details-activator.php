<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.wpdispensary.com
 * @since      1.0.0
 *
 * @package    WPD_Details
 * @subpackage WPD_Details/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    WPD_Details
 * @subpackage WPD_Details/includes
 * @author     WP Dispensary <deviodigital@gmail.com>
 */
class WPD_Details_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		/**
		 * Taxonomies
		 */
		wpd_details_aroma();
		wpd_details_flavor();
		wpd_details_effect();
		wpd_details_symptom();
		wpd_details_condition();
		wpd_details_ingredient();
		wpd_details_vendor();

		/**
		 * Flush Rewrite Rules
		 */
		global $wp_rewrite;
		$wp_rewrite->init();
		$wp_rewrite->flush_rules();

	}

}
