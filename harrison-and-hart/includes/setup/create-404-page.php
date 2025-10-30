<?php
// Ensures this function is only called after the theme is setup
// You could bind to the "init" event if "after_setup_theme" doesn't work well for you.
add_action('after_setup_theme', 'create_404_page');

// Insert a privately published page we can query for our 404 page
function create_404_page() {

  // Check if the 404 page exists
	$page_exists = get_page_by_title( '404' );

	if (!isset($page_exists->ID)) {

		// Page array
		$page = array(
			'post_author' => 1,
			'post_content' => '',
			'post_name' =>  '404',
			'post_status' => 'private',
			'post_title' => '404',
			'post_type' => 'page',
			'post_parent' => 0,
			'menu_order' => 0,
			'to_ping' =>  '',
			'pinged' => '',
		);

		$insert = wp_insert_post($page);

		// The insert was successful
		if ($insert) {
			// Store the value of our 404 page
			update_option( '404pageid', (int) $insert );
		}
	}

}