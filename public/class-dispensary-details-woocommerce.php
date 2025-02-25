<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://cannabizsoftware.com
 * @since      1.0.0
 *
 * @package    Dispensary_Details
 * @subpackage Dispensary_Details/admin
 */

/**
 * Adding in the CannaBiz Software WooConnect Details tab
 * 
 * @since  1.0.0
 * @return mixed
 */
function dispensary_details_tab( $tabs ) {

	// Adds the new tab.
	$tabs['product_details'] = [
		'title'   	=> esc_html__( 'Details', 'dispensary-details' ),
		'priority' 	=> 1,
		'callback' 	=> 'dispensary_details_tab_content'
	];

	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'dispensary_details_tab' );

/**
 * Single Product - Details tab content
 * 
 * @since  1.0.0
 * @return void
 */
function dispensary_details_tab_content() {
		// The new tab content
		global $post;

		echo '<h2>' . esc_html__( 'Details', 'dispensary-details' ) . '</h2>';

		echo do_shortcode( '[dispensary_details]' );

		// Reset Post Data
		wp_reset_postdata();
}

/**
 * Display Vendor above single product titles
 *
 * @since  1.7
 * @return void
 */
function dispensary_details_vendors_single_product_summary( $post_id ) {
    $dd_vendor = '';
	if ( get_the_term_list( $post_id, 'vendor', true ) ) {
		$dd_vendor = '<span class="dispensary-details-vendor">' . get_the_term_list( $post_id, 'vendor', '', ', ', '' ) . '</span>';
	}
	echo $dd_vendor;
}
add_action( 'woocommerce_single_product_summary', 'dispensary_details_vendors_single_product_summary', 4 );
