<?php
/**
 * Custom Case Results Custom Post Type
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_results() {

// set up labels
    $labels = array(
        'name' => 'Results',
        'singular_name' => 'Result',
        'add_new' => 'Add New Case Result',
        'add_new_item' => 'Add New Case Result',
        'edit_item' => 'Edit Results',
        'new_item' => 'New Results',
        'all_items' => 'All Results',
        'view_item' => 'View Results',
        'search_items' => 'Search Case Results',
        'not_found' =>  'No Results Found',
        'not_found_in_trash' => 'No Results found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Case Results',

    );
    //register post type
    $rewrite = array(
        'slug'          => 'case-results',
        'with_front'    => true, // Allows for /case-results/ to be the preface to non pages, but custom posts to have own root Whether the permastruct should be prepended with WP_Rewrite::$front
        'pages'         => true, // Whether the permastruct should provide for pagination
        'feeds'         => true, // Whether the feed permastruct should be built for this post type. Default is value of $has_archive
    );
    register_post_type( 'case-results', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-analytics',
        'taxonomies' => array('result-topics'),
        'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields'),  
        'capability_type' => 'post',

        'exclude_from_search' => false,
        'public' => true,
        
        'hierarchical'          => true,
        // 'hierarchical'          => false,
        'has_archive'           => true,
        
        'query_var' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'rewrite' => $rewrite,
        // 'rewrite' => array( 'slug' => 'case-results', 'with_front' => true ), 
        )
    );

}
add_action( 'init', 'create_custom_post_type_results' );