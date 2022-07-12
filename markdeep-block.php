<?php
/**
 * Plugin Name:       Markdeep Block
 * Plugin URI:        https://github.com/n3f/markdeep-block
 * Description:       Markdeep Block is a WordPress plugin for adding Gutenberg blocks supporting <a href="http://casual-effects.com/markdeep">Markdeep</a> syntax.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.0.1
 * Author:            neffff
 * Author URI:        https://n3f.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       markdeep-block
 *
 * @package           markdeep-block
 */

 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MARKDEEP_VERSION', '1.14' );
define( 'MARKDEEPBLOCK_VERSION', '0.0.1' );

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function markdeep_block_init() {
	wp_register_script( 'markdeepblock-init', plugin_dir_url( __FILE__ ) . 'assets/markdeepblock-init.js', [], MARKDEEPBLOCK_VERSION, true );
	// wp_register_script( 'mathjax', 'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js', [], true );
	wp_register_script( 'markdeep', plugin_dir_url( __FILE__ ) . 'assets/markdeep.min.js', [ 'markdeepblock-init' ], MARKDEEP_VERSION, true );
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'markdeep_block_init' );

/**
 * Load markdeep JS for non-editor contexts.
 *
 * The editor loading is handled via `register_block_type()` in `markdeep_block_init()`.
 */
function enqueue_markdeep() {
	wp_enqueue_script( 'markdeep' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_markdeep' );
