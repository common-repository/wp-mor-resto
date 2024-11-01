<?php

/**
 * Fired when the plugin is uninstalled.
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' )) {
	exit;
}

// remove all options start with 'wp_mor_resto'
global $wpdb;

$plugin_options = $wpdb->get_results( "SELECT option_name FROM $wpdb->options WHERE option_name LIKE 'wp_mor_resto%'" );

foreach( $plugin_options as $option ) {
    delete_option( $option->option_name );
}