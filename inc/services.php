<?php

function okko_service_page_url( $template ) {
    $pages = get_posts( array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'numberposts' => 1,
        'meta_key' => '_wp_page_template',
        'meta_value' => $template,
        'suppress_filters' => false,
        'lang' => '',
    ) );
    if ( empty( $pages ) ) {
        return home_url( '/' );
    }
    $page_id = $pages[0]->ID;
    if ( function_exists( 'pll_get_post' ) ) {
        $page_id = pll_get_post( $page_id );
    }
    return $page_id ? ( get_permalink( $page_id ) ?: home_url( '/' ) ) : home_url( '/' );
}

// Override switches default to off, so an unsaved value means "Default".
function okko_service_override( $switch ) {
    return function_exists( 'get_field' ) && (bool) get_field( $switch );
}

// Custom value (when the override is on and filled) -> shared value for the current language -> fallback.
function okko_service_block_value( $name, $custom, $fallback ) {
    if ( $custom ) {
        $value = okko_text( $name . '_custom' );
        if ( '' !== $value ) {
            return $value;
        }
    }
    return okko_language_field( $name, $fallback, 'option' );
}

// Custom rows (override on) -> shared rows for the current language -> fallback rows.
function okko_service_block_rows( $name, $custom, $fallback ) {
    if ( $custom && function_exists( 'get_field' ) ) {
        $rows = get_field( $name . '_custom' );
        if ( ! empty( $rows ) && is_array( $rows ) ) {
            return $rows;
        }
    }
    $rows = okko_language_field( $name, array(), 'option' );
    return ( ! empty( $rows ) && is_array( $rows ) ) ? $rows : $fallback;
}

function okko_service_phone() {
    return okko_language_field( 'contact_phone', '+49 160 97322294', 'option' );
}

function okko_service_phone_url( $phone ) {
    return 'tel:' . preg_replace( '/[^0-9+]/', '', $phone );
}

function okko_service_hero_fallback( $slug, $mobile = false ) {
    $images = array(
        'electronics' => 'electronics', 'diagnostics' => 'diagnostics',
        'engine' => 'engine-repair', 'brakes' => 'brake-repair',
        'suspension' => 'chassis-repair', 'transmission' => 'transmission-repair',
        'pneumatics' => 'pneumatic-systems', 'hydraulics' => 'hydraulics',
        'cooling' => 'cooling-system', 'tires' => 'tire',
        'trailers' => 'trailer-repair', 'tachograph' => 'tachograph',
        'aircon' => 'conditioner', 'welding' => 'welding',
        'glass' => 'windshield', 'inspection' => 'tuv-hu',
        'carriers' => 'transporter-repair', 'accident' => 'accident-repair',
    );
    if ( ! isset( $images[ $slug ] ) ) {
        return '';
    }
    return get_template_directory_uri() . '/assets/img/hero/' . $images[ $slug ] . ( $mobile ? '-mb' : '' ) . '.webp';
}

function okko_related_services( $post_id ) {
    $selected = function_exists( 'get_field' ) ? get_field( 'service_related', $post_id ) : array();
    if ( ! empty( $selected ) && is_array( $selected ) ) {
        $related = array();
        foreach ( $selected as $item ) {
            $item = get_post( is_object( $item ) ? $item->ID : $item );
            if ( $item && 'service' === $item->post_type && 'publish' === $item->post_status && (int) $item->ID !== (int) $post_id ) {
                $related[] = $item;
            }
        }
        return $related;
    }

    $terms = wp_get_post_terms( $post_id, 'service_category', array( 'fields' => 'ids' ) );
    if ( is_wp_error( $terms ) || empty( $terms ) ) {
        return array();
    }
    $args = array(
        'post_type' => 'service',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post__not_in' => array( $post_id ),
        'orderby' => array( 'menu_order' => 'ASC', 'title' => 'ASC' ),
        'tax_query' => array( array( 'taxonomy' => 'service_category', 'field' => 'term_id', 'terms' => $terms ) ),
        'suppress_filters' => false,
    );
    if ( function_exists( 'pll_get_post_language' ) ) {
        $language = pll_get_post_language( $post_id, 'slug' );
        if ( $language ) {
            $args['lang'] = $language;
        }
    }
    return get_posts( $args );
}