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

		echo $wpdaroma . $wpdflavor . $wpdeffect . $wpdsymptom . $wpdcondition . $wpdthc . $wpdcbd . $wpdthcmg . $wpdcbdmg . $wpdservings . $wpdnetweight . $wpdthctopical . $wpdcbdtopical . $wpdsizetopical . $wpdorigin . $wpdtime . $wpdyield . $wpdseedcount . $wpdclonecount;

		echo '</table>';

	// Reset Post Data
	wp_reset_postdata();


}
