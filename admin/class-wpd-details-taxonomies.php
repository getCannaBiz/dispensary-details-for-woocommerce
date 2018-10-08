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
 * Aroma Taxonomy
 *
 * Adds the Aroma taxonomy to all custom post types
 *
 * @since    1.0.0
 */

add_action( 'init', 'wpd_details_aroma', 0 );

/**
 * Aroma
 */
function wpd_details_aroma() {

	  $labels = array(
		'name'                       => _x( 'Aromas', 'general name' ),
		'singular_name'              => _x( 'Aroma', 'singular name' ),
		'search_items'               => __( 'Search Aromas' ),
		'popular_items'              => __( 'Popular Aromas' ),
		'all_items'                  => __( 'All Aromas' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Aroma' ),
		'update_item'                => __( 'Update Aroma' ),
		'add_new_item'               => __( 'Add New Aroma' ),
		'new_item_name'              => __( 'New Aroma Name' ),
		'separate_items_with_commas' => __( 'Separate aromas with commas' ),
		'add_or_remove_items'        => __( 'Add or remove aromas' ),
		'choose_from_most_used'      => __( 'Choose from the most used aromas' ),
		'not_found'                  => 'No aromas found',
		'menu_name'                  => __( 'Aromas' ),
	  );

	  register_taxonomy( 'aroma', 'product', array(
			'hierarchical'           => false,
			'labels'                 => $labels,
			'show_ui'                => true,
			'show_in_rest'           => true,
			'show_admin_column'      => true,
			'show_in_nav_menus'      => false,
			'update_count_callback'  => '_update_post_term_count',
			'query_var'              => true,
			'rewrite'                => array(
				'slug' => 'aroma',
			),
	  ) );

}

/**
 * Flavor Taxonomy
 *
 * Adds the Flavor taxonomy to all custom post types
 *
 * @since    1.0.0
 */

add_action( 'init', 'wpd_details_flavor', 0 );

/**
 * Flavor
 */
function wpd_details_flavor() {

	  $labels = array(
		'name'                       => _x( 'Flavors', 'general name' ),
		'singular_name'              => _x( 'Flavor', 'singular name' ),
		'search_items'               => __( 'Search Flavors' ),
		'popular_items'              => __( 'Popular Flavors' ),
		'all_items'                  => __( 'All Flavors' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Flavor' ),
		'update_item'                => __( 'Update Flavor' ),
		'add_new_item'               => __( 'Add New Flavor' ),
		'new_item_name'              => __( 'New Flavor Name' ),
		'separate_items_with_commas' => __( 'Separate flavors with commas' ),
		'add_or_remove_items'        => __( 'Add or remove flavors' ),
		'choose_from_most_used'      => __( 'Choose from the most used flavors' ),
		'not_found'                  => 'No flavors found',
		'menu_name'                  => __( 'Flavors' ),
	  );

	  register_taxonomy( 'flavor', 'product', array(
			'hierarchical'           => false,
			'labels'                 => $labels,
			'show_ui'                => true,
			'show_in_rest'           => true,
			'show_admin_column'      => true,
			'show_in_nav_menus'      => false,
			'update_count_callback'  => '_update_post_term_count',
			'query_var'              => true,
			'rewrite'                => array(
				'slug' => 'flavor',
			),
	  ) );
}

/**
 * Effect Taxonomy
 *
 * Adds the Effect taxonomy to all custom post types
 *
 * @since    1.0.0
 */

add_action( 'init', 'wpd_details_effect', 0 );

/**
 * Effect
 */
function wpd_details_effect() {

	  $labels = array(
		'name'                       => _x( 'Effects', 'general name' ),
		'singular_name'              => _x( 'Effect', 'singular name' ),
		'search_items'               => __( 'Search Effects' ),
		'popular_items'              => __( 'Popular Effects' ),
		'all_items'                  => __( 'All Effects' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Effect' ),
		'update_item'                => __( 'Update Effect' ),
		'add_new_item'               => __( 'Add New Effect' ),
		'new_item_name'              => __( 'New Effect Name' ),
		'separate_items_with_commas' => __( 'Separate effects with commas' ),
		'add_or_remove_items'        => __( 'Add or remove effects' ),
		'choose_from_most_used'      => __( 'Choose from the most used effects' ),
		'not_found'                  => 'No effects found',
		'menu_name'                  => __( 'Effects' ),
	  );

	  register_taxonomy( 'effect', 'product', array(
			'hierarchical'           => false,
			'labels'                 => $labels,
			'show_ui'                => true,
			'show_in_rest'           => true,
			'show_admin_column'      => true,
			'show_in_nav_menus'      => false,
			'update_count_callback'  => '_update_post_term_count',
			'query_var'              => true,
			'rewrite'                => array(
				'slug' => 'effect',
			),
	  ) );
}

/**
 * Symptom Taxonomy
 *
 * Adds the Symptom taxonomy to all custom post types
 *
 * @since    1.0.0
 */

add_action( 'init', 'wpd_details_symptom', 0 );

/**
 * Symptom
 */
function wpd_details_symptom() {

	  $labels = array(
		'name'                       => _x( 'Symptoms', 'general name' ),
		'singular_name'              => _x( 'Symptom', 'singular name' ),
		'search_items'               => __( 'Search Symptoms' ),
		'popular_items'              => __( 'Popular Symptoms' ),
		'all_items'                  => __( 'All Symptoms' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Symptom' ),
		'update_item'                => __( 'Update Symptom' ),
		'add_new_item'               => __( 'Add New Symptom' ),
		'new_item_name'              => __( 'New Symptom Name' ),
		'separate_items_with_commas' => __( 'Separate symptoms with commas' ),
		'add_or_remove_items'        => __( 'Add or remove symptoms' ),
		'choose_from_most_used'      => __( 'Choose from the most used symptoms' ),
		'not_found'                  => 'No symptoms found',
		'menu_name'                  => __( 'Symptoms' ),
	  );

	  register_taxonomy( 'symptom', 'product', array(
			'hierarchical'           => false,
			'labels'                 => $labels,
			'show_ui'                => true,
			'show_in_rest'           => true,
			'show_admin_column'      => true,
			'show_in_nav_menus'      => false,
			'update_count_callback'  => '_update_post_term_count',
			'query_var'              => true,
			'rewrite'                => array(
				'slug' => 'symptom',
			),
	  ) );
}

/**
 * Condition Taxonomy
 *
 * Adds the Condition taxonomy to all custom post types
 *
 * @since    1.0.0
 */

add_action( 'init', 'wpd_details_condition', 0 );

/**
 * Condition
 */
function wpd_details_condition() {

	  $labels = array(
		'name'                       => _x( 'Conditions', 'general name' ),
		'singular_name'              => _x( 'Condition', 'singular name' ),
		'search_items'               => __( 'Search Conditions' ),
		'popular_items'              => __( 'Popular Conditions' ),
		'all_items'                  => __( 'All Conditions' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Condition' ),
		'update_item'                => __( 'Update Condition' ),
		'add_new_item'               => __( 'Add New Condition' ),
		'new_item_name'              => __( 'New Condition Name' ),
		'separate_items_with_commas' => __( 'Separate conditions with commas' ),
		'add_or_remove_items'        => __( 'Add or remove conditions' ),
		'choose_from_most_used'      => __( 'Choose from the most used conditions' ),
		'not_found'                  => 'No conditions found',
		'menu_name'                  => __( 'Conditions' ),
	  );

	  register_taxonomy( 'condition', 'product', array(
			'hierarchical'           => false,
			'labels'                 => $labels,
			'show_ui'                => true,
			'show_in_rest'           => true,
			'show_admin_column'      => true,
			'show_in_nav_menus'      => false,
			'update_count_callback'  => '_update_post_term_count',
			'query_var'              => true,
			'rewrite'                => array(
				'slug' => 'condition',
			),
	  ) );
}

/**
 * Ingredient Taxonomy
 *
 * Adds the Ingredient taxonomy to all custom post types
 *
 * @since    1.0.0
 */

add_action( 'init', 'wpd_details_ingredient', 0 );

/**
 * Ingredient
 */
function wpd_details_ingredient() {

	  $labels = array(
		'name'                       => _x( 'Ingredients', 'general name' ),
		'singular_name'              => _x( 'Ingredient', 'singular name' ),
		'search_items'               => __( 'Search Ingredients' ),
		'popular_items'              => __( 'Popular Ingredients' ),
		'all_items'                  => __( 'All Ingredients' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Ingredient' ),
		'update_item'                => __( 'Update Ingredient' ),
		'add_new_item'               => __( 'Add New Ingredient' ),
		'new_item_name'              => __( 'New Ingredient Name' ),
		'separate_items_with_commas' => __( 'Separate ingredients with commas' ),
		'add_or_remove_items'        => __( 'Add or remove ingredients' ),
		'choose_from_most_used'      => __( 'Choose from the most used ingredients' ),
		'not_found'                  => 'No ingredients found',
		'menu_name'                  => __( 'Ingredients' ),
	  );

	  register_taxonomy( 'ingredients', 'product', array(
			'hierarchical'           => false,
			'labels'                 => $labels,
			'show_ui'                => true,
			'show_in_rest'           => true,
			'show_admin_column'      => true,
			'show_in_nav_menus'      => false,
			'update_count_callback'  => '_update_post_term_count',
			'query_var'              => true,
			'rewrite'                => array(
				'slug' => 'ingredient',
			),
	  ) );
}

/**
 * Vendor Taxonomy
 *
 * Adds the Vendor taxonomy to all custom post types
 *
 * @since    1.9.11
 */

add_action( 'init', 'wpd_details_vendor', 0 );

/**
 * Vendor
 */
function wpd_details_vendor() {

	$labels = array(
		'name'                       => _x( 'Vendors', 'general name' ),
		'singular_name'              => _x( 'Vendor', 'singular name' ),
		'search_items'               => __( 'Search Vendors' ),
		'popular_items'              => __( 'Popular Vendors' ),
		'all_items'                  => __( 'All Vendors' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Vendor' ),
		'update_item'                => __( 'Update Vendor' ),
		'add_new_item'               => __( 'Add New Vendor' ),
		'new_item_name'              => __( 'New Vendor Name' ),
		'separate_items_with_commas' => __( 'Separate vendors with commas' ),
		'add_or_remove_items'        => __( 'Add or remove vendors' ),
		'choose_from_most_used'      => __( 'Choose from the most used vendors' ),
		'not_found'                  => 'No vendors found',
		'menu_name'                  => __( 'Vendors' ),
	);

	register_taxonomy( 'vendor', 'product', array(
		'hierarchical'           => false,
		'labels'                 => $labels,
		'show_ui'                => true,
		'show_in_rest'           => true,
		'show_admin_column'      => true,
		'show_in_nav_menus'      => false,
		'update_count_callback'  => '_update_post_term_count',
		'query_var'              => true,
		'rewrite'                => array(
			'slug' => 'vendor',
		),
	) );

}
