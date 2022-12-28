<?php
/**
 * Plugin Name:       Markdeep Block
 * Plugin URI:        https://github.com/n3f/markdeep-block
 * Description:       Markdeep Block is a WordPress plugin for adding Gutenberg blocks supporting <a href="http://casual-effects.com/markdeep">Markdeep</a> syntax.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.0.2
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

class MarkdeepBlock {
	const MARKDEEP_VERSION = '1.15';
	// The markdeep source says: "The following option forces better rendering on some browsers, but
	// also makes it impossible to copy-paste text with inline equations:
	const MATHJAX_URL = 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.6/MathJax.js?config=TeX-AMS-MML_HTMLorMML';

	/**
	 * Registers the block using the metadata loaded from the `block.json` file.
	 * Behind the scenes, it registers also all assets so they can be enqueued
	 * through the block editor in the corresponding context.
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	public static function block_init() {
		$_markdeep_url = apply_filters( 'markdeepblock_markdeep_url', plugin_dir_url( __FILE__ ) . 'assets/markdeep.min.js' );
		wp_register_script( 'markdeep', $_markdeep_url, [], self::MARKDEEP_VERSION, true );
		wp_add_inline_script( 'markdeep', self::markdeepblock_inline_script(), 'before' );
		register_block_type( __DIR__ . '/build' );
	}

	/**
	 * Load markdeep JS for non-editor contexts.
	 *
	 * Editor loading is handled in `markdeep_block_init()` with `register_block_type()`.
	 */
	public static function enqueue_markdeep() {
		wp_enqueue_script( 'markdeep' );
	}

	/**
	 * Inline script loads & runs before markdeep.  Put configurable/PHP/variable changes here.
	 */
	public static function markdeepblock_inline_script() {
		$_mathjax_url = apply_filters( 'markdeepblock_mathjax_url', self::MATHJAX_URL );
		return <<<"EOF"
		window.MDPB_MATHJAX_URL='{$_mathjax_url}';
		window.markdeepOptions = {
			// If in the editor run as a scriptable function
			mode: window.wp ? 'script' : 'html',
		};
		EOF;
	}
}

add_action( 'init', 'MarkdeepBlock::block_init' );
add_action( 'wp_enqueue_scripts', 'MarkdeepBlock::enqueue_markdeep' );

// Uncomment one of the following lines to override the CDN being used.
// add_filter( 'markdeepblock_mathjax_url', fn($u) => 'https://unpkg.com/mathjax@2.7.6/unpacked/MathJax.js?config=TeX-AMS-MML_HTMLorMML' );
// add_filter( 'markdeepblock_mathjax_url', fn($u) => 'https://cdn.jsdelivr.net/npm/mathjax@2.7.6/unpacked/MathJax.js?config=TeX-AMS-MML_HTMLorMML' );
