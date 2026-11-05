<?php
/**
 * ACF helpers: return the field value, or the original markup value when the field is empty.
 */

// Text: ACF value or the original text.
function okko_text( $name, $fallback = '', $post_id = false ) {
    $v = function_exists( 'get_field' ) ? get_field( $name, $post_id ) : '';
    return ( $v !== null && $v !== '' && $v !== false ) ? $v : $fallback;
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