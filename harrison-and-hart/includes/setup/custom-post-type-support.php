<?php

// Register custom posttypes
// require_once dirname( __FILE__ ) . '/post-types/practice-areas-cpt.php';
require_once dirname( __FILE__ ) . '/post-types/case-results-cpt.php';
require_once dirname( __FILE__ ) . '/post-types/testimonials-cpt.php';
require_once dirname( __FILE__ ) . '/post-types/attorneys-cpt.php';
require_once dirname( __FILE__ ) . '/post-types/staff-cpt.php';



//////////////// POST TYPE OPTIONS ////////////////

/** Enable additional theme features */
add_post_type_support( 'page', 'excerpt' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

/* Hide the default content wysiwyg on custom post type.
*  NOTE: It just hides the editor. Any content in place is still stored on the page in the database and will display if page template renders the_content();
*/
add_action('init', 'remove_post_type_content_editor');
function remove_post_type_content_editor() {
    // remove_post_type_support( 'testimonials', 'editor' );
    remove_post_type_support( 'attorneys', 'editor' );
}


function remove_page_from_query_string($query_string)
{ 
    if ($query_string['name'] == 'page' && isset($query_string['page'])) {
        unset($query_string['name']);
        $query_string['paged'] = $query_string['page'];
    }      
    return $query_string;
}
// add_filter('request', 'remove_page_from_query_string');


/**
 * Fix pagination on archive pages
 * After adding a rewrite rule, go to Settings > Permalinks and click Save to flush the rules cache
 */

//page 309 ID
function my_pagination_rewrite() {
    $page_data = get_post( 309 );
    add_rewrite_rule(
        $page_data->post_name . '/page/?([0-9]{1,})/?$',
        'index.php?pagename='.$page_data->post_name.'&paged=$matches[1]',
        'top'
    );
    // add_rewrite_rule(
    //     $page_data->post_name . '/result-topic/([^/]+)/?$',
    //     'index.php?pagename='.$page_data->post_name.'&result-topic=$matches[1]',
    //     'top'
    // );
}
// add_action('init', 'my_pagination_rewrite');


function case_results_cpt_generating_rule($wp_rewrite) {
    $rules = array();
    $terms = get_terms( array(
        'taxonomy' => 'result-topic',
        'hide_empty' => false,
    ) );
   
    $post_type = 'case-results';
    $page_data = get_post( 309 );
    foreach ($terms as $term) {    
        $rules['case-results/' . $term->slug . '/([^/]*)$'] = 'index.php?pagename='.$page_data->post_name.'&post_type=' . $post_type. '&result-topic=$matches[1]&name=$matches[1]';
    }

    // merge with global rules
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
// add_filter('generate_rewrite_rules', 'case_results_cpt_generating_rule');

function change_link( $permalink, $post ) {
    
    if( $post->post_type == 'case-results' ) {
        $resource_terms = get_the_terms( $post, 'result-topic' );
        $term_slug = '';
        if( ! empty( $resource_terms ) ) {
            foreach ( $resource_terms as $term ) {

                // The featured resource will have another category which is the main one
                // if( $term->slug == 'featured' ) {
                //     continue;
                // }

                $term_slug = $term->slug;
                break;
            }
        }
        $permalink = get_home_url() ."/case-results/" . $term_slug . '/' . $post->post_name;
    }
    return $permalink;

}
// add_filter('post_type_link',"change_link",10,2);





function prefix_register_query_var( $vars ) {
    $vars[] = 'case-results';
    $vars[] = 'result-topic';
    return $vars;
}
// add_filter( 'query_vars', 'prefix_register_query_var' );

function prefix_template_handler( $template ) {
    if ( get_query_var( 'case-results' ) == false || get_query_var( 'case-results' ) == '' ) {
        return $template;
    }
    return get_template_directory() . '/page-case-results.php';
};
// add_action( 'template_include', 'prefix_template_handler');




/* Remove Default Post type from admin toolbar */
// function remove_default_post_type()
// {
//     remove_menu_page('edit.php');
// }
// add_action('admin_menu', 'remove_default_post_type');



/* Adjust Search for custom post types */

// add_filter('pre_get_posts', 'include_custom_post_types_search');
// function include_custom_post_types_search($query)
// {
//    if ( is_search() && $query->is_main_query() && $query->get( 's' ) && ! is_admin() )
//         $query->set('post_type', array('POST-TYPE-A','POST-TYPE-B'));
//     }
//     return $query;
// };
