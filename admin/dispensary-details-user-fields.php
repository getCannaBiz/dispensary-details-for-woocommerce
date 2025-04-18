<?php

/**
 * The patient verification functionality of the plugin.
 *
 * @link       https://cannabizsoftware.com
 * @since      1.0.0.0
 *
 * @package    Dispensary_Details
 * @subpackage Dispensary_Details/admin
 */

/**
 * @todo mail admin if expiration date is within 30 days of expiring.
 * @todo if expiration date is expired, turn off checkout.
 * @todo mail patient if expiration date is within 30 days of expiring
 * @todo let admin choose date for emails to be sent (1-30 days, number field)
 * @todo turn off checkout capabilities if recommendation is expired
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Save File upload in user profile.
 * 
 * @since  1.0.0
 * @return void
 */
function dispensary_details_save_custom_profile_fields( $user_id ) {

    // Update recommendation number.
    if ( isset( $_POST['dispensary_details_recommendation_num'] ) ) {
        update_user_meta( $user_id, 'dispensary_details_recommendation_num', esc_html( $_POST['dispensary_details_recommendation_num'] ) );
    }
    // Update recommendation expiration date.
    if ( isset( $_POST['dispensary_details_recommendation_exp'] ) ) {
        update_user_meta( $user_id, 'dispensary_details_recommendation_exp', sanitize_text_field( $_POST['dispensary_details_recommendation_exp'] ) );
    }

    // Remove recommendation doc.
    if ( isset( $_POST['remove_recommendation_doc'] ) ) {
        update_user_meta( $user_id, 'dispensary_details_recommendation_doc', '' );
    }

    // If no new files are uploaded, return.
    if ( ! isset( $_FILES ) || empty( $_FILES ) || ! isset( $_FILES['dispensary_details_recommendation_doc'] ) )
        return;

    // Include file for wp_handle_upload.
    if ( ! function_exists( 'wp_handle_upload' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }

    // Include file for wp_generate_attachment_metadata.
    if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
    }

    // Handle the upload.
    $_POST['action'] = 'wp_handle_upload';

    // Get doctor recommendation file upload (if any).
    $doc_rec = wp_handle_upload( $_FILES['dispensary_details_recommendation_doc'], [ 'test_form' => false, 'mimes' => [ 'jpg' => 'image/jpeg', 'gif' => 'image/gif', 'png' => 'image/png', 'jpeg' => 'image/jpeg', 'webp' => 'image/webp' ] ] );

    // Take doctor recommendation upload, add to media library.
    if ( isset( $doc_rec['file'] ) ) {
        // Update doctor recommendation meta.
        update_user_meta( $user_id, 'dispensary_details_recommendation_doc', $doc_rec, get_user_meta( $user_id, 'dispensary_details_recommendation_doc', true ) );

        $filename   = $doc_rec['file'];
        $title      = explode( '.', basename( $filename ) );
        $ext        = array_pop( $title );
        $attachment = [
           'guid'           => $doc_rec['url'], 
           'post_mime_type' => $doc_rec['type'],
           'post_title'     => implode( '.', $title ),
           'post_content'   => '',
           'post_status'    => 'inherit'
        ];
        $attach_id   = wp_insert_attachment( $attachment, $filename );
        $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );

        wp_update_attachment_metadata( $attach_id, $attach_data );
    }

}
add_action( 'personal_options_update', 'dispensary_details_save_custom_profile_fields' );
add_action( 'edit_user_profile_update', 'dispensary_details_save_custom_profile_fields' );
add_action( 'woocommerce_save_account_details', 'dispensary_details_save_custom_profile_fields' );

/**
 * Add profile options to Edit User screen
 * 
 * @since  1.0.0
 * @return void
 */
