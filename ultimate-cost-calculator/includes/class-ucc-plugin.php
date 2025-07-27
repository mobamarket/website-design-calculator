<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class UCC_Plugin {
    private static $instance = null;

    public static function instance() {
        if ( self::$instance === null ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->includes();
        $this->init_hooks();
    }

    private function includes() {
        require_once UCC_PLUGIN_DIR . 'includes/class-ucc-cpt.php';
        // Add more includes as needed
    }

    private function init_hooks() {
        add_action( 'init', [ $this, 'register_post_types' ] );
        add_action( 'admin_menu', [ $this, 'register_admin_menu' ] );
        // Add more hooks as needed
    }

    public function register_admin_menu() {
        add_menu_page(
            __( 'Ultimate Cost Calculator', 'ultimate-cost-calculator' ),
            __( 'Cost Calculators', 'ultimate-cost-calculator' ),
            'manage_options',
            'ucc_dashboard',
            [ $this, 'dashboard_page' ],
            'dashicons-calculator',
            26
        );
        add_submenu_page(
            'ucc_dashboard',
            __( 'All Calculators', 'ultimate-cost-calculator' ),
            __( 'All Calculators', 'ultimate-cost-calculator' ),
            'manage_options',
            'edit.php?post_type=calculator'
        );
        add_submenu_page(
            'ucc_dashboard',
            __( 'Add New Calculator', 'ultimate-cost-calculator' ),
            __( 'Add New', 'ultimate-cost-calculator' ),
            'manage_options',
            'ucc_add_new',
            [ $this, 'add_new_page' ]
        );
        add_submenu_page(
            'ucc_dashboard',
            __( 'Templates Library', 'ultimate-cost-calculator' ),
            __( 'Templates Library', 'ultimate-cost-calculator' ),
            'manage_options',
            'ucc_templates',
            [ $this, 'templates_page' ]
        );
        add_submenu_page(
            'ucc_dashboard',
            __( 'Import/Export', 'ultimate-cost-calculator' ),
            __( 'Import/Export', 'ultimate-cost-calculator' ),
            'manage_options',
            'ucc_import_export',
            [ $this, 'import_export_page' ]
        );
        add_submenu_page(
            'ucc_dashboard',
            __( 'Analytics & Reports', 'ultimate-cost-calculator' ),
            __( 'Analytics & Reports', 'ultimate-cost-calculator' ),
            'manage_options',
            'ucc_analytics',
            [ $this, 'analytics_page' ]
        );
        add_submenu_page(
            'ucc_dashboard',
            __( 'Settings', 'ultimate-cost-calculator' ),
            __( 'Settings', 'ultimate-cost-calculator' ),
            'manage_options',
            'ucc_settings',
            [ $this, 'settings_page' ]
        );
        add_submenu_page(
            'ucc_dashboard',
            __( 'License', 'ultimate-cost-calculator' ),
            __( 'License', 'ultimate-cost-calculator' ),
            'manage_options',
            'ucc_license',
            [ $this, 'license_page' ]
        );
        add_submenu_page(
            'ucc_dashboard',
            __( 'Help & Docs', 'ultimate-cost-calculator' ),
            __( 'Help & Docs', 'ultimate-cost-calculator' ),
            'manage_options',
            'ucc_help',
            [ $this, 'help_page' ]
        );
    }

    public function dashboard_page() {
        echo '<div class="wrap"><h1>' . esc_html__( 'Ultimate Cost Calculator Dashboard', 'ultimate-cost-calculator' ) . '</h1><p>Welcome to the Ultimate Cost Calculator plugin!</p></div>';
    }
    public function add_new_page() {
        echo '<div class="wrap"><h1>' . esc_html__( 'Add New Calculator', 'ultimate-cost-calculator' ) . '</h1><p>Builder UI coming soon.</p></div>';
    }
    public function templates_page() {
        echo '<div class="wrap"><h1>' . esc_html__( 'Templates Library', 'ultimate-cost-calculator' ) . '</h1><p>Templates feature coming soon.</p></div>';
    }
    public function import_export_page() {
        echo '<div class="wrap"><h1>' . esc_html__( 'Import/Export', 'ultimate-cost-calculator' ) . '</h1><p>Import/export feature coming soon.</p></div>';
    }
    public function analytics_page() {
        echo '<div class="wrap"><h1>' . esc_html__( 'Analytics & Reports', 'ultimate-cost-calculator' ) . '</h1><p>Analytics feature coming soon.</p></div>';
    }
    public function settings_page() {
        echo '<div class="wrap"><h1>' . esc_html__( 'Settings', 'ultimate-cost-calculator' ) . '</h1><p>Settings page coming soon.</p></div>';
    }
    public function license_page() {
        echo '<div class="wrap"><h1>' . esc_html__( 'License', 'ultimate-cost-calculator' ) . '</h1><p>License management coming soon.</p></div>';
    }
    public function help_page() {
        echo '<div class="wrap"><h1>' . esc_html__( 'Help & Docs', 'ultimate-cost-calculator' ) . '</h1><p>Documentation coming soon.</p></div>';
    }

    public function register_post_types() {
        UCC_CPT::register();
    }

    public static function activate() {
        self::instance()->register_post_types();
        flush_rewrite_rules();
    }

    public static function deactivate() {
        flush_rewrite_rules();
    }
}