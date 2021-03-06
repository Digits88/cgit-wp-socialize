<?php

namespace Cgit\Socialize;

class Plugin
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        add_action('widgets_init', [$this, 'registerWidgets']);
        add_action('wp_enqueue_scripts', [$this, 'registerScripts']);
    }

    /**
     * Register widgets
     *
     * @return void
     */
    public function registerWidgets()
    {
        register_widget('Cgit\Socialize\Widgets\Share');
    }

    /**
     * Register scripts and styles
     *
     * The CGIT_SOCIALIZE_ENQUEUE_CSS constant must be defined and must evaluate
     * to true to enqueue the default CSS for embedded icons.
     *
     * @return void
     */
    public function registerScripts()
    {
        if (!defined('CGIT_SOCIALIZE_ENQUEUE_CSS') ||
            !CGIT_SOCIALIZE_ENQUEUE_CSS) {
            return;
        }

        wp_enqueue_style(
            'cgit-socialize',
            plugin_dir_url(CGIT_SOCIALIZE_PLUGIN) . 'css/socialize.css'
        );
    }
}
