<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.wpdispensary.com
 * @since      1.0.0
 *
 * @package    WPD_Details
 * @subpackage WPD_Details/admin
 */

/**
 * Adding in the WP Dispensary WooConnect Details tab
 */
add_filter( 'woocommerce_product_tabs', 'wpd_details_tab' );
function wpd_details_tab( $tabs ) {

	// Adds the new tab

	$tabs['product_details'] = array(
		'title'   	=> __( 'Details', 'wpd-details' ),
		'priority' 	=> 1,
		'callback' 	=> 'wpd_details_tab_content'
	);

	return $tabs;
}

/**
 * Single Product - Details tab content
 */
function wpd_details_tab_content() {
		// The new tab content
		global $post;

		echo '<h2>' . __( 'Details', 'wpd-details' ) . '</h2>';

		echo do_shortcode( '[wpd_details]' );

		// Reset Post Data
		wp_reset_postdata();
}
