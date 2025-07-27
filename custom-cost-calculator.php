<?php
/*
Plugin Name: Custom Cost Calculator
Plugin URI: https://yourwebsite.com/custom-cost-calculator
Description: Create interactive price estimation and quotation forms with a drag-and-drop builder, advanced calculations, WooCommerce/payment integration, and more.
Version: 1.0.0
Author: Your Name
Author URI: https://yourwebsite.com
License: GPLv2 or later
Text Domain: custom-cost-calculator
Domain Path: /languages
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants
define( 'CCC_VERSION', '1.0.0' );
define( 'CCC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CCC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CCC_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

define( 'CCC_FREE', true ); // Set to false for premium version

// Autoload core files
require_once CCC_PLUGIN_DIR . 'includes/class-ccc-loader.php';

// Activation/Deactivation hooks
register_activation_hook( __FILE__, array( 'CCC_Loader', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'CCC_Loader', 'deactivate' ) );

// Initialize plugin
add_action( 'plugins_loaded', array( 'CCC_Loader', 'init' ) );