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
 * Compound Details metabox
 *
 * Adds the compound details metabox to specific custom post types
 *
 * @since    1.9.9
 */
function add_compounddetails_metaboxes() {
	$screens = apply_filters( 'wpd_details_compound_details_screens', [ 'product' ] );

	foreach ( $screens as $screen ) {
		add_meta_box(
			'wpd_details_compounds',
			__( 'Compound Details', 'wpd-details' ),
			'wpd_details_compounddetails',
			$screen,
			'normal',
			'default'
		);
	}

}

add_action( 'add_meta_boxes', 'add_compounddetails_metaboxes' );

/**
 * Building the metabox
 */
function wpd_details_compounddetails() {
	global $post;

	/** Noncename needed to verify where the data originated */
	echo '<input type="hidden" name="compounddetailsmeta_noncename" id="compounddetailsmeta_noncename" value="' .
	wp_create_nonce( plugin_basename( __FILE__ ) ) . '" />';

	/** Get the thccbd data if its already been entered */
	$thc    = get_post_meta( $post->ID, '_thc', true );
	$thca   = get_post_meta( $post->ID, '_thca', true );
	$cbd    = get_post_meta( $post->ID, '_cbd', true );
	$cba    = get_post_meta( $post->ID, '_cba', true );
	$cbn    = get_post_meta( $post->ID, '_cbn', true );
	$cbg    = get_post_meta( $post->ID, '_cbg', true );

	/** Echo out the fields */
	echo '<div class="compoundbox">';
	echo '<p>' . __( 'THC', 'wpd-details' ) . ' %</p>';
	echo '<input type="text" name="_thc" value="' . $thc  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="compoundbox">';
	echo '<p>' . __( 'THCA', 'wpd-details' ) . ' %</p>';
	echo '<input type="text" name="_thca" value="' . $thca  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="compoundbox">';
	echo '<p>' . __( 'CBD', 'wpd-details' ) . ' %</p>';
	echo '<input type="text" name="_cbd" value="' . $cbd  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="compoundbox">';
	echo '<p>' . __( 'CBA', 'wpd-details' ) . ' %</p>';
	echo '<input type="text" name="_cba" value="' . $cba  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="compoundbox">';
	echo '<p>' . __( 'CBN', 'wpd-details' ) . ' %</p>';
	echo '<input type="text" name="_cbn" value="' . $cbn  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="compoundbox">';
	echo '<p>' . __( 'CBG', 'wpd-details' ) . ' %</p>';
	echo '<input type="text" name="_cbg" value="' . $cbg  . '" class="widefat" />';
	echo '</div>';

}

/**
 * Save the Metabox Data
 */
function wpd_details_save_compounddetails_meta( $post_id, $post ) {

	/**
	 * Verify this came from the our screen and with proper authorization,
	 * because save_post can be triggered at other times
	 */
	if ( ! wp_verify_nonce( $_POST['compounddetailsmeta_noncename'], plugin_basename( __FILE__ ) ) ) {
		return $post->ID;
	}

	/** Is the user allowed to edit the post or page? */
	if ( ! current_user_can( 'edit_post', $post->ID ) ) {
		return $post->ID;
	}

	/**
	 * OK, we're authenticated: we need to find and save the data
	 * We'll put it into an array to make it easier to loop though.
	 */

	$thccbd_meta['_thc']  = esc_html( $_POST['_thc'] );
	$thccbd_meta['_thca'] = esc_html( $_POST['_thca'] );
	$thccbd_meta['_cbd']  = esc_html( $_POST['_cbd'] );
	$thccbd_meta['_cba']  = esc_html( $_POST['_cba'] );
	$thccbd_meta['_cbn']  = esc_html( $_POST['_cbn'] );
	$thccbd_meta['_cbg']  = esc_html( $_POST['_cbg'] );

	/** Add values of $compounddetails_meta as custom fields */

	foreach ( $thccbd_meta as $key => $value ) { /** Cycle through the $thccbd_meta array! */
		if ( 'revision' === $post->post_type ) { /** Don't store custom data twice */
			return;
		}
		$value = implode( ',', (array) $value ); // If $value is an array, make it a CSV (unlikely)
		if ( get_post_meta( $post->ID, $key, false ) ) { // If the custom field already has a value
			update_post_meta( $post->ID, $key, $value );
		} else { // If the custom field doesn't have a value
			add_post_meta( $post->ID, $key, $value );
		}
		if ( ! $value ) { /** Delete if blank */
			delete_post_meta( $post->ID, $key );
		}
	}

}

