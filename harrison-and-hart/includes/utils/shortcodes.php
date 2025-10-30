<?php

// Add shortcode for embedding custom menus in page content
if (!function_exists('print_menu_shortcode')) {
    function print_menu_shortcode($atts, $content = null)
    {
        extract(shortcode_atts(array( 'name' => null, ), $atts));
        return wp_nav_menu(array( 'menu' => $name, 'echo' => false ));
    }
    add_shortcode('menu', 'print_menu_shortcode');
}


// Latest case results shortcode
if (!function_exists('latest_results')) {
    function latest_results($atts, $content = null) {
      global $qode_options_magnet;
        $html = '';
        extract(shortcode_atts(array("post_type", "post_number"=>"", "order_by" => "", "order" => "", "text_length"=>""), $atts));

        $q = new WP_Query(
           array( 'post_type' => 'results', 'orderby' => $order_by, 'order' => $order, 'posts_per_page' => '2')
           // Adjust the post_per_page number for display amount
        );

          while($q->have_posts()) : $q->the_post();
        
            $permalink = get_permalink();
            $title = get_the_title();
            $excerpt = get_the_excerpt();

            if ( $text_length > 0){
              $html .= '<div class="recent-case-result"><h2><a href="' . $permalink . '" title="' . $title . '">' . $title . '</a></h2><p>' . $excerpt . '</p></div>';
            } else {
              $html .= '<div class="recent-case-result"><span>' . $title . '</span><p>' . $excerpt . '</p></div>';
            }
            $html .= "</article>";
          endwhile;

          wp_reset_query();

      return $html;
    }
    add_shortcode( 'latest_results', 'latest_results' );
}

if (!function_exists('surbma_yoast_breadcrumb_shortcode_init')) {
    // Shortcode for Yoast breadcrumbs
    function surbma_yoast_breadcrumb_shortcode_init()
    {
        load_plugin_textdomain('surbma-yoast-breadcrumb-shortcode', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }
    add_action('plugins_loaded', 'surbma_yoast_breadcrumb_shortcode_init');
}

if (!function_exists('surbma_yoast_breadcrumb_shortcode_shortcode')) {
    function surbma_yoast_breadcrumb_shortcode_shortcode($atts)
    {
        extract(shortcode_atts(array(
        "before" => '<p id="breadcrumbs">',
        "after" => '</p>'
    ), $atts));

        $wpseo_internallinks = get_option('wpseo_internallinks');

        if (class_exists('WPSEO_Breadcrumbs') && $wpseo_internallinks['breadcrumbs-enable'] == 1) {
            return yoast_breadcrumb($before, $after, false);
        } elseif (class_exists('WPSEO_Breadcrumbs') && $wpseo_internallinks['breadcrumbs-enable'] != 1) {
            return __('<p>Please enable the breadcrumb option to use this shortcode!</p>', 'surbma-yoast-breadcrumb-shortcode');
        } else {
            return __('<p>Please install <a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">WordPress SEO by Yoast</a> plugin and enable the breadcrumb option to use this shortcode!</p>', 'surbma-yoast-breadcrumb-shortcode');
        }
    }
    add_shortcode('yoast-breadcrumb', 'surbma_yoast_breadcrumb_shortcode_shortcode');
}


if (! function_exists('acf_field_special_awards')) {
    // Shortcode to display Awards repeater from Awards Options page
    function acf_field_special_awards()
    {
        $id = ('options');
        $html = '';
        if (have_rows('awards', $id)) {
            $html .= '<div id="awards">';
            while (have_rows('awards', $id)) {
                the_row();
                $html .= '<img src="' . get_sub_field('badge_image') . '" alt="' . get_sub_field('badge_text') .'">';
            }
            $html .= '</div>';
        }
        return $html;
    }
    add_shortcode('awards', 'acf_field_special_awards');
}


if (!function_exists('year_shortcode')) {
    // Display Current Year as shortcode - [year]
    function year_shortcode()
    {
        $year = date_i18n('Y');
        return $year;
    }
    add_shortcode('year', 'year_shortcode');
}