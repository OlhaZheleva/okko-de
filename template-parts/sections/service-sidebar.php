<?php
$okko_show_contact = okko_show( 'service_show_contact_card' );
$okko_show_related = okko_show( 'service_show_related' );
$okko_phone = $okko_show_contact ? okko_service_phone() : '';
$okko_related = $okko_show_related ? okko_related_services( get_the_ID() ) : array();
$okko_related_heading = okko_text( 'service_related_title', __( 'Related Services', 'okko' ) );
$okko_card_custom = okko_service_override( 'service_card_custom' );
$okko_card_badge = okko_service_block_value( 'service_card_badge', $okko_card_custom, __( 'Ask About the Service', 'okko' ) );
$okko_card_text = okko_service_block_value( 'service_card_text', $okko_card_custom, __( 'Available 24/7. Tell us what’s wrong with the vehicle — we’ll advise you on the estimated time and cost.', 'okko' ) );
$okko_card_button = okko_service_block_value( 'service_card_button', $okko_card_custom, __( 'Book a Service', 'okko' ) );
?>
<?php if ( $okko_show_contact || ( $okko_show_related && ! empty( $okko_related ) ) ) : ?>
<aside data-att-sidebar="" class="sidebar">
    <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1" class="sidebar__container reveal">
        <?php if ( $okko_show_contact ) : ?>
        <div class="sidebar__card card">
            <span class="badge"><?php echo esc_html( $okko_card_badge ); ?></span>
            <a class="title title--third link" href="<?php echo esc_url( okko_service_phone_url( $okko_phone ) ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Call %s', 'okko' ), $okko_phone ) ); ?>"><?php echo esc_html( $okko_phone ); ?></a>
            <p class="text text--muted"><?php echo nl2br( esc_html( $okko_card_text ) ); ?></p>
            <a class="btn btn--blue btn--full" href="<?php echo esc_url( okko_service_page_url( 'templates/page-booking.php' ) ); ?>" aria-label="<?php echo esc_attr( $okko_card_button ); ?>"><span><?php echo esc_html( $okko_card_button ); ?></span></a>
        </div>
        <?php endif; ?>
        <?php if ( $okko_show_related && ! empty( $okko_related ) ) : ?>
            <nav class="sidebar__card card" aria-label="<?php echo esc_attr( $okko_related_heading ); ?>">
                <h3 class="title title--third"><?php echo esc_html( $okko_related_heading ); ?></h3>
                <ul class="sidebar__links">
                    <?php foreach ( $okko_related as $okko_related_post ) : ?>
                        <?php $okko_related_title = get_the_title( $okko_related_post ); ?>
                        <li><a class="sidebar__link text link" href="<?php echo esc_url( get_permalink( $okko_related_post ) ); ?>" aria-label="<?php echo esc_attr( $okko_related_title ); ?>"><?php echo esc_html( $okko_related_title ); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</aside>
<?php endif; ?>