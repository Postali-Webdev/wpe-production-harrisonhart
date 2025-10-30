<?php
add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {
    
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
