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
        // Add more hooks as needed
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