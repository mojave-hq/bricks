<?php
/**
 * Plugin Name: Bricks
 * Plugin URI: https://mojavehq.com/plugins/bricks
 * Description: Bricks is a starter plugin for building Gutenburg blocks.
 * Author: Mojave HQ
 * Author URI: https://mojavehq.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace MojaveHQ\Bricks;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function register()
{
    \wp_register_style(
		'bricks-style',
		plugin_dir_url(__FILE__) . 'public/css/plugin.css',
		is_admin() ? array('wp-editor') : null,
		null
    );
    
    \wp_register_style(
		'bricks-editor-style',
		plugin_dir_url(__FILE__) . 'public/css/plugin.css',
		array('wp-edit-blocks'),
		null
    );
    
    \wp_register_script(
		'bricks-script',
		plugin_dir_url(__FILE__) . 'public/js/plugin.js',
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'),
		null,
		true
    );
    
    \register_block_type(
		'bricks/block', array(
			'style'         => 'bricks-css',
			'editor_script' => 'bricks-js',
			'editor_style'  => 'bricks-editor-css',
		)
	);
}

\add_action('init', 'MojaveHQ\Bricks\register');