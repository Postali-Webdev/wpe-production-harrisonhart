<?php
/* Top admin bar while viewing site logged in */
function no_function_admin_bar() {
	return false;
}
add_filter('show_admin_bar', 'no_function_admin_bar');


/* Admin and backend tools */
require_once dirname( __FILE__ ) . '/includes/admin/acf-options-page.php'; //Add Advanced Custom Fields Options Page in Dashboard 
require_once dirname( __FILE__ ) . '/includes/admin/color-picker.php'; //Set color picker to brand colors
require_once dirname( __FILE__ ) . '/includes/admin/customize-backend.php'; //Customize Dashboard appearnce for Admin
require_once dirname( __FILE__ ) . '/includes/admin/customize-tiny-mce.php'; //Customize Tiny MCE in Wysiwyg
require_once dirname( __FILE__ ) . '/includes/admin/hide-default-content-editor.php'; //Hide the default content wysiwyg on pages and select post-types
/* Register our sidebars and widgetized areas */
// require_once dirname( __FILE__ ) . '/includes/admin/widgets.php';
// require_once dirname( __FILE__ ) . '/includes/admin/register-sidebar.php';


/* extra css post-launch */
add_action('wp_enqueue_scripts', 'postali_child');
function postali_child() {
	wp_enqueue_style( 'child-styles', '/wp-content/themes/harrison-and-hart/assets/css/postali.css' ); // Enqueue Child theme style sheet (theme info)
}

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
   } 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

/* color picker for PPC landing */
function klf_acf_input_admin_footer() { ?>
    <script type="text/javascript">
        (function($) {
        
        acf.add_filter('color_picker_args', function( args, $field ){
        
        // add the hexadecimal codes here for the colors you want to appear as swatches
        args.palettes = ['#ffffff', '#000000','#1d1d1d','#2c2c2c','#5ad3d8']
        
        // return colors
        return args;
        
        });
        
        })(jQuery);
    </script>
    
    <?php }
    
    add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');

/* Utilities */
require_once dirname( __FILE__ ) . '/includes/utils/utility-functions.php';
require_once dirname( __FILE__ ) . '/includes/utils/custom-logo-support.php';
require_once dirname( __FILE__ ) . '/includes/utils/shortcodes.php';
require_once dirname( __FILE__ ) . '/includes/utils/body-class.php'; // Add page class name to body tag
require_once dirname( __FILE__ ) . '/includes/utils/mix.php'; // laravel-mix cache busting with version() options by loading versioned files in mix-manifest.json
require_once dirname( __FILE__ ) . '/includes/utils/contact-form-7-support.php'; // Contact Form 7 options

// require_once dirname( __FILE__ ) . '/includes/utils/allow-svg.php'; //no longer works with current version of wordpress 5.7.1 - Using SVG Support plugin by Benbodhi
// require_once dirname( __FILE__ ) . '/includes/utils/socail-sharing.php'; // Adds "share" social media icons to end of blog content - setup under theme options



/* Theme Setup */
require_once dirname( __FILE__ ) . '/includes/setup/theme-setup.php';
require_once dirname( __FILE__ ) . '/includes/setup/register-menus.php';
require_once dirname( __FILE__ ) . '/includes/setup/scripts.php';
require_once dirname( __FILE__ ) . '/includes/setup/styles.php';
// require_once dirname( __FILE__ ) . '/includes/setup/create-404-page.php'; // Creates 404 after theme setup if one isn't created



/* Nav menus */
require_once dirname( __FILE__ ) . '/includes/setup/nav/clean-nav-walker.php';
require_once dirname( __FILE__ ) . '/includes/setup/nav/sub-menu-wrap-nav-walker.php';
require_once dirname( __FILE__ ) . '/includes/setup/nav/simple-menu.php';


/* Taxonomy - Must comes before Post Types if trying to use taxonomy term as meta filter on post type query */
require_once dirname( __FILE__ ) . '/includes/setup/taxonomies.php';


/* Register Post Types and additional setup support */
require_once dirname( __FILE__ ) . '/includes/setup/custom-post-type-support.php';


/* Uncomment during development to prevent having to save permalinks for update */
//flush_rewrite_rules();

