<?php
// Add Shortcode
function dispensary_details_shortcode() {
    global $post;

    $dd_strain      = '';
    $dd_shelf       = '';
    $ddaroma        = '';
    $ddflavor       = '';
    $ddeffect       = '';
    $ddsymptom      = '';
    $ddthc          = '';
    $ddcbd          = '';
    $ddthca         = '';
    $ddcba          = '';
    $ddcbn          = '';
    $ddcbg          = '';
    $ddcondition    = '';
    $ddingredients  = '';
    $ddthcmg        = '';
    $ddcbdmg        = '';
    $ddservings     = '';
    $ddnetweight    = '';
    $ddcbdtopical   = '';
    $ddthctopical   = '';
    $ddsizetopical  = '';
    $ddtime         = '';
    $ddyield        = '';
    $ddorigin       = '';
    $ddseedcount    = '';
    $ddclonecount   = '';
    $ddthcmg2       = '';
    $ddcbdmg2       = '';
    $ddservings2    = '';
    $ddmlperserving = '';
    $ddnetweight2   = '';

    // Create the details table.
    $details_table = '<table class="dispensary-details-table">';

    // Shelf type.
    if ( get_the_term_list( $post->ID, 'shelf_type', true ) ) {
        $dd_shelf = '<tr><td><span>' . __( 'Shelf', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'shelf_type', '', ', ', '' ) . '</td></tr>';
    }

    // Strain type.
    if ( get_the_term_list( $post->ID, 'strain_type', true ) ) {
        $dd_strain = '<tr><td><span>' . __( 'Strain', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'strain_type', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_the_term_list( $post->ID, 'aroma', true ) ) {
        $ddaroma = '<tr><td><span>' . __( 'Aromas', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'aroma', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_the_term_list( $post->ID, 'flavor', true ) ) {
        $ddflavor = '<tr><td><span>' . __( 'Flavors', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'flavor', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_the_term_list( $post->ID, 'effect', true ) ) {
        $ddeffect = '<tr><td><span>' . __( 'Effects', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'effect', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_the_term_list( $post->ID, 'symptom', true ) ) {
        $ddsymptom = '<tr><td><span>' . __( 'Symptoms', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'symptom', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_the_term_list( $post->ID, 'condition', true ) ) {
        $ddcondition = '<tr><td><span>' . __( 'Conditions', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'condition', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_the_term_list( $post->ID, 'ingredients', true ) ) {
        $ddingredients = '<tr><td><span>' . __( 'Ingredients', 'dispensary-details' ) . ':</span></td><td>' . get_the_term_list( $post->ID, 'ingredients', '', ', ', '' ) . '</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_thc', true ) ) {
        $ddthc = '<tr><td><span>' . __( 'THC', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thc', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_cbd', true ) ) {
        $ddcbd = '<tr><td><span>' . __( 'CBD', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbd', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_thca', true ) ) {
        $ddthca = '<tr><td><span>' . __( 'THCA', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thca', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_cba', true ) ) {
        $ddcba = '<tr><td><span>' . __( 'CBA', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cba', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_cbn', true ) ) {
        $ddcbn = '<tr><td><span>' . __( 'CBN', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbn', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_cbg', true ) ) {
        $ddcbg = '<tr><td><span>' . __( 'CBG', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbg', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_thcmg', true ) ) {
        $ddthcmg = '<tr><td><span>' . __( 'THC mg per serving', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thcmg', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_cbdmg', true ) ) {
        $ddcbdmg = '<tr><td><span>' . __( 'CBD mg per serving', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbdmg', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_thccbdservings', true ) ) {
        $ddservings = '<tr><td><span>' . __( 'Servings', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thccbdservings', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_netweight', true ) ) {
        $ddnetweight = '<tr><td><span>' . __( 'Net weight', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_netweight', true ) .'g</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_thctopical', true ) ) {
        $ddthctopical = '<tr><td><span>' . __( 'THC', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_thctopical', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_cbdtopical', true ) ) {
        $ddcbdtopical = '<tr><td><span>' . __( 'CBD', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_cbdtopical', true ) .'%</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_sizetopical', true ) ) {
        $ddsizetopical = '<tr><td><span>' . __( 'Size', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_sizetopical', true ) .' (oz)</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_origin', true ) ) {
        $ddorigin = '<tr><td><span>' . __( 'Origin', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_origin', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_time', true ) ) {
        $ddtime = '<tr><td><span>' . __( 'Grow time', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_time', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_yield', true ) ) {
        $ddyield = '<tr><td><span>' . __( 'Yield', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_yield', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_seedcount', true ) ) {
        $ddseedcount = '<tr><td><span>' . __( 'Seeds per unit', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_seedcount', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_clonecount', true ) ) {
        $ddclonecount = '<tr><td><span>' . __( 'Clones per unit', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_clonecount', true ) .'</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_tincture_thcmg', true ) ) {
        $ddthcmg2 = '<tr><td><span>' . __( 'THC mg per serving', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_tincture_thcmg', true ) .'mg</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_tincture_cbdmg', true ) ) {
        $ddcbdmg2 = '<tr><td><span>' . __( 'CBD mg per serving', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_tincture_cbdmg', true ) .'mg</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_tincture_thccbdservings', true ) ) {
        $ddservings2 = '<tr><td><span>' . __( 'Servings', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_tincture_thccbdservings', true ) .'</td></tr>';
    }

    if ( get_post_meta( get_the_ID(), '_tincture_mlserving', true ) ) {
        $ddmlperserving = '<tr><td><span>' . __( 'mL per serving', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( get_the_id(), '_tincture_mlserving', true ) . '</td></tr>';
    }

    if ( get_post_meta( $post->ID, '_tincture_netweight', true ) ) {
        $ddnetweight2 = '<tr><td><span>' . __( 'Net weight', 'dispensary-details' ) . ':</span></td><td>' . get_post_meta( $post->ID, '_tincture_netweight', true ) .'oz</td></tr>';
    }

    $details_table .= $dd_shelf . $dd_strain . $ddaroma . $ddflavor . $ddeffect . $ddsymptom . $ddcondition . $ddthc . $ddthca . $ddcbd . $ddcba . $ddcbn . $ddcbg . $ddthcmg . $ddcbdmg . $ddthcmg2 . $ddcbdmg2 . $ddmlperserving . $ddservings . $ddnetweight . $ddnetweight2 . $ddthctopical . $ddcbdtopical . $ddsizetopical . $ddorigin . $ddtime . $ddyield . $ddseedcount . $ddclonecount;

    $details_table .= '</table>';

    return $details_table;
}
add_shortcode( 'dispensary_details', 'dispensary_details_shortcode' );
