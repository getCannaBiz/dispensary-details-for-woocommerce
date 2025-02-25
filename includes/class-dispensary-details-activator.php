<?php

/**
 * Fired during plugin activation
 *
 * @link       https://cannabizsoftware.com
 * @since      1.0.0
 *
 * @package    Dispensary_Details
 * @subpackage Dispensary_Details/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Dispensary_Details
 * @subpackage Dispensary_Details/includes
 * @author     CannaBiz Software <contact@cannabizsoftware.com>
 */
class Dispensary_Details_Activator {

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
		dispensary_details_aroma();
		dispensary_details_flavor();
		dispensary_details_effect();
		dispensary_details_symptom();
		dispensary_details_condition();
		dispensary_details_ingredient();
		dispensary_details_vendor();
		dispensary_details_shelf_type();
		dispensary_details_strain_type();

		/**
		 * Flush Rewrite Rules
		 */
		global $wp_rewrite;
		$wp_rewrite->init();
		$wp_rewrite->flush_rules();

	}

}
