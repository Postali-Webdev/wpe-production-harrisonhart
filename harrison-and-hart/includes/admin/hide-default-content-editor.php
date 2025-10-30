<?php

/* Hide the default content wysiwyg on pages and select post-types.
*  NOTE: It just hides the editor. Any content in place is still stored on the page in the database and will display if page template renders the_content();
*/
add_action('init', 'remove_content_editor');

function remove_content_editor() {
    // remove_post_type_support( 'page', 'editor' );
    // remove_post_type_support( 'locations', 'editor' );
    // remove_post_type_support( 'attorneys', 'editor' );
}