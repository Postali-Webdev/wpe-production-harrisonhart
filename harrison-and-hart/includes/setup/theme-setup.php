<?php


/* Hide the default content wysiwyg on pages if using ACF for content.
*  NOTE: It just hides the editor. Any content in place is still stored on the page in the database and will display if page template renders the_content();
*/
add_action('init', 'remove_page_content_editor');
function remove_page_content_editor() {
    remove_post_type_support('page', 'editor');
}

/* Remove Wordpress Emoji Javascript call */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/* Change the length of wordpress default excerpt */
add_filter( 'excerpt_length', function($length) {
    return 40;
} );


function restrict_page_to_place_holder_pages(){
    // if($post->ID == 2){
    //     wp_redirect( esc_url( home_url( '/en/spec-center/submittal-tool/' ) ), 307 );
    // }
}
add_action( 'template_redirect', 'restrict_page_to_place_holder_pages' );