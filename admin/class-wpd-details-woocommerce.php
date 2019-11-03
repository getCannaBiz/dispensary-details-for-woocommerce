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
 * WP Dispensary Details Settings
 *
 * Related to WooCOmmerce Settings API.
 *
 * @since  1.1
 */
class WPD_Details_WooCommerce_Settings {
	/**
	* Bootstraps the class and hooks required actions & filters.
	*
	*/
	public static function init() {
	   add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
	   add_action( 'woocommerce_settings_tabs_wpd_details', __CLASS__ . '::settings_tab' );
	   add_action( 'woocommerce_update_options_wpd_details', __CLASS__ . '::update_settings' );
	   //add custom type.
	   add_action( 'woocommerce_admin_field_custom_type', __CLASS__ . '::output_custom_type', 10, 1 );
	}

	public static function output_custom_type( $value ) {
	 	//you can output the custom type in any format you'd like.
		echo $value['desc'];
	}

	/**
	* Add a new settings tab to the WooCommerce settings tabs array.
	*
	* @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
	* @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
	*/
	public static function add_settings_tab( $settings_tabs ) {
	   $settings_tabs['wpd_details'] = __( 'Dispensary Details', 'wpd-details' );
	   return $settings_tabs;
	}
	/**
	* Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
	*
	* @uses woocommerce_admin_fields()
	* @uses self::get_settings()
	*/
	public static function settings_tab() {
	   woocommerce_admin_fields( self::get_settings() );
	}
	/**
	* Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
	*
	* @uses woocommerce_update_options()
	* @uses self::get_settings()
	*/
	public static function update_settings() {
	   woocommerce_update_options( self::get_settings() );
	}

	/**
	* Get all the settings for this plugin for @see woocommerce_admin_fields() function.
	*
	* @return array Array of settings for @see woocommerce_admin_fields() function.
	*/
	public static function get_settings() {

		// Get loop of all Pages.
		$args = array(
			'sort_column'  => 'post_title',
			'hierarchical' => 1,
			'post_type'    => 'page',
			'post_status'  => 'publish'
		);
		$pages = get_pages( $args );

		// Create data array.
		$pages_array = array( 'none' => '' );

		// Loop through pages.
		foreach ( $pages as $page ) {
			$pages_array[ $page->ID ] = $page->post_title;
		}

		$settings = array(
			// Section title.
			'wpdd_settings_section_title' => array(
			   'name' => __( 'Dispensary Details', 'wpd-details' ),
			   'type' => 'title',
			   'desc' => 'Brought to you by <a href="https://www.wpdispensary.com" target="_blank">WP Dispensary</a> &middot; <a href="https://www.wpdispensary.com/support/" target="_blank">Support</a> &middot; <a href="https://www.wpdispensary.com/documentation/" target="_blank">Documentation</a>',
			   'id'   => 'wpdd_settings_section_title'
			),
			// Minimum order.
			'min_order_amount' => array(
			   'name' => __( 'Minimum order', 'wpd-details' ),
			   'type' => 'text',
			   'desc' => __( 'The minimum amount before a customer can check out.', 'wpd-details' ),
			   'id'   => 'wpdd_settings_minimum_amount'
			),
			// Shipping or Delivery.
			'shipping_or_delivery' => array(
				'name'    => __( 'Delivery service', 'wpd-details' ),
				'type'    => 'select',
				'desc'    => __( 'Will you be delivering products to patients?', 'wpd-details' ),
				'id'      => 'wpdd_settings_shipping_delivery',
				'options' => array(
					'no'  => 'No',
					'yes' => 'Yes',
				),
			),
			// Empty Cart page redirect.
			'empty_cart_redirect_page' => array(
				'name'    => __( 'Redirect empty cart', 'wpd-details' ),
				'type'    => 'select',
				'desc'    => __( 'Select the page your Cart page should redirects visitors to if empty.', 'wpd-details' ),
				'id'      => 'wpdd_settings_empty_cart_redirect',
				'options' => $pages_array,
			),
			// Visitor Checkout page redirect.
			'a2c_redirect_page' => array(
				'name'    => __( 'Redirect visitor checkout', 'wpd-details' ),
				'type'    => 'select',
				'desc'    => __( 'Select the page your Checkout page should redirects visitors to.', 'wpd-details' ),
				'id'      => 'wpdd_settings_a2c_redirect',
				'options' => $pages_array,
			),
			// Order Status completed.
			'order_status_completed' => array(
			   'name'    => __( 'Auto-complete orders', 'wpd-details' ),
			   'type'    => 'select',
			   'desc'    => __( 'Automatically change order status from "processing" to "completed".', 'wpd-details' ),
			   'id'      => 'wpdd_settings_order_status_completed',
				 'options' => array(
					 'no'  => 'No',
					 'yes' => 'Yes',
				 ),
			),
			// Doctor Recommendation.
			'require_recommendation' => array(
				'name'    => __( 'Doctor recommendation', 'wpd-details' ),
				'type'    => 'select',
				'desc'    => __( 'Adds verification fields to registration and edit user forms.', 'wpd-details' ),
				'id'      => 'wpdd_settings_require_recommendation',
				'options' => array(
					'no'  => 'No',
					'yes' => 'Yes',
				),
			),
			// Require Recommendation.
			'require_recommendation_checkout' => array(
				'name'    => __( 'Require recommendation', 'wpd-details' ),
				'type'    => 'select',
				'desc'    => __( 'Only allow checkout after recommendation docs are added.', 'wpd-details' ),
				'id'      => 'wpdd_settings_require_recommendation_checkout',
				'options' => array(
					'no'  => 'No',
					'yes' => 'Yes',
				),
			),
			// Section End.
			'section_end' => array(
			   'type' => 'sectionend',
			   'id'   => 'wpdd_settings_section_end'
			),
		);
		return apply_filters( 'wpdd_woocommerce_settings', $settings );

	}
}
WPD_Details_WooCommerce_Settings::init();

