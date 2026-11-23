<?php

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
        'page_title' => 'Theme settings',
        'menu_title' => 'Theme settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
    ) );

    acf_add_options_sub_page( array(
        'page_title' => 'Service FAQ',
        'menu_title' => 'Service FAQ',
        'menu_slug' => 'theme-settings-service-faq',
        'parent_slug' => 'theme-settings',
        'capability' => 'edit_posts',
    ) );

    acf_add_options_sub_page( array(
        'page_title' => 'Service Blocks',
        'menu_title' => 'Service Blocks',
        'menu_slug' => 'theme-settings-service-blocks',
        'parent_slug' => 'theme-settings',
        'capability' => 'edit_posts',
    ) );
}

function okko_legacy_service_faq_switch( $value, $post_id, $field ) {
    if ( is_numeric( $post_id ) && ! metadata_exists( 'post', (int) $post_id, $field['name'] ) && function_exists( 'get_field' ) && get_field( 'service_faq', $post_id ) ) {
        return 1;
    }
    return $value;
}
add_filter( 'acf/load_value/key=field_okko_service_service_faq_custom', 'okko_legacy_service_faq_switch', 10, 3 );