add_action( 'save_post', 'wpd_details_save_compounddetails_meta', 1, 2 ); // save the custom fields


/**
 * Edibles Details content metabox
 *
 * Adds a custom metabox for additional edibles details
 *
 * @since    1.0.0
 */
function add_thc_cbd_mg_metaboxes() {

	$screens = apply_filters( 'wpd_details_edibles_screens', [ 'product' ] );

	foreach ( $screens as $screen ) {
		add_meta_box(
			'wpd_details_edibles',
			__( 'Edible Details', 'wpd-details' ),
			'wpd_details_edibles',
			$screen,
			'normal',
			'default'
		);
	}

}

add_action( 'add_meta_boxes', 'add_thc_cbd_mg_metaboxes' );

/**
 * THC and CBD mg
 */
function wpd_details_edibles() {
	global $post;

	/** Noncename needed to verify where the data originated */
	echo '<input type="hidden" name="thccbdmgmeta_noncename" id="thccbdmgmeta_noncename" value="' .
	wp_create_nonce( plugin_basename( __FILE__ ) ) . '" />';

	/** Get the thc mg data if its already been entered */
	$thcmg          = get_post_meta( $post->ID, '_thcmg', true );
	$cbdmg          = get_post_meta( $post->ID, '_cbdmg', true );
	$thccbdservings = get_post_meta( $post->ID, '_thccbdservings', true );
	$netweight      = get_post_meta( $post->ID, '_netweight', true );

	/** Echo out the fields */
	echo '<div class="ediblesbox">';
	echo '<p>' . __( 'THC mg per serving', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_thcmg" value="' . $thcmg  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="ediblesbox">';
	echo '<p>' . __( 'CBD mg per serving', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_cbdmg" value="' . $cbdmg  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="ediblesbox">';
	echo '<p>' . __( 'Servings', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_thccbdservings" value="' . $thccbdservings  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="ediblesbox">';
	echo '<p>' . __( 'Net weight (grams)', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_netweight" value="' . $netweight  . '" class="widefat" />';
	echo '</div>';
}

/**
 * Save the Metabox Data
 */
function wpd_details_save_thc_cbd_mg_meta( $post_id, $post ) {

	/**
	 * Verify this came from the our screen and with proper authorization,
	 * because save_post can be triggered at other times
	 */
	if ( ! wp_verify_nonce( $_POST['thccbdmgmeta_noncename'], plugin_basename( __FILE__ ) ) ) {
		return $post->ID;
	}

	/** Is the user allowed to edit the post or page? */
	if ( ! current_user_can( 'edit_post', $post->ID ) ) {
		return $post->ID;
	}

	/**
	 * OK, we're authenticated: we need to find and save the data
	 * We'll put it into an array to make it easier to loop though.
	 */

	$thc_cbd_mg_meta['_thcmg']          = esc_html( $_POST['_thcmg'] );
	$thc_cbd_mg_meta['_cbdmg']          = esc_html( $_POST['_cbdmg'] );
	$thc_cbd_mg_meta['_thccbdservings'] = esc_html( $_POST['_thccbdservings'] );
	$thc_cbd_mg_meta['_netweight']      = esc_html( $_POST['_netweight'] );

	/** Add values of $thccbdmg_meta as custom fields */

	foreach ( $thc_cbd_mg_meta as $key => $value ) { /** Cycle through the $thc_cbd_mg_meta array! */
		if ( 'revision' === $post->post_type ) { /** Don't store custom data twice */
			return;
		}
		$value = implode( ',', (array) $value ); /** If $value is an array, make it a CSV (unlikely) */
		if ( get_post_meta( $post->ID, $key, false ) ) { /** If the custom field already has a value */
			update_post_meta( $post->ID, $key, $value );
		} else { /** If the custom field doesn't have a value */
			add_post_meta( $post->ID, $key, $value );
		}
		if ( ! $value ) { /** Delete if blank */
			delete_post_meta( $post->ID, $key );
		}
	}

}

add_action( 'save_post', 'wpd_details_save_thc_cbd_mg_meta', 1, 2 ); /** Save the custom fields */


/**
 * Topicals Details content metabox
 *
 * Adds a custom metabox for additional Topicals details
 *
 * @since    1.4.0
 */
function add_thccbdtopical_metaboxes() {

	$screens = apply_filters( 'wpd_details_topicals_screens', [ 'product' ] );

	foreach ( $screens as $screen ) {
		add_meta_box(
			'wpd_details_topicals',
			__( 'Topical Details', 'wpd-details' ),
			'wpd_details_topicals',
			$screen,
			'normal',
			'default'
		);
	}

}

add_action( 'add_meta_boxes', 'add_thccbdtopical_metaboxes' );

/**
 * Building the metabox
 */
function wpd_details_topicals() {
	global $post;

	/** Noncename needed to verify where the data originated */
	echo '<input type="hidden" name="thccbdtopical_noncename" id="thccbdtopical_noncename" value="' .
	wp_create_nonce( plugin_basename( __FILE__ ) ) . '" />';

	/** Get the thc mg data if its already been entered */
	$thctopicals  = get_post_meta( $post->ID, '_thctopical', true );
	$cbdtopicals  = get_post_meta( $post->ID, '_cbdtopical', true );
	$sizetopicals = get_post_meta( $post->ID, '_sizetopical', true );

	/** Echo out the fields */
	echo '<div class="topicalsbox">';
	echo '<p>' . __( 'Size (oz)', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_sizetopical" value="' . $sizetopicals  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="topicalsbox">';
	echo '<p>' . __( 'THC mg', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_thctopical" value="' . $thctopicals  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="topicalsbox">';
	echo '<p>' . __( 'CBD mg', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_cbdtopical" value="' . $cbdtopicals  . '" class="widefat" />';
	echo '</div>';

}

/**
 * Save the Metabox Data
 */
function wpd_details_save_thccbdtopical_meta( $post_id, $post ) {

	/**
	 * Verify this came from the our screen and with proper authorization,
	 * because save_post can be triggered at other times
	 */
	if ( ! wp_verify_nonce( $_POST['thccbdtopical_noncename'], plugin_basename( __FILE__ ) ) ) {
		return $post->ID;
	}

	/** Is the user allowed to edit the post or page? */
	if ( ! current_user_can( 'edit_post', $post->ID ) ) {
		return $post->ID;
	}

	/**
	 * OK, we're authenticated: we need to find and save the data
	 * We'll put it into an array to make it easier to loop though.
	 */

	$thcmgtopical_meta['_thctopical']  = esc_html( $_POST['_thctopical'] );
	$thcmgtopical_meta['_cbdtopical']  = esc_html( $_POST['_cbdtopical'] );
	$thcmgtopical_meta['_sizetopical'] = esc_html( $_POST['_sizetopical'] );

	/** Add values of $thcmg_meta as custom fields */

	foreach ( $thcmgtopical_meta as $key => $value ) { /** Cycle through the $thcmg_meta array! */
		if ( 'revision' === $post->post_type ) { /** Don't store custom data twice */
			return;
		}
		$value = implode( ',', (array) $value ); /** If $value is an array, make it a CSV (unlikely) */
		if ( get_post_meta( $post->ID, $key, false ) ) { /** If the custom field already has a value */
			update_post_meta( $post->ID, $key, $value );
		} else { /** If the custom field doesn't have a value */
			add_post_meta( $post->ID, $key, $value );
		}
		if ( ! $value ) { /** Delete if blank */
			delete_post_meta( $post->ID, $key );
		}
	}

}

add_action( 'save_post', 'wpd_details_save_thccbdtopical_meta', 1, 2 ); /** Save the custom fields */

/**
 * Growers Clone Details metabox
 *
 * Adds the clone details metabox to WooCommerce Products
 *
 * @since    1.0.0
 */
function add_grower_details_metaboxes() {

	$screens = apply_filters( 'wpd_details_growers_screens', [ 'product' ] );

	foreach ( $screens as $screen ) {
		add_meta_box(
			'wpd_details_growers',
			__( 'Grower Details', 'wpd-details' ),
			'wpd_details_growers',
			$screen,
			'normal',
			'default'
		);
	}

}

add_action( 'add_meta_boxes', 'add_grower_details_metaboxes' );

/**
 * Building the metabox
 */
function wpd_details_growers() {
	global $post;

	/** Noncename needed to verify where the data originated */
	echo '<input type="hidden" name="grower_detailsmeta_noncename" id="grower_detailsmeta_noncename" value="' .
	wp_create_nonce( plugin_basename( __FILE__ ) ) . '" />';

	/** Get the origin data if its already been entered */
	$origin     = get_post_meta( $post->ID, '_origin', true );
	$time       = get_post_meta( $post->ID, '_time', true );
	$yield      = get_post_meta( $post->ID, '_yield', true );
	$seedcount  = get_post_meta( $post->ID, '_seedcount', true );
	$clonecount = get_post_meta( $post->ID, '_clonecount', true );

	/** Echo out the fields */
	echo '<div class="growerbox">';
	echo '<p>' . __( 'Origin', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_origin" value="' . $origin  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="growerbox">';
	echo '<p>' . __( 'Grow time', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_time" value="' . $time  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="growerbox">';
	echo '<p>' . __( 'Yield', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_yield" value="' . $yield  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="growerbox">';
	echo '<p>' . __( 'Seeds per unit', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_seedcount" value="' . $seedcount  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="growerbox">';
	echo '<p>' . __( 'Clones per unit', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_clonecount" value="' . $clonecount  . '" class="widefat" />';
	echo '</div>';

}

/**
 * Save the Metabox Data
 */
function wpd_details_save_grower_details_meta( $post_id, $post ) {

	/**
	 * Verify this came from the our screen and with proper authorization,
	 * because save_post can be triggered at other times
	 */
	if ( ! wp_verify_nonce( $_POST['grower_detailsmeta_noncename'], plugin_basename( __FILE__ ) ) ) {
		return $post->ID;
	}

	/** Is the user allowed to edit the post or page? */
	if ( ! current_user_can( 'edit_post', $post->ID ) ) {
		return $post->ID;
	}

	/**
	 * OK, we're authenticated: we need to find and save the data
	 * We'll put it into an array to make it easier to loop though.
	 */

	$grower_details_meta['_origin']     = esc_html( $_POST['_origin'] );
	$grower_details_meta['_time']       = esc_html( $_POST['_time'] );
	$grower_details_meta['_yield']      = esc_html( $_POST['_yield'] );
	$grower_details_meta['_seedcount']  = esc_html( $_POST['_seedcount'] );
	$grower_details_meta['_clonecount'] = esc_html( $_POST['_clonecount'] );

	/** Add values of $grower_details_meta as custom fields */

	foreach ( $grower_details_meta as $key => $value ) { /** Cycle through the $thccbd_meta array! */
		if ( 'revision' === $post->post_type ) { /** Don't store custom data twice */
			return;
		}
		$value = implode( ',', (array) $value ); // If $value is an array, make it a CSV (unlikely)
		if ( get_post_meta( $post->ID, $key, false ) ) { // If the custom field already has a value
			update_post_meta( $post->ID, $key, $value );
		} else { // If the custom field doesn't have a value
			add_post_meta( $post->ID, $key, $value );
		}
		if ( ! $value ) { /** Delete if blank */
			delete_post_meta( $post->ID, $key );
		}
	}

}

add_action( 'save_post', 'wpd_details_save_grower_details_meta', 1, 2 ); // save the custom fields

/**
 * Details metabox for the Tinctures menu type
 *
 * Adds a details metabox
 *
 * @since    1.2.0
 */
function add_tincture_details_metaboxes() {

	$screens = apply_filters( 'wpd_details_tinctures_screens', [ 'product' ] );

	foreach ( $screens as $screen ) {
		add_meta_box(
			'wpd_details_tinctures',
			__( 'Tincture Details', 'wpd-details' ),
			'wpd_details_tinctures',
			$screen,
			'normal',
			'default'
		);
	}

}

add_action( 'add_meta_boxes', 'add_tincture_details_metaboxes' );

/**
 * Building the metabox
 */
function wpd_details_tinctures() {
	global $post;

	/** Noncename needed to verify where the data originated */
	echo '<input type="hidden" name="tincturesdetailsmeta_noncename" id="tincturesdetailsmeta_noncename" value="' .
	wp_create_nonce( plugin_basename( __FILE__ ) ) . '" />';

	/** Get the details data if its already been entered */
	$thcmg          = get_post_meta( $post->ID, '_tincture_thcmg', true );
	$cbdmg          = get_post_meta( $post->ID, '_tincture_cbdmg', true );
	$mlserving      = get_post_meta( $post->ID, '_tincture_mlserving', true );
	$thccbdservings = get_post_meta( $post->ID, '_tincture_thccbdservings', true );
	$netweight      = get_post_meta( $post->ID, '_tincture_netweight', true );

	/** Echo out the fields */
	echo '<div class="tincturesdetailsbox">';
	echo '<p>' . __( 'THC mg per serving', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_tincture_thcmg" value="' . esc_html( $thcmg ) . '" class="widefat" />';
	echo '</div>';
	echo '<div class="tincturesdetailsbox">';
	echo '<p>' . __( 'CBD mg per serving', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_tincture_cbdmg" value="' . esc_html( $cbdmg ) . '" class="widefat" />';
	echo '</div>';
	echo '<div class="tincturesdetailsbox">';
	echo '<p>' . __( 'mL per serving', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_tincture_mlserving" value="' . esc_html( $mlserving ) . '" class="widefat" />';
	echo '</div>';
	echo '<div class="tincturesdetailsbox">';
	echo '<p>' . __( 'Servings', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_tincture_thccbdservings" value="' . esc_html( $thccbdservings ) . '" class="widefat" />';
	echo '</div>';
	echo '<div class="tincturesdetailsbox">';
	echo '<p>' . __( 'Net weight (ounces)', 'wpd-details' ) . '</p>';
	echo '<input type="text" name="_tincture_netweight" value="' . esc_html( $netweight ) . '" class="widefat" />';
	echo '</div>';

}

/**
 * Save the Metabox Data
 */
function wpd_details_save_tincture_details_meta( $post_id, $post ) {

	/**
	 * Verify this came from the our screen and with proper authorization,
	 * because save_post can be triggered at other times
	 */
	if ( ! isset( $_POST['tincturesdetailsmeta_noncename' ] ) || ! wp_verify_nonce( $_POST['tincturesdetailsmeta_noncename'], plugin_basename( __FILE__ ) ) ) {
		return $post->ID;
	}

	/** Is the user allowed to edit the post or page? */
	if ( ! current_user_can( 'edit_post', $post->ID ) ) {
		return $post->ID;
	}

	/**
	 * OK, we're authenticated: we need to find and save the data
	 * We'll put it into an array to make it easier to loop though.
	 */

	$details_meta['_tincture_thcmg']          = esc_html( $_POST['_tincture_thcmg'] );
	$details_meta['_tincture_cbdmg']          = esc_html( $_POST['_tincture_cbdmg'] );
	$details_meta['_tincture_mlserving']      = esc_html( $_POST['_tincture_mlserving'] );
	$details_meta['_tincture_thccbdservings'] = esc_html( $_POST['_tincture_thccbdservings'] );
	$details_meta['_tincture_netweight']      = esc_html( $_POST['_tincture_netweight'] );

	/** Add values of $details_meta as custom fields */

	foreach ( $details_meta as $key => $value ) { /** Cycle through the $details_meta array! */
		if ( 'revision' === $post->post_type ) { /** Don't store custom data twice */
			return;
		}
		$value = implode( ',', (array) $value ); /** If $value is an array, make it a CSV (unlikely) */
		if ( get_post_meta( $post->ID, $key, false ) ) { /** If the custom field already has a value */
			update_post_meta( $post->ID, $key, $value );
		} else { /** If the custom field doesn't have a value */
			add_post_meta( $post->ID, $key, $value );
		}
		if ( ! $value ) { /** Delete if blank */
			delete_post_meta( $post->ID, $key );
		}
	}

}

add_action( 'save_post', 'wpd_details_save_tincture_details_meta', 1, 2 ); /** Save the custom fields */