/**
 * Minimum Order Amount
 */
if ( null !== get_option( 'wpdd_settings_minimum_amount' ) || '' !== get_option( 'wpdd_settings_minimum_amount' ) ) {
	function wpd_details_minimum_order_amount() {

		// Set minimum amount.
		$minimum = get_option( 'wpdd_settings_minimum_amount' );

		if ( WC()->cart->subtotal < $minimum ) {
			if( is_cart() ) {
				wc_print_notice(
					sprintf( 'Your order must be a minimum of %s. Your current order total is %s.' ,
						wc_price( $minimum ),
						wc_price( WC()->cart->subtotal )
					), 'error'
				);
			} else {
				wc_add_notice(
					sprintf( 'Your order must be a minimum of %s. Your current order total is %s.' ,
						wc_price( $minimum ),
						wc_price( WC()->cart->subtotal )
					), 'error'
				);
			}
		}

	}
	add_action( 'woocommerce_checkout_process', 'wpd_details_minimum_order_amount' );
	add_action( 'woocommerce_before_cart' , 'wpd_details_minimum_order_amount' );
}

/**
 * Redirect user from Checkout if they're not logged in.
 */
function wpd_details_login_redirect() {
	if ( null !== get_option( 'wpdd_settings_a2c_redirect' ) && 'none' !== get_option( 'wpdd_settings_a2c_redirect' ) ) {
		if (
			! is_user_logged_in()
			&& ( is_checkout() )
		) {
			// Redirect to the URL from the settings.
			wp_redirect( get_permalink( get_option( 'wpdd_settings_a2c_redirect' ) ) );
		} else {
			// Do nothing.
		}
	}
}
add_action( 'template_redirect', 'wpd_details_login_redirect' );

// Change the Shipping Address checkout label.
if ( 'yes' === get_option( 'wpdd_settings_shipping_delivery' ) ) {
	function wpd_details_shipping_field_strings( $translated_text, $text, $domain ) {
		switch ( $translated_text ) {
		case 'Shipping Address' :
			$translated_text = __( 'Delivery Address', 'wpd-details' );
			break;
		}
		return $translated_text;
	}
}

// Change the Ship to a different address text.
if ( 'yes' === get_option( 'wpdd_settings_shipping_delivery' ) ) {
	function wpd_details_strings_translation( $translated_text, $text, $domain ) {
	  switch ( $translated_text ) {
	    case 'Ship to a different address?' :
	      $translated_text =  __( 'Delivery Address', '__x__' );
	      break;
	  }
	  return $translated_text;
	}
}

/**
 *
 * Function to replace shipping text to delivery text
 *
 * @param $package_name
 * @param $i
 * @param $package
 *
 * @return string
 */
if ( 'yes' === get_option( 'wpdd_settings_shipping_delivery' ) ) {
	function wpd_details_delivery_text( $package_name, $i, $package ) {
    	return sprintf( _nx( 'Delivery', 'Delivery %d', ( $i + 1 ), 'shipping packages', 'wpd-details' ), ( $i + 1 ) );
	}
}

/*
 *  Change the string "Shipping" to "Delivery" on Order Received page.
 */
