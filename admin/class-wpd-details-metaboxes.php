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
 * Compound Details metabox
 *
 * Adds the compound details metabox to specific custom post types
 *
 * @since    1.9.9
 */
function add_compounddetails_metaboxes() {
	$screens = apply_filters( 'wpd_details_compound_details_screens', array( 'product' ) );

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

	/** Echo out the fields */
	echo '<div class="compoundbox">';
	echo '<p>THC %:</p>';
	echo '<input type="text" name="_thc" value="' . $thc  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="compoundbox">';
	echo '<p>THCA %:</p>';
	echo '<input type="text" name="_thca" value="' . $thca  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="compoundbox">';
	echo '<p>CBD %:</p>';
	echo '<input type="text" name="_cbd" value="' . $cbd  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="compoundbox">';
	echo '<p>CBA %:</p>';
	echo '<input type="text" name="_cba" value="' . $cba  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="compoundbox">';
	echo '<p>CBN %:</p>';
	echo '<input type="text" name="_cbn" value="' . $cbn  . '" class="widefat" />';
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

	$thccbd_meta['_thc']    = $_POST['_thc'];
	$thccbd_meta['_thca']   = $_POST['_thca'];
	$thccbd_meta['_cbd']	= $_POST['_cbd'];
	$thccbd_meta['_cba']    = $_POST['_cba'];
	$thccbd_meta['_cbn']    = $_POST['_cbn'];

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

	$screens = apply_filters( 'wpd_details_edibles_screens', array( 'product' ) );

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
	echo '<p>THC mg per serving:</p>';
	echo '<input type="text" name="_thcmg" value="' . $thcmg  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="ediblesbox">';
	echo '<p>CBD mg per serving:</p>';
	echo '<input type="text" name="_cbdmg" value="' . $cbdmg  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="ediblesbox">';
	echo '<p>Servings:</p>';
	echo '<input type="text" name="_thccbdservings" value="' . $thccbdservings  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="ediblesbox">';
	echo '<p>Net weight (grams):</p>';
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

	$thc_cbd_mg_meta['_thcmg']          = $_POST['_thcmg'];
	$thc_cbd_mg_meta['_cbdmg']          = $_POST['_cbdmg'];
	$thc_cbd_mg_meta['_thccbdservings'] = $_POST['_thccbdservings'];
	$thc_cbd_mg_meta['_netweight']      = $_POST['_netweight'];

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

	$screens = apply_filters( 'wpd_details_topicals_screens', array( 'product' ) );

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
	$thctopicals	= get_post_meta( $post->ID, '_thctopical', true );
	$cbdtopicals	= get_post_meta( $post->ID, '_cbdtopical', true );
	$sizetopicals	= get_post_meta( $post->ID, '_sizetopical', true );

	/** Echo out the fields */
	echo '<div class="topicalsbox">';
	echo '<p>Size (oz):</p>';
	echo '<input type="text" name="_sizetopical" value="' . $sizetopicals  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="topicalsbox">';
	echo '<p>THC mg:</p>';
	echo '<input type="text" name="_thctopical" value="' . $thctopicals  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="topicalsbox">';
	echo '<p>CBD mg:</p>';
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

	$thcmgtopical_meta['_thctopical']	= $_POST['_thctopical'];
	$thcmgtopical_meta['_cbdtopical']	= $_POST['_cbdtopical'];
	$thcmgtopical_meta['_sizetopical']	= $_POST['_sizetopical'];

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
 * Adds the clone details metabox to specific custom post types
 *
 * @since    1.9.5
 */
function add_grower_details_metaboxes() {

	$screens = apply_filters( 'wpd_details_growers_screens', array( 'product' ) );

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
	echo '<p>Origin:</p>';
	echo '<input type="text" name="_origin" value="' . $origin  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="growerbox">';
	echo '<p>Grow Time:</p>';
	echo '<input type="text" name="_time" value="' . $time  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="growerbox">';
	echo '<p>Yield:</p>';
	echo '<input type="text" name="_yield" value="' . $yield  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="growerbox">';
	echo '<p>Seeds per unit:</p>';
	echo '<input type="text" name="_seedcount" value="' . $seedcount  . '" class="widefat" />';
	echo '</div>';
	echo '<div class="growerbox">';
	echo '<p>Clones per unit:</p>';
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

	 $grower_details_meta['_origin']      = $_POST['_origin'];
	 $grower_details_meta['_time']        = $_POST['_time'];
	 $grower_details_meta['_yield']       = $_POST['_yield'];
	 $grower_details_meta['_seedcount']   = $_POST['_seedcount'];
	 $grower_details_meta['_clonecount']  = $_POST['_clonecount'];

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
