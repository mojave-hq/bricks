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
if (! defined( 'ABSPATH' )) {
	exit;
}

class BricksPluginProvider
{
    private static $instance;

    private static $slug = 'bricks';

    private $dependencies = array(
        'wp-plugins',
        'wp-edit-post',
        'wp-element',
        'wp-components',
        'wp-data',
        'wp-dom-ready'
    );

    public static function instance() 
    {
        if (! isset(self::$instance) && ! (self::$instance instanceof BricksPluginProvider)) {
            self::$instance = new Self();
        }

        return self::$instance;
    }

    public function register(): void
    {
        \add_action('enqueue_block_editor_assets', array(
                $this,
                'enqueue_styles'
            ),
            999
        );

        \add_action('enqueue_block_editor_assets', array(
                $this,
                'enqueue_scripts'
            ),
            999
        );
    }

    public function enqueue_styles(): void
    {
        \wp_enqueue_style(
            $this->slug . '-styles',
            plugin_dir_url(__FILE__) . 'public/css/bricks.css',
            array(),
            '1.0.0',
            'all'
        );
    }

    public function enqueue_scripts(): void
    {
        \wp_enqueue_script(
            $this->slug . '-scripts',
            plugin_dir_url(__FILE__) . 'public/js/bricks.js',
            $this->dependencies,
            '1.0.0',
            'all'
        );
    }
}

function bootstrap() {
    BricksProvider::instance()->register();
}

bootstrap();