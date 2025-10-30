<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
**/
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

<?php if (has_post_thumbnail()) {
$attachment_image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
<link rel="preload" as="image" href="<?php echo $attachment_image; ?>">
<link rel="preload" as="image" href="<?php echo $attachment_image; ?>.webp">
<?php } ?>

<?php 
// Global Schema
$global_schema = get_field('global_schema','options');
if ( !empty($global_schema) ) :
    echo '<script type="application/ld+json">' . $global_schema . '</script>';
endif;

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . $single_schema . '</script>';
endif; ?>

<?php require dirname( __FILE__ ) . '/partials/google-tag-manager-head.php'; ?>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if( is_front_page() ) : ?>
    <link rel="preload" as="image" href="/wp-content/uploads/2023/04/logo-horizontal-black.png">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!--  ClickCease.com tracking-->
    <script type='text/javascript'>var script = document.createElement('script');
    script.async = true; script.type = 'text/javascript';
    var target = 'https://www.clickcease.com/monitor/stat.js';
    script.src = target;var elem = document.head;elem.appendChild(script);
    </script>
    <noscript>
    <a href='https://www.clickcease.com' rel='nofollow'><img src='https://monitor.clickcease.com' alt='ClickCease'/></a>
    </noscript>
    <!--  ClickCease.com tracking-->
    <?php require dirname( __FILE__ ) . '/partials/google-tag-manager-body.php'; ?>
	<header class="fixed z-50 top-0 right-0 w-full">
        <nav id="navbar" class="navbar wrapper relative bg-white text-black max-w-1920 mx-auto w-full">
            <a class="js-mobile-menu-btn">
                <span>Nav</span>
            </a>
            <div class="w-full">
                <a href="<?php echo home_url();?>">
                    <div class="navbar-logo bg-center bg-no-repeat bg-contain" >
                    </div>
                </a>
            </div>
            
            <div class="mobile-container">
                <div id="menu-container" class="menu-container 1025:h-full">
                    <?php
                        $args = array(
                            'container' => '',
                            'theme_location' => 'header-nav',
                            'depth' => '2',
                            'walker' => new Sub_Menu_Wrap_Nav_Walker(),
                        );
                        wp_nav_menu( $args );
                    ?>
                </div>
                <ul class="menu">
                    <li id="navbar-search" class="menu-item navbar-search">
                        <div id="search-icon-container" class="top-menu-item">
                            <div class="js-search-toggle search-icon cursor-pointer"></div>
                        </div>
                        <div class="hover-expand">
                            <div class="sub-menu-container">
                                <div class="sub-menu">
                                    <?php get_search_form(); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                
                    <li class="menu-item">
                        <div class="top-menu-item">
                            <a class="contact-us-btn menu-label" href="/contact/">Contact Us</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
	</header>