<?php
/**
 * Plugin Name:     TwentyTwentyFour Hide Editor Title
 * Description:     Makes the title less visible on the editor screen on pages where you using the "Page No Title" template in a TwentyTwentyFour based theme.
 * Author:          Sascha Metz
 * Author URI:      smetz.dev
 * Text Domain:     twentytwentyfour_hide_editor_title
 * Domain Path:     /languages
 * Version:         0.1.0
 */

namespace smetzdev\FrostHideEditorTitle;

/**
 * Load the translations for the plugin.
 */
function ttf_het_load_translations() {
	load_plugin_textdomain(
		'twentytwentyfour_hide_editor_title',
		false,
		dirname( plugin_basename( __FILE__ ) ) . '/languages'
	);
}
add_action( 'init', 'smetzdev\FrostHideEditorTitle\ttf_het_load_translations' );

/**
 * Enqueue the assets for the editor screen.
 */
function ttf_het_enqueue_assets() {
	// Load the plugins js file.
	wp_enqueue_script(
		'het-editor-script', // Handle for the script.
		plugins_url( '/assets/editor.js', __FILE__ ), // Path to the script file.
		array( 'wp-blocks', 'wp-dom', 'wp-edit-post' ) // Dependencies.
	);

	// Load the plugins css file.
	wp_enqueue_style(
		'het-editor-style', // Handle for the stylesheet.
		plugins_url( '/assets/editor.css', __FILE__ ), // Path to the stylesheet file.
	);
}
add_action( 'enqueue_block_editor_assets', 'smetzdev\FrostHideEditorTitle\ttf_het_enqueue_assets' );
