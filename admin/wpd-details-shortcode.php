<?php
// Add Shortcode
function dispensary_details_shortcode() {
    global $post;

    $wpd_strain      = '';
    $wpd_shelf       = '';
    $wpdaroma        = '';
    $wpdflavor       = '';
    $wpdeffect       = '';
    $wpdsymptom      = '';
    $wpdthc          = '';
    $wpdcbd          = '';
    $wpdthca         = '';
    $wpdcba          = '';
    $wpdcbn          = '';
    $wpdcbg          = '';
    $wpdcondition    = '';
    $wpdingredients  = '';
    $wpdthcmg        = '';
    $wpdcbdmg        = '';
    $wpdservings     = '';
    $wpdnetweight    = '';
    $wpdcbdtopical   = '';
    $wpdthctopical   = '';
    $wpdsizetopical  = '';
    $wpdtime         = '';
    $wpdyield        = '';
    $wpdorigin       = '';
    $wpdseedcount    = '';
    $wpdclonecount   = '';
    $wpdthcmg2       = '';
    $wpdcbdmg2       = '';
    $wpdservings2    = '';
    $wpdmlperserving = '';
    $wpdnetweight2   = '';

    // Create the details table.
    $details_table = '<table class="wpd-details-table">';

    // Shelf type.
    if ( get_the_term_list( $post->ID, 'shelf_type', true ) ) {
        $wpd_shelf = '<tr><td><span>' . __( 'Shelf', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'shelf_type', '', ', ', '' ) . '</td></tr>';
    }

    // Strain type.
    if ( get_the_term_list( $post->ID, 'strain_type', true ) ) {
        $wpd_strain = '<tr><td><span>' . __( 'Strain', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'strain_type', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_the_term_list( $post->ID, 'aroma', true ) ) {
        $wpdaroma = '<tr><td><span>' . __( 'Aromas', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'aroma', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_the_term_list( $post->ID, 'flavor', true ) ) {
        $wpdflavor = '<tr><td><span>' . __( 'Flavors', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'flavor', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_the_term_list( $post->ID, 'effect', true ) ) {
        $wpdeffect = '<tr><td><span>' . __( 'Effects', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'effect', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_the_term_list( $post->ID, 'symptom', true ) ) {
        $wpdsymptom = '<tr><td><span>' . __( 'Symptoms', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'symptom', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_the_term_list( $post->ID, 'condition', true ) ) {
        $wpdcondition = '<tr><td><span>' . __( 'Conditions', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'condition', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_the_term_list( $post->ID, 'ingredients', true ) ) {
        $wpdingredients = '<tr><td><span>' . __( 'Ingredients', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'ingredients', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_thc', true ) ) {
        $wpdthc = '<tr><td><span>' . __( 'THC', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thc', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_cbd', true ) ) {
        $wpdcbd = '<tr><td><span>' . __( 'CBD', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbd', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_thca', true ) ) {
        $wpdthca = '<tr><td><span>' . __( 'THCA', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thca', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_cba', true ) ) {
        $wpdcba = '<tr><td><span>' . __( 'CBA', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cba', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_cbn', true ) ) {
        $wpdcbn = '<tr><td><span>' . __( 'CBN', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbn', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_cbg', true ) ) {
        $wpdcbg = '<tr><td><span>' . __( 'CBG', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbg', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_thcmg', true ) ) {
        $wpdthcmg = '<tr><td><span>' . __( 'THC mg per serving', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thcmg', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_cbdmg', true ) ) {
        $wpdcbdmg = '<tr><td><span>' . __( 'CBD mg per serving', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbdmg', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_thccbdservings', true ) ) {
        $wpdservings = '<tr><td><span>' . __( 'Servings', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thccbdservings', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_netweight', true ) ) {
        $wpdnetweight = '<tr><td><span>' . __( 'Net weight', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_netweight', true ) .'g</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_thctopical', true ) ) {
        $wpdthctopical = '<tr><td><span>' . __( 'THC', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thctopical', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_cbdtopical', true ) ) {
        $wpdcbdtopical = '<tr><td><span>' . __( 'CBD', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbdtopical', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_sizetopical', true ) ) {
        $wpdsizetopical = '<tr><td><span>' . __( 'Size', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_sizetopical', true ) .' (oz)</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_origin', true ) ) {
        $wpdorigin = '<tr><td><span>' . __( 'Origin', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_origin', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_time', true ) ) {
        $wpdtime = '<tr><td><span>' . __( 'Grow time', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_time', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_yield', true ) ) {
        $wpdyield = '<tr><td><span>' . __( 'Yield', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_yield', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_seedcount', true ) ) {
        $wpdseedcount = '<tr><td><span>' . __( 'Seeds per unit', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_seedcount', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_clonecount', true ) ) {
        $wpdclonecount = '<tr><td><span>' . __( 'Clones per unit', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_clonecount', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_tincture_thcmg', true ) ) {
        $wpdthcmg2 = '<tr><td><span>' . __( 'THC mg per serving', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_tincture_thcmg', true ) .'mg</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_tincture_cbdmg', true ) ) {
        $wpdcbdmg2 = '<tr><td><span>' . __( 'CBD mg per serving', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_tincture_cbdmg', true ) .'mg</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_tincture_thccbdservings', true ) ) {
        $wpdservings2 = '<tr><td><span>' . __( 'Servings', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_tincture_thccbdservings', true ) .'</td></tr>';
    }

    if ( get_post_meta( get_the_ID(), '_tincture_mlserving', true ) ) {
        $wpdmlperserving = '<tr><td><span>' . __( 'mL per serving', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( get_the_id(), '_tincture_mlserving', true ) . '</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_tincture_netweight', true ) ) {
        $wpdnetweight2 = '<tr><td><span>' . __( 'Net weight', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_tincture_netweight', true ) .'oz</td></tr>';
    }

    $details_table .= $wpd_shelf . $wpd_strain . $wpdaroma . $wpdflavor . $wpdeffect . $wpdsymptom . $wpdcondition . $wpdthc . $wpdthca . $wpdcbd . $wpdcba . $wpdcbn . $wpdcbg . $wpdthcmg . $wpdcbdmg . $wpdthcmg2 . $wpdcbdmg2 . $wpdmlperserving . $wpdservings . $wpdnetweight . $wpdnetweight2 . $wpdthctopical . $wpdcbdtopical . $wpdsizetopical . $wpdorigin . $wpdtime . $wpdyield . $wpdseedcount . $wpdclonecount;

    $details_table .= '</table>';

    return $details_table;
}
add_shortcode( 'dispensary_details', 'dispensary_details_shortcode' );
