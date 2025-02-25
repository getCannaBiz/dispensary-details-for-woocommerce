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
 * Aroma Taxonomy
 *
 * Adds the Aroma taxonomy to all custom post types
 *
 * @since    1.0.0
 */

function dispensary_details_aroma() {

	  $labels = [
		'name'                       => _x( 'Aromas', 'general name', 'dispensary-details' ),
		'singular_name'              => _x( 'Aroma', 'singular name', 'dispensary-details' ),
		'search_items'               => __( 'Search Aromas', 'dispensary-details' ),
		'popular_items'              => __( 'Popular Aromas', 'dispensary-details' ),
		'all_items'                  => __( 'All Aromas', 'dispensary-details' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Aroma', 'dispensary-details' ),
		'update_item'                => __( 'Update Aroma', 'dispensary-details' ),
		'add_new_item'               => __( 'Add New Aroma', 'dispensary-details' ),
		'new_item_name'              => __( 'New Aroma Name', 'dispensary-details' ),
		'separate_items_with_commas' => __( 'Separate aromas with commas', 'dispensary-details' ),
		'add_or_remove_items'        => __( 'Add or remove aromas', 'dispensary-details' ),
		'choose_from_most_used'      => __( 'Choose from the most used aromas', 'dispensary-details' ),
		'not_found'                  => __( 'no aromas found', 'dispensary-details' ),
		'menu_name'                  => __( 'Aromas', 'dispensary-details' ),
	  ];

		$capabilities = [
			'manage_terms' => 'edit_aromas',
			'edit_terms'   => 'edit_aromas',
			'delete_terms' => 'edit_aromas',
			'assign_terms' => 'read',
		];

	  register_taxonomy( 'aroma', 'product', [
			'hierarchical'           => false,
			'labels'                 => $labels,
			'capabilities'           => $capabilities,
			'show_ui'                => true,
			'show_in_rest'           => true,
			'show_admin_column'      => true,
			'show_in_nav_menus'      => false,
			'update_count_callback'  => '_update_post_term_count',
			'query_var'              => true,
			'rewrite'                => [
				'slug' => 'aroma',
            ],
	  ] );

}
add_action( 'init', 'dispensary_details_aroma', 0 );

/**
 * Flavor Taxonomy
 *
 * Adds the Flavor taxonomy to all custom post types
 *
 * @since    1.0.0
 */
function dispensary_details_flavor() {

	  $labels = [
		'name'                       => _x( 'Flavors', 'general name', 'dispensary-details' ),
		'singular_name'              => _x( 'Flavor', 'singular name', 'dispensary-details' ),
		'search_items'               => __( 'Search Flavors', 'dispensary-details' ),
		'popular_items'              => __( 'Popular Flavors', 'dispensary-details' ),
		'all_items'                  => __( 'All Flavors', 'dispensary-details' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Flavor', 'dispensary-details' ),
		'update_item'                => __( 'Update Flavor', 'dispensary-details' ),
		'add_new_item'               => __( 'Add New Flavor', 'dispensary-details' ),
		'new_item_name'              => __( 'New Flavor Name', 'dispensary-details' ),
		'separate_items_with_commas' => __( 'Separate flavors with commas', 'dispensary-details' ),
		'add_or_remove_items'        => __( 'Add or remove flavors', 'dispensary-details' ),
		'choose_from_most_used'      => __( 'Choose from the most used flavors', 'dispensary-details' ),
		'not_found'                  => __( 'No flavors found', 'dispensary-details' ),
		'menu_name'                  => __( 'Flavors', 'dispensary-details' ),
	  ];

		$capabilities = [
			'manage_terms' => 'edit_flavors',
			'edit_terms'   => 'edit_flavors',
			'delete_terms' => 'edit_flavors',
			'assign_terms' => 'read',
		];

	  register_taxonomy( 'flavor', 'product', [
			'hierarchical'           => false,
			'labels'                 => $labels,
			'capabilities'           => $capabilities,
			'show_ui'                => true,
			'show_in_rest'           => true,
			'show_admin_column'      => true,
			'show_in_nav_menus'      => false,
			'update_count_callback'  => '_update_post_term_count',
			'query_var'              => true,
			'rewrite'                => [
				'slug' => 'flavor',
            ],
	  ] );
}
add_action( 'init', 'dispensary_details_flavor', 0 );

/**
 * Effect Taxonomy
 *
 * Adds the Effect taxonomy to all custom post types
 *
 * @since    1.0.0
 */
function dispensary_details_effect() {

	  $labels = [
		'name'                       => _x( 'Effects', 'general name', 'dispensary-details' ),
		'singular_name'              => _x( 'Effect', 'singular name', 'dispensary-details' ),
		'search_items'               => __( 'Search Effects', 'dispensary-details' ),
		'popular_items'              => __( 'Popular Effects', 'dispensary-details' ),
		'all_items'                  => __( 'All Effects', 'dispensary-details' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Effect', 'dispensary-details' ),
		'update_item'                => __( 'Update Effect', 'dispensary-details' ),
		'add_new_item'               => __( 'Add New Effect', 'dispensary-details' ),
		'new_item_name'              => __( 'New Effect Name' , 'dispensary-details'),
		'separate_items_with_commas' => __( 'Separate effects with commas', 'dispensary-details' ),
		'add_or_remove_items'        => __( 'Add or remove effects', 'dispensary-details' ),
		'choose_from_most_used'      => __( 'Choose from the most used effects', 'dispensary-details' ),
		'not_found'                  => __( 'No effects found', 'dispensary-details' ),
		'menu_name'                  => __( 'Effects', 'dispensary-details' ),
	  ];

		$capabilities = [
			'manage_terms' => 'edit_effects',
			'edit_terms'   => 'edit_effects',
			'delete_terms' => 'edit_effects',
			'assign_terms' => 'read',
		];

	  register_taxonomy( 'effect', 'product', [
			'hierarchical'           => false,
			'labels'                 => $labels,
			'capabilities'           => $capabilities,
			'show_ui'                => true,
			'show_in_rest'           => true,
			'show_admin_column'      => true,
			'show_in_nav_menus'      => false,
			'update_count_callback'  => '_update_post_term_count',
			'query_var'              => true,
			'rewrite'                => [
				'slug' => 'effect',
            ],
	  ] );
}
add_action( 'init', 'dispensary_details_effect', 0 );

/**
 * Symptom Taxonomy
 *
 * Adds the Symptom taxonomy to all custom post types
 *
 * @since    1.0.0
 */
function dispensary_details_symptom() {

	  $labels = [
			'name'                       => _x( 'Symptoms', 'general name', 'dispensary-details' ),
			'singular_name'              => _x( 'Symptom', 'singular name', 'dispensary-details' ),
			'search_items'               => __( 'Search Symptoms', 'dispensary-details' ),
			'popular_items'              => __( 'Popular Symptoms', 'dispensary-details' ),
			'all_items'                  => __( 'All Symptoms', 'dispensary-details' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Symptom', 'dispensary-details' ),
			'update_item'                => __( 'Update Symptom', 'dispensary-details' ),
			'add_new_item'               => __( 'Add New Symptom', 'dispensary-details' ),
			'new_item_name'              => __( 'New Symptom Name', 'dispensary-details' ),
			'separate_items_with_commas' => __( 'Separate symptoms with commas', 'dispensary-details' ),
			'add_or_remove_items'        => __( 'Add or remove symptoms', 'dispensary-details' ),
			'choose_from_most_used'      => __( 'Choose from the most used symptoms', 'dispensary-details' ),
			'not_found'                  => __( 'No symptoms found', 'dispensary-details' ),
			'menu_name'                  => __( 'Symptoms', 'dispensary-details' ),
	  ];

		$capabilities = [
			'manage_terms' => 'edit_symptoms',
			'edit_terms'   => 'edit_symptoms',
			'delete_terms' => 'edit_symptoms',
			'assign_terms' => 'read',
		];

	  register_taxonomy( 'symptom', 'product', [
			'hierarchical'           => false,
			'labels'                 => $labels,
			'capabilities'           => $capabilities,
			'show_ui'                => true,
			'show_in_rest'           => true,
			'show_admin_column'      => true,
			'show_in_nav_menus'      => false,
			'update_count_callback'  => '_update_post_term_count',
			'query_var'              => true,
			'rewrite'                => [
				'slug' => 'symptom',
            ],
	  ] );
}
add_action( 'init', 'dispensary_details_symptom', 0 );

/**
 * Condition Taxonomy
 *
 * Adds the Condition taxonomy to all custom post types
 *
 * @since    1.0.0
 */
function dispensary_details_condition() {

	  $labels = [
			'name'                       => _x( 'Conditions', 'general name', 'dispensary-details' ),
			'singular_name'              => _x( 'Condition', 'singular name', 'dispensary-details' ),
			'search_items'               => __( 'Search Conditions', 'dispensary-details' ),
			'popular_items'              => __( 'Popular Conditions', 'dispensary-details' ),
			'all_items'                  => __( 'All Conditions', 'dispensary-details' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Condition', 'dispensary-details' ),
			'update_item'                => __( 'Update Condition', 'dispensary-details' ),
			'add_new_item'               => __( 'Add New Condition', 'dispensary-details' ),
			'new_item_name'              => __( 'New Condition Name', 'dispensary-details' ),
			'separate_items_with_commas' => __( 'Separate conditions with commas', 'dispensary-details' ),
			'add_or_remove_items'        => __( 'Add or remove conditions', 'dispensary-details' ),
			'choose_from_most_used'      => __( 'Choose from the most used conditions', 'dispensary-details' ),
			'not_found'                  => __( 'No conditions found', 'dispensary-details' ),
			'menu_name'                  => __( 'Conditions', 'dispensary-details' ),
	  ];

		$capabilities = [
			'manage_terms' => 'edit_conditions',
			'edit_terms'   => 'edit_conditions',
			'delete_terms' => 'edit_conditions',
			'assign_terms' => 'read',
		];

	  register_taxonomy( 'condition', 'product', [
			'hierarchical'           => false,
			'labels'                 => $labels,
			'capabilities'           => $capabilities,
			'show_ui'                => true,
			'show_in_rest'           => true,
			'show_admin_column'      => true,
			'show_in_nav_menus'      => false,
			'update_count_callback'  => '_update_post_term_count',
			'query_var'              => true,
			'rewrite'                => [
				'slug' => 'condition',
            ],
	  ] );
}
add_action( 'init', 'dispensary_details_condition', 0 );

/**
 * Ingredient Taxonomy
 *
 * Adds the Ingredient taxonomy to all custom post types
 *
 * @since    1.0.0
 */
function dispensary_details_ingredient() {

	  $labels = [
			'name'                       => _x( 'Ingredients', 'general name', 'dispensary-details' ),
			'singular_name'              => _x( 'Ingredient', 'singular name', 'dispensary-details' ),
			'search_items'               => __( 'Search Ingredients', 'dispensary-details' ),
			'popular_items'              => __( 'Popular Ingredients', 'dispensary-details' ),
			'all_items'                  => __( 'All Ingredients', 'dispensary-details' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Ingredient', 'dispensary-details' ),
			'update_item'                => __( 'Update Ingredient', 'dispensary-details' ),
			'add_new_item'               => __( 'Add New Ingredient', 'dispensary-details' ),
			'new_item_name'              => __( 'New Ingredient Name', 'dispensary-details' ),
			'separate_items_with_commas' => __( 'Separate ingredients with commas', 'dispensary-details' ),
			'add_or_remove_items'        => __( 'Add or remove ingredients', 'dispensary-details' ),
			'choose_from_most_used'      => __( 'Choose from the most used ingredients', 'dispensary-details' ),
			'not_found'                  => __( 'No ingredients found', 'dispensary-details' ),
			'menu_name'                  => __( 'Ingredients', 'dispensary-details' ),
	  ];

		$capabilities = [
			'manage_terms' => 'edit_ingredients',
			'edit_terms'   => 'edit_ingredients',
			'delete_terms' => 'edit_ingredients',
			'assign_terms' => 'read',
		];

	  register_taxonomy( 'ingredients', 'product', [
			'hierarchical'           => false,
			'labels'                 => $labels,
			'capabilities'           => $capabilities,
			'show_ui'                => true,
			'show_in_rest'           => true,
			'show_admin_column'      => true,
			'show_in_nav_menus'      => false,
			'update_count_callback'  => '_update_post_term_count',
			'query_var'              => true,
			'rewrite'                => [
				'slug' => 'ingredient',
            ],
	  ] );
}
add_action( 'init', 'dispensary_details_ingredient', 0 );

/**
 * Vendor Taxonomy
 *
 * Adds the Vendor taxonomy to all custom post types
 *
 * @since    1.9.11
 */
function dispensary_details_vendor() {

	$labels = [
		'name'                       => _x( 'Vendors', 'general name', 'dispensary-details' ),
		'singular_name'              => _x( 'Vendor', 'singular name', 'dispensary-details' ),
		'search_items'               => __( 'Search Vendors', 'dispensary-details' ),
		'popular_items'              => __( 'Popular Vendors', 'dispensary-details' ),
		'all_items'                  => __( 'All Vendors', 'dispensary-details' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Vendor', 'dispensary-details' ),
		'update_item'                => __( 'Update Vendor', 'dispensary-details' ),
		'add_new_item'               => __( 'Add New Vendor', 'dispensary-details' ),
		'new_item_name'              => __( 'New Vendor Name', 'dispensary-details' ),
		'separate_items_with_commas' => __( 'Separate vendors with commas', 'dispensary-details' ),
		'add_or_remove_items'        => __( 'Add or remove vendors', 'dispensary-details' ),
		'choose_from_most_used'      => __( 'Choose from the most used vendors', 'dispensary-details' ),
		'not_found'                  => __( 'No vendors found', 'dispensary-details' ),
		'menu_name'                  => __( 'Vendors', 'dispensary-details' ),
	];

	$capabilities = [
		'manage_terms' => 'edit_vendors',
		'edit_terms'   => 'edit_vendors',
		'delete_terms' => 'edit_vendors',
		'assign_terms' => 'read',
	];

	register_taxonomy( 'vendor', 'product', [
		'hierarchical'           => false,
		'labels'                 => $labels,
		'capabilities'           => $capabilities,
		'show_ui'                => true,
		'show_in_rest'           => true,
		'show_admin_column'      => true,
		'show_in_nav_menus'      => false,
		'update_count_callback'  => '_update_post_term_count',
		'query_var'              => true,
		'rewrite'                => [
			'slug' => 'vendor',
        ],
	] );

}
add_action( 'init', 'dispensary_details_vendor', 0 );

/**
 * Shelf Type
 *
 * Adds the Shelf Type taxonomy to specific custom post types
 *
 * @since    1.5
 */
function dispensary_details_shelf_type() {

	$labels = [
		'name'                       => _x( 'Shelf types', 'general name', 'dispensary-details' ),
		'singular_name'              => _x( 'Shelf type', 'singular name', 'dispensary-details' ),
		'search_items'               => __( 'Search shelf types', 'dispensary-details' ),
		'popular_items'              => __( 'Popular shelf types', 'dispensary-details' ),
		'all_items'                  => __( 'All shelf types', 'dispensary-details' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit shelf type', 'dispensary-details' ),
		'update_item'                => __( 'Update shelf type', 'dispensary-details' ),
		'add_new_item'               => __( 'Add New shelf type', 'dispensary-details' ),
		'new_item_name'              => __( 'New shelf type name', 'dispensary-details' ),
		'separate_items_with_commas' => __( 'Separate shelf types with commas', 'dispensary-details' ),
		'add_or_remove_items'        => __( 'Add or remove shelf types', 'dispensary-details' ),
		'choose_from_most_used'      => __( 'Choose from the most used shelf types', 'dispensary-details' ),
		'not_found'                  => __( 'No shelf types found', 'dispensary-details' ),
		'menu_name'                  => __( 'Shelf types', 'dispensary-details' ),
	];

	$capabilities = [
		'manage_terms' => 'edit_shelf_type',
		'edit_terms'   => 'edit_shelf_type',
		'delete_terms' => 'edit_shelf_type',
		'assign_terms' => 'read',
	];

	register_taxonomy( 'shelf_type', 'product', [
		'hierarchical'           => false,
		'labels'                 => $labels,
		'capabilities'           => $capabilities,
		'show_ui'                => true,
		'show_in_rest'           => true,
		'show_admin_column'      => true,
		'show_in_nav_menus'      => false,
		'update_count_callback'  => '_update_post_term_count',
		'query_var'              => true,
		'rewrite'                => [
			'slug' => 'shelf-type',
        ],
	] );

}
add_action( 'init', 'dispensary_details_shelf_type', 0 );

/**
 * Strain Type
 *
 * Adds the Strain Type taxonomy to specific custom post types
 *
 * @since    1.5
 */
function dispensary_details_strain_type() {

	$labels = [
		'name'                       => _x( 'Strain types', 'general name', 'dispensary-details' ),
		'singular_name'              => _x( 'Strain type', 'singular name', 'dispensary-details' ),
		'search_items'               => __( 'Search strain types', 'dispensary-details' ),
		'popular_items'              => __( 'Popular strain types', 'dispensary-details' ),
		'all_items'                  => __( 'All strain types', 'dispensary-details' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit strain type', 'dispensary-details' ),
		'update_item'                => __( 'Update strain type', 'dispensary-details' ),
		'add_new_item'               => __( 'Add New strain type', 'dispensary-details' ),
		'new_item_name'              => __( 'New strain type name', 'dispensary-details' ),
		'separate_items_with_commas' => __( 'Separate strain types with commas', 'dispensary-details' ),
		'add_or_remove_items'        => __( 'Add or remove strain types', 'dispensary-details' ),
		'choose_from_most_used'      => __( 'Choose from the most used strain types', 'dispensary-details' ),
		'not_found'                  => __( 'No strain types found', 'dispensary-details' ),
		'menu_name'                  => __( 'Strain types', 'dispensary-details' ),
	];

	$capabilities = [
		'manage_terms' => 'edit_strain_type',
		'edit_terms'   => 'edit_strain_type',
		'delete_terms' => 'edit_strain_type',
		'assign_terms' => 'read',
	];

	register_taxonomy( 'strain_type', 'product', [
		'hierarchical'           => false,
		'labels'                 => $labels,
		'capabilities'           => $capabilities,
		'show_ui'                => true,
		'show_in_rest'           => true,
		'show_admin_column'      => true,
		'show_in_nav_menus'      => false,
		'update_count_callback'  => '_update_post_term_count',
		'query_var'              => true,
		'rewrite'                => [
			'slug' => 'strain-type',
        ],
	] );

}
add_action( 'init', 'dispensary_details_strain_type', 0 );
