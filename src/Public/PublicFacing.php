<?php

namespace MyCustomPlugin\PublicFacing;

/**
 * Public-facing functionality
 */
class PublicFacing {

    /**
     * Enqueue public styles
     */
    public function enqueue_styles() {
        wp_enqueue_style(
            'my-custom-plugin-public',
            MY_CUSTOM_PLUGIN_URL . 'assets/css/public.css',
            array(),
            MY_CUSTOM_PLUGIN_VERSION,
            'all'
        );
    }

    /**
     * Enqueue public scripts
     */
    public function enqueue_scripts() {
        wp_enqueue_script(
            'my-custom-plugin-public',
            MY_CUSTOM_PLUGIN_URL . 'assets/js/public.js',
            array('jquery'),
            MY_CUSTOM_PLUGIN_VERSION,
            false
        );
    }
}
