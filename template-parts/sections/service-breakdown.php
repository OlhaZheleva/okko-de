<?php
$okko_phone = okko_service_phone();
$okko_custom = okko_service_override( 'service_breakdown_custom' );
$okko_title = okko_service_block_value( 'service_breakdown_title', $okko_custom, __( 'Broken down on the road?', 'okko' ) );
$okko_label = okko_service_block_value( 'service_breakdown_label', $okko_custom, __( 'We’ll fix it on-site', 'okko' ) );
$okko_text = okko_service_block_value( 'service_breakdown_text', $okko_custom, __( 'We provide roadside assistance on the A8, A64, around Perl, Trier, and Saarland. In most cases, we repair the vehicle on-site — no towing required.', 'okko' ) );
$okko_button = okko_service_block_value( 'service_breakdown_button', $okko_custom, __( 'How it works', 'okko' ) );
$okko_list_title = okko_service_block_value( 'service_breakdown_list_title', $okko_custom, __( 'What should you tell us over the phone?', 'okko' ) );
$okko_items = okko_service_block_rows( 'service_breakdown_items', $okko_custom, array(
    array( 'icon' => 'truck', 'text' => __( 'Vehicle make, model, and license plate number', 'okko' ) ),
    array( 'icon' => 'location', 'text' => __( 'Your exact location — motorway, direction of travel, kilometer marker', 'okko' ) ),
    array( 'icon' => 'flash', 'text' => __( 'Which warning lights are on', 'okko' ) ),
    array( 'icon' => 'clock', 'text' => __( 'What happened and when the problem started', 'okko' ) ),
) );
$okko_icons = array( 'truck', 'location', 'flash', 'clock' );
?>
<section data-att-breakdown="" class="breakdown breakdown--wide breakdown--dark breakdown--card">
    <div class="breakdown__container">
        <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1" class="breakdown__intro reveal">
            <h2 class="breakdown__title title"><?php echo esc_html( $okko_title ); ?></h2>
            <span class="breakdown__label section-label">
                <span class="icon-circle"><svg class="icon" width="16" height="16" aria-hidden="true" focusable="false"><use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-settings' ); ?>"></use></svg></span>
                <span class="section-label__text"><?php echo esc_html( $okko_label ); ?></span>
            </span>
            <p class="breakdown__text text"><?php echo nl2br( esc_html( $okko_text ) ); ?></p>
            <div class="breakdown__actions">
                <a class="breakdown__button btn btn--blue" href="<?php echo esc_url( okko_service_page_url( 'templates/page-roadside.php' ) ); ?>" aria-label="<?php echo esc_attr( $okko_button ); ?>">
                    <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false"><use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-question' ); ?>"></use></svg>
                    <span><?php echo esc_html( $okko_button ); ?></span>
                </a>
                <a class="breakdown__button btn btn--yellow" href="<?php echo esc_url( okko_service_phone_url( $okko_phone ) ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Call %s', 'okko' ), $okko_phone ) ); ?>">
                    <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false"><use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-phone' ); ?>"></use></svg>
                    <span><?php echo esc_html( $okko_phone ); ?></span>
                </a>
            </div>
        </div>
        <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1" class="breakdown__card reveal">
            <h3 class="breakdown__subtitle title title--second"><?php echo esc_html( $okko_list_title ); ?></h3>
            <ul class="breakdown__list">
                <?php foreach ( $okko_items as $okko_item ) : ?>
                    <?php $okko_icon = in_array( $okko_item['icon'] ?? '', $okko_icons, true ) ? $okko_item['icon'] : 'truck'; ?>
                    <li class="breakdown__item"><span class="breakdown__icon"><svg class="icon" width="16" height="16" aria-hidden="true" focusable="false"><use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-' . $okko_icon ); ?>"></use></svg></span><span class="text text--muted"><?php echo esc_html( $okko_item['text'] ?? '' ); ?></span></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>