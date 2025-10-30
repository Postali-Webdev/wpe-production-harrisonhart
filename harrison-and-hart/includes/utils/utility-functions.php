<?php

function section_styling($pre){
    $style = '';
    $bg_img_enabled = get_sub_field($pre.'background_image_enabled');
    if( !empty($bg_img_enabled) && $bg_img_enabled){
        $bg_img = get_sub_field($pre.'background_image')['url'];
        if (!empty($bg_img)) {
            $style .= 'background-image:url('.$bg_img.');';
        }
    }

    $global = get_field('global_spacing_group','option');

    $padd_enabled = get_sub_field($pre.'padding_enabled');
    $pt = get_sub_field($pre.'spacing_group')['padding_top_desktop'];
    $pb = get_sub_field($pre.'spacing_group')['padding_bottom_desktop'];
    
    if($padd_enabled){
       
        if(is_numeric($pt)) {
            $style .='padding-top:'.$pt.'px;';
        } else {
            $style .='padding-top:'.$global['padding_top_desktop'].'px;';
        }
        if(is_numeric($pb)) {
            $style .='padding-bottom:'.$pb.'px;';
        } else {
            $style .='padding-bottom:'.$global['padding_bottom_desktop'].'px;';
        }
    } else {
        $style .='padding-top:'.$global['padding_top_desktop'].'px;';
        $style .='padding-bottom:'.$global['padding_bottom_desktop'].'px;';
    }

    printf($style);
}

if (! function_exists('strip_links')) {
    function strip_links($content)
    {
        return preg_replace('#<a.*?>(.*?)</a>#is', '\1', $content);
    }
}

function get_page_by_template($template = '') {
    $args = array(
      'meta_key' => '_wp_page_template',
      'meta_value' => $template
    );
    return get_pages($args); 
}

if (! function_exists('post_pagination')) {
    function post_pagination()
    {
	global $wp_query;
	$pager = 999999999; // need an unlikely integer

	echo paginate_links(array(
	      'base' => str_replace($pager, '%#%', esc_url(get_pagenum_link($pager))),
	      'format' => '?paged=%#%',
	      'current' => max(1, get_query_var('paged')),
	      'total' => $wp_query->max_num_pages
	 ));
    }
}

if (! function_exists('generate_gradient')) {
    function generate_gradient($color)
    {
	// background-color: '.$color.';
	// background-color: '.$darkColor.';
	// background-image: -webkit-gradient(linear,left top, right top,from('.$darkColor.'), to('.$color.'));
	// background-image: linear-gradient(180deg,'.$darkColor.', '.$color.');
	$class = ' custom-background-color';

	// $darkColor = luminance($color, -0.3);
	$customClass = '
    .custom-background-color{
	background: linear-gradient(180deg, rgba('.convertToRGB($color).',0) 0%, rgba('.convertToRGB($color).',0.9) 100%);
    }
    ';
	wp_register_style('custom-gradient-style', false);
	wp_enqueue_style('custom-gradient-style');
	wp_add_inline_style('custom-gradient-style', $customClass);

	return $class . ' ' .$color;
    }
}

if (! function_exists('convertToRGB')) {
    function convertToRGB($color)
    {
        $color = (string)$color;
        if ($color[0] == '#') {
            $color = substr($color, 1);
        }
        if (strlen($color) == 6) {
            list($r, $g, $b) = array($color[0].$color[1],
                    $color[2].$color[3],
                    $color[4].$color[5]);
        } elseif (strlen($color) == 3) {
            list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
        } else {
            return false;
        }

        $r = hexdec($r);
        $g = hexdec($g);
        $b = hexdec($b);

        return (int)$r.', '.(int)$g.', '.(int)$b;
    }
}

// if (! function_exists('luminance')) {
//     function luminance($hexcolor, $percent)
//     {
//         if (strlen($hexcolor) < 6) {
//             $hexcolor = $hexcolor[0] . $hexcolor[0] . $hexcolor[1] . $hexcolor[1] . $hexcolor[2] . $hexcolor[2];
//         }
//         $hexcolor = array_map('hexdec', str_split(str_pad(str_replace('#', '', $hexcolor), 6, '0'), 2));

//         foreach ($hexcolor as $i => $color) {
//             $from = $percent < 0 ? 0 : $color;
//             $to = $percent < 0 ? $color : 255;
//             $pvalue = ceil(($to - $from) * $percent);
//             $hexcolor[$i] = str_pad(dechex($color + $pvalue), 2, '0', STR_PAD_LEFT);
//         }

//         return '#' . implode($hexcolor);
//     }
// }


if (! function_exists('acf_field_special')) {
    function acf_field_special($name)
    {
	echo call_user_func('acf_field_special_' . $name);
    }
}


if (! function_exists( 'is_login_page' ) ) {
	/**
	 * Check to see if the current page is the login/register page.
	 *
	 * Use this in conjunction with is_admin() to separate the front-end from the back-end of your
	 * WordPress site/theme.
	 *
	 * @return bool True if the current page is a login page, false otherwise.
	 */
	function is_login_page() {
		return in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) );
	}
}

if (! function_exists('is_child')) {
    // Widget Logic Conditionals
    function is_child($parent)
    {
	global $post;
	return $post->post_parent == $parent;
    }
}

if (! function_exists('is_tree')) {
    // Widget Logic Conditionals (ancestor)
    function is_tree($pid)
    {
        global $post;

        if (is_page($pid)) {
            return true;
        }

        $anc = get_post_ancestors($post->ID);
        foreach ($anc as $ancestor) {
            if (is_page() && $ancestor == $pid) {
            return true;
            }
        }
        return false;
    }
}

