<?php

namespace MyCustomPlugin;

/**
 * Fired during plugin deactivation
 */
class Deactivator {

    /**
     * Plugin deactivation logic
     */
    public static function deactivate() {
        // Add deactivation logic here

        // Flush rewrite rules
        flush_rewrite_rules();
    }
}
