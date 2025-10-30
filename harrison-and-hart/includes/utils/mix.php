<?php

/**
 * Gets the path to a versioned Mix file in a theme.
 *
 * Use this function if you want to load theme dependencies. This function will cache the contents
 * of the manifest file for you. This also means that you can’t work with different mix locations.
 * For that, you’d need to use `mix_any()`.
 *
 * Inspired by <https://www.sitepoint.com/use-laravel-mix-non-laravel-projects/>.
 *
 * @since 1.0.0
 *
 * @param string $path The relative path to the file.
 * @param string $is_child_theme Optional. Changes root directory to child theme instead of parent theme'.
 *
 * @return string The versioned file URL.
 */


function mix( $path, $is_child_theme = false) {
	static $manifest;
	static $manifest_path;

    // If child-theme this will always not be found get_theme_file_path() returns path to parent first
    // if ( ! $manifest_path ) {
	// 	$manifest_path = get_theme_file_path( '/mix-manifest.json' );
	// }

    //So this is broken and will always not find the file and do the bailout
    //Let check if we passed is child theme attribute
    if($is_child_theme){
	$manifest_path = get_theme_file_path('/mix-manifest.json');
    } else {
	$manifest_path = get_template_directory().'/mix-manifest.json';
    }

	// Bailout if manifest couldn’t be found
	if ( ! file_exists( $manifest_path ) ) {
	if($is_child_theme){
	    return get_stylesheet_directory_uri().'/'.$path;
	} else {
	    return get_theme_file_uri($path);
	}
	}

	if ( ! $manifest ) {
		// @codingStandardsIgnoreLine
		$manifest = json_decode( file_get_contents( $manifest_path ), true );
	}

    // Can skip this since we removed passing manifest directory for now
    // Remove manifest directory from path
	// $path = str_replace( $manifest_directory, '', $path );

	// Make sure there’s a leading slash
	$path = '/' . ltrim( $path, '/' );

	// Bailout with default theme path if file could not be found in manifest
	if ( ! array_key_exists( $path, $manifest ) ) {
	if ($is_child_theme) {
	    return get_stylesheet_directory_uri().$path;
	} else {
	    return get_theme_file_uri($path);
	}
	}

	// Get file URL from manifest file
	$path = $manifest[ $path ];
	// Make sure there’s no leading slash
	$path = ltrim( $path, '/' );

    if($is_child_theme){
	return trailingslashit( get_stylesheet_directory_uri() ) . $path;
    } else {
	// commented out original since we removed directory
	// get_theme_file_uri( trailingslashit( $manifest_directory ) . $path );
	return get_theme_file_uri( trailingslashit( $path ));
    }
}

/**
 * Gets the path to a versioned Mix file.
 *
 * The difference to the `mix()` function is that for this function, you need to provide the
 * absolute paths to the file and the manifest directory. The benefit is that it’s more versatile
 * and that you can use it for functionality that might not live in a theme, but in a plugin or a
 * symlinked package.
 *
 * @since 1.1.0
 *
 * @param string $path               The full path to the file.
 * @param string $manifest_directory The full path to the manifest directory.
 * @param string $manifest_name      Optional. The name of the manifest file in
 *                                   `$manifest_directory`. Default
 *                                   `mix-manifest.json`.
 * @return string The versioned file URL.
 */
function mix_any( $path, $manifest_directory, $manifest_name = 'mix-manifest.json' ) {
	$file_url = str_replace(
		trailingslashit( ABSPATH ),
		trailingslashit( site_url() ),
		$path
	);

	$manifest_path = trailingslashit( $manifest_directory ) . $manifest_name;

	// Bailout with file URL if manifest couldn’t be found.
	if ( ! file_exists( $manifest_path ) ) {
		return $file_url;
	}

	// @codingStandardsIgnoreLine
	$manifest       = json_decode( file_get_contents( $manifest_path ), true );
	$manifest_entry = str_replace( $manifest_directory, '', $path );

	// Make sure there’s a leading slash.
	$manifest_entry = '/' . ltrim( $manifest_entry, '/' );

	// Bailout with file URL could not be found in manifest.
	if ( ! array_key_exists( $manifest_entry, $manifest ) ) {
		return $file_url;
	}

	$file_path = $manifest[ $manifest_entry ];
	// Make sure there’s a leading slash.
	$file_path = '/' . ltrim( $file_path, '/' );

	// Add hash and return.
	return str_replace( $manifest_entry, $file_path, $file_url );
}
