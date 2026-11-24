<?php
$request_type = isset( $args['request_type'] ) && 'roadside' === $args['request_type'] ? 'roadside' : 'repair';
$form_id = okko_text( 'request_form', '' );
if ( ! $form_id ) {
    $form_id = okko_language_field( 'request_form_default', '', 'option' );
}
$form_id = absint( $form_id );
$form_available = $form_id && shortcode_exists( 'contact-form-7' );
?>
<div data-att-form-wrapper="" data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1" class="request__card card reveal">
    <div class="request__body">
        <?php if ( $form_available ) : ?>
            <?php echo do_shortcode( sprintf( '[contact-form-7 id="%d" html_class="request__form" request_type="%s"]', $form_id, esc_attr( $request_type ) ) ); ?>
        <?php elseif ( current_user_can( 'edit_posts' ) ) : ?>
            <p><?php echo esc_html__( 'Request form unavailable. Check Contact Form 7 and the form settings.', 'okko' ); ?></p>
        <?php endif; ?>
        <p class="request__note text text--muted"><?php echo esc_html( okko_language_field( 'request_note', 'We’ll call you back and provide an estimated cost before work begins.', 'option' ) ); ?></p>
    </div>
    <div data-att-form-message="" class="request__success" role="status" tabindex="-1">
        <p class="title title--second"><?php echo esc_html( okko_language_field( 'request_success_title', 'Thank you!', 'option' ) ); ?></p>
        <p class="text text--muted"><?php echo esc_html( okko_language_field( 'request_success_text', 'We’ll call you back soon.', 'option' ) ); ?></p>
    </div>
</div>