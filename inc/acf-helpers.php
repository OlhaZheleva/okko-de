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

// Logo size for an ACF image array, fitted into a box (default 185x80 — the largest logo in the original markup).
// SVG uploads have no width/height in WP metadata, so the size is read from the file (width/height or viewBox).
function okko_logo_size( $image, $max_width = 185, $max_height = 80 ) {
    $width  = isset( $image['width'] ) ? (int) $image['width'] : 0;
    $height = isset( $image['height'] ) ? (int) $image['height'] : 0;

    if ( ( $width < 2 || $height < 2 ) && ! empty( $image['ID'] ) ) {
        $file = get_attached_file( $image['ID'] );
        if ( $file && 'svg' === strtolower( pathinfo( $file, PATHINFO_EXTENSION ) ) && is_readable( $file ) ) {
            $svg = file_get_contents( $file, false, null, 0, 4096 );
            if ( $svg && preg_match( '/viewBox=["\']\s*[-\d.]+[\s,]+[-\d.]+[\s,]+([\d.]+)[\s,]+([\d.]+)/i', $svg, $m ) ) {
                $width  = (float) $m[1];
                $height = (float) $m[2];
            } elseif ( $svg && preg_match( '/<svg[^>]*\swidth=["\']([\d.]+)/i', $svg, $w ) && preg_match( '/<svg[^>]*\sheight=["\']([\d.]+)/i', $svg, $h ) ) {
                $width  = (float) $w[1];
                $height = (float) $h[1];
            }
        }
    }

    if ( $width < 2 || $height < 2 ) {
        return array( 80, 80 );
    }

    $scale = min( $max_width / $width, $max_height / $height );
    return array( max( 1, (int) round( $width * $scale ) ), max( 1, (int) round( $height * $scale ) ) );
}
