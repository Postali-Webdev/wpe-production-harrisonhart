<?php


function theme_styles() {

    
    // version based on created file time to force cache busting
    wp_register_style('theme-style', mix('style.css', true), array(), null);
    wp_enqueue_style('theme-style'); /// Enqueue Child theme style sheet (theme info)
    
    // Add any additional style sheets here
    wp_register_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap', array());
    wp_enqueue_style('google-fonts');

    wp_register_style('icomoon-fonts', 'https://cdn.icomoon.io/152819/HarrisonHartIcons/style-cf.css?61xmva', array());
    wp_enqueue_style('icomoon-fonts');
}
add_action('wp_print_styles', 'theme_styles');