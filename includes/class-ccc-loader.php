<?php
/**
 * Loader for Custom Cost Calculator
 *
 * @package CustomCostCalculator
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class CCC_Loader {
    /**
     * Initialize plugin
     */
    public static function init() {
        self::load_textdomain();
        self::includes();
        self::init_modules();
    }

    /**
     * Load plugin textdomain for translations
     */
    public static function load_textdomain() {
        load_plugin_textdomain( 'custom-cost-calculator', false, dirname( CCC_PLUGIN_BASENAME ) . '/languages/' );
    }

    /**
     * Include core files
     */
    public static function includes() {
        require_once CCC_PLUGIN_DIR . 'includes/class-ccc-admin.php';
        require_once CCC_PLUGIN_DIR . 'includes/class-ccc-frontend.php';
        require_once CCC_PLUGIN_DIR . 'includes/class-ccc-db.php';
        // Add more includes as needed
    }

    /**
     * Initialize modules (admin, frontend, integrations, etc.)
     */
    public static function init_modules() {
        if ( is_admin() ) {
            CCC_Admin::init();
        } else {
            CCC_Frontend::init();
        }
        // Add more module initializations as needed
    }

    /**
     * Plugin activation hook
     */
    public static function activate() {
        CCC_DB::install();
    }

    /**
     * Plugin deactivation hook
     */
    public static function deactivate() {
        // Clean up scheduled events, etc.
    }
}