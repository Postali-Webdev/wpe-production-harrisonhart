<?php

// Register Dynamic Sidebars
function postali_register_dynamic_sidebars() {
	$sidebars = array(
		array(
			'id'   => 'main-sidebar',
            'name' => __( 'Main Sidebar' ),
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div class="sidebar-widget">',
            'after_widget'  =>  '</div>',
            'before_title'  => '',
            'after_title'   => '',
		),
	);

	foreach ( $sidebars as $sidebar ) {
		register_sidebar( $sidebar );
	}
}
add_action( 'widgets_init', 'postali_register_dynamic_sidebars' );