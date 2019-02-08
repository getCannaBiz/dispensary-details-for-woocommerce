<?php
// Add Shortcode
function wpd_details_shortcode() {
	global $post;

	$my_post = get_post( $post->ID );

    $details_table = '<table class="wpd-details-table">';

    /**
     * Setting up WP Dispensary menu item data
     */
    if ( get_the_term_list( $post->ID, 'shelf_type', true ) ) {
        $wpdshelftype = '<tr><td><span>' . __( 'Shelf', 'wpd-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'shelf_type', '', ', ', '' ) . '</td></tr>';
    } else {
        $wpdshelftype = '';
    }

    if ( get_the_term_list( $post->ID, 'strain_type', true ) ) {
        $wpdstraintype = '<tr><td><span>' . __( 'Strain', 'wpd-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'strain_type', '', ', ', '' ) . '</td></tr>';
    } else {
        $wpdstraintype = '';
    }

    if ( get_the_term_list( $post->ID, 'aroma', true ) ) {
        $wpdaroma = '<tr><td><span>' . __( 'Aromas', 'wpd-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'aroma', '', ', ', '' ) . '</td></tr>';
    } else {
        $wpdaroma = '';
    }

    if ( get_the_term_list( $post->ID, 'flavor', true ) ) {
        $wpdflavor = '<tr><td><span>' . __( 'Flavors', 'wpd-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'flavor', '', ', ', '' ) . '</td></tr>';
    } else {
        $wpdflavor = '';
    }

    if ( get_the_term_list( $post->ID, 'effect', true ) ) {
        $wpdeffect = '<tr><td><span>' . __( 'Effects', 'wpd-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'effect', '', ', ', '' ) . '</td></tr>';
    } else {
        $wpdeffect = '';
    }

    if ( get_the_term_list( $post->ID, 'symptom', true ) ) {
        $wpdsymptom = '<tr><td><span>' . __( 'Symptoms', 'wpd-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'symptom', '', ', ', '' ) . '</td></tr>';
    } else {
        $wpdsymptom = '';
    }

    if ( get_the_term_list( $post->ID, 'condition', true ) ) {
        $wpdcondition = '<tr><td><span>' . __( 'Conditions', 'wpd-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'condition', '', ', ', '' ) . '</td></tr>';
    } else {
        $wpdcondition = '';
    }

    if ( get_the_term_list( $post->ID, 'ingredients', true ) ) {
        $wpdingredients = '<tr><td><span>' . __( 'Ingredients', 'wpd-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'ingredients', '', ', ', '' ) . '</td></tr>';
    } else {
        $wpdingredients = '';
    }

    if ( get_the_term_list( $post->ID, 'vendor', true ) ) {
        $wpdvendors = '<tr><td><span>' . __( 'Vendor', 'wpd-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'vendor', '', ', ', '' ) . '</td></tr>';
    } else {
        $wpdvendors = '';
    }
    if ( get_post_meta( $post->ID, '_thc', true ) ) {
        $wpdthc = '<tr><td><span>' . __( 'THC', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thc', true ) .'%</td></tr>';
    } else {
        $wpdthc = '';
    }

    if ( get_post_meta( $post->ID, '_cbd', true ) ) {
        $wpdcbd = '<tr><td><span>' . __( 'CBD', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbd', true ) .'%</td></tr>';
    } else {
        $wpdcbd = '';
    }

    if ( get_post_meta( $post->ID, '_thca', true ) ) {
        $wpdthca = '<tr><td><span>' . __( 'THCA', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thca', true ) .'%</td></tr>';
    } else {
        $wpdthca = '';
    }

    if ( get_post_meta( $post->ID, '_cbd', true ) ) {
        $wpdcbd = '<tr><td><span>' . __( 'CBD', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbd', true ) .'%</td></tr>';
    } else {
        $wpdcbd = '';
    }

    if ( get_post_meta( $post->ID, '_cba', true ) ) {
        $wpdcba = '<tr><td><span>' . __( 'CBA', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cba', true ) .'%</td></tr>';
    } else {
        $wpdcba = '';
    }

    if ( get_post_meta( $post->ID, '_cbn', true ) ) {
        $wpdcbn = '<tr><td><span>' . __( 'CBN', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbn', true ) .'%</td></tr>';
    } else {
        $wpdcbn = '';
    }

    if ( get_post_meta( $post->ID, '_cbg', true ) ) {
        $wpdcbg = '<tr><td><span>' . __( 'CBG', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbg', true ) .'%</td></tr>';
    } else {
        $wpdcbg = '';
    }

    if ( get_post_meta( $post->ID, '_thcmg', true ) ) {
        $wpdthcmg = '<tr><td><span>' . __( 'THC mg per serving', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thcmg', true ) .'</td></tr>';
    } else {
        $wpdthcmg = '';
    }

    if ( get_post_meta( $post->ID, '_cbdmg', true ) ) {
        $wpdcbdmg = '<tr><td><span>' . __( 'CBD mg per serving', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbdmg', true ) .'</td></tr>';
    } else {
        $wpdcbdmg = '';
    }

    if ( get_post_meta( $post->ID, '_thccbdservings', true ) ) {
        $wpdservings = '<tr><td><span>' . __( 'Servings', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thccbdservings', true ) .'</td></tr>';
    } else {
        $wpdservings = '';
    }

    if ( get_post_meta( $post->ID, '_netweight', true ) ) {
        $wpdnetweight = '<tr><td><span>' . __( 'Net weight', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_netweight', true ) .'g</td></tr>';
    } else {
        $wpdnetweight = '';
    }

    if ( get_post_meta( $post->ID, '_thctopical', true ) ) {
        $wpdthctopical = '<tr><td><span>' . __( 'THC', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thctopical', true ) .'%</td></tr>';
    } else {
        $wpdthctopical = '';
    }

    if ( get_post_meta( $post->ID, '_cbdtopical', true ) ) {
        $wpdcbdtopical = '<tr><td><span>' . __( 'CBD', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbdtopical', true ) .'%</td></tr>';
    } else {
        $wpdcbdtopical = '';
    }

    if ( get_post_meta( $post->ID, '_sizetopical', true ) ) {
        $wpdsizetopical = '<tr><td><span>' . __( 'Size', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_sizetopical', true ) .' (oz)</td></tr>';
    } else {
        $wpdsizetopical = '';
    }

    if ( get_post_meta( $post->ID, '_origin', true ) ) {
        $wpdorigin    = '<tr><td><span>' . __( 'Origin', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_origin', true ) .'</td></tr>';
    } else {
        $wpdorigin = '';
    }

    if ( get_post_meta( $post->ID, '_time', true ) ) {
        $wpdtime = '<tr><td><span>' . __( 'Grow time', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_time', true ) .'</td></tr>';
    } else {
        $wpdtime = '';
    }

    if ( get_post_meta( $post->ID, '_yield', true ) ) {
        $wpdyield = '<tr><td><span>' . __( 'Yield', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_yield', true ) .'</td></tr>';
    } else {
        $wpdyield = '';
    }

    if ( get_post_meta( $post->ID, '_seedcount', true ) ) {
        $wpdseedcount = '<tr><td><span>' . __( 'Seeds per unit', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_seedcount', true ) .'</td></tr>';
    } else {
        $wpdseedcount = '';
    }

    if ( get_post_meta( $post->ID, '_clonecount', true ) ) {
        $wpdclonecount = '<tr><td><span>' . __( 'Clones per unit', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_clonecount', true ) .'</td></tr>';
    } else {
        $wpdclonecount = '';
    }

    if ( get_post_meta( $post->ID, '_tincture_thcmg', true ) ) {
        $wpdthcmg2 = '<tr><td><span>' . __( 'THC mg per serving', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_tincture_thcmg', true ) .'mg</td></tr>';
    } else {
        $wpdthcmg2 = '';
    }

    if ( get_post_meta( $post->ID, '_tincture_cbdmg', true ) ) {
        $wpdcbdmg2 = '<tr><td><span>' . __( 'CBD mg per serving', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_tincture_cbdmg', true ) .'mg</td></tr>';
    } else {
        $wpdcbdmg2 = '';
    }

    if ( get_post_meta( $post->ID, '_tincture_thccbdservings', true ) ) {
        $wpdservings2 = '<tr><td><span>' . __( 'Servings', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_tincture_thccbdservings', true ) .'</td></tr>';
    } else {
        $wpdservings2 = '';
    }

    if ( get_post_meta( get_the_ID(), '_tincture_mlserving', true ) ) {
        $wpdmlperserving = '<tr><td><span>' . __( 'mL per serving', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( get_the_id(), '_tincture_mlserving', true ) . '</td></tr>';
    } else {
        $wpdmlperserving = '';
    }

    if ( get_post_meta( $post->ID, '_tincture_netweight', true ) ) {
        $wpdnetweight2 = '<tr><td><span>' . __( 'Net weight', 'wpd-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_tincture_netweight', true ) .'oz</td></tr>';
    } else {
        $wpdnetweight2 = '';
    }

    $details_table .= $wpdshelftype . $wpdstraintype . $wpdaroma . $wpdflavor . $wpdeffect . $wpdsymptom . $wpdcondition . $wpdvendors . $wpdthc . $wpdthca . $wpdcbd . $wpdcba . $wpdcbn . $wpdcbg . $wpdthcmg . $wpdcbdmg . $wpdthcmg2 . $wpdcbdmg2 . $wpdmlperserving . $wpdservings . $wpdnetweight . $wpdnetweight2 . $wpdthctopical . $wpdcbdtopical . $wpdsizetopical . $wpdorigin . $wpdtime . $wpdyield . $wpdseedcount . $wpdclonecount;

    $details_table .= '</table>';

    return $details_table;
}
add_shortcode( 'wpd_details', 'wpd_details_shortcode' );
