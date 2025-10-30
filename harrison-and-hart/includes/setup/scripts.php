<?php

use WP_Rocket\ThirdParty\NullSubscriber;

function external_scripts()
{
    // Load original parent custom modernizr script
    wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/assets/js/modernizr.min.js', null, null, true );
    wp_enqueue_script( 'modernizr' );

    /*
    * Code Splitting: keeps vendor packages in seperate vendor.js file to speed up loadtimes.
    * manifest.js is the runtime chunk that handles the load
    * https://laravel-mix.com/docs/6.0/extract
    */

     // check to see if npm libraries were extracted with mix.extract([])
     if (file_exists(get_stylesheet_directory().'/js/manifest.js')) {
        wp_register_script('manifest', mix('js/manifest.js', true), null, null, true);
        wp_enqueue_script('manifest');
    }
    
    if( file_exists( get_stylesheet_directory().'/js/vendor.js')) {
        wp_register_script('vendor', mix('js/vendor.js', true), null, null, true); 
        wp_enqueue_script('vendor');
    }
    // Compile js will with or without third party libraries will be loaded. Needs to be 'app.js'
    wp_register_script('custom-scripts', mix('js/app.js', true), null, null, true); 
	wp_enqueue_script('custom-scripts');

}
add_action('wp_enqueue_scripts', 'external_scripts');


function external_admin_scripts(){
     // Load preset brand colors to ACF and SiteOrigin color picker
	// wp_enqueue_script('color-pallete',get_stylesheet_directory_uri(). '/assets/js/define-color-pallete.js', null, null, false);

}
//Load any scripts for Admin pages
add_action('admin_enqueue_scripts', 'external_admin_scripts');
