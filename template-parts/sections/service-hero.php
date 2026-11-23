<?php
$okko_slug = get_post_field( 'post_name', get_the_ID() );
if ( function_exists( 'pll_get_post' ) ) {
    $okko_default_post = pll_get_post( get_the_ID(), 'en' );
    if ( $okko_default_post ) {
        $okko_slug = get_post_field( 'post_name', $okko_default_post );
    }
}
$okko_desktop = okko_img( 'service_hero_image', okko_service_hero_fallback( $okko_slug ) );
$okko_mobile = okko_img( 'service_hero_image_mobile', okko_service_hero_fallback( $okko_slug, true ) );
$okko_desktop_srcset = $okko_desktop['id'] ? wp_get_attachment_image_srcset( $okko_desktop['id'], 'full' ) : '';
$okko_desktop_mime = $okko_desktop['id'] ? get_post_mime_type( $okko_desktop['id'] ) : 'image/webp';
$okko_phone = okko_service_phone();
$okko_hero_text = okko_text( 'service_hero_text' );
?>
<section data-att-hero="" class="hero">
    <div class="hero__frame">
        <picture class="hero__picture">
            <source srcset="<?php echo $okko_desktop_srcset ? esc_attr( $okko_desktop_srcset ) : esc_url( $okko_desktop['url'] ); ?>" media="(min-width: 48.061em)" width="2100" height="1140" type="<?php echo esc_attr( $okko_desktop_mime ); ?>">
            <img class="hero__image ibg" src="<?php echo esc_url( $okko_mobile['url'] ); ?>" width="516" height="1176" alt="<?php echo esc_attr( $okko_mobile['alt'] ); ?>" fetchpriority="high">
        </picture>
        <div class="hero__container">
            <div class="hero__card card card--sm">
                <h1 class="hero__title title"><?php echo esc_html( okko_text( 'service_hero_title', get_the_title() ) ); ?></h1>
                <p class="hero__text text text--muted"><?php echo nl2br( esc_html( $okko_hero_text ) ); ?></p>
                <div class="hero__actions">
                    <a class="hero__button btn btn--yellow btn--full" href="<?php echo esc_url( okko_service_phone_url( $okko_phone ) ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Call %s', 'okko' ), $okko_phone ) ); ?>">
                        <span><span class="hero__button-word"><?php esc_html_e( 'Call', 'okko' ); ?></span> <?php echo esc_html( $okko_phone ); ?></span>
                    </a>
                    <a class="hero__button btn btn--blue btn--full" href="<?php echo esc_url( okko_service_page_url( 'templates/page-booking.php' ) ); ?>" aria-label="<?php esc_attr_e( 'Book online', 'okko' ); ?>">
                        <span><?php esc_html_e( 'Book online', 'okko' ); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>