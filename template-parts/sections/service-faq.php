<?php
$okko_custom_faq = function_exists( 'get_field' ) ? get_field( 'service_faq' ) : array();
$okko_custom_switch = function_exists( 'get_field' ) ? get_field( 'service_faq_custom' ) : null;
$okko_custom_saved = metadata_exists( 'post', get_the_ID(), 'service_faq_custom' );
$okko_use_custom = is_array( $okko_custom_faq ) && ! empty( $okko_custom_faq ) && ( $okko_custom_switch || ! $okko_custom_saved );
$okko_faq = $okko_use_custom ? $okko_custom_faq : okko_language_field( 'service_faq_default', array(), 'option' );
$okko_shared_title = okko_language_field( 'service_faq_default_title', __( 'Frequently Asked Questions', 'okko' ), 'option' );
$okko_faq_title = $okko_use_custom ? okko_text( 'service_faq_title', $okko_shared_title ) : $okko_shared_title;
?>
<?php if ( ! empty( $okko_faq ) && is_array( $okko_faq ) ) : ?>
    <section data-att-faq="" class="faq">
        <div class="faq__container">
            <h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1" class="faq__title title reveal"><?php echo esc_html( $okko_faq_title ); ?></h2>
            <div data-att-spollers="" data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1" class="faq__list reveal">
                <?php $okko_first = true; ?>
                <?php foreach ( $okko_faq as $okko_item ) : ?>
                    <details class="faq__item"<?php if ( $okko_first ) : ?> data-att-spollers-open="" open<?php endif; ?>>
                        <summary class="faq__question">
                            <h3 class="faq__question-text title title--third"><?php echo esc_html( $okko_item['question'] ?? '' ); ?></h3>
                            <span class="faq__toggle" aria-hidden="true"></span>
                        </summary>
                        <div class="faq__answer text text--muted"><?php echo wp_kses_post( $okko_item['answer'] ?? '' ); ?></div>
                    </details>
                    <?php $okko_first = false; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>