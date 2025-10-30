<?php
/**
 * Practice Area Custom Post Type
 *
 * @author Postali LLC
 */

function create_custom_post_type_practice_areas() {

// set up labels
    $labels = array(
        'name' => 'Practice Areas',
        'singular_name' => 'Practice Area',
        'add_new' => 'Add New Practice Area',
        'add_new_item' => 'Add New Practice Area',
        'edit_item' => 'Edit Practice Areas',
        'new_item' => 'New Practice Areas',
        'all_items' => 'All Practice Areas',
        'view_item' => 'View Practice Areas',
        'search_items' => 'Search Practice Areas',
        'not_found' =>  'No Practice Areas Found',
        'not_found_in_trash' => 'No Practice Areas found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Practice Areas',

    );
    //register post type
    register_post_type( 'practice-areas', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-book',
        'has_archive' => false,
        'public' => true,
        // 'taxonomies' => array('category'),
        'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields'),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        // 'rewrite' => array( 'slug' => 'practice-areas', 'with_front' => false ), // Allows for /legal-blog/ to be the preface to non pages, but custom posts to have own root
        )
    );

}
add_action( 'init', 'create_custom_post_type_practice_areas' );