<?php
/**
 * Admin page template
 */

// Exit if accessed directly
if (!defined('WPINC')) {
    die;
}
?>

<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <div class="my-custom-plugin-admin-content">
        <h2><?php _e('Welcome to My Custom Plugin', 'my-custom-plugin'); ?></h2>
        <p><?php _e('This is the admin page for your custom plugin.', 'my-custom-plugin'); ?></p>

        <form method="post" action="options.php">
            <?php
            // Add settings fields here
            // settings_fields('my-custom-plugin-settings');
            // do_settings_sections('my-custom-plugin-settings');
            // submit_button();
            ?>
        </form>
    </div>
</div>
