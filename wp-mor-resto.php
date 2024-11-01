<?php
/**
 * Plugin Name:       WP MoR Resto
 * Description:       Permet d'afficher les informations de votre restaurant depuis l'API Midi O' Resto
 * Version:           0.0.15
 * Author:            Infinite Studio
 * Author URI:        https://www.infinitestudio.fr/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * The code that runs during plugin activation.
 */
function activate_wp_mor_resto() {
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_wp_mor_resto() {
}

register_activation_hook( __FILE__, 'activate_wp_mor_resto' );
register_deactivation_hook( __FILE__, 'deactivate_wp_mor_resto' );

/**
 * The core plugin class
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-mor-resto.php';

/**
 * Begins execution of the plugin.
 */
function run_wp_mor_resto() {
    define( 'WP_MOR_RESTO_PATH', plugin_dir_path( __FILE__ ));
	$plugin = new WP_Mor_Resto();
	$plugin->run();
}

run_wp_mor_resto();
