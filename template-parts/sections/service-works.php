<?php
$okko_works = function_exists( 'get_field' ) ? get_field( 'service_works' ) : array();
$okko_icon = okko_text( 'service_works_icon' );
$okko_icons = array( 'software', 'engine', 'brake', 'chassis', 'transmission', 'suspension', 'hydraulic', 'radiator-fan', 'car-accident', 'wheel', 'trailer', 'chip', 'snow', 'welding-mask', 'windshield', 'stamp' );
?>
<?php if ( ! empty( $okko_works ) && is_array( $okko_works ) ) : ?>
    <section data-att-works="" class="works">
        <div class="works__container">
            <h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1" class="works__title title reveal"><?php echo esc_html( okko_text( 'service_works_title', __( 'What We Do', 'okko' ) ) ); ?></h2>
            <ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1" class="works__list reveal">
                <?php foreach ( $okko_works as $okko_work ) : ?>
                    <li class="works__item card card--dark">
                        <span class="icon-circle icon-circle--sm">
                            <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                <?php if ( in_array( $okko_icon, $okko_icons, true ) ) : ?><use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-' . $okko_icon ); ?>"></use><?php endif; ?>
                            </svg>
                        </span>
                        <h3 class="works__name title title--third"><?php echo esc_html( $okko_work['name'] ?? '' ); ?></h3>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>