<?php

function okko_register_services() {
    register_post_type( 'service', array(
        'labels' => array(
            'name' => 'Services',
            'singular_name' => 'Service',
            'menu_name' => 'Services',
            'all_items' => 'All Services',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Service',
            'edit_item' => 'Edit Service',
            'new_item' => 'New Service',
            'view_item' => 'View Service',
            'search_items' => 'Search Services',
            'not_found' => 'No services found',
            'not_found_in_trash' => 'No services found in Trash',
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array( 'title', 'thumbnail', 'page-attributes' ),
        'rewrite' => array( 'slug' => 'services', 'with_front' => false ),
        'has_archive' => false,
        'menu_icon' => 'dashicons-hammer',
    ) );

    register_taxonomy( 'service_category', 'service', array(
        'labels' => array(
            'name' => 'Service Categories',
            'singular_name' => 'Service Category',
            'menu_name' => 'Categories',
            'all_items' => 'All Categories',
            'add_new_item' => 'Add New Category',
            'edit_item' => 'Edit Category',
            'search_items' => 'Search Categories',
            'not_found' => 'No categories found',
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => false,
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'okko_register_services' );

function okko_create_service_terms() {
    if ( get_option( 'okko_service_terms_created' ) ) {
        return;
    }

    $terms = array(
        'electronics-and-diagnostics' => 'Electronics and Diagnostics',
        'mechanics' => 'Mechanics',
        'bodywork' => 'Bodywork',
        'tires' => 'Tires',
        'trailers-and-car-transporters' => 'Trailers and Car Transporters',
        'additional-technical-services' => 'Additional Technical Services',
        'vehicle-inspection' => 'Vehicle Inspection',
    );

    foreach ( $terms as $slug => $name ) {
        $existing = get_term_by( 'slug', $slug, 'service_category' );
        if ( ! $existing ) {
            $result = wp_insert_term( $name, 'service_category', array( 'slug' => $slug ) );
            if ( is_wp_error( $result ) ) {
                return;
            }
        }
    }

    update_option( 'okko_service_terms_created', true );
}
add_action( 'admin_init', 'okko_create_service_terms' );

function okko_flush_service_rewrites() {
    okko_register_services();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'okko_flush_service_rewrites' );