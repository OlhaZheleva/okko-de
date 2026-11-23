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