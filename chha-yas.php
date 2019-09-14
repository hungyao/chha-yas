<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/hungyao
 * @since             1.0.0
 * @package           Chha_Yas
 *
 * @wordpress-plugin
 * Plugin Name:       Young Adult Spotlight
 * Plugin URI:        https://github.com/hungyao
 * Description:       Shows a grid of the Young Adult Spotlight.
 * Version:           1.0.0
 * Author:            Andrew Tjia
 * Author URI:        https://github.com/hungyao
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       chha-yas
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-chha-yas-activator.php
 */
function activate_chha_yas() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chha-yas-activator.php';
	Chha_Yas_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-chha-yas-deactivator.php
 */
function deactivate_chha_yas() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chha-yas-deactivator.php';
	Chha_Yas_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_chha_yas' );
register_deactivation_hook( __FILE__, 'deactivate_chha_yas' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-chha-yas.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_chha_yas() {

	$plugin = new Chha_Yas();
	$plugin->run();
}

run_chha_yas();