function dispensary_details_add_profile_options( $profileuser ) {
    $doc_rec = get_user_meta( $profileuser->ID, 'dispensary_details_recommendation_doc', true );
    ?>
    <?php do_action( 'dispensary_details_verification_title_before' ); ?>
    <h2><?php esc_html_e( 'Customer Verification', 'dispensary-details' ); ?></h2>
    <?php do_action( 'dispensary_details_verification_table_before' ); ?>
	<table class="form-table">
    <?php do_action( 'dispensary_details_verification_table_top' ); ?>
    <tr>
        <th scope="row"><?php esc_html_e( 'Doctor recommendation', 'dispensary-details' ); ?></th>
        <td class="dispensary-details-recommendation-doc">
            <?php if ( get_user_meta( $profileuser->ID, 'dispensary_details_recommendation_doc', true ) ) { ?>
            <div class="recommendation-doc">
            <?php //var_dump( $doc_rec );
                if ( ! isset( $doc_rec['error'] ) ) {
                    if ( ! empty( $doc_rec ) ) {
                        $doc_rec = $doc_rec['url'];
                        echo "<a href='" . $doc_rec . "' target='_blank'><img src='" . $doc_rec . "' width='100' height='100' class='dispensary-details-recommendation-doc' /></a><br />";
                    }
                } else {
                    $doc_rec = $doc_rec['error'];
                    echo $doc_rec. '<br />';
                }
            ?>
            <button class="remove-recommendation-doc" name="remove_recommendation_doc"><?php esc_html_e( 'x', 'dispensary-details' ); ?></button>
            </div><!-- /.recommendation-doc -->
            <?php } ?>
            <input type="file" name="dispensary_details_recommendation_doc" value="" />
        </td>
    </tr>
    <tr>
        <th scope="row"><?php esc_html_e( 'Recommendation number', 'dispensary-details' ); ?></th>
        <td>
            <input class="regular-text" type="text" name="dispensary_details_recommendation_num" value="<?php echo get_user_meta( $profileuser->ID, 'dispensary_details_recommendation_num', true ); ?>" />
        </td>
    </tr>
    <tr>
        <th scope="row"><?php esc_html_e( 'Expiration date', 'dispensary-details' ); ?></th>
        <td>
            <input class="regular-text" type="date" name="dispensary_details_recommendation_exp" value="<?php echo get_user_meta( $profileuser->ID, 'dispensary_details_recommendation_exp', true ); ?>" />
        </td>
    </tr>
    <?php do_action( 'dispensary_details_verification_table_bottom' ); ?>
    </table>
    <?php do_action( 'dispensary_details_verification_table_after' ); ?>
    <?php
}
add_action( 'show_user_profile', 'dispensary_details_add_profile_options' );
add_action( 'edit_user_profile', 'dispensary_details_add_profile_options' );

/**
 * Add form upload capabilites to edit user page.
 * 
 * @since  1.0.0
 * @return void
 */
function dispensary_details_make_form_accept_uploads() {
	echo ' enctype="multipart/form-data"';
}
add_action( 'user_edit_form_tag', 'dispensary_details_make_form_accept_uploads' );

/**
 * Add dispensary_details_recommendation_doc to WooCommerce My Account page.
 * 
 * @since  1.0.0
 * @return void
 */
function dispensary_details_add_to_edit_account_form() {
    // Include file for wp_handle_upload.
    if ( ! function_exists( 'wp_handle_upload' ) ) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
    }

    // Include file for wp_generate_attachment_metadata.
    if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
        require_once ABSPATH . 'wp-admin/includes/image.php';
    }

    // Get user.
    $user_id = get_current_user_id();
    $user    = get_userdata( $user_id );

    // Save recommendation number.
    if ( isset( $_POST['dispensary_details_recommendation_num'] ) ) {
        update_user_meta( $user->ID, 'dispensary_details_recommendation_num', esc_html( $_POST['dispensary_details_recommendation_num'] ) );
    }
    // Save recommendation expiration.
    if ( isset( $_POST['dispensary_details_recommendation_exp'] ) ) {
        update_user_meta( $user->ID, 'dispensary_details_recommendation_exp', esc_html( $_POST['dispensary_details_recommendation_exp'] ) );
    }
    ?>
    <?php if ( 'yes' === get_option( 'dispensary_details_settings_require_recommendation' ) ) { ?>
    <fieldset>
        <legend><?php esc_html_e( 'Customer Verification', 'dispensary-details' ); ?></legend>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_dispensary_details_recommendation_doc"><?php esc_html_e( 'Doctor recommendation', 'dispensary-details' ); ?></label>
            <?php if ( get_user_meta( $user->ID, 'dispensary_details_recommendation_doc', true ) ) { ?>
            <div class="recommendation-doc">
            <?php
            $doc_rec = get_user_meta( $user->ID, 'dispensary_details_recommendation_doc', true );
            if ( ! isset( $doc_rec['error'] ) ) {
                if ( ! empty( $doc_rec ) ) {
                    $doc_rec = $doc_rec['url'];
                    echo "<a href='" . $doc_rec . "' target='_blank'><img src='" . $doc_rec . "' width='100' height='100' class='dispensary-details-recommendation-doc' /></a><br />";
                }
            } else {
                $doc_rec = $doc_rec['error'];
                echo $doc_rec. '<br />';
            }
            ?>
            <button class="remove-recommendation-doc" name="remove_recommendation_doc"><?php esc_html_e( 'x', 'dispensary-details' ); ?></button>
            </div><!-- /.recommendation-doc -->
            <?php } ?>
            <input type="file" name="dispensary_details_recommendation_doc" id="reg_dispensary_details_recommendation_doc" value="" />
        </p>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_dispensary_details_recommendation_num"><?php esc_html_e( 'Recommendation number', 'dispensary-details' ); ?></label>
            <input type="text" class="input-text" name="dispensary_details_recommendation_num" id="reg_dispensary_details_recommendation_num" value="<?php echo get_user_meta( $user->ID, 'dispensary_details_recommendation_num', true ); ?>" />
        </p>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_dispensary_details_recommendation_exp"><?php esc_html_e( 'Expiration Date', 'dispensary-details' ); ?></label>
            <input type="date" class="input-date" name="dispensary_details_recommendation_exp" id="reg_dispensary_details_recommendation_exp" value="<?php echo get_user_meta( $user->ID, 'dispensary_details_recommendation_exp', true ); ?>" />
        </p>

    </fieldset>
    <?php } ?>
    <?php
}
add_action( 'woocommerce_edit_account_form', 'dispensary_details_add_to_edit_account_form' );

