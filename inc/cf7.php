<?php

add_filter( 'wpcf7_autop_or_not', '__return_false' );

function okko_cf7_shortcode_atts( $output, $pairs, $atts ) {
	$output['request_type'] = isset( $atts['request_type'] ) && 'roadside' === $atts['request_type'] ? 'roadside' : 'repair';
	return $output;
}
add_filter( 'shortcode_atts_wpcf7', 'okko_cf7_shortcode_atts', 10, 3 );

function okko_cf7_register_tags() {
	wpcf7_add_form_tag( 'okko_type', 'okko_cf7_type', array( 'name-attr' => true ) );
	wpcf7_add_form_tag( array( 'okko_select', 'okko_select*' ), 'okko_cf7_select', array( 'name-attr' => true, 'selectable-values' => true ) );
	wpcf7_add_form_tag( 'okko_consent', 'okko_cf7_consent', array( 'name-attr' => true ) );
	wpcf7_add_form_tag( 'okko_submit', 'okko_cf7_submit' );
}
add_action( 'wpcf7_init', 'okko_cf7_register_tags' );

function okko_cf7_type( $tag ) {
	if ( empty( $tag->name ) ) {
		return '';
	}
	$form = WPCF7_ContactForm::get_current();
	$selected = $form && 'roadside' === $form->shortcode_attr( 'request_type' ) ? 'roadside' : 'repair';
	$error = wpcf7_get_validation_error( $tag->name );
	$html = '';
	foreach ( array( 'repair', 'roadside' ) as $index => $value ) {
		if ( ! isset( $tag->values[ $index ] ) ) {
			continue;
		}
		$html .= sprintf(
			'<label class="request__type"><input class="request__type-input wpcf7-form-control%s" type="radio" name="%s" value="%s"%s><span class="request__type-text">%s</span></label>',
			$error ? ' wpcf7-not-valid' : '', esc_attr( $tag->name ), esc_attr( $value ),
			checked( $selected, $value, false ), esc_html( $tag->values[ $index ] )
		);
	}
	return $html . $error;
}

function okko_cf7_select_options( $tag ) {
	$disabled = array();
	foreach ( $tag->options as $option ) {
		if ( preg_match( '/^disabled:([1-9][0-9]*)$/', $option, $matches ) ) {
			$disabled[] = (int) $matches[1] - 1;
		}
	}
	$options = array();
	foreach ( $tag->values as $index => $value ) {
		$placeholder = 0 === $index && $tag->has_option( 'first_as_label' );
		$options[] = array(
			'value' => $placeholder ? '' : $value,
			'label' => isset( $tag->labels[ $index ] ) ? $tag->labels[ $index ] : $value,
			'placeholder' => $placeholder,
			'disabled' => $placeholder || in_array( $index, $disabled, true ),
		);
	}
	return $options;
}

function okko_cf7_select( $tag ) {
	if ( empty( $tag->name ) ) {
		return '';
	}
	$error = wpcf7_get_validation_error( $tag->name );
	$options = okko_cf7_select_options( $tag );
	$hangover = wpcf7_get_hangover( $tag->name );
	$html = '';
	foreach ( $options as $option ) {
		$is_selected = $option['placeholder'] ? ( null === $hangover || '' === $hangover ) : $hangover === $option['value'];
		$html .= sprintf( '<option value="%s"%s%s%s>%s</option>', esc_attr( $option['value'] ),
			selected( $is_selected, true, false ), $option['disabled'] ? ' disabled' : '',
			$option['placeholder'] ? ' hidden' : '', esc_html( $option['label'] ) );
	}
	$aria_label = ! empty( $options[0]['placeholder'] ) ? $options[0]['label'] : $tag->name;
	return sprintf(
		'<span class="wpcf7-form-control-wrap" data-name="%1$s"><select class="request__input wpcf7-form-control%2$s" name="%1$s" aria-label="%3$s" aria-invalid="%4$s"%5$s%6$s>%7$s</select><svg class="icon" width="12" height="6" aria-hidden="true" focusable="false"><use href="%8$s"></use></svg>%9$s</span>',
		esc_attr( $tag->name ), $error ? ' wpcf7-not-valid' : '', esc_attr( $aria_label ),
		$error ? 'true' : 'false', $tag->is_required() ? ' required aria-required="true"' : '',
		$error ? ' aria-describedby="' . esc_attr( wpcf7_get_validation_error_reference( $tag->name ) ) . '"' : '',
		$html, esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-chevron-down' ), $error
	);
}

function okko_cf7_consent( $tag ) {
	if ( empty( $tag->name ) ) {
		return '';
	}
	$error = wpcf7_get_validation_error( $tag->name );
	$text = isset( $tag->values[0] ) ? $tag->values[0] : '';
	$link = isset( $tag->values[1] ) ? $tag->values[1] : '';
	return sprintf(
		'<span class="wpcf7-form-control-wrap" data-name="%1$s"><label class="request__consent"><input class="request__consent-input wpcf7-form-control%2$s" type="checkbox" name="%1$s" value="1" required aria-required="true" aria-invalid="%3$s"%4$s><span class="request__consent-text text">%5$s <a class="request__consent-link link" href="%6$s" aria-label="%7$s">%8$s</a></span></label>%9$s</span>',
		esc_attr( $tag->name ), $error ? ' wpcf7-not-valid' : '', $error ? 'true' : 'false',
		$error ? ' aria-describedby="' . esc_attr( wpcf7_get_validation_error_reference( $tag->name ) ) . '"' : '',
		esc_html( $text ), esc_url( get_privacy_policy_url() ?: '#' ), esc_attr( $link ), esc_html( $link ), $error
	);
}

function okko_cf7_submit( $tag ) {
	$label = isset( $tag->values[0] ) ? $tag->values[0] : 'Send request';
	return sprintf(
		'<span class="wpcf7-form-control-wrap" data-name="submit"><button class="request__submit btn btn--blue btn--full wpcf7-form-control" type="submit" aria-label="%1$s"><span>%2$s</span><svg class="icon" width="21" height="6" aria-hidden="true" focusable="false"><use href="%3$s"></use></svg></button></span>',
		esc_attr( $label ), esc_html( $label ), esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-arrow' )
	);
}

function okko_cf7_validate( $result, $tag ) {
	$submission = WPCF7_Submission::get_instance();
	$value = $submission ? $submission->get_posted_data( $tag->name ) : null;
	$valid = is_string( $value ) && '' !== $value;
	$message = 'invalid_required';
	if ( 'okko_type' === $tag->basetype ) {
		$valid = $valid && in_array( $value, array( 'repair', 'roadside' ), true );
	} elseif ( 'okko_consent' === $tag->basetype ) {
		$valid = '1' === $value;
		$message = 'accept_terms';
	} elseif ( 'okko_select' === $tag->basetype ) {
		if ( ! $valid && ! $tag->is_required() && ( null === $value || '' === $value ) ) {
			return $result;
		}
		$allowed = array();
		foreach ( okko_cf7_select_options( $tag ) as $option ) {
			if ( ! $option['disabled'] && '' !== $option['value'] ) {
				$allowed[] = $option['value'];
			}
		}
		$valid = $valid && in_array( $value, $allowed, true );
	}
	if ( ! $valid ) {
		$result->invalidate( $tag, wpcf7_get_message( $message ) );
	}
	return $result;
}
foreach ( array( 'okko_type', 'okko_select', 'okko_select*', 'okko_consent' ) as $okko_cf7_tag ) {
	add_filter( 'wpcf7_validate_' . $okko_cf7_tag, 'okko_cf7_validate', 10, 2 );
}

function okko_cf7_enqueue_assets() {
	if ( ! defined( 'WPCF7_VERSION' ) ) {
		return;
	}
	$directory = get_template_directory();
	$uri = get_template_directory_uri();
	wp_enqueue_style( 'okko-request-form', $uri . '/assets/css/request-form.css', array( 'contact-form-7' ), filemtime( $directory . '/assets/css/request-form.css' ) );
	wp_enqueue_script( 'okko-request-form', $uri . '/assets/js/request-form.js', array(), filemtime( $directory . '/assets/js/request-form.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'okko_cf7_enqueue_assets', 20 );