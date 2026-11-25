<?php

class Okko_Footer_Menu_Walker extends Walker_Nav_Menu {
	private $after_items;

	public function __construct( $after_items = '' ) {
		$this->after_items = $after_items;
	}

	public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
		$title = apply_filters( 'nav_menu_item_title', $data_object->title, $data_object, $args, $depth );
		$url = ! empty( $data_object->url ) ? $data_object->url : '';

		$output .= '<li class="footer__item"><a class="footer__link link text" href="' . esc_url( $url ) . '">' . esc_html( $title ) . '</a>';
	}

	public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}

	public function walk( $elements, $max_depth, ...$args ) {
		return parent::walk( $elements, $max_depth, ...$args ) . $this->after_items;
	}
}

/**
 * Header main menu (location `header_main`).
 * Outputs the same markup as the static header: top-level items `menu__item` / `menu__link`,
 * items with children become dropdowns (`menu__item--sub` + `menu__sub`), max 2 levels.
 * A dropdown under the "All services" page (template page-services.php) gets the
 * "View all services" button automatically.
 */
class Okko_Header_Menu_Walker extends Walker_Nav_Menu {
	private $parent = null;

	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$id = $this->parent ? 'header-sub-' . $this->parent->ID : 'header-sub';
		$output .= '<ul class="menu__sub" id="' . esc_attr( $id ) . '" hidden>';
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		if ( $this->parent && okko_menu_item_is_services_page( $this->parent ) ) {
			$output .= '<li><a href="' . esc_url( $this->parent->url ) . '" class="menu__all btn btn--blue">'
				. '<svg class="icon" width="20" height="20" aria-hidden="true" focusable="false"><use href="' . esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-eye-scan' ) . '"></use></svg>'
				. esc_html__( 'View all services', 'okko' ) . '</a></li>';
		}
		$output .= '</ul>';
	}

	public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
		$item    = $data_object;
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$title   = apply_filters( 'nav_menu_item_title', $item->title, $item, $args, $depth );
		$current = in_array( 'current-menu-item', $classes, true );

		$attrs = ' href="' . esc_url( $item->url ) . '"';
		if ( ! empty( $item->target ) ) {
			$attrs .= ' target="' . esc_attr( $item->target ) . '"';
		}
		$rel = trim( ( $item->xfn ?? '' ) . ( '_blank' === $item->target ? ' noopener' : '' ) );
		if ( $rel ) {
			$attrs .= ' rel="' . esc_attr( $rel ) . '"';
		}
		if ( $current ) {
			$attrs .= ' aria-current="page"';
		}

		if ( 0 === $depth ) {
			$this->parent = $item;
			$has_sub = in_array( 'menu-item-has-children', $classes, true );
			$li_class = 'menu__item' . ( $has_sub ? ' menu__item--sub' : '' );
			if ( $current || in_array( 'current-menu-ancestor', $classes, true ) ) {
				$li_class .= ' menu__item--current';
			}
			if ( $has_sub ) {
				$attrs .= ' aria-expanded="false" aria-controls="' . esc_attr( 'header-sub-' . $item->ID ) . '"';
			}
			$output .= '<li class="' . esc_attr( $li_class ) . '"><a class="menu__link"' . $attrs . '>' . esc_html( $title ) . '</a>';
		} else {
			$output .= '<li><a class="menu__sublink"' . $attrs . '>' . esc_html( $title ) . '</a>';
		}
	}

	public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}
}

// Menu item points to the "All services" page (any language).
function okko_menu_item_is_services_page( $item ) {
	return 'post_type' === $item->type && 'page' === $item->object
		&& 'templates/page-services.php' === get_page_template_slug( (int) $item->object_id );
}

// URL of the page with the given template, in the current language (Polylang); $fallback if not found.
function okko_template_page_url( $template, $fallback ) {
	$pages = get_posts( array(
		'numberposts'      => 1,
		'post_type'        => 'page',
		'post_status'      => 'publish',
		'meta_key'         => '_wp_page_template',
		'meta_value'       => $template,
		'suppress_filters' => false,
		'fields'           => 'ids',
	) );
	$id = $pages ? (int) $pages[0] : 0;
	if ( $id && function_exists( 'pll_get_post' ) ) {
		$id = (int) pll_get_post( $id ) ?: $id;
	}
	$url = $id ? get_permalink( $id ) : '';
	return $url ? $url : home_url( $fallback );
}

// Home URL of the current language: /, /de/, /lt/.
function okko_home_url() {
	return function_exists( 'pll_home_url' ) ? pll_home_url() : home_url( '/' );
}

// "Book Now" button: Theme settings → Header (header_book_link / _de / _lt), else the Booking page of the current language.
// No fallback from DE/LT to the EN field: the EN link would lead to the English page.
function okko_header_book_link() {
	$language = okko_language_code();
	$name = 'en' === $language ? 'header_book_link' : 'header_book_link_' . $language;
	$link = function_exists( 'get_field' ) ? get_field( $name, 'option' ) : null;
	if ( is_array( $link ) && ! empty( $link['url'] ) ) {
		return array(
			'url'    => $link['url'],
			'title'  => $link['title'] ? $link['title'] : __( 'Book Now', 'okko' ),
			'target' => $link['target'] ? $link['target'] : '',
		);
	}
	return array(
		'url'    => okko_template_page_url( 'templates/page-booking.php', '/booking/' ),
		'title'  => __( 'Book Now', 'okko' ),
		'target' => '',
	);
}