/**
 * Add custom fields to the WooCommerce account registration form.
 *
 * Outputs additional fields for billing first name, billing last name,
 * and, if enabled via settings, recommendation number and expiration date.
 *
 * @since  1.0.0
 * @return void
 */
function dispensary_details_add_name_woo_account_registration() {
    ?>
    <p class="form-row form-row-first">
        <label for="reg_billing_first_name"><?php esc_html_e( 'First name', 'dispensary-details' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
 
    <p class="form-row form-row-last">
        <label for="reg_billing_last_name"><?php esc_html_e( 'Last name', 'dispensary-details' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
 
    <div class="clear"></div>

    <?php if ( 'yes' === get_option( 'dispensary_details_settings_require_recommendation' ) ) { ?>

    <p class="form-row">
        <label for="reg_dispensary_details_recommendation_num"><?php esc_html_e( 'Recommendation number', 'dispensary-details' ); ?></label>
        <input type="text" class="input-text" name="dispensary_details_recommendation_num" id="reg_dispensary_details_recommendation_num" value="<?php if ( ! empty( $_POST['dispensary_details_recommendation_num'] ) ) esc_attr_e( $_POST['dispensary_details_recommendation_num'] ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row">
        <label for="reg_dispensary_details_recommendation_exp"><?php esc_html_e( 'Expiration date', 'dispensary-details' ); ?></label>
        <input type="date" class="input-date" name="dispensary_details_recommendation_exp" id="reg_dispensary_details_recommendation_exp" value="<?php if ( ! empty( $_POST['dispensary_details_recommendation_exp'] ) ) esc_attr_e( $_POST['dispensary_details_recommendation_exp'] ); ?>" />
    </p>

    <?php } ?>

    <div class="clear"></div>

    <?php
}
add_action( 'woocommerce_register_form_start', 'dispensary_details_add_name_woo_account_registration' );

/**
 * Validate custom registration name fields.
 *
 * Checks whether billing first name and billing last name have been provided.
 * If not, it adds corresponding error messages to the registration errors object.
 *
 * @param WP_Error $errors   The WooCommerce registration errors object.
 * @param string   $username The submitted username.
 * @param string   $email    The submitted email address.
 * 
 * @since  1.0.0
 * @return WP_Error The updated registration errors object.
 */
function dispensary_details_validate_name_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'dispensary-details' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!', 'dispensary-details' ) );
    }
    return $errors;
}
add_filter( 'woocommerce_registration_errors', 'dispensary_details_validate_name_fields', 10, 3 );

/**
 * Save custom registration fields to user meta.
 *
 * Updates the newly created customer's meta with billing first name,
 * billing last name, and, if enabled via settings, recommendation number and expiration date.
 *
 * @param int $customer_id The newly created customer's user ID.
 * 
 * @since  1.0.0
 * @return void
 */
function dispensary_details_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    }
    if ( 'yes' === get_option( 'dispensary_details_settings_require_recommendation' ) ) {
        if ( isset( $_POST['dispensary_details_recommendation_num'] ) ) {
            update_user_meta( $customer_id, 'dispensary_details_recommendation_num', sanitize_text_field( $_POST['dispensary_details_recommendation_num'] ) );
        }
        if ( isset( $_POST['dispensary_details_recommendation_exp'] ) ) {
            update_user_meta( $customer_id, 'dispensary_details_recommendation_exp', sanitize_text_field( $_POST['dispensary_details_recommendation_exp'] ) );
        }
    } 
}
add_action( 'woocommerce_created_customer', 'dispensary_details_save_name_fields' );
