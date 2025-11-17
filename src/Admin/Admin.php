<?php

namespace MyCustomPlugin\Admin;

/**
 * Admin-specific functionality
 */
class Admin {

    /**
     * Enqueue admin styles
     */
    public function enqueue_styles() {
        wp_enqueue_style(
            'my-custom-plugin-admin',
            MY_CUSTOM_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            MY_CUSTOM_PLUGIN_VERSION,
            'all'
        );
    }

    /**
     * Enqueue admin scripts
     */
    public function enqueue_scripts() {
        wp_enqueue_script(
            'my-custom-plugin-admin',
            MY_CUSTOM_PLUGIN_URL . 'assets/js/admin.js',
            array('jquery'),
            MY_CUSTOM_PLUGIN_VERSION,
            false
        );
    }

    /**
     * Add admin menu
     */
    public function add_admin_menu() {
        add_menu_page(
            __('My Custom Plugin', 'my-custom-plugin'),
            __('My Plugin', 'my-custom-plugin'),
            'manage_options',
            'my-custom-plugin',
            array($this, 'display_admin_page'),
            'dashicons-admin-generic',
            100
        );
    }

    /**
     * Display admin page
     */
    public function display_admin_page() {
        include_once MY_CUSTOM_PLUGIN_PATH . 'src/Admin/views/admin-page.php';
    }
}
