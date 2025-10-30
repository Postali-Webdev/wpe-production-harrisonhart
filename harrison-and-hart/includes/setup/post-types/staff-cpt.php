<?php
/**
 * Custom Staff Post Type
 *
 * @package Postali Child
 * @author Postali LLC
 */

function create_custom_post_type_staff() {

    // set up labels
    $labels = array(
        'name' => 'Staff',
        'singular_name' => 'Staff',
        'add_new' => 'Add New Staff',
        'add_new_item' => 'Add New Staff',
        'edit_item' => 'Edit Staff',
        'new_item' => 'New Staff',
        'all_items' => 'All Staff',
        'view_item' => 'View Staff',
        'search_items' => 'Search Staff',
        'not_found' =>  'No Staff Found',
        'not_found_in_trash' => 'No Staff found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Staff',

    );
    //register post type
    register_post_type( 'staff', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-groups',
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        // 'rewrite' => array( 'slug' => '/'),
        // 'rewrite' => array( 'slug' => 'about-us', 'with_front' => false ), // Has /about/ as pre front for the theme, if there are more then staff to be listed under here this need removed
        )
    );

}
add_action( 'init', 'create_custom_post_type_staff' );