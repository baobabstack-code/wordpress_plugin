<?php

namespace MyCustomPlugin;

/**
 * Fired during plugin activation
 */
class Activator {

    /**
     * Plugin activation logic
     */
    public static function activate() {
        // Add activation logic here
        // Example: create database tables, set default options, etc.

        // Flush rewrite rules
        flush_rewrite_rules();
    }
}
