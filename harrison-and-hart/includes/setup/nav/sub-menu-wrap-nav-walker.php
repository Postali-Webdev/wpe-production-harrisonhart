<?php
class Sub_Menu_Wrap_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
        
        
        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";

        //Start wrapper for main nav parent items
        $label = '';
        if ( $depth == 0 ) {
            $output .= '<div class="top-menu-item">';
            $label = 'menu-label';
        }
        
		if ($item->url && $item->url != '#') {
			$output .= '<a class="'.$label.'" href="' . $item->url . '">';
		} else {
			$output .= '<span class="'.$label.'">';
		}


		$output .= $item->title;
 
		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}

        
        if ($this->has_children) {
            $output .= "<div class=\"js-mobile-menu-toggle\"></div>\n";
        }
        //End wrapper for main nav parent items
        if ($depth == 0) {
            $output .= '</div>';
        }
	}
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        // $output .= "\n$indent<div class=\"js-mobile-menu-toggle\"></div>\n";
        $output .= "\n$indent<div class='hover-expand'><div class='sub-menu-container'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent</ul></div></div>\n";
        // $output .= "$indent<div class=\"js-mobile-menu-toggle\"></div>\n";
    }
}