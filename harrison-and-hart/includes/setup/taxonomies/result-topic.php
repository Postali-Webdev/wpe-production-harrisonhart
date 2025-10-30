<?php
function register_result_topics_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Topics', 'Topics' ),
		'singular_name'              => _x( 'Topics', 'Topics' ),
		'menu_name'                  => __( 'Topics' ),
		'all_items'                  => __( 'All Topics' ),
		'new_item_name'              => __( 'New Topic' ),
		'add_new_item'               => __( 'Add Topic' ),
		'edit_item'                  => __( 'Edit Topic' ),
		'update_item'                => __( 'Update Topic' ),
		'view_item'                  => __( 'View Topic' ),
		'separate_items_with_commas' => __( 'Separate Topics with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Topics' ),
		'popular_items'              => __( 'Popular Topics' ),
		'search_items'               => __( 'Search Topics' ),
		'not_found'                  => __( 'Not Found' ),
		'no_terms'                   => __( 'No Topics' ),
	);
    $rewrite = array(
		'slug'                       => 'case-results/result-topic',
        'with_front'                 => true,
        'pages'                      => true,
        'feeds'                      => true,
		'hierarchical'               => true,
    );
	$args = array(
		'labels'                     => $labels,
        'hierarchical'               => true,

		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
        'rewrite'                    => $rewrite
	);
	register_taxonomy( 'result-topic', array( 'case-results' ), $args );

    // $page_data = get_post( 309 );
    // add_rewrite_rule(
    //     $page_data->post_name . '/page/?([0-9]{1,})/?$',
    //     'index.php?pagename='.$page_data->post_name.'',
    //     'top'
    // );
    // add_rewrite_rule('^result-topic([^/]*)/?','index.php?ingredient=$matches[1]','top');
}
add_action( 'init', 'register_result_topics_taxonomy', 0 );