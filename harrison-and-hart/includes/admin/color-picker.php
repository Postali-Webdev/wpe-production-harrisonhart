<?php
/*
* SiteOrigin iris.picket is a registered jQuery widget
* https://wordpress.stackexchange.com/questions/84394/modify-javascript-configuration-options-for-theme-customizer-colour-picker
*
* ACF
* https://support.advancedcustomfields.com/forums/topic/customise-color-picker-swatches/
* https://support.advancedcustomfields.com/forums/topic/color-picker-custom-pallete/
* when initially loaded find existing colorpickers and set the palette
*/


function custom_color_picker_print_script(){
    ?>
    <script type="text/javascript">
        window.addEventListener("DOMContentLoaded", function(event) {
            var _colors = [
                "#2C2C2C",
                "#1D1D1D",
                "#000000", 
                "#FFFFFF",
                "#5AD3D8"

            ]
            
            var iris = jQuery.wp.wpColorPicker.prototype.options;
            if(!!iris) iris.palettes = _colors;
        
            if(!!acf){
                acf.add_filter("color_picker_args", function( args, $field ){
                    args.default = "#2C2C2C";
                    args.palettes = _colors;
                    return args;
                });
            }
        });
    </script>
    <?php
}
add_action('admin_print_scripts', 'custom_color_picker_print_script');


//Load only when Advance Custom Fields is installed - might as well just load if admin
/* https://www.advancedcustomfields.com/resources/acf-input-admin_enqueue_scripts/ */
//wp_enqueue_script( 'my-acf-input-js', get_stylesheet_directory_uri() . '/js/my-acf-input.js', false, '1.0.0' )

/*
//Add JavaScript to set ACF and SiteOrigin pallets
function acf_color_pallet_enqueue_scripts() {
    wp_enqueue_script( 'acf-custom-colors', get_template_directory_uri() . '/js/aw-colors.js', null, null, false );
}

add_action( 'acf/input/admin_enqueue_scripts', 'acf_color_pallet_enqueue_scripts');
*/
