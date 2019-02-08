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
		'name'                       => _x( 'Aromas', 'general name', 'wpd-details' ),
		'singular_name'              => _x( 'Aroma', 'singular name', 'wpd-details' ),
		'search_items'               => __( 'Search Aromas', 'wpd-details' ),
		'popular_items'              => __( 'Popular Aromas', 'wpd-details' ),
		'all_items'                  => __( 'All Aromas', 'wpd-details' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Aroma', 'wpd-details' ),
		'update_item'                => __( 'Update Aroma', 'wpd-details' ),
		'add_new_item'               => __( 'Add New Aroma', 'wpd-details' ),
		'new_item_name'              => __( 'New Aroma Name', 'wpd-details' ),
		'separate_items_with_commas' => __( 'Separate aromas with commas', 'wpd-details' ),
		'add_or_remove_items'        => __( 'Add or remove aromas', 'wpd-details' ),
		'choose_from_most_used'      => __( 'Choose from the most used aromas', 'wpd-details' ),
		'not_found'                  => __( 'no aromas found', 'wpd-details' ),
		'menu_name'                  => __( 'Aromas', 'wpd-details' ),
	  );

		$capabilities = array(
			'manage_terms' => 'edit_aromas',
			'edit_terms'   => 'edit_aromas',
			'delete_terms' => 'edit_aromas',
			'assign_terms' => 'read',
		);

	  register_taxonomy( 'aroma', 'product', array(
			'hierarchical'           => false,
			'labels'                 => $labels,
			'capabilities'           => $capabilities,
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
		'name'                       => _x( 'Flavors', 'general name', 'wpd-details' ),
		'singular_name'              => _x( 'Flavor', 'singular name', 'wpd-details' ),
		'search_items'               => __( 'Search Flavors', 'wpd-details' ),
		'popular_items'              => __( 'Popular Flavors', 'wpd-details' ),
		'all_items'                  => __( 'All Flavors', 'wpd-details' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Flavor', 'wpd-details' ),
		'update_item'                => __( 'Update Flavor', 'wpd-details' ),
		'add_new_item'               => __( 'Add New Flavor', 'wpd-details' ),
		'new_item_name'              => __( 'New Flavor Name', 'wpd-details' ),
		'separate_items_with_commas' => __( 'Separate flavors with commas', 'wpd-details' ),
		'add_or_remove_items'        => __( 'Add or remove flavors', 'wpd-details' ),
		'choose_from_most_used'      => __( 'Choose from the most used flavors', 'wpd-details' ),
		'not_found'                  => __( 'No flavors found', 'wpd-details' ),
		'menu_name'                  => __( 'Flavors', 'wpd-details' ),
	  );

		$capabilities = array(
			'manage_terms' => 'edit_flavors',
			'edit_terms'   => 'edit_flavors',
			'delete_terms' => 'edit_flavors',
			'assign_terms' => 'read',
		);

	  register_taxonomy( 'flavor', 'product', array(
			'hierarchical'           => false,
			'labels'                 => $labels,
			'capabilities'           => $capabilities,
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
		'name'                       => _x( 'Effects', 'general name', 'wpd-details' ),
		'singular_name'              => _x( 'Effect', 'singular name', 'wpd-details' ),
		'search_items'               => __( 'Search Effects', 'wpd-details' ),
		'popular_items'              => __( 'Popular Effects', 'wpd-details' ),
		'all_items'                  => __( 'All Effects', 'wpd-details' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Effect', 'wpd-details' ),
		'update_item'                => __( 'Update Effect', 'wpd-details' ),
		'add_new_item'               => __( 'Add New Effect', 'wpd-details' ),
		'new_item_name'              => __( 'New Effect Name' , 'wpd-details'),
		'separate_items_with_commas' => __( 'Separate effects with commas', 'wpd-details' ),
		'add_or_remove_items'        => __( 'Add or remove effects', 'wpd-details' ),
		'choose_from_most_used'      => __( 'Choose from the most used effects', 'wpd-details' ),
		'not_found'                  => __( 'No effects found', 'wpd-details' ),
		'menu_name'                  => __( 'Effects', 'wpd-details' ),
	  );

		$capabilities = array(
			'manage_terms' => 'edit_effects',
			'edit_terms'   => 'edit_effects',
			'delete_terms' => 'edit_effects',
			'assign_terms' => 'read',
		);

	  register_taxonomy( 'effect', 'product', array(
			'hierarchical'           => false,
			'labels'                 => $labels,
			'capabilities'           => $capabilities,
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
			'name'                       => _x( 'Symptoms', 'general name', 'wpd-details' ),
			'singular_name'              => _x( 'Symptom', 'singular name', 'wpd-details' ),
			'search_items'               => __( 'Search Symptoms', 'wpd-details' ),
			'popular_items'              => __( 'Popular Symptoms', 'wpd-details' ),
			'all_items'                  => __( 'All Symptoms', 'wpd-details' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Symptom', 'wpd-details' ),
			'update_item'                => __( 'Update Symptom', 'wpd-details' ),
			'add_new_item'               => __( 'Add New Symptom', 'wpd-details' ),
			'new_item_name'              => __( 'New Symptom Name', 'wpd-details' ),
			'separate_items_with_commas' => __( 'Separate symptoms with commas', 'wpd-details' ),
			'add_or_remove_items'        => __( 'Add or remove symptoms', 'wpd-details' ),
			'choose_from_most_used'      => __( 'Choose from the most used symptoms', 'wpd-details' ),
			'not_found'                  => __( 'No symptoms found', 'wpd-details' ),
			'menu_name'                  => __( 'Symptoms', 'wpd-details' ),
	  );

		$capabilities = array(
			'manage_terms' => 'edit_symptoms',
			'edit_terms'   => 'edit_symptoms',
			'delete_terms' => 'edit_symptoms',
			'assign_terms' => 'read',
		);

	  register_taxonomy( 'symptom', 'product', array(
			'hierarchical'           => false,
			'labels'                 => $labels,
			'capabilities'           => $capabilities,
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
			'name'                       => _x( 'Conditions', 'general name', 'wpd-details' ),
			'singular_name'              => _x( 'Condition', 'singular name', 'wpd-details' ),
			'search_items'               => __( 'Search Conditions', 'wpd-details' ),
			'popular_items'              => __( 'Popular Conditions', 'wpd-details' ),
			'all_items'                  => __( 'All Conditions', 'wpd-details' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Condition', 'wpd-details' ),
			'update_item'                => __( 'Update Condition', 'wpd-details' ),
			'add_new_item'               => __( 'Add New Condition', 'wpd-details' ),
			'new_item_name'              => __( 'New Condition Name', 'wpd-details' ),
			'separate_items_with_commas' => __( 'Separate conditions with commas', 'wpd-details' ),
			'add_or_remove_items'        => __( 'Add or remove conditions', 'wpd-details' ),
			'choose_from_most_used'      => __( 'Choose from the most used conditions', 'wpd-details' ),
			'not_found'                  => __( 'No conditions found', 'wpd-details' ),
			'menu_name'                  => __( 'Conditions', 'wpd-details' ),
	  );

		$capabilities = array(
			'manage_terms' => 'edit_conditions',
			'edit_terms'   => 'edit_conditions',
			'delete_terms' => 'edit_conditions',
			'assign_terms' => 'read',
		);

	  register_taxonomy( 'condition', 'product', array(
			'hierarchical'           => false,
			'labels'                 => $labels,
			'capabilities'           => $capabilities,
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
			'name'                       => _x( 'Ingredients', 'general name', 'wpd-details' ),
			'singular_name'              => _x( 'Ingredient', 'singular name', 'wpd-details' ),
			'search_items'               => __( 'Search Ingredients', 'wpd-details' ),
			'popular_items'              => __( 'Popular Ingredients', 'wpd-details' ),
			'all_items'                  => __( 'All Ingredients', 'wpd-details' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Ingredient', 'wpd-details' ),
			'update_item'                => __( 'Update Ingredient', 'wpd-details' ),
			'add_new_item'               => __( 'Add New Ingredient', 'wpd-details' ),
			'new_item_name'              => __( 'New Ingredient Name', 'wpd-details' ),
			'separate_items_with_commas' => __( 'Separate ingredients with commas', 'wpd-details' ),
			'add_or_remove_items'        => __( 'Add or remove ingredients', 'wpd-details' ),
			'choose_from_most_used'      => __( 'Choose from the most used ingredients', 'wpd-details' ),
			'not_found'                  => __( 'No ingredients found', 'wpd-details' ),
			'menu_name'                  => __( 'Ingredients', 'wpd-details' ),
	  );

		$capabilities = array(
			'manage_terms' => 'edit_ingredients',
			'edit_terms'   => 'edit_ingredients',
			'delete_terms' => 'edit_ingredients',
			'assign_terms' => 'read',
		);

	  register_taxonomy( 'ingredients', 'product', array(
			'hierarchical'           => false,
			'labels'                 => $labels,
			'capabilities'           => $capabilities,
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
		'name'                       => _x( 'Vendors', 'general name', 'wpd-details' ),
		'singular_name'              => _x( 'Vendor', 'singular name', 'wpd-details' ),
		'search_items'               => __( 'Search Vendors', 'wpd-details' ),
		'popular_items'              => __( 'Popular Vendors', 'wpd-details' ),
		'all_items'                  => __( 'All Vendors', 'wpd-details' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Vendor', 'wpd-details' ),
		'update_item'                => __( 'Update Vendor', 'wpd-details' ),
		'add_new_item'               => __( 'Add New Vendor', 'wpd-details' ),
		'new_item_name'              => __( 'New Vendor Name', 'wpd-details' ),
		'separate_items_with_commas' => __( 'Separate vendors with commas', 'wpd-details' ),
		'add_or_remove_items'        => __( 'Add or remove vendors', 'wpd-details' ),
		'choose_from_most_used'      => __( 'Choose from the most used vendors', 'wpd-details' ),
		'not_found'                  => __( 'No vendors found', 'wpd-details' ),
		'menu_name'                  => __( 'Vendors', 'wpd-details' ),
	);

	$capabilities = array(
		'manage_terms' => 'edit_vendors',
		'edit_terms'   => 'edit_vendors',
		'delete_terms' => 'edit_vendors',
		'assign_terms' => 'read',
	);

	register_taxonomy( 'vendor', 'product', array(
		'hierarchical'           => false,
		'labels'                 => $labels,
		'capabilities'           => $capabilities,
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

/**
 * Shelf Type
 *
 * Adds the Shelf Type taxonomy to specific custom post types
 *
 * @since    1.5
 */
function wpd_details_shelf_type() {

	$labels = array(
		'name'                       => _x( 'Shelf types', 'general name', 'wpd-details' ),
		'singular_name'              => _x( 'Shelf type', 'singular name', 'wpd-details' ),
		'search_items'               => __( 'Search shelf types', 'wpd-details' ),
		'popular_items'              => __( 'Popular shelf types', 'wpd-details' ),
		'all_items'                  => __( 'All shelf types', 'wpd-details' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit shelf type', 'wpd-details' ),
		'update_item'                => __( 'Update shelf type', 'wpd-details' ),
		'add_new_item'               => __( 'Add New shelf type', 'wpd-details' ),
		'new_item_name'              => __( 'New shelf type name', 'wpd-details' ),
		'separate_items_with_commas' => __( 'Separate shelf types with commas', 'wpd-details' ),
		'add_or_remove_items'        => __( 'Add or remove shelf types', 'wpd-details' ),
		'choose_from_most_used'      => __( 'Choose from the most used shelf types', 'wpd-details' ),
		'not_found'                  => __( 'No shelf types found', 'wpd-details' ),
		'menu_name'                  => __( 'Shelf types', 'wpd-details' ),
	);

	$capabilities = array(
		'manage_terms' => 'edit_shelf_type',
		'edit_terms'   => 'edit_shelf_type',
		'delete_terms' => 'edit_shelf_type',
		'assign_terms' => 'read',
	);

	register_taxonomy( 'shelf_type', 'product', array(
		'hierarchical'           => false,
		'labels'                 => $labels,
		'capabilities'           => $capabilities,
		'show_ui'                => true,
		'show_in_rest'           => true,
		'show_admin_column'      => true,
		'show_in_nav_menus'      => false,
		'update_count_callback'  => '_update_post_term_count',
		'query_var'              => true,
		'rewrite'                => array(
			'slug' => 'shelf-type',
		),
	) );

}
add_action( 'init', 'wpd_details_shelf_type', 0 );

/**
 * Strain Type
 *
 * Adds the Strain Type taxonomy to specific custom post types
 *
 * @since    1.5
 */
function wpd_details_strain_type() {

	$labels = array(
		'name'                       => _x( 'Strain types', 'general name', 'wpd-details' ),
		'singular_name'              => _x( 'Strain type', 'singular name', 'wpd-details' ),
		'search_items'               => __( 'Search strain types', 'wpd-details' ),
		'popular_items'              => __( 'Popular strain types', 'wpd-details' ),
		'all_items'                  => __( 'All strain types', 'wpd-details' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit strain type', 'wpd-details' ),
		'update_item'                => __( 'Update strain type', 'wpd-details' ),
		'add_new_item'               => __( 'Add New strain type', 'wpd-details' ),
		'new_item_name'              => __( 'New strain type name', 'wpd-details' ),
		'separate_items_with_commas' => __( 'Separate strain types with commas', 'wpd-details' ),
		'add_or_remove_items'        => __( 'Add or remove strain types', 'wpd-details' ),
		'choose_from_most_used'      => __( 'Choose from the most used strain types', 'wpd-details' ),
		'not_found'                  => __( 'No strain types found', 'wpd-details' ),
		'menu_name'                  => __( 'Strain types', 'wpd-details' ),
	);

	$capabilities = array(
		'manage_terms' => 'edit_strain_type',
		'edit_terms'   => 'edit_strain_type',
		'delete_terms' => 'edit_strain_type',
		'assign_terms' => 'read',
	);

	register_taxonomy( 'strain_type', 'product', array(
		'hierarchical'           => false,
		'labels'                 => $labels,
		'capabilities'           => $capabilities,
		'show_ui'                => true,
		'show_in_rest'           => true,
		'show_admin_column'      => true,
		'show_in_nav_menus'      => false,
		'update_count_callback'  => '_update_post_term_count',
		'query_var'              => true,
		'rewrite'                => array(
			'slug' => 'strain-type',
		),
	) );

}
add_action( 'init', 'wpd_details_strain_type', 0 );
