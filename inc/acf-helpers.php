<?php
/**
 * ACF helpers: return the field value, or the original markup value when the field is empty.
 */

// Text: ACF value or the original text.
function okko_text( $name, $fallback = '', $post_id = false ) {
    $v = function_exists( 'get_field' ) ? get_field( $name, $post_id ) : '';
    return ( $v !== null && $v !== '' && $v !== false ) ? $v : $fallback;
}

function okko_section_is_visible( $name, $post_id = false ) {
    if ( ! function_exists( 'get_field' ) ) {
        return true;
    }

    $value = get_field( $name, $post_id );
    return ( null === $value || '' === $value ) ? true : (bool) $value;
}

function okko_show( $name, $post_id = false ) {
    if ( ! function_exists( 'get_field' ) ) {
        return true;
    }

    $value = get_field( $name, $post_id );
    return ( null === $value || '' === $value ) ? true : (bool) $value;
}

function okko_language_code() {
    if ( function_exists( 'pll_current_language' ) ) {
        $language = pll_current_language( 'slug' );
    } elseif ( has_filter( 'wpml_current_language' ) ) {
        $language = apply_filters( 'wpml_current_language', null );
    } else {
        $locale = function_exists( 'determine_locale' ) ? determine_locale() : get_locale();
        $language = strtolower( substr( $locale, 0, 2 ) );
    }

    return in_array( $language, [ 'en', 'de', 'lt' ], true ) ? $language : 'en';
}

function okko_language_field( $name, $fallback = '', $post_id = false ) {
    $language = okko_language_code();
    $field_name = 'en' === $language ? $name : $name . '_' . $language;
    $value = function_exists( 'get_field' ) ? get_field( $field_name, $post_id ) : null;

    if ( ( null === $value || '' === $value || false === $value || [] === $value ) && $field_name !== $name ) {
        $value = function_exists( 'get_field' ) ? get_field( $name, $post_id ) : null;
    }

    return ( null !== $value && '' !== $value && false !== $value && [] !== $value ) ? $value : $fallback;
}

// Image: ACF image array or the original src/alt.
function okko_img( $name, $fallback_src, $fallback_alt = '', $post_id = false ) {
    $img = function_exists( 'get_field' ) ? get_field( $name, $post_id ) : null;
    if ( is_array( $img ) && ! empty( $img['url'] ) ) {
        return [ 'url' => $img['url'], 'alt' => $img['alt'] ?: $fallback_alt, 'id' => $img['ID'] ];
    }
    return [ 'url' => $fallback_src, 'alt' => $fallback_alt, 'id' => 0 ];
}

// Link: ACF link array or the original href/text.
function okko_link( $name, $fallback_url, $fallback_title, $post_id = false ) {
    $l = function_exists( 'get_field' ) ? get_field( $name, $post_id ) : null;
    if ( is_array( $l ) && ! empty( $l['url'] ) ) {
        return [ 'url' => $l['url'], 'title' => $l['title'] ?: $fallback_title, 'target' => $l['target'] ?: '_self' ];
    }
    return [ 'url' => $fallback_url, 'title' => $fallback_title, 'target' => '_self' ];
}