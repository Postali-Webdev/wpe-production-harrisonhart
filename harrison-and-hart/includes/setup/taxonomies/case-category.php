<?php
function register_categories_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Case Category', 'Case Categories' ),
		'singular_name'              => _x( 'Case Category', 'Case Category' ),
		'menu_name'                  => __( 'Case Category' ),
		'all_items'                  => __( 'All Categories' ),
		'new_item_name'              => __( 'New Category' ),
		'add_new_item'               => __( 'Add Category' ),
		'edit_item'                  => __( 'Edit Category' ),
		'update_item'                => __( 'Update Category' ),
		'view_item'                  => __( 'View Category' ),
		'separate_items_with_commas' => __( 'Separate Categories with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Categories' ),
		'popular_items'              => __( 'Popular Categories' ),
		'search_items'               => __( 'Search Categories' ),
		'not_found'                  => __( 'Not Found' ),
		'no_terms'                   => __( 'No Categories' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'case-category', array( 'case-results' ), $args );

}
add_action( 'init', 'register_categories_taxonomy', 0 );