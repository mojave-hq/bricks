<?php
/**
 * Plugin Name: Bricks
 * Plugin URI: https://mojavehq.com/plugins/bricks
 * Description: Bricks is a WordPress starter plugin to quickly and cleanly build Gutenburg blocks.
 * Author: Mojave HQ
 * Author URI: https://mojavehq.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt.
 */

namespace MojaveHQ\Bricks;

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

function register()
{
    \wp_register_style(
        'bricks-style',
        plugin_dir_url(__FILE__).'public/css/plugin.css',
        is_admin() ? ['wp-editor'] : null,
        null
    );

    \wp_register_style(
        'bricks-editor-style',
        plugin_dir_url(__FILE__).'public/css/plugin.css',
        ['wp-edit-blocks'],
        null
    );

    \wp_register_script(
        'bricks-script',
        plugin_dir_url(__FILE__).'public/js/plugin.js',
        ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'],
        null,
        true
    );

    \register_block_type(
        'bricks/block',
        [
            'style'         => 'bricks-style',
            'editor_script' => 'bricks-script',
            'editor_style'  => 'bricks-editor-style',
        ]
    );
}

\add_action('init', __NAMESPACE__.'\\register');
