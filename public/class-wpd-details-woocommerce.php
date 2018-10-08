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
		'title' 	=> __( 'Details', 'wpd-details' ),
		'priority' 	=> 1,
		'callback' 	=> 'wpd_details_tab_content'
	);

	return $tabs;

}
function wpd_details_tab_content() {
	// The new tab content

	global $post;

	$my_post = get_post( $post->ID );

		echo '<h2>Details</h2>';

		echo '<table class="wpd-details-table">';
		/**
		 * Setting up WP Dispensary menu item data
		 */
		if ( get_the_term_list( $post->ID, 'aroma', true ) ) {
			$wpdaroma = '<tr><td><span>Aromas:</span></td><td>' . get_the_term_list( $post->ID, 'aroma', '', ', ', '' ) . '</td></tr>';
		} else {
			$wpdaroma = '';
		}

		if ( get_the_term_list( $post->ID, 'flavor', true ) ) {
			$wpdflavor = '<tr><td><span>Flavors:</span></td><td>' . get_the_term_list( $post->ID, 'flavor', '', ', ', '' ) . '</td></tr>';
		} else {
			$wpdflavor = '';
		}

		if ( get_the_term_list( $post->ID, 'effect', true ) ) {
			$wpdeffect = '<tr><td><span>Effects:</span></td><td>' . get_the_term_list( $post->ID, 'effect', '', ', ', '' ) . '</td></tr>';
		} else {
			$wpdeffect = '';
		}

		if ( get_the_term_list( $post->ID, 'symptom', true ) ) {
			$wpdsymptom = '<tr><td><span>Symptoms:</span></td><td>' . get_the_term_list( $post->ID, 'symptom', '', ', ', '' ) . '</td></tr>';
		} else {
			$wpdsymptom = '';
		}

		if ( get_the_term_list( $post->ID, 'condition', true ) ) {
			$wpdcondition = '<tr><td><span>Conditions:</span></td><td>' . get_the_term_list( $post->ID, 'condition', '', ', ', '' ) . '</td></tr>';
		} else {
			$wpdcondition = '';
		}

		if ( get_the_term_list( $post->ID, 'ingredients', true ) ) {
			$wpdingredients = '<tr><td><span>Ingredients:</span></td><td>' . get_the_term_list( $post->ID, 'ingredients', '', ', ', '' ) . '</td></tr>';
		} else {
			$wpdingredients = '';
		}

		if ( get_the_term_list( $post->ID, 'vendor', true ) ) {
			$wpdvendors = '<tr><td><span>Vendors:</span></td><td>' . get_the_term_list( $post->ID, 'vendor', '', ', ', '' ) . '</td></tr>';
		} else {
			$wpdvendors = '';
		}
		if ( get_post_meta( $post->ID, '_thc', true ) ) {
			$wpdthc = '<tr><td><span>THC:</span></td><td>' . get_post_meta( $post->ID, '_thc', true ) .'%</td></tr>';
		} else {
			$wpdthc = '';
		}

		if ( get_post_meta( $post->ID, '_cbd', true ) ) {
			$wpdcbd = '<tr><td><span>CBD:</span></td><td>' . get_post_meta( $post->ID, '_cbd', true ) .'%</td></tr>';
		} else {
			$wpdcbd = '';
		}

		if ( get_post_meta( $post->ID, '_thca', true ) ) {
			$wpdthca = '<tr><td><span>THCA:</span></td><td>' . get_post_meta( $post->ID, '_thca', true ) .'%</td></tr>';
		} else {
			$wpdthca = '';
		}

		if ( get_post_meta( $post->ID, '_cbd', true ) ) {
			$wpdcbd = '<tr><td><span>CBD:</span></td><td>' . get_post_meta( $post->ID, '_cbd', true ) .'%</td></tr>';
		} else {
			$wpdcbd = '';
		}

		if ( get_post_meta( $post->ID, '_cba', true ) ) {
			$wpdcba = '<tr><td><span>CBA:</span></td><td>' . get_post_meta( $post->ID, '_cba', true ) .'%</td></tr>';
		} else {
			$wpdcba = '';
		}

		if ( get_post_meta( $post->ID, '_cbn', true ) ) {
			$wpdcbn = '<tr><td><span>CBN:</span></td><td>' . get_post_meta( $post->ID, '_cbn', true ) .'%</td></tr>';
		} else {
			$wpdcbn = '';
		}

		if ( get_post_meta( $post->ID, '_cbg', true ) ) {
			$wpdcbg = '<tr><td><span>CBG:</span></td><td>' . get_post_meta( $post->ID, '_cbg', true ) .'%</td></tr>';
		} else {
			$wpdcbg = '';
		}

		if ( get_post_meta( $post->ID, '_thcmg', true ) ) {
			$wpdthcmg = '<tr><td><span>THC mg per serving:</span></td><td>' . get_post_meta( $post->ID, '_thcmg', true ) .'</td></tr>';
		} else {
			$wpdthcmg = '';
		}

		if ( get_post_meta( $post->ID, '_cbdmg', true ) ) {
			$wpdcbdmg = '<tr><td><span>CBD mg per serving:</span></td><td>' . get_post_meta( $post->ID, '_cbdmg', true ) .'</td></tr>';
		} else {
			$wpdcbdmg = '';
		}

		if ( get_post_meta( $post->ID, '_thccbdservings', true ) ) {
			$wpdservings = '<tr><td><span>Servings:</span></td><td>' . get_post_meta( $post->ID, '_thccbdservings', true ) .'</td></tr>';
		} else {
			$wpdservings = '';
		}

		if ( get_post_meta( $post->ID, '_netweight', true ) ) {
			$wpdnetweight = '<tr><td><span>Net weight:</span></td><td>' . get_post_meta( $post->ID, '_netweight', true ) .'g</td></tr>';
		} else {
			$wpdnetweight = '';
		}

		if ( get_post_meta( $post->ID, '_thctopical', true ) ) {
			$wpdthctopical = '<tr><td><span>THC:</span></td><td>' . get_post_meta( $post->ID, '_thctopical', true ) .'%</td></tr>';
		} else {
			$wpdthctopical = '';
		}

		if ( get_post_meta( $post->ID, '_cbdtopical', true ) ) {
			$wpdcbdtopical = '<tr><td><span>CBD:</span></td><td>' . get_post_meta( $post->ID, '_cbdtopical', true ) .'%</td></tr>';
		} else {
			$wpdcbdtopical = '';
		}

		if ( get_post_meta( $post->ID, '_sizetopical', true ) ) {
			$wpdsizetopical = '<tr><td><span>Size:</span></td><td>' . get_post_meta( $post->ID, '_sizetopical', true ) .' (oz)</td></tr>';
		} else {
			$wpdsizetopical = '';
		}

		if ( get_post_meta( $post->ID, '_origin', true ) ) {
			$wpdorigin    = '<tr><td><span>Origin:</span></td><td>' . get_post_meta( $post->ID, '_origin', true ) .'</td></tr>';
		} else {
			$wpdorigin = '';
		}

		if ( get_post_meta( $post->ID, '_time', true ) ) {
			$wpdtime = '<tr><td><span>Grow Time:</span></td><td>' . get_post_meta( $post->ID, '_time', true ) .'</td></tr>';
		} else {
			$wpdtime = '';
		}

		if ( get_post_meta( $post->ID, '_yield', true ) ) {
			$wpdyield = '<tr><td><span>Yield:</span></td><td>' . get_post_meta( $post->ID, '_yield', true ) .'</td></tr>';
		} else {
			$wpdyield = '';
		}

		if ( get_post_meta( $post->ID, '_seedcount', true ) ) {
			$wpdseedcount = '<tr><td><span>Seeds per unit:</span></td><td>' . get_post_meta( $post->ID, '_seedcount', true ) .'</td></tr>';
		} else {
			$wpdseedcount = '';
		}

		if ( get_post_meta( $post->ID, '_clonecount', true ) ) {
			$wpdclonecount = '<tr><td><span>Clones per unit:</span></td><td>' . get_post_meta( $post->ID, '_clonecount', true ) .'</td></tr>';
		} else {
			$wpdclonecount = '';
		}

		if ( get_post_meta( $post->ID, '_tincture_thcmg', true ) ) {
			$wpdthcmg2 = '<tr><td><span>THC per serving:</span></td><td>' . get_post_meta( $post->ID, '_tincture_thcmg', true ) .'mg</td></tr>';
		} else {
			$wpdthcmg2 = '';
		}

		if ( get_post_meta( $post->ID, '_tincture_cbdmg', true ) ) {
			$wpdcbdmg2 = '<tr><td><span>CBD per serving:</span></td><td>' . get_post_meta( $post->ID, '_tincture_cbdmg', true ) .'mg</td></tr>';
		} else {
			$wpdcbdmg2 = '';
		}

		if ( get_post_meta( $post->ID, '_tincture_thccbdservings', true ) ) {
			$wpdservings2 = '<tr><td><span>Servings:</span></td><td>' . get_post_meta( $post->ID, '_tincture_thccbdservings', true ) .'</td></tr>';
		} else {
			$wpdservings2 = '';
		}

		if ( get_post_meta( get_the_ID(), '_tincture_mlserving', true ) ) {
			$wpdmlperserving = '<tr><td><span>mL per serving:</span></td><td>' . get_post_meta( get_the_id(), '_tincture_mlserving', true ) . '</td></tr>';
		} else {
			$wpdmlperserving = '';
		}

		if ( get_post_meta( $post->ID, '_tincture_netweight', true ) ) {
			$wpdnetweight2 = '<tr><td><span>Net weight:</span></td><td>' . get_post_meta( $post->ID, '_tincture_netweight', true ) .'oz</td></tr>';
		} else {
			$wpdnetweight2 = '';
		}

		echo $wpdaroma . $wpdflavor . $wpdeffect . $wpdsymptom . $wpdcondition . $wpdvendors . $wpdthc . $wpdthca . $wpdcbd . $wpdcba . $wpdcbn . $wpdcbg . $wpdthcmg . $wpdcbdmg . $wpdthcmg2 . $wpdcbdmg2 . $wpdmlperserving . $wpdservings . $wpdnetweight . $wpdnetweight2 . $wpdthctopical . $wpdcbdtopical . $wpdsizetopical . $wpdorigin . $wpdtime . $wpdyield . $wpdseedcount . $wpdclonecount;

		echo '</table>';

	// Reset Post Data
	wp_reset_postdata();


}
