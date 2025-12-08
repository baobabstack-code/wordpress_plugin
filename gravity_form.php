<?php
/**
 * Plugin Name: Gravity Forms Webhook Integration
 * Description: Sends Gravity Forms submissions to a webhook using gform_after_submission.
 * Version: 2.0.0
 * Author: Nyasha Ushewokunze
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Stop direct access for security
}

/**
 * The default webhook URL.
 * You can override this using the filter gfwi_webhook_url.
 */
function gfwi_default_webhook_url() {
	return 'https://webhook.site/351579d8-5ee7-486f-9139-1342b3b4147e';
}

/**
 * Initialize the plugin, but ONLY if Gravity Forms is active.
 */
function gfwi_init_plugin() {

	// Check if Gravity Forms plugin exists.
	if ( ! class_exists( 'GFForms' ) ) {
		add_action( 'admin_notices', 'gfwi_missing_gf_notice' );
		return;
	}

	/**
	 * OPTION 1 — Trigger webhook ONLY when Form ID 1 is submitted.
	 * Example:
	 * add_action( 'gform_after_submission_1', 'gfwi_send_to_webhook', 10, 2 );
	 */

	/**
	 * OPTION 2 — Trigger webhook for ALL forms.
	 * This line says:
	 * Hook into gform_after_submission
	 * Run gfwi_send_to_webhook()
	 * Priority = 10 (normal timing)
	 * Number of arguments = 2 ($entry, $form)
	 */
	add_action( 'gform_after_submission', 'gfwi_send_to_webhook', 10, 2 );
}
add_action( 'plugins_loaded', 'gfwi_init_plugin' );

/**
 * Show an admin warning if Gravity Forms is not installed.
 */
function gfwi_missing_gf_notice() {
	echo '<div class="notice notice-error"><p><strong>Gravity Forms Webhook Integration</strong> requires Gravity Forms to be installed and active.</p></div>';
}

/**
 * This is the main function that sends form data to your webhook.
 *
 * @param array $entry  The submitted form values.
 * @param array $form   The full form structure.
 */
function gfwi_send_to_webhook( $entry, $form ) {

	/**
	 * Allows overriding the webhook URL with a filter if needed.
	 */
	$webhook_url = apply_filters( 'gfwi_webhook_url', gfwi_default_webhook_url(), $entry, $form );

	if ( empty( $webhook_url ) ) {
		return;
	}

	$data = array();

	/**
	 * Build the data array:
	 * Loop through each field in the form,
	 * read the label and the submitted value,
	 * and store them as: "Label" => "Value"
	 */
	if ( ! empty( $form['fields'] ) ) {
		foreach ( $form['fields'] as $field ) {

			// Field ID number (e.g., 1, 2, 3)
			$field_id = $field->id;

			// Choose the best possible label for the field
			$label = $field->label ?: $field->adminLabel ?: 'field_' . $field_id;

			// Get the submitted value for this field ID
			$value = rgar( $entry, $field_id );

			// Save into our data array
			$data[ $label ] = $value;
		}
	}

	/**
	 * Send the data to the webhook in JSON format.
	 */
	$response = wp_remote_post( $webhook_url, array(
		'method'  => 'POST',
		'headers' => array( 'Content-Type' => 'application/json' ),
		'body'    => wp_json_encode( $data ),
		'timeout' => 20,
	));

	/**
	 * Log an error message if something goes wrong.
	 */
	if ( is_wp_error( $response ) ) {
		error_log( 'GF Webhook Error: ' . $response->get_error_message() );
	}
}
