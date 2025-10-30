<?php

// Remove Wordpress Emoji Javascript call
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


function custom_backend_styles(){
    $backendStyle = '
    .posttypediv div.tabs-panel {
        max-height:500px !important;
    }
    .acf-fields>.acf-field.acf-field-group{
        padding:15px 0px;
    }
    .acf-fields>.acf-field.acf-field-group>.acf-label{
        padding-left:15px;
    }
    ';
    wp_register_style('custom-backend-style', false);
    wp_enqueue_style('custom-backend-style');
    wp_add_inline_style('custom-backend-style', $backendStyle);
}

add_action('admin_enqueue_scripts', 'custom_backend_styles');

// Customize the logo on the wp-login.php page
function my_login_logo() { 
    $loginStyle = '
        #login h1 a, .login h1 a {
        background-image: url('. get_stylesheet_directory_uri() .'/login-logo.png);
        height:45px;
        width:204px;
        background-size: 204px 45px;
        background-repeat: no-repeat;
        padding-bottom: 30px;
        }
    ';

    wp_register_style('custom-login-style', false);
    wp_enqueue_style('custom-login-style');
    wp_add_inline_style('custom-login-style', $loginStyle);
}
add_action('login_enqueue_scripts', 'my_login_logo');