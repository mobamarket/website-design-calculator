<?php
/*
Plugin Name: Ultimate Cost Calculator
Description: Drag-and-drop cost calculator with stylish UI and advanced features. Compatible with Elementor, Gutenberg, and more.
Version: 1.0.0
Author: Your Name
Text Domain: ultimate-cost-calculator
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Define plugin constants
define( 'UCC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'UCC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'UCC_VERSION', '1.0.0' );

defined( 'UCC_PLUGIN_BASENAME' ) || define( 'UCC_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

// Autoloader for classes
spl_autoload_register( function ( $class ) {
    if ( strpos( $class, 'UCC_' ) === 0 ) {
        $file = UCC_PLUGIN_DIR . 'includes/class-' . strtolower( str_replace( '_', '-', $class ) ) . '.php';
        if ( file_exists( $file ) ) {
            require_once $file;
        }
    }
});

// Load text domain for translations
add_action( 'plugins_loaded', function() {
    load_plugin_textdomain( 'ultimate-cost-calculator', false, dirname( UCC_PLUGIN_BASENAME ) . '/languages' );
});

// Plugin activation/deactivation hooks
register_activation_hook( __FILE__, [ 'UCC_Plugin', 'activate' ] );
register_deactivation_hook( __FILE__, [ 'UCC_Plugin', 'deactivate' ] );

// Initialize the plugin
add_action( 'plugins_loaded', function() {
    require_once UCC_PLUGIN_DIR . 'includes/class-ucc-plugin.php';
    UCC_Plugin::instance();
});