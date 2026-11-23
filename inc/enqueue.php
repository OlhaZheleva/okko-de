<?php

function okko_enqueue_faq() {
    if ( ! is_page_template( 'templates/page-roadside.php' ) && ! is_singular( 'service' ) ) {
        return;
    }

    $path = get_template_directory() . '/assets/js/faq.min.js';
    wp_enqueue_script( 'okko-faq', get_template_directory_uri() . '/assets/js/faq.min.js', array(), filemtime( $path ), true );
}
add_action( 'wp_enqueue_scripts', 'okko_enqueue_faq' );

function okko_faq_module_tag( $tag, $handle ) {
    if ( 'okko-faq' === $handle ) {
        return str_replace( '<script ', '<script type="module" ', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'okko_faq_module_tag', 10, 2 );

function okko_load_textdomain() {
    load_theme_textdomain( 'okko', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'okko_load_textdomain' );