if ( 'yes' === get_option( 'wpdd_settings_shipping_delivery' ) ) {
	function wpd_details_translate_reply( $translated ) {
		$translated = str_ireplace( 'Shipping', 'Delivery', $translated );
		return $translated;
	}
}

/**
 * Runs filters if Delivery is selected in Settings.
 */
function wpd_details_shipping_delivery() {
	if ( 'yes' === get_option( 'wpdd_settings_shipping_delivery' ) ) {
		add_filter( 'gettext', 'wpd_details_shipping_field_strings', 20, 3 );
		add_filter( 'gettext', 'wpd_details_strings_translation', 20, 3 );
		add_filter( 'woocommerce_shipping_package_name' , 'wpd_details_delivery_text', 10, 3 );
		add_filter( 'gettext', 'wpd_details_translate_reply' );
		add_filter( 'ngettext', 'wpd_details_translate_reply' );
	} else {
		// Do nothing.
	}
}
add_action( 'init', 'wpd_details_shipping_delivery', 1 );

/**
 * Auto changes orders from 'processing' to 'completed'.
 */
function wpd_details_order_status_completed( $order_id ) {
    if ( ! $order_id ) return;

		if ( 'yes' === get_option( 'wpdd_settings_order_status_completed' ) ) {
			$order = new WC_Order( $order_id ); // Get an instance of the WC_Order object.

			if ( $order->has_status( 'processing' ) ) {
				$order->update_status( 'completed' );
			}
		} else {
			// Do nothing.
		}
}
add_action( 'woocommerce_thankyou', 'wpd_details_order_status_completed', 10, 1 );

/**
 * Redirect to page if Cart is empty.
 */
function cart_empty_redirect_to_shop() {
    global $woocommerce;

		// Check if Redirect is set in Settings.
		if ( null !== get_option( 'wpdd_settings_empty_cart_redirect' ) && 'none' !== get_option( 'wpdd_settings_empty_cart_redirect' ) ) {
			// If we're on the Cart page & cart count is 0, do the redirect.
			if ( is_page( 'cart' ) && 0 === $woocommerce->cart->cart_contents_count ) {
				wp_redirect( get_permalink( get_option( 'wpdd_settings_empty_cart_redirect' ) ) );
			} else {
				// Do nothing.
			}
		} else {
		 	// Do nothing.
		}
}

add_action( 'wp_head', 'cart_empty_redirect_to_shop' );

/**
 * Require verification documents for checkout
 * 
 * @since 1.5
 */
if ( 'yes' == get_option( 'wpdd_settings_require_recommendation_checkout' ) ) {
	function wpd_details_require_doctor_recommendation_checkout() {

		// Get user.
		$user_id = get_current_user_id();
		$user    = get_userdata( $user_id );

		// Set minimum amount.
		$document = get_user_meta( $user->ID, 'wpd_details_recommendation_doc', true );

		if ( empty( $document ) ) {
			if( is_cart() ) {
				wc_print_notice(
					sprintf( 'Doctor recommendation is required to checkout. <a href="%s">Add document</a>' ,
						wc_get_account_endpoint_url( 'edit-account' )
					), 'error'
				);
			} else {
				wc_add_notice(
					sprintf( 'Doctor recommendation is required to checkout. <a href="%s">Add document</a>' ,
						wc_get_account_endpoint_url( 'edit-account' )
					), 'error'
				);
			}
		}

	}
	add_action( 'woocommerce_checkout_process', 'wpd_details_require_doctor_recommendation_checkout' );
	add_action( 'woocommerce_before_cart' , 'wpd_details_require_doctor_recommendation_checkout' );
}

/**
 * WooCommerce - Inventory Management for Cannabis products
 * 
 * @since 1.3
 */
function wpd_details_inventory_reduction( $loop, $variation_data, $variation ) {
	echo '<div class="variation-custom-fields">';

	// Inventory reduction.
	woocommerce_wp_text_input( array(
		'id'          => '_inventory_reduction['. $loop .']', 
		'label'       => __( 'Reduce stock quantity by:', 'wpd-details' ), 
		'placeholder' => 'ex: 7',
		'value'       => get_post_meta( $variation->ID, '_inventory_reduction', true )
	) );

	echo "</div>"; 
}

// Display Fields in admin on product edit screen.
add_action( 'woocommerce_product_after_variable_attributes', 'wpd_details_inventory_reduction', 10, 3 );

/** Save new fields for variations */
function save_wpd_details_inventory_reduction( $variation_id, $i ) {
	// Save Field.
	$inventory_reduction = stripslashes( $_POST['_inventory_reduction'][$i] );
	update_post_meta( $variation_id, '_inventory_reduction', esc_attr( $inventory_reduction ) );
}

//Save variation fields values.
add_action( 'woocommerce_save_product_variation', 'save_wpd_details_inventory_reduction', 10, 2 );

// Removes the WooCommerce filter, that is validating the quantity to be an int
remove_filter( 'woocommerce_stock_amount', 'intval' ); 
// Add a filter, that validates the quantity to be a float
add_filter( 'woocommerce_stock_amount', 'floatval' );

/**
 * Reduce inventory based on variable input field.
 */
function wpd_details_filter_order_item_quantity( $quantity, $order, $item ) {

	// Get simple item inventory reduction amount.
	$multiplier = $item->get_product()->get_meta( '_inventory_reduction' );

	// Get variation item inventory reduction amount.
	if ( empty( $multiplier ) && $item->get_product()->is_type( 'variation' ) ) {
		$product    = wc_get_product( $item->get_product()->get_parent_id() );
		$multiplier = $product->get_meta( '_inventory_reduction' );
	}

	// Updated quantity.
	if ( ! empty( $multiplier ) ) {
		$quantity = $multiplier * $quantity;
	}

	return $quantity;

}
add_filter( 'woocommerce_order_item_quantity', 'wpd_details_filter_order_item_quantity', 10, 3 ); 

/**
 * Custom Product Data Tab
 * 
 * Tab: Compounds
 * 
 * @since 1.3
 */

/**
 * Adding a custom tab
 */
function wpd_details_compounds_tab( $tabs ) {
  
  $tabs['wpd_details_compounds'] = array(
    'label'  => __( 'Compounds', 'wpd-details' ),
    'target' => 'wpd_details_compounds_panel',
    'class'  => array(),
  );
  
  return $tabs;
}
add_filter( 'woocommerce_product_data_tabs', 'wpd_details_compounds_tab' );

/**
 * Adding a custom panel
 */
function wpd_details_compounds_panel( $product ) {
	?>
	<div id="wpd_details_compounds_panel" class="panel woocommerce_options_panel">
		<div class="options_group">
		<?php
		// THC.
		$thc_field = array(
			'id'    => 'wpd_details_thc',
			'label' => __( 'THC %', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $thc_field );
		// THCA.
		$thca_field = array(
			'id'    => 'wpd_details_thca',
			'label' => __( 'THCA %', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $thca_field );
		// CBD.
		$cbd_field = array(
			'id'    => 'wpd_details_cbd',
			'label' => __( 'CBD %', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $cbd_field );
		// CBA.
		$cba_field = array(
			'id'    => 'wpd_details_cba',
			'label' => __( 'CBA %', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $cba_field );
		// CBN.
		$cbn_field = array(
			'id'    => 'wpd_details_cbn',
			'label' => __( 'CBN %', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $cbn_field );
		// CBG.
		$cbg_field = array(
			'id'    => 'wpd_details_cbg',
			'label' => __( 'CBG %', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $cbg_field );
		?>
		</div>
	</div>
<?php
}
add_action( 'woocommerce_product_data_panels', 'wpd_details_compounds_panel' );

/**
 * Saving the custom fields
 */
function save_wpd_details_compounds( $post_id ) { 

	$wpd_details_thc  = isset( $_POST['wpd_details_thc'] ) ? esc_html( $_POST['wpd_details_thc'] ) : '';
	$wpd_details_thca = isset( $_POST['wpd_details_thca'] ) ? esc_html( $_POST['wpd_details_thca'] ) : '';
	$wpd_details_cbd  = isset( $_POST['wpd_details_cbd'] ) ? esc_html( $_POST['wpd_details_cbd'] ) : '';
	$wpd_details_cba  = isset( $_POST['wpd_details_cba'] ) ? esc_html( $_POST['wpd_details_cba'] ) : '';
	$wpd_details_cbn  = isset( $_POST['wpd_details_cbn'] ) ? esc_html( $_POST['wpd_details_cbn'] ) : '';
	$wpd_details_cbg  = isset( $_POST['wpd_details_cbg'] ) ? esc_html( $_POST['wpd_details_cbg'] ) : '';

	// Get Product.
	$product = wc_get_product( $post_id );

	// Save THC.
	$product->update_meta_data( 'wpd_details_thc', $wpd_details_thc );
	$product->update_meta_data( '_thc', $wpd_details_thc );

	// Save THCA.
	$product->update_meta_data( 'wpd_details_thca', $wpd_details_thca );
	$product->update_meta_data( '_thca', $wpd_details_thca );

	// Save CBD.
	$product->update_meta_data( 'wpd_details_cbd', $wpd_details_cbd );
	$product->update_meta_data( '_cbd', $wpd_details_cbd );

	// Save CBA.
	$product->update_meta_data( 'wpd_details_cba', $wpd_details_cba );
	$product->update_meta_data( '_cba', $wpd_details_cba );

	// Save CBN.
	$product->update_meta_data( 'wpd_details_cbn', $wpd_details_cbn );
	$product->update_meta_data( '_cbn', $wpd_details_cbn );

	// Save CBG.
	$product->update_meta_data( 'wpd_details_cbg', $wpd_details_cbg );
	$product->update_meta_data( '_cbg', $wpd_details_cbg );

	// Save Product.
	$product->save();
}
add_action( 'woocommerce_process_product_meta', 'save_wpd_details_compounds' );

/**
 * Custom Product Data Tab
 * 
 * Tab: Tinctures
 * 
 * @since 1.3
 */

/**
 * Adding a custom tab
 */
function wpd_details_tinctures_tab( $tabs ) {
  
	$tabs['wpd_details_tinctures'] = array(
	  'label'  => __( 'Tinctures', 'wpd-details' ),
	  'target' => 'wpd_details_tinctures_panel',
	  'class'  => array(),
	);
	
	return $tabs;
}
add_filter( 'woocommerce_product_data_tabs', 'wpd_details_tinctures_tab' );

/**
 * Adding a custom panel
 */
function wpd_details_tinctures_panel( $product ) {
	?>
	<div id="wpd_details_tinctures_panel" class="panel woocommerce_options_panel">
		<div class="options_group">
		<?php
		// THC.
		$thcmg_field = array(
			'id'    => 'wpd_details_tincture_thcmg',
			'label' => __( 'THC mg per serving', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $thcmg_field );
		// CBD.
		$cbdmg_field = array(
			'id'    => 'wpd_details_tincture_cbdmg',
			'label' => __( 'CBD mg per serving', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $cbdmg_field );
		// ml.
		$mlservings_field = array(
			'id'    => 'wpd_details_tincture_mlservings',
			'label' => __( 'ml per serving', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $mlservings_field );
		// Servings.
		$thccbdservings_field = array(
			'id'    => 'wpd_details_tincture_thccbdservings',
			'label' => __( 'Servings', 'wpd-details' ),
			);
		woocommerce_wp_text_input( $thccbdservings_field );
		// Net weight.
		$netweight_field = array(
			'id'    => 'wpd_details_tincture_netweight',
			'label' => __( 'Net weight (oz)', 'wpd-details' ),
			);
		woocommerce_wp_text_input( $netweight_field );
		?>
		</div>
	</div>
<?php
}
add_action( 'woocommerce_product_data_panels', 'wpd_details_tinctures_panel' );

/**
 * Saving the custom fields
 */
function save_wpd_details_tinctures( $post_id ) { 

	$wpd_details_tincture_thcmg          = isset( $_POST['wpd_details_tincture_thcmg'] ) ? esc_html( $_POST['wpd_details_tincture_thcmg'] ) : '';
	$wpd_details_tincture_cbdmg          = isset( $_POST['wpd_details_tincture_cbdmg'] ) ? esc_html( $_POST['wpd_details_tincture_cbdmg'] ) : '';
	$wpd_details_tincture_thccbdservings = isset( $_POST['wpd_details_tincture_thccbdservings'] ) ? esc_html( $_POST['wpd_details_tincture_thccbdservings'] ) : '';
	$wpd_details_tincture_mlservings     = isset( $_POST['wpd_details_tincture_mlservings'] ) ? esc_html( $_POST['wpd_details_tincture_mlservings'] ) : '';
	$wpd_details_tincture_netweight      = isset( $_POST['wpd_details_tincture_netweight'] ) ? esc_html( $_POST['wpd_details_tincture_netweight'] ) : '';

	// Get Product.
	$product = wc_get_product( $post_id );

	// Save THCmg.
	$product->update_meta_data( 'wpd_details_tincture_thcmg', $wpd_details_tincture_thcmg );
	$product->update_meta_data( '_tincture_thcmg', $wpd_details_tincture_thcmg );

	// Save CBDmg.
	$product->update_meta_data( 'wpd_details_tincture_cbdmg', $wpd_details_tincture_cbdmg );
	$product->update_meta_data( '_tincture_cbdmg', $wpd_details_tincture_cbdmg );

	// Save Servings.
	$product->update_meta_data( 'wpd_details_tincture_thccbdservings', $wpd_details_tincture_thccbdservings );
	$product->update_meta_data( '_tincture_thccbdservings', $wpd_details_tincture_thccbdservings );

	// Save ml.
	$product->update_meta_data( 'wpd_details_tincture_mlservings', $wpd_details_tincture_mlservings );
	$product->update_meta_data( '_tincture_mlserving', $wpd_details_tincture_mlservings );

	// Save Net weight.
	$product->update_meta_data( 'wpd_details_tincture_netweight', $wpd_details_tincture_netweight );
	$product->update_meta_data( '_tincture_netweight', $wpd_details_tincture_netweight );

	// Save Product.
	$product->save();
}
add_action( 'woocommerce_process_product_meta', 'save_wpd_details_tinctures' );

/**
 * Custom Product Data Tab
 * 
 * Tab: Edibles
 * 
 * @since 1.3
 */

/**
 * Adding a custom tab
 */
function wpd_details_edibles_tab( $tabs ) {
  
	$tabs['wpd_details_edibles'] = array(
	  'label'  => __( 'Edibles', 'wpd-details' ),
	  'target' => 'wpd_details_edibles_panel',
	  'class'  => array(),
	);
	
	return $tabs;
}
add_filter( 'woocommerce_product_data_tabs', 'wpd_details_edibles_tab' );

/**
 * Adding a custom panel
 */
function wpd_details_edibles_panel( $product ) {
	?>
	<div id="wpd_details_edibles_panel" class="panel woocommerce_options_panel">
		<div class="options_group">
		<?php
		// THC.
		$thcmg_field = array(
			'id'    => 'wpd_details_thcmg',
			'label' => __( 'THC mg per serving', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $thcmg_field );
		// CBD.
		$cbdmg_field = array(
			'id'    => 'wpd_details_cbdmg',
			'label' => __( 'CBD mg per serving', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $cbdmg_field );
		// Servings.
		$thccbdservings_field = array(
		'id'    => 'wpd_details_thccbdservings',
		'label' => __( 'Servings', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $thccbdservings_field );
		// Net Weight.
		$netweight_field = array(
			'id'    => 'wpd_details_netweight',
			'label' => __( 'Net weight (g)', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $netweight_field );
		?>
		</div>
	</div>
<?php
}
add_action( 'woocommerce_product_data_panels', 'wpd_details_edibles_panel' );

/**
 * Saving the custom fields
 */
function save_wpd_details_edibles( $post_id ) { 

	$wpd_details_thcmg          = isset( $_POST['wpd_details_thcmg'] ) ? esc_html( $_POST['wpd_details_thcmg'] ) : '';
	$wpd_details_thccbdservings = isset( $_POST['wpd_details_thccbdservings'] ) ? esc_html( $_POST['wpd_details_thccbdservings'] ) : '';
	$wpd_details_cbdmg          = isset( $_POST['wpd_details_cbdmg'] ) ? esc_html( $_POST['wpd_details_cbdmg'] ) : '';
	$wpd_details_netweight      = isset( $_POST['wpd_details_netweight'] ) ? esc_html( $_POST['wpd_details_netweight'] ) : '';

	// Get Product.
	$product = wc_get_product( $post_id );

	// Save THCmg.
	$product->update_meta_data( 'wpd_details_thcmg', $wpd_details_thcmg );
	$product->update_meta_data( '_thcmg', $wpd_details_thcmg );

	// Save CBDmg.
	$product->update_meta_data( 'wpd_details_cbdmg', $wpd_details_cbdmg );
	$product->update_meta_data( '_cbdmg', $wpd_details_cbdmg );

	// Save Servings.
	$product->update_meta_data( 'wpd_details_thccbdservings', $wpd_details_thccbdservings );
	$product->update_meta_data( '_thccbdservings', $wpd_details_thccbdservings );

	// Save Net weight.
	$product->update_meta_data( 'wpd_details_netweight', $wpd_details_netweight );
	$product->update_meta_data( '_netweight', $wpd_details_netweight );

	// Save Product.
	$product->save();
}
add_action( 'woocommerce_process_product_meta', 'save_wpd_details_edibles' );

/**
 * Custom Product Data Tab
 * 
 * Tab: Topicals
 * 
 * @since 1.3
 */

/**
 * Adding a custom tab
 */
function wpd_details_topicals_tab( $tabs ) {
  
	$tabs['wpd_details_topicals'] = array(
	  'label'  => __( 'Topicals', 'wpd-details' ),
	  'target' => 'wpd_details_topicals_panel',
	  'class'  => array(),
	);
	
	return $tabs;
}
add_filter( 'woocommerce_product_data_tabs', 'wpd_details_topicals_tab' );

/**
 * Adding a custom panel
 */
function wpd_details_topicals_panel( $product ) {
	?>
	<div id="wpd_details_topicals_panel" class="panel woocommerce_options_panel">
		<div class="options_group">
		<?php
		// THC.
		$thctopical_field = array(
			'id'    => 'wpd_details_thctopical',
			'label' => __( 'THC mg', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $thctopical_field );
		// CBD.
		$cbdtopical_field = array(
			'id'    => 'wpd_details_cbdtopical',
			'label' => __( 'CBD mg', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $cbdtopical_field );
		// Size.
		$sizetopical_field = array(
		'id'    => 'wpd_details_sizetopical',
		'label' => __( 'Size (oz)', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $sizetopical_field );
		?>
		</div>
	</div>
<?php
}
add_action( 'woocommerce_product_data_panels', 'wpd_details_topicals_panel' );

/**
 * Saving the custom fields
 */
function save_wpd_details_topicals( $post_id ) { 

	$wpd_details_thctopical  = isset( $_POST['wpd_details_thctopical'] ) ? esc_html( $_POST['wpd_details_thctopical'] ) : '';
	$wpd_details_sizetopical = isset( $_POST['wpd_details_sizetopical'] ) ? esc_html( $_POST['wpd_details_sizetopical'] ) : '';
	$wpd_details_cbdtopical  = isset( $_POST['wpd_details_cbdtopical'] ) ? esc_html( $_POST['wpd_details_cbdtopical'] ) : '';

	// Get Product.
	$product = wc_get_product( $post_id );

	// Save THC.
	$product->update_meta_data( 'wpd_details_thctopical', $wpd_details_thctopical );
	$product->update_meta_data( '_thctopical', $wpd_details_thctopical );

	// Save CBD.
	$product->update_meta_data( 'wpd_details_cbdtopical', $wpd_details_cbdtopical );
	$product->update_meta_data( '_cbdtopical', $wpd_details_cbdtopical );

	// Save Size.
	$product->update_meta_data( 'wpd_details_sizetopical', $wpd_details_sizetopical );
	$product->update_meta_data( '_sizetopical', $wpd_details_sizetopical );

	// Save Product.
	$product->save();
}
add_action( 'woocommerce_process_product_meta', 'save_wpd_details_topicals' );

/**
 * Custom Product Data Tab
 * 
 * Tab: Growers
 * 
 * @since 1.3
 */

/**
 * Adding a custom tab
 */
function wpd_details_growers_tab( $tabs ) {
  
	$tabs['wpd_details_growers'] = array(
	  'label'  => __( 'Growers', 'wpd-details' ),
	  'target' => 'wpd_details_growers_panel',
	  'class'  => array(),
	);
	
	return $tabs;
}
add_filter( 'woocommerce_product_data_tabs', 'wpd_details_growers_tab' );

/**
 * Adding a custom panel
 */
function wpd_details_growers_panel( $product ) {
	?>
	<div id="wpd_details_growers_panel" class="panel woocommerce_options_panel">
		<div class="options_group">
		<?php
		// Origin.
		$origin_field = array(
			'id'    => 'wpd_details_origin',
			'label' => __( 'Origin', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $origin_field );
		// Time.
		$time_field = array(
			'id'    => 'wpd_details_time',
			'label' => __( 'Grow Time', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $time_field );
		// Yield.
		$yield_field = array(
			'id'    => 'wpd_details_yield',
			'label' => __( 'Yield', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $yield_field );
		// Seeds.
		$seeds_field = array(
			'id'    => 'wpd_details_seedcount',
			'label' => __( 'Seeds per unit', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $seeds_field );
		// Clones.
		$clones_field = array(
			'id'    => 'wpd_details_clonecount',
			'label' => __( 'Clones per unit', 'wpd-details' ),
		);
		woocommerce_wp_text_input( $clones_field );
		?>
		</div>
	</div>
<?php
}
add_action( 'woocommerce_product_data_panels', 'wpd_details_growers_panel' );

/**
 * Saving the custom fields
 */
function save_wpd_details_growers( $post_id ) { 

	$wpd_details_origin     = isset( $_POST['wpd_details_origin'] ) ? esc_html( $_POST['wpd_details_origin'] ) : '';
	$wpd_details_time       = isset( $_POST['wpd_details_time'] ) ? esc_html( $_POST['wpd_details_time'] ) : '';
	$wpd_details_yield      = isset( $_POST['wpd_details_yield'] ) ? esc_html( $_POST['wpd_details_yield'] ) : '';
	$wpd_details_seedcount  = isset( $_POST['wpd_details_seedcount'] ) ? esc_html( $_POST['wpd_details_seedcount'] ) : '';
	$wpd_details_clonecount = isset( $_POST['wpd_details_clonecount'] ) ? esc_html( $_POST['wpd_details_clonecount'] ) : '';

	// Get Product.
	$product = wc_get_product( $post_id );

	// Save Origin.
	$product->update_meta_data( 'wpd_details_origin', $wpd_details_origin );
	$product->update_meta_data( '_origin', $wpd_details_origin );

	// Save Time.
	$product->update_meta_data( 'wpd_details_time', $wpd_details_time );
	$product->update_meta_data( '_time', $wpd_details_time );

	// Save Yield.
	$product->update_meta_data( 'wpd_details_yield', $wpd_details_yield );
	$product->update_meta_data( '_yield', $wpd_details_yield );

	// Save Seeds.
	$product->update_meta_data( 'wpd_details_seedcount', $wpd_details_seedcount );
	$product->update_meta_data( '_seedcount', $wpd_details_seedcount );

	// Save Clones.
	$product->update_meta_data( 'wpd_details_clonecount', $wpd_details_clonecount );
	$product->update_meta_data( '_clonecount', $wpd_details_clonecount );

	// Save Product.
	$product->save();
}
add_action( 'woocommerce_process_product_meta', 'save_wpd_details_growers' );

/**
 * Customize WooCommerce account edit template
 * 
 * @since 1.4
 */
function wpd_details_get_woocommerce_template( $located, $template_name, $args, $template_path, $default_path ) {    
    if ( 'myaccount/form-edit-account.php' == $template_name ) {
        $located = plugin_dir_path( dirname( __FILE__ ) ) . 'woocommerce/myaccount/form-edit-account.php';
    }
    
    return $located;
}
add_filter( 'wc_get_template', 'wpd_details_get_woocommerce_template', 10, 5 );

/**
 * Inventory check on add to cart
 *
 * @param bool $passed
 * @param int $product_id
 * @param int $quantity
 * @param string $variation_id
 * @param string $variations
 * @return bool
 * @since 1.6
 */
function wpd_details_validate_add_cart_item( $passed, $product_id, $quantity, $variation_id = '', $variations = '' ) {
	// Stock amount.
	$in_stock = get_post_meta( $product_id, '_stock', TRUE );

	// Inventory reduction amount.
	$inventory_reduction = get_post_meta( esc_html( $_POST['variation_id'] ), '_inventory_reduction', TRUE );

	// Total stock reduction.
	$reduce_stock = $quantity * $inventory_reduction;

	// Product cart ID.
	$product_cart_id = WC()->cart->generate_cart_id( $_POST['variation_id'] );

	//print_r( $product_cart_id );

	// Is product in cart.
	$in_cart = WC()->cart->find_product_in_cart( $product_cart_id );

	// Loop through cart items.
	foreach ( WC()->cart->get_cart() as $cart_item ) {
		// Get product data.
		$product = $cart_item['data'];

		// Product data.
        if ( ! empty( $product ) ) {
			// Product ID.
            $product_id = method_exists( $product, 'get_id' ) ? $product->get_id() : $product->id;

			// Reduce inventory.
			$reduction = get_post_meta( $product_id, '_inventory_reduction', TRUE );

			// Inventory reduction amount.
			if ( $reduction ) {
				$reduce_stock = $reduce_stock + ( $cart_item['quantity'] * $reduction );
			}
        }
	}

	// do your validation, if not met switch $passed to false
    if ( $in_stock < $reduce_stock ) {
        $passed = false;
        wc_add_notice( apply_filters( 'wpd_details_validate_add_cart_item_error', __( 'You cannot add that amount to the cart.', 'wpd-details' ) ), 'error' );
	}

    return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'wpd_details_validate_add_cart_item', 10, 5 );

/**
 * Variation active
 *
 * @param bool $active
 * @param array $variation
 * @return bool
 */
function wpd_details_variation_is_active( $active, $variation ) {

	// Stock quantity.
	$stock_quantity = $variation->get_stock_quantity();

	// Inventory reduction amount.
	$inventory_reduction = get_post_meta( esc_html( $variation->get_ID() ), '_inventory_reduction', TRUE );

	// Check reduction amount against stock quantity.
	if ( $inventory_reduction > $stock_quantity ) {
		return false;
	}

	return $active;
}
add_filter( 'woocommerce_variation_is_active', 'wpd_details_variation_is_active', 10, 2 );
