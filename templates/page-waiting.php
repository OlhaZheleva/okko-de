<?php
/**
 * Template Name: Waiting Page
 */
get_header();
?>
<main class="page">
    <div data-att-waiting="" class="waiting">
        <?php if ( okko_section_is_visible( 'show_hero' ) ) : ?>
        <section data-att-hero="" class="hero">
            <?php
            $hero_desktop_image = okko_img( 'hero_desktop_image', get_template_directory_uri() . '/assets/img/hero/waiting-area.webp', 'Driver lounge with a kitchenette, a table and chairs at OKKO-Service' );
            $hero_mobile_image = okko_img( 'hero_mobile_image', get_template_directory_uri() . '/assets/img/hero/waiting-area-mb.webp', 'Driver lounge with a kitchenette, a table and chairs at OKKO-Service' );
            $hero_image_alt = okko_text( 'hero_image_alt', 'Driver lounge with a kitchenette, a table and chairs at OKKO-Service' );
            ?>
            <div class="hero__frame">
                <picture class="hero__picture">
                    <source srcset="<?php echo esc_url( $hero_desktop_image['url'] ); ?>" media="(min-width: 48.061em)" width="2100"
                        height="1140" type="<?php echo esc_attr( $hero_desktop_image['id'] ? get_post_mime_type( $hero_desktop_image['id'] ) : 'image/webp' ); ?>">
                    <img class="hero__image ibg" src="<?php echo esc_url( $hero_mobile_image['url'] ); ?>" width="344" height="784"
                        alt="<?php echo esc_attr( $hero_image_alt ); ?>" fetchpriority="high">
                </picture>
                <div class="hero__container">
                    <div class="hero__card card card--sm">
                        <h1 class="hero__title title"><?php echo esc_html( okko_text( 'hero_title', 'A Place to Wait During Repairs' ) ); ?></h1>
                        <p class="hero__text text text--muted">
                            <?php echo nl2br( esc_html( okko_text( 'hero_text', 'The vehicle is in the service bay — and the driver doesn’t have to wonder where to go or where to leave their belongings.' ) ) ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <?php if ( okko_section_is_visible( 'show_facilities' ) ) : ?>
        <section data-att-facilities="" class="facilities">
            <div class="facilities__container">
                <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="facilities__tiles reveal">
                    <?php if ( have_rows( 'facility_items' ) ) : ?>
                        <?php $facility_index = 0; ?>
                        <?php while ( have_rows( 'facility_items' ) ) : the_row(); ?>
                            <?php
                            $facility_fallbacks = [
                                [ 'desktop' => 'parking.webp', 'mobile' => 'parking-600.webp', 'alt' => 'Truck parking on the OKKO-Service premises', 'title' => 'Parking', 'text' => 'Space for trucks and trailers on the service center premises.' ],
                                [ 'desktop' => 'lounge.webp', 'mobile' => 'lounge-600.webp', 'alt' => 'Lounge area for drivers at OKKO-Service', 'title' => 'Rest Area', 'text' => 'A comfortable place to wait during repairs.' ],
                                [ 'desktop' => 'shower.webp', 'mobile' => 'shower-600.webp', 'alt' => 'Shower room for drivers at OKKO-Service', 'title' => 'Shower', 'text' => 'Clean and convenient for drivers.' ],
                                [ 'desktop' => 'kitchen.webp', 'mobile' => 'kitchen-600.webp', 'alt' => 'Kitchen with coffee for drivers at OKKO-Service', 'title' => 'Coffee', 'text' => 'Free drinks for our customers.' ],
                            ];
                            $facility_fallback = $facility_fallbacks[ $facility_index ] ?? [ 'desktop' => 'parking.webp', 'mobile' => 'parking-600.webp', 'alt' => '', 'title' => '', 'text' => '' ];
                            $facility_desktop = get_sub_field( 'desktop_image' );
                            $facility_mobile = get_sub_field( 'mobile_image' );
                            $facility_desktop_url = is_array( $facility_desktop ) && ! empty( $facility_desktop['url'] ) ? $facility_desktop['url'] : get_template_directory_uri() . '/assets/img/waiting/' . $facility_fallback['desktop'];
                            $facility_mobile_url = is_array( $facility_mobile ) && ! empty( $facility_mobile['url'] ) ? $facility_mobile['url'] : get_template_directory_uri() . '/assets/img/waiting/' . $facility_fallback['mobile'];
                            $facility_alt = get_sub_field( 'alt' ) ?: $facility_fallback['alt'];
                            $facility_title = get_sub_field( 'title' ) ?: $facility_fallback['title'];
                            $facility_text = get_sub_field( 'text' ) ?: $facility_fallback['text'];
                            ?>
                            <div class="facilities__tile">
                                <picture>
                                    <source media="(max-width: 600px)" srcset="<?php echo esc_url( $facility_mobile_url ); ?>" type="<?php echo esc_attr( is_array( $facility_mobile ) && ! empty( $facility_mobile['ID'] ) ? get_post_mime_type( $facility_mobile['ID'] ) : 'image/webp' ); ?>">
                                    <img class="facilities__image ibg" width="<?php echo esc_attr( is_array( $facility_desktop ) ? ( $facility_desktop['width'] ?? 853 ) : 853 ); ?>" height="<?php echo esc_attr( is_array( $facility_desktop ) ? ( $facility_desktop['height'] ?? 1280 ) : 1280 ); ?>" alt="<?php echo esc_attr( $facility_alt ); ?>" loading="lazy" src="<?php echo esc_url( $facility_desktop_url ); ?>">
                                </picture>
                                <div class="facilities__body">
                                    <h2 class="facilities__title title"><?php echo esc_html( $facility_title ); ?></h2>
                                    <p class="facilities__text text"><?php echo nl2br( esc_html( $facility_text ) ); ?></p>
                                </div>
                            </div>
                            <?php $facility_index++; ?>
                        <?php endwhile; ?>
                    <?php else : ?>
                    <div class="facilities__tile">
                        <picture>
                            <source media="(max-width: 600px)" srcset="./assets/img/waiting/parking-600.webp"
                                type="image/webp">
                            <img class="facilities__image ibg" width="853" height="1280"
                                alt="Truck parking on the OKKO-Service premises" loading="lazy"
                                src="./assets/img/waiting/parking.webp">
                        </picture>
                        <div class="facilities__body">
                            <h2 class="facilities__title title">Parking</h2>
                            <p class="facilities__text text">Space for trucks and trailers on the service center
                                premises.</p>
                        </div>
                    </div>
                    <div class="facilities__tile">
                        <picture>
                            <source media="(max-width: 600px)" srcset="./assets/img/waiting/lounge-600.webp"
                                type="image/webp">
                            <img class="facilities__image ibg" width="853" height="1280"
                                alt="Lounge area for drivers at OKKO-Service" loading="lazy"
                                src="./assets/img/waiting/lounge.webp">
                        </picture>
                        <div class="facilities__body">
                            <h2 class="facilities__title title">Rest Area</h2>
                            <p class="facilities__text text">A comfortable place to wait during repairs.</p>
                        </div>
                    </div>
                    <div class="facilities__tile">
                        <picture>
                            <source media="(max-width: 600px)" srcset="./assets/img/waiting/shower-600.webp"
                                type="image/webp">
                            <img class="facilities__image ibg" width="1280" height="854"
                                alt="Shower room for drivers at OKKO-Service" loading="lazy"
                                src="./assets/img/waiting/shower.webp">
                        </picture>
                        <div class="facilities__body">
                            <h2 class="facilities__title title">Shower</h2>
                            <p class="facilities__text text">Clean and convenient for drivers.</p>
                        </div>
                    </div>
                    <div class="facilities__tile">
                        <picture>
                            <source media="(max-width: 600px)" srcset="./assets/img/waiting/kitchen-600.webp"
                                type="image/webp">
                            <img class="facilities__image ibg" width="1280" height="853"
                                alt="Kitchen with coffee for drivers at OKKO-Service" loading="lazy"
                                src="./assets/img/waiting/kitchen.webp">
                        </picture>
                        <div class="facilities__body">
                            <h2 class="facilities__title title">Coffee</h2>
                            <p class="facilities__text text">Free drinks for our customers.</p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <?php if ( okko_section_is_visible( 'show_request' ) ) : ?>
        <section data-att-request="" class="request request--wide request--side">
            <div class="request__container">
                <?php get_template_part( 'template-parts/request-card' ); ?>
                <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="request__info reveal">
                    <?php
                    $contact_phone = okko_language_field( 'contact_phone', '+49 160 97322294', 'option' );
                    $contact_phone_number = preg_replace( '/\s+/', '', $contact_phone );
                    ?>
                    <a class="card request__call card--dark" href="tel:<?php echo esc_attr( $contact_phone_number ); ?>"
                        aria-label="<?php echo esc_attr( 'Call ' . $contact_phone ); ?>">
                        <span class="badge"><?php echo esc_html( okko_text( 'request_call_badge', 'Faster — by phone' ) ); ?></span>
                        <span class="request__number title title--third"><?php echo esc_html( $contact_phone ); ?></span>
                        <span class="text text--muted">
                            <?php echo nl2br( esc_html( okko_text( 'request_call_text', 'Not all drivers fill out forms from the cab. Give us a call — we’re available 24/7.' ) ) ); ?>
                        </span>
                    </a>
                    <div class="card request__next">
                        <h2 class="title title--third"><?php echo esc_html( okko_text( 'request_next_title', 'What happens next' ) ); ?></h2>
                        <p class="text text--muted">
                            <?php echo nl2br( esc_html( okko_text( 'request_next_text', 'We’ll call you back during business hours, arrange the date and time of your visit, tell you what to bring, and give you an estimate of how long the repair will take.' ) ) ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>