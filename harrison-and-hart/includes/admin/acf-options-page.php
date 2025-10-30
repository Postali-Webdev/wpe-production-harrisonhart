<?php

// ACF Options Pages
if( function_exists('acf_add_options_page') ) {
		
    acf_add_options_page(array(
        'page_title'    => 'Instructions',
        'menu_title'    => 'Instructions',
        'menu_slug'     => 'theme-instructions',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-smiley', // Add this line and replace the second inverted commas with class of the icon you like
        'redirect'      => false
    ));

    acf_add_options_page(array(
        'page_title'    => 'Customizations',
        'menu_title'    => 'Customizations',
        'menu_slug'     => 'customizations',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-admin-customizer', // Add this line and replace the second inverted commas with class of the icon you like
        'redirect'      => false
    ));

    acf_add_options_page(array(
        'page_title'    => 'Awards',
        'menu_title'    => 'Awards',
        'menu_slug'     => 'awards',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-awards', // Add this line and replace the second inverted commas with class of the icon you like
        'redirect'      => false
    ));

}

// Save newly created fields to child theme
// add_filter('acf/settings/save_json', 'my_acf_json_save_point');

// function my_acf_json_save_point( $path ) {
    
//     // update path
//     $path = get_stylesheet_directory() . '/acf-json';
    
//     // return
//     return $path;

// }