<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class UCC_CPT {
    public static function register() {
        $labels = [
            'name'               => __( 'Calculators', 'ultimate-cost-calculator' ),
            'singular_name'      => __( 'Calculator', 'ultimate-cost-calculator' ),
            'add_new'            => __( 'Add New', 'ultimate-cost-calculator' ),
            'add_new_item'       => __( 'Add New Calculator', 'ultimate-cost-calculator' ),
            'edit_item'          => __( 'Edit Calculator', 'ultimate-cost-calculator' ),
            'new_item'           => __( 'New Calculator', 'ultimate-cost-calculator' ),
            'all_items'          => __( 'All Calculators', 'ultimate-cost-calculator' ),
            'view_item'          => __( 'View Calculator', 'ultimate-cost-calculator' ),
            'search_items'       => __( 'Search Calculators', 'ultimate-cost-calculator' ),
            'not_found'          => __( 'No calculators found', 'ultimate-cost-calculator' ),
            'not_found_in_trash' => __( 'No calculators found in Trash', 'ultimate-cost-calculator' ),
            'menu_name'          => __( 'Cost Calculators', 'ultimate-cost-calculator' ),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'menu_icon'          => 'dashicons-calculator',
            'supports'           => [ 'title', 'editor' ],
            'has_archive'        => false,
            'show_in_rest'       => true,
            'capability_type'    => 'post',
        ];

        register_post_type( 'calculator', $args );
    }
}