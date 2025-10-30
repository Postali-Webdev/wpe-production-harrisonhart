<?php

/* Add Custom Logo Support */
add_theme_support( 'custom-logo' );

function postali_custom_logo_setup() {
    $defaults = array(
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'postali_custom_logo_setup' );