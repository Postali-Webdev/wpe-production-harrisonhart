<?php

// Register Site Navigations
function postali_child_register_nav_menus() {
    register_nav_menus(
        array(
            'header-nav' => __( 'Header Navigation', 'postali' ),
            'footer-nav' => __( 'Footer Navigation', 'postali' ),
        )
    );
}
add_action( 'init', 'postali_child_register_nav_menus' );