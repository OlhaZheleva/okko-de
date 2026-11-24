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

    acf_add_options_sub_page( array(
        'page_title' => 'Forms',
        'menu_title' => 'Forms',
        'menu_slug' => 'theme-settings-forms',
        'parent_slug' => 'theme-settings',
        'capability' => 'edit_posts',
    ) );
}

function okko_acf_request_form_choices( $field ) {
    $field['choices'] = array();
    if ( ! defined( 'WPCF7_VERSION' ) ) {
        return $field;
    }

    $forms = get_posts( array(
        'post_type' => 'wpcf7_contact_form',
        'numberposts' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ) );
    foreach ( $forms as $form ) {
        $field['choices'][ $form->ID ] = $form->post_title;
    }
    return $field;
}
foreach ( array( 'request_form', 'request_form_default', 'request_form_default_de', 'request_form_default_lt' ) as $field_name ) {
    add_filter( 'acf/load_field/name=' . $field_name, 'okko_acf_request_form_choices' );
}

function okko_legacy_service_faq_switch( $value, $post_id, $field ) {
    if ( is_numeric( $post_id ) && ! metadata_exists( 'post', (int) $post_id, $field['name'] ) && function_exists( 'get_field' ) && get_field( 'service_faq', $post_id ) ) {
        return 1;
    }
    return $value;
}
add_filter( 'acf/load_value/key=field_okko_service_service_faq_custom', 'okko_legacy_service_faq_switch', 10, 3 );