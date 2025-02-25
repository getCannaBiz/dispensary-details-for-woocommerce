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
function wpd_details_tab( $tabs ) {

	// Adds the new tab.
	$tabs['product_details'] = [
		'title'   	=> esc_html__( 'Details', 'wpd-details' ),
		'priority' 	=> 1,
		'callback' 	=> 'wpd_details_tab_content'
	];

	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'wpd_details_tab' );

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

/**
 * Display Vendor above single product titles
 *
 * @since 1.7
 */
function wpd_details_vendors_single_product_summary( $post_id ) {
	if ( get_the_term_list( $post_id, 'vendor', true ) ) {
		$wpd_vendor = '<span class="wpd-details-vendor">' . get_the_term_list( $post_id, 'vendor', '', ', ', '' ) . '</span>';
	} else {
		$wpd_vendor = '';
	}
	echo $wpd_vendor;
}
add_action( 'woocommerce_single_product_summary', 'wpd_details_vendors_single_product_summary', 4 );
