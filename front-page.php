<?php get_header(); ?>
<main class="page">
    <div data-att-index="" class="index">
        <section data-att-heromap="" class="heromap">
            <?php
            $contact_phone = okko_language_field( 'contact_phone', '+49 160 97322294', 'option' );
            $contact_phone_number = preg_replace( '/\s+/', '', $contact_phone );
            $contact_address = okko_language_field( 'contact_address', 'Trierer Str. 51, 66706 Perl', 'option' );
            $contact_lat = okko_language_field( 'contact_lat', '49.4740', 'option' );
            $contact_lng = okko_language_field( 'contact_lng', '6.37540', 'option' );
            $directions_fallback = [
                'url' => add_query_arg( [ 'api' => '1', 'destination' => $contact_lat . ',' . $contact_lng ], 'https://www.google.com/maps/dir/' ),
                'title' => 'Get directions',
                'target' => '_blank',
            ];
            $contact_directions = okko_language_field( 'contact_directions_link', $directions_fallback, 'option' );
            if ( ! is_array( $contact_directions ) || empty( $contact_directions['url'] ) ) {
                $contact_directions = $directions_fallback;
            }
            $contact_directions_title = ! empty( $contact_directions['title'] ) ? $contact_directions['title'] : 'Get directions';
            $map_language = okko_language_code();
            $map_path = '/assets/img/home/map-' . $map_language . '.svg';
            if ( ! file_exists( get_template_directory() . $map_path ) ) {
                $map_path = '/assets/img/home/map-en.svg';
            }
            ?>
            <div class="heromap__okko" aria-hidden="true">
                <span class="heromap__gradient"></span>
            </div>
            <div class="heromap__map">
                <div class="heromap__map-img">
                    <img fetchpriority="high" src="<?php echo esc_url( get_template_directory_uri() . $map_path ); ?>" width="1145" height="1034"
                        alt="Map of Europe with OKKO-Service branches">
                    <button class="heromap__pin heromap__pin--upper" type="button" aria-expanded="false"
                        aria-controls="heromap-branch-upper" aria-label="OKKO-Service Perl"></button>
                    <button class="heromap__pin heromap__pin--lower" type="button" aria-expanded="false"
                        aria-controls="heromap-branch-lower" aria-label="OKKO-Service Perl"></button>
                </div>
            </div>
            <div class="heromap__branch" id="heromap-branch-upper" role="dialog"
                aria-labelledby="heromap-branch-upper-title" hidden>
                <button class="heromap__close" type="button" aria-label="Close">
                    <svg class="icon" width="6" height="7" aria-hidden="true" focusable="false">
                        <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-close"></use>
                    </svg>
                </button>
                <picture>
                    <source media="(max-width: 600px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/branch-perl-600.webp"
                        type="image/webp">
                    <img class="heromap__photo" width="306" height="156" alt="OKKO-Service Perl" loading="lazy"
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/common/branch-perl.webp">
                </picture>
                <div class="heromap__info">
                    <p class="heromap__name" id="heromap-branch-upper-title">OKKO-Service Perl</p>
                    <div class="heromap__contacts">
                        <p class="heromap__contact">
                            <span class="heromap__icon">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-pin-small"></use>
                                </svg>
                            </span>
                            <span class="heromap__value">
                                <?php echo esc_html( $contact_address ); ?>
                                <br>
                                <?php echo esc_html( $contact_lat . ', ' . $contact_lng ); ?>
                            </span>
                        </p>
                        <a class="heromap__contact" href="tel:<?php echo esc_attr( $contact_phone_number ); ?>" aria-label="<?php echo esc_attr( 'Call ' . $contact_phone ); ?>">
                            <span class="heromap__icon">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-phone"></use>
                                </svg>
                            </span>
                            <span class="heromap__value"><?php echo esc_html( $contact_phone ); ?></span>
                        </a>
                    </div>
                    <a class="heromap__route btn btn--yellow btn--full"
                        href="<?php echo esc_url( $contact_directions['url'] ); ?>" target="_blank"
                        rel="noopener" aria-label="<?php echo esc_attr( $contact_directions_title . ' to OKKO-Service Perl (opens in a new tab)' ); ?>"><?php echo esc_html( $contact_directions_title ); ?></a>
                </div>
            </div>
            <div class="heromap__branch" id="heromap-branch-lower" role="dialog"
                aria-labelledby="heromap-branch-lower-title" hidden>
                <button class="heromap__close" type="button" aria-label="Close">
                    <svg class="icon" width="6" height="7" aria-hidden="true" focusable="false">
                        <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-close"></use>
                    </svg>
                </button>
                <picture>
                    <source media="(max-width: 600px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/branch-perl-600.webp"
                        type="image/webp">
                    <img class="heromap__photo" width="306" height="156" alt="OKKO-Service Perl" loading="lazy"
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/common/branch-perl.webp">
                </picture>
                <div class="heromap__info">
                    <p class="heromap__name" id="heromap-branch-lower-title">OKKO-Service Perl</p>
                    <div class="heromap__contacts">
                        <p class="heromap__contact">
                            <span class="heromap__icon">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-pin-small"></use>
                                </svg>
                            </span>
                            <span class="heromap__value">
                                <?php echo esc_html( $contact_address ); ?>
                                <br>
                                <?php echo esc_html( $contact_lat . ', ' . $contact_lng ); ?>
                            </span>
                        </p>
                        <a class="heromap__contact" href="tel:<?php echo esc_attr( $contact_phone_number ); ?>" aria-label="<?php echo esc_attr( 'Call ' . $contact_phone ); ?>">
                            <span class="heromap__icon">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-phone"></use>
                                </svg>
                            </span>
                            <span class="heromap__value"><?php echo esc_html( $contact_phone ); ?></span>
                        </a>
                    </div>
                    <a class="heromap__route btn btn--yellow btn--full"
                        href="<?php echo esc_url( $contact_directions['url'] ); ?>" target="_blank"
                        rel="noopener" aria-label="<?php echo esc_attr( $contact_directions_title . ' to OKKO-Service Perl (opens in a new tab)' ); ?>"><?php echo esc_html( $contact_directions_title ); ?></a>
                </div>
            </div>
            <div class="heromap__backdrop" hidden></div>
            <div class="heromap__container">
                <h1 class="heromap__title title title--hero">
                    Advanced
                    <br>
                    truck
                    <br>
                    electronics
                </h1>
                <div class="heromap__card card card--sm">
                    <p class="heromap__copy text text--muted">
                        Europe’s #1 for truck electronics repair. We handle repairs of any complexity and provide 24/7
                        roadside service.
                    </p>
                    <div class="heromap__actions">
                        <a class="heromap__button btn btn--yellow btn--full" href="tel:<?php echo esc_attr( $contact_phone_number ); ?>"
                            aria-label="<?php echo esc_attr( 'Call ' . $contact_phone ); ?>"><?php echo esc_html( $contact_phone ); ?></a>
                        <a class="heromap__button btn btn--blue btn--full" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            aria-label="All services">All services</a>
                    </div>
                </div>
            </div>
        </section>
        <section data-att-breakdown="" class="breakdown">
            <div class="breakdown__container">
                <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="breakdown__intro reveal">
                    <h2 class="breakdown__title title"><?php echo esc_html( okko_text( 'breakdown_title', 'Broken down on the road?' ) ); ?></h2>
                    <span class="breakdown__label section-label">
                        <span class="icon-circle">
                            <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-settings"></use>
                            </svg>
                        </span>
                        <span class="section-label__text"><?php echo esc_html( okko_text( 'breakdown_label', 'We’ll repair it on the spot' ) ); ?></span>
                    </span>
                    <p class="breakdown__text text">
                        <?php echo nl2br( esc_html( okko_text( 'breakdown_text', 'We provide roadside assistance across Europe: Luxembourg, France, Switzerland, Belgium, the Netherlands, Spain, and Italy.' ) ) ); ?>
                    </p>
                    <div class="breakdown__actions">
                        <?php $breakdown_info_link = okko_link( 'breakdown_info_link', home_url( '/' ), 'How it works' ); ?>
                        <a class="breakdown__button btn btn--blue" href="<?php echo esc_url( $breakdown_info_link['url'] ); ?>" aria-label="<?php echo esc_attr( $breakdown_info_link['title'] ); ?>">
                            <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-question"></use>
                            </svg>
                            <span><?php echo esc_html( $breakdown_info_link['title'] ); ?></span>
                        </a>
                        <a class="breakdown__button btn btn--yellow" href="tel:<?php echo esc_attr( $contact_phone_number ); ?>"
                            aria-label="<?php echo esc_attr( 'Call ' . $contact_phone ); ?>">
                            <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-phone"></use>
                            </svg>
                            <span><?php echo esc_html( $contact_phone ); ?></span>
                        </a>
                    </div>
                </div>
                <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="breakdown__card reveal">
                    <h3 class="breakdown__subtitle title title--second"><?php echo esc_html( okko_text( 'breakdown_list_title', 'What should you tell us over the phone?' ) ); ?></h3>
                    <ul class="breakdown__list">
                        <?php if ( have_rows( 'breakdown_items' ) ) : ?>
                            <?php while ( have_rows( 'breakdown_items' ) ) : the_row(); ?>
                                <li class="breakdown__item">
                                    <span class="breakdown__icon">
                                        <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                            <use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-' . sanitize_key( get_sub_field( 'icon' ) ) ); ?>"></use>
                                        </svg>
                                    </span>
                                    <span class="text text--muted"><?php echo esc_html( get_sub_field( 'text' ) ); ?></span>
                                </li>
                            <?php endwhile; ?>
                        <?php else : ?>
                        <li class="breakdown__item">
                            <span class="breakdown__icon">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-truck"></use>
                                </svg>
                            </span>
                            <span class="text text--muted">Vehicle make, model, and license plate number</span>
                        </li>
                        <li class="breakdown__item">
                            <span class="breakdown__icon">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-location"></use>
                                </svg>
                            </span>
                            <span class="text text--muted">Your location — motorway, direction, kilometer marker</span>
                        </li>
                        <li class="breakdown__item">
                            <span class="breakdown__icon">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-flash"></use>
                                </svg>
                            </span>
                            <span class="text text--muted">Which warning lights or error messages are showing on the
                                dashboard</span>
                        </li>
                        <li class="breakdown__item">
                            <span class="breakdown__icon">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-clock"></use>
                                </svg>
                            </span>
                            <span class="text text--muted">What exactly happened and when the problem started</span>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </section>
        <section data-att-advantages="" class="advantages">
            <div class="advantages__container">
                <h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="advantages__title title reveal"><?php echo esc_html( okko_text( 'advantages_title', 'Three reasons customers come to us' ) ); ?></h2>
                <ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="advantages__list reveal">
                    <?php if ( have_rows( 'advantages_items' ) ) : ?>
                        <?php while ( have_rows( 'advantages_items' ) ) : the_row(); ?>
                            <li class="advantages__card card card--dark">
                                <span class="advantages__label section-label section-label--sm">
                                    <span class="icon-circle">
                                        <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                            <use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-' . sanitize_key( get_sub_field( 'icon' ) ) ); ?>"></use>
                                        </svg>
                                    </span>
                                    <span class="section-label__text"><?php echo esc_html( get_sub_field( 'label' ) ); ?></span>
                                </span>
                                <h3 class="title title--second"><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
                                <p class="text text--muted"><?php echo nl2br( esc_html( get_sub_field( 'text' ) ) ); ?></p>
                            </li>
                        <?php endwhile; ?>
                    <?php else : ?>
                    <li class="advantages__card card card--dark">
                        <span class="advantages__label section-label section-label--sm">
                            <span class="icon-circle">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-flash"></use>
                                </svg>
                            </span>
                            <span class="section-label__text">Specialization</span>
                        </span>
                        <h3 class="title title--second">Truck electronics</h3>
                        <p class="text text--muted">
                            Control units, CPC, EBS, Mercedes-Benz Actros keys, wiring, and chip tuning. We repair
                            components where others recommend replacing the entire unit.
                        </p>
                    </li>
                    <?php endif; ?>
                    <li class="advantages__card card card--dark">
                        <span class="advantages__label section-label section-label--sm">
                            <span class="icon-circle">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-complexity"></use>
                                </svg>
                            </span>
                            <span class="section-label__text">Complex repairs</span>
                        </span>
                        <h3 class="title title--second">We handle complex cases</h3>
                        <p class="text text--muted">
                            Repairs of any level of complexity — including jobs that other workshops have turned down.
                        </p>
                    </li>
                    <li class="advantages__card card card--dark">
                        <span class="advantages__label section-label section-label--sm">
                            <span class="icon-circle">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-road-perspective"></use>
                                </svg>
                            </span>
                            <span class="section-label__text">Roadside assistance</span>
                        </span>
                        <h3 class="title title--second">Roadside repairs 24/7</h3>
                        <p class="text text--muted">
                            Not just towing. We come with the necessary equipment and repair the vehicle on-site, 24
                            hours a day, 7 days a week.
                        </p>
                    </li>
                </ul>
            </div>
        </section>
        <section data-att-vehicles="" class="vehicles">
            <div class="vehicles__container">
                <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="vehicles__head reveal">
                    <h2 class="vehicles__title title"><?php echo esc_html( okko_text( 'services_title', 'Truck, trailer, car transporter' ) ); ?></h2>
                    <span class="section-label">
                        <span class="icon-circle">
                            <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-engineering"></use>
                            </svg>
                        </span>
                        <span class="section-label__text"><?php echo esc_html( okko_text( 'services_label', 'Services' ) ); ?></span>
                    </span>
                </div>
                <ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="vehicles__list reveal">
                    <?php if ( have_rows( 'service_cards' ) ) : ?>
                        <?php while ( have_rows( 'service_cards' ) ) : the_row(); ?>
                            <?php
                            $service_title = get_sub_field( 'title' );
                            $service_link = get_sub_field( 'link' );
                            $service_link_url = is_array( $service_link ) && ! empty( $service_link['url'] ) ? $service_link['url'] : home_url( '/' );
                            $service_link_title = is_array( $service_link ) && ! empty( $service_link['title'] ) ? $service_link['title'] : 'Learn more';
                            $service_link_target = is_array( $service_link ) && ! empty( $service_link['target'] ) ? $service_link['target'] : '_self';
                            ?>
                            <li class="vehicles__card card card--hover-dark">
                                <div class="vehicles__body">
                                    <h3 class="title title--third"><?php echo esc_html( $service_title ); ?></h3>
                                    <p class="text text--muted"><?php echo nl2br( esc_html( get_sub_field( 'text' ) ) ); ?></p>
                                </div>
                                <a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( $service_link_url ); ?>" aria-label="<?php echo esc_attr( $service_link_title . ': ' . $service_title ); ?>" target="<?php echo esc_attr( $service_link_target ); ?>">
                                    <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                        <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-question"></use>
                                    </svg>
                                    <span><?php echo esc_html( $service_link_title ); ?></span>
                                </a>
                            </li>
                        <?php endwhile; ?>
                        <?php $services_all_link = okko_link( 'services_all_link', home_url( '/' ), 'View all 19 services' ); ?>
                        <li class="vehicles__item">
                            <a class="vehicles__all card" href="<?php echo esc_url( $services_all_link['url'] ); ?>" aria-label="<?php echo esc_attr( $services_all_link['title'] ); ?>" target="<?php echo esc_attr( $services_all_link['target'] ); ?>">
                                <svg class="icon" width="46" height="46" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-eye-scan"></use>
                                </svg>
                                <span class="title title--second"><?php echo esc_html( $services_all_link['title'] ); ?></span>
                            </a>
                        </li>
                    <?php else : ?>
                    <li class="vehicles__card card card--hover-dark">
                        <div class="vehicles__body">
                            <h3 class="title title--third">Electronics repair and programming</h3>
                            <p class="text text--muted">Control units, CPC, EBS, Actros keys, wiring, chip tuning</p>
                        </div>
                        <a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            aria-label="Learn more: Electronics repair and programming">
                            <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-question"></use>
                            </svg>
                            <span>Learn more</span>
                        </a>
                    </li>
                    <li class="vehicles__card card card--hover-dark">
                        <div class="vehicles__body">
                            <h3 class="title title--third">Computer diagnostics</h3>
                            <p class="text text--muted">Fault code reading and troubleshooting of control units</p>
                        </div>
                        <a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            aria-label="Learn more: Computer diagnostics">
                            <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-question"></use>
                            </svg>
                            <span>Learn more</span>
                        </a>
                    </li>
                    <li class="vehicles__card card card--hover-dark">
                        <div class="vehicles__body">
                            <h3 class="title title--third">Engine repair</h3>
                            <p class="text text--muted">Maintenance, oil and filter changes, injectors, camshaft,
                                cylinder head</p>
                        </div>
                        <a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            aria-label="Learn more: Engine repair">
                            <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-question"></use>
                            </svg>
                            <span>Learn more</span>
                        </a>
                    </li>
                    <li class="vehicles__card card card--hover-dark">
                        <div class="vehicles__body">
                            <h3 class="title title--third">Brake repair</h3>
                            <p class="text text--muted">Brake systems for trucks and trailers</p>
                        </div>
                        <a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            aria-label="Learn more: Brake repair">
                            <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-question"></use>
                            </svg>
                            <span>Learn more</span>
                        </a>
                    </li>
                    <li class="vehicles__card card card--hover-dark">
                        <div class="vehicles__body">
                            <h3 class="title title--third">Chassis diagnostics and repair</h3>
                            <p class="text text--muted">Suspension, axles, steering</p>
                        </div>
                        <a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            aria-label="Learn more: Chassis diagnostics and repair">
                            <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-question"></use>
                            </svg>
                            <span>Learn more</span>
                        </a>
                    </li>
                    <li class="vehicles__card card card--hover-dark">
                        <div class="vehicles__body">
                            <h3 class="title title--third">Gearbox, clutch and transmission</h3>
                            <p class="text text--muted">Gearbox, clutch, driveshaft, gearbox oil</p>
                        </div>
                        <a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            aria-label="Learn more: Gearbox, clutch and transmission">
                            <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-question"></use>
                            </svg>
                            <span>Learn more</span>
                        </a>
                    </li>
                    <li class="vehicles__card card card--hover-dark">
                        <div class="vehicles__body">
                            <h3 class="title title--third">Pneumatics</h3>
                            <p class="text text--muted">Truck and trailer air systems</p>
                        </div>
                        <a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            aria-label="Learn more: Pneumatics">
                            <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-question"></use>
                            </svg>
                            <span>Learn more</span>
                        </a>
                    </li>
                    <li class="vehicles__item">
                        <a class="vehicles__all card" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="View all 19 services">
                            <svg class="icon" width="46" height="46" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-eye-scan"></use>
                            </svg>
                            <span class="title title--second">View all 19 services</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </section>
        <section data-att-complex="" class="complex">
            <?php
            $complex_desktop_image = okko_img( 'complex_desktop_image', get_template_directory_uri() . '/assets/img/home/complex-repairs.webp', 'Mechanic repairing a truck at OKKO-Service' );
            $complex_mobile_image = okko_img( 'complex_mobile_image', get_template_directory_uri() . '/assets/img/home/complex-repairs-mobile.webp', 'Mechanic repairing a truck at OKKO-Service' );
            ?>
            <picture class="complex__picture">
                <source srcset="<?php echo esc_url( $complex_desktop_image['url'] ); ?>" media="(min-width: 51.311em)" width="1010"
                    height="1461" type="image/webp">
                <img class="complex__image" src="<?php echo esc_url( $complex_mobile_image['url'] ); ?>" width="1039"
                    height="1514" alt="<?php echo esc_attr( $complex_mobile_image['alt'] ); ?>" loading="lazy">
            </picture>
            <div class="complex__container">
                <div class="complex__content">
                    <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                        class="complex__head reveal">
                        <h2 class="title">
                            <?php echo esc_html( okko_text( 'complex_title_before', 'A service that takes' ) ); ?>
                            <span class="complex__accent"><?php echo esc_html( okko_text( 'complex_title_accent', 'on what others turn down' ) ); ?></span>
                        </h2>
                        <p class="text">
                            <?php echo nl2br( esc_html( okko_text( 'complex_text', 'OKKO-Service is a service center for trucks, trailers, and car transporters in Perl, at the crossroads of Germany, Luxembourg, and France. Our main specialization is truck electronics: repair and programming of control units, including complex cases.' ) ) ); ?>
                        </p>
                    </div>
                    <ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                        class="complex__list reveal">
                        <?php if ( have_rows( 'complex_features' ) ) : ?>
                            <?php while ( have_rows( 'complex_features' ) ) : the_row(); ?>
                                <li class="complex__card card">
                                    <span class="badge badge--yellow"><?php echo esc_html( get_sub_field( 'badge' ) ); ?></span>
                                    <h3 class="title title--third"><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
                                    <p class="text text--muted"><?php echo nl2br( esc_html( get_sub_field( 'text' ) ) ); ?></p>
                                </li>
                            <?php endwhile; ?>
                        <?php else : ?>
                        <li class="complex__card card">
                            <span class="badge badge--yellow">Price</span>
                            <h3 class="title title--third">Cost estimate before work begins</h3>
                            <p class="text text--muted">We agree on the scope of work and the cost before starting the
                                repair.</p>
                        </li>
                        <li class="complex__card card">
                            <span class="badge badge--yellow">Warranty</span>
                            <h3 class="title title--third">We stand behind our work</h3>
                            <p class="text text--muted">Warranty on all completed repairs.</p>
                        </li>
                        <li class="complex__card card">
                            <span class="badge badge--yellow">Business</span>
                            <h3 class="title title--third">VAT invoice</h3>
                            <p class="text text--muted">Full set of documents for transport companies.</p>
                        </li>
                        <li class="complex__card card">
                            <span class="badge badge--yellow">Location</span>
                            <h3 class="title title--third">200 m from the A8 exit</h3>
                            <p class="text text--muted">14 km from the A64. No need to drive into the city.</p>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                        class="complex__actions reveal">
                        <?php $complex_about_link = okko_link( 'complex_about_link', home_url( '/' ), 'About us' ); ?>
                        <a class="btn btn--blue btn--full" href="<?php echo esc_url( $complex_about_link['url'] ); ?>" aria-label="<?php echo esc_attr( $complex_about_link['title'] ); ?>" target="<?php echo esc_attr( $complex_about_link['target'] ); ?>">
                            <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-about"></use>
                            </svg>
                            <span><?php echo esc_html( $complex_about_link['title'] ); ?></span>
                        </a>
                        <?php $complex_fleet_link = okko_link( 'complex_fleet_link', home_url( '/' ), 'For companies' ); ?>
                        <a class="btn btn--yellow btn--full" href="<?php echo esc_url( $complex_fleet_link['url'] ); ?>" aria-label="<?php echo esc_attr( $complex_fleet_link['title'] ); ?>" target="<?php echo esc_attr( $complex_fleet_link['target'] ); ?>">
                            <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-suitcase"></use>
                            </svg>
                            <span><?php echo esc_html( $complex_fleet_link['title'] ); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <div data-att-numbers="" class="numbers">
            <div class="numbers__container">
                <ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="numbers__list reveal">
                    <?php if ( have_rows( 'stats_items' ) ) : ?>
                        <?php while ( have_rows( 'stats_items' ) ) : the_row(); ?>
                            <li class="numbers__card card card--flat-mobile">
                                <svg class="numbers__icon icon" width="52" height="52" aria-hidden="true" focusable="false">
                                    <use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-' . sanitize_key( get_sub_field( 'icon' ) ) ); ?>"></use>
                                </svg>
                                <div class="numbers__body">
                                    <p class="numbers__value title"><?php echo esc_html( get_sub_field( 'value' ) ); ?></p>
                                    <p class="text text--muted"><?php echo esc_html( get_sub_field( 'text' ) ); ?></p>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php else : ?>
                    <li class="numbers__card card card--flat-mobile">
                        <svg class="numbers__icon icon" width="52" height="52" aria-hidden="true" focusable="false">
                            <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-experience"></use>
                        </svg>
                        <div class="numbers__body">
                            <p class="numbers__value title">10+</p>
                            <p class="text text--muted">years of experience in truck repair</p>
                        </div>
                    </li>
                    <li class="numbers__card card card--flat-mobile">
                        <svg class="numbers__icon icon" width="52" height="52" aria-hidden="true" focusable="false">
                            <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-settings-gear"></use>
                        </svg>
                        <div class="numbers__body">
                            <p class="numbers__value title">1 500+</p>
                            <p class="text text--muted">vehicles repaired</p>
                        </div>
                    </li>
                    <li class="numbers__card card card--flat-mobile">
                        <svg class="numbers__icon icon" width="52" height="52" aria-hidden="true" focusable="false">
                            <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-customer"></use>
                        </svg>
                        <div class="numbers__body">
                            <p class="numbers__value title">100+</p>
                            <p class="text text--muted">regular clients — transport companies</p>
                        </div>
                    </li>
                    <li class="numbers__card card card--flat-mobile">
                        <svg class="numbers__icon icon" width="52" height="52" aria-hidden="true" focusable="false">
                            <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-road"></use>
                        </svg>
                        <div class="numbers__body">
                            <p class="numbers__value title">24/7</p>
                            <p class="text text--muted">roadside assistance</p>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <section data-att-brands="" class="brands">
            <div class="brands__container">
                <h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="brands__title title reveal"><?php echo esc_html( okko_text( 'brands_title', 'Brands we work with' ) ); ?></h2>
                <ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="brands__list reveal">
                    <?php $brand_logos = function_exists( 'get_field' ) ? get_field( 'brand_logos', 'option' ) : []; ?>
                    <?php if ( is_array( $brand_logos ) && ! empty( $brand_logos ) ) : ?>
                        <?php foreach ( $brand_logos as $brand_logo ) : ?>
                            <?php if ( is_array( $brand_logo ) && ! empty( $brand_logo['url'] ) ) : ?>
                                <li class="brands__card card card--flat-mobile">
                                    <img class="brands__logo" data-att-image-sizes-ignore="" src="<?php echo esc_url( $brand_logo['url'] ); ?>" width="<?php echo esc_attr( $brand_logo['width'] ?? 80 ); ?>" height="<?php echo esc_attr( $brand_logo['height'] ?? 45 ); ?>" alt="<?php echo esc_attr( $brand_logo['alt'] ?? '' ); ?>" loading="lazy">
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                    <li class="brands__card card card--flat-mobile">
                        <img class="brands__logo" data-att-image-sizes-ignore="" src="<?php echo get_template_directory_uri(); ?>/assets/img/brands/man.svg"
                            width="80" height="45" alt="MAN" loading="lazy">
                    </li>
                    <li class="brands__card card card--flat-mobile">
                        <img class="brands__logo" data-att-image-sizes-ignore=""
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/brands/mercedes-benz.svg" width="80" height="80" alt="Mercedes-Benz"
                            loading="lazy">
                    </li>
                    <li class="brands__card card card--flat-mobile">
                        <img class="brands__logo" data-att-image-sizes-ignore="" src="<?php echo get_template_directory_uri(); ?>/assets/img/brands/renault.svg"
                            width="61" height="80" alt="Renault Trucks" loading="lazy">
                    </li>
                    <li class="brands__card card card--flat-mobile">
                        <img class="brands__logo" data-att-image-sizes-ignore="" src="<?php echo get_template_directory_uri(); ?>/assets/img/brands/scania.svg"
                            width="80" height="77" alt="Scania" loading="lazy">
                    </li>
                    <li class="brands__card card card--flat-mobile">
                        <img class="brands__logo" data-att-image-sizes-ignore="" src="<?php echo get_template_directory_uri(); ?>/assets/img/brands/volvo.svg"
                            width="80" height="80" alt="Volvo" loading="lazy">
                    </li>
                    <li class="brands__card card card--flat-mobile">
                        <img class="brands__logo" width="128" height="66" alt="Rolfo" loading="lazy"
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/brands/logo-r-shield.webp">
                    </li>
                    <li class="brands__card card card--flat-mobile">
                        <img class="brands__logo" data-att-image-sizes-ignore=""
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/brands/kassbohrer.svg" width="182" height="24" alt="Kässbohrer"
                            loading="lazy">
                    </li>
                    <li class="brands__card card card--flat-mobile">
                        <img class="brands__logo" data-att-image-sizes-ignore="" src="<?php echo get_template_directory_uri(); ?>/assets/img/brands/daf.svg"
                            width="116" height="32" alt="DAF" loading="lazy">
                    </li>
                    <li class="brands__card card card--flat-mobile">
                        <img class="brands__logo" data-att-image-sizes-ignore="" src="<?php echo get_template_directory_uri(); ?>/assets/img/brands/iveco.svg"
                            width="154" height="26" alt="IVECO" loading="lazy">
                    </li>
                    <li class="brands__card card card--flat-mobile">
                        <img class="brands__logo" data-att-image-sizes-ignore=""
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/brands/schmitz-cargobull.svg" width="177" height="59"
                            alt="Schmitz Cargobull" loading="lazy">
                    </li>
                    <li class="brands__card card card--flat-mobile">
                        <img class="brands__logo" data-att-image-sizes-ignore="" src="<?php echo get_template_directory_uri(); ?>/assets/img/brands/krone.svg"
                            width="185" height="31" alt="Krone" loading="lazy">
                    </li>
                    <li class="brands__card card card--flat-mobile">
                        <img class="brands__logo" data-att-image-sizes-ignore=""
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/brands/schwarzmueller.svg" width="200" height="26" alt="Schwarzmüller"
                            loading="lazy">
                    </li>
                            <?php endif; ?>
                </ul>
            </div>
        </section>
        <section data-att-amenities="" class="amenities">
            <div class="amenities__container">
                <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="amenities__head reveal">
                    <h2 class="title"><?php echo esc_html( okko_text( 'amenities_title', 'A place to wait' ) ); ?></h2>
                    <span class="amenities__label section-label">
                        <span class="icon-circle">
                            <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-settings"></use>
                            </svg>
                        </span>
                        <span class="section-label__text"><?php echo esc_html( okko_text( 'amenities_label', 'While your vehicle is being repaired' ) ); ?></span>
                    </span>
                    <p class="amenities__text text">
                        <?php echo nl2br( esc_html( okko_text( 'amenities_text', 'The driver doesn’t have to wait in the cab — there’s a place to relax and take a shower.' ) ) ); ?>
                    </p>
                </div>
                <ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="amenities__list reveal">
                    <?php
                    $amenity_fallbacks = [
                        [ 'image' => 'parking.webp', 'alt' => 'Truck parking on the OKKO-Service premises', 'icon' => 'parking', 'title' => 'Parking', 'text' => 'Space for a truck and trailer on the service center premises', 'width' => 853, 'height' => 1280 ],
                        [ 'image' => 'lounge.webp', 'alt' => 'Lounge area for drivers at OKKO-Service', 'icon' => 'sofa', 'title' => 'Lounge area', 'text' => 'A comfortable place to wait while your vehicle is being repaired', 'width' => 853, 'height' => 1280 ],
                        [ 'image' => 'shower-water.webp', 'alt' => 'Shower for drivers at OKKO-Service', 'icon' => 'shower', 'title' => 'Shower', 'text' => 'Please check availability with our staff', 'width' => 1280, 'height' => 718 ],
                        [ 'image' => 'kitchen.webp', 'alt' => 'Kitchen with coffee for drivers at OKKO-Service', 'icon' => 'coffee', 'title' => 'Coffee', 'text' => 'Please check availability with our staff', 'width' => 1280, 'height' => 853 ],
                    ];
                    ?>
                    <?php if ( have_rows( 'amenity_items' ) ) : ?>
                        <?php $amenity_index = 0; ?>
                        <?php while ( have_rows( 'amenity_items' ) ) : the_row(); ?>
                            <?php
                            $amenity_fallback = $amenity_fallbacks[ $amenity_index ] ?? [ 'image' => 'parking.webp', 'alt' => '', 'icon' => 'parking', 'title' => '', 'text' => '', 'width' => 853, 'height' => 1280 ];
                            $amenity_image = get_sub_field( 'image' );
                            $amenity_image_url = is_array( $amenity_image ) && ! empty( $amenity_image['url'] ) ? $amenity_image['url'] : get_template_directory_uri() . '/assets/img/waiting/' . $amenity_fallback['image'];
                            $amenity_image_alt = is_array( $amenity_image ) && ! empty( $amenity_image['alt'] ) ? $amenity_image['alt'] : $amenity_fallback['alt'];
                            $amenity_icon = get_sub_field( 'icon' ) ?: $amenity_fallback['icon'];
                            $amenity_title = get_sub_field( 'title' ) ?: $amenity_fallback['title'];
                            $amenity_text = get_sub_field( 'text' ) ?: $amenity_fallback['text'];
                            ?>
                            <li class="amenities__card card">
                                <div class="amenities__figure">
                                    <div class="amenities__media">
                                        <img class="amenities__image ibg" width="<?php echo esc_attr( is_array( $amenity_image ) ? ( $amenity_image['width'] ?? $amenity_fallback['width'] ) : $amenity_fallback['width'] ); ?>" height="<?php echo esc_attr( is_array( $amenity_image ) ? ( $amenity_image['height'] ?? $amenity_fallback['height'] ) : $amenity_fallback['height'] ); ?>" alt="<?php echo esc_attr( $amenity_image_alt ); ?>" loading="lazy" src="<?php echo esc_url( $amenity_image_url ); ?>">
                                    </div>
                                    <span class="amenities__icon">
                                        <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                            <use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-' . sanitize_key( $amenity_icon ) ); ?>"></use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="amenities__body">
                                    <h3 class="amenities__title title title--third"><?php echo esc_html( $amenity_title ); ?></h3>
                                    <p class="text text--muted"><?php echo nl2br( esc_html( $amenity_text ) ); ?></p>
                                </div>
                            </li>
                            <?php $amenity_index++; ?>
                        <?php endwhile; ?>
                    <?php else : ?>
                    <li class="amenities__card card">
                        <div class="amenities__figure">
                            <div class="amenities__media">
                                <img class="amenities__image ibg" width="853" height="1280"
                                    alt="Truck parking on the OKKO-Service premises" loading="lazy"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/img/waiting/parking.webp">
                            </div>
                            <span class="amenities__icon">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-parking"></use>
                                </svg>
                            </span>
                        </div>
                        <div class="amenities__body">
                            <h3 class="amenities__title title title--third">Parking</h3>
                            <p class="text text--muted">Space for a truck and trailer on the service center premises</p>
                        </div>
                    </li>
                    <li class="amenities__card card">
                        <div class="amenities__figure">
                            <div class="amenities__media">
                                <img class="amenities__image ibg" width="853" height="1280"
                                    alt="Lounge area for drivers at OKKO-Service" loading="lazy"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/img/waiting/lounge.webp">
                            </div>
                            <span class="amenities__icon">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-sofa"></use>
                                </svg>
                            </span>
                        </div>
                        <div class="amenities__body">
                            <h3 class="amenities__title title title--third">Lounge area</h3>
                            <p class="text text--muted">A comfortable place to wait while your vehicle is being repaired
                            </p>
                        </div>
                    </li>
                    <li class="amenities__card card">
                        <div class="amenities__figure">
                            <div class="amenities__media">
                                <img class="amenities__image ibg" width="1280" height="718"
                                    alt="Shower for drivers at OKKO-Service" loading="lazy"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/img/waiting/shower-water.webp">
                            </div>
                            <span class="amenities__icon">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-shower"></use>
                                </svg>
                            </span>
                        </div>
                        <div class="amenities__body">
                            <h3 class="amenities__title title title--third">Shower</h3>
                            <p class="text text--muted">Please check availability with our staff</p>
                        </div>
                    </li>
                    <li class="amenities__card card">
                        <div class="amenities__figure">
                            <div class="amenities__media">
                                <img class="amenities__image ibg" width="1280" height="853"
                                    alt="Kitchen with coffee for drivers at OKKO-Service" loading="lazy"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/img/waiting/kitchen.webp">
                            </div>
                            <span class="amenities__icon">
                                <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-coffee"></use>
                                </svg>
                            </span>
                        </div>
                        <div class="amenities__body">
                            <h3 class="amenities__title title title--third">Coffee</h3>
                            <p class="text text--muted">Please check availability with our staff</p>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php $amenities_link = okko_link( 'amenities_link', home_url( '/' ), 'Learn more' ); ?>
                <a data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="amenities__button btn btn--blue btn--full reveal" href="<?php echo esc_url( $amenities_link['url'] ); ?>"
                    aria-label="<?php echo esc_attr( $amenities_link['title'] . ': A place to wait' ); ?>" target="<?php echo esc_attr( $amenities_link['target'] ); ?>">
                    <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                        <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-question"></use>
                    </svg>
                    <span><?php echo esc_html( $amenities_link['title'] ); ?></span>
                </a>
            </div>
        </section>
        <section data-att-reviews="" class="reviews">
            <div class="reviews__container">
                <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="reviews__head reveal">
                    <h2 class="reviews__title title"><?php echo esc_html( okko_text( 'reviews_title', 'What our customers say' ) ); ?></h2>
                    <span class="reviews__label section-label">
                        <span class="icon-circle">
                            <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-writing"></use>
                            </svg>
                        </span>
                        <span class="section-label__text"><?php echo esc_html( okko_text( 'reviews_label', 'Reviews' ) ); ?></span>
                    </span>
                    <p class="reviews__text text">
                        <?php echo nl2br( esc_html( okko_text( 'reviews_text', 'This section will feature real Google reviews. Before launch, it will be filled with genuine customer reviews from Google.' ) ) ); ?>
                    </p>
                </div>
                <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="reviews__body reveal">
                    <div data-att-slider="" class="reviews__slider swiper">
                        <ul class="swiper-wrapper">
                            <?php if ( have_rows( 'review_items' ) ) : ?>
                                <?php $review_index = 0; ?>
                                <?php while ( have_rows( 'review_items' ) ) : the_row(); ?>
                                    <?php
                                    $review_fallbacks = [
                                        'Placeholder for a real customer review. Before launch, this section will be filled with genuine reviews from Google.',
                                        'Placeholder for a customer review of medium length, a little longer than the first one. It will be replaced with a genuine review from Google.',
                                        'Placeholder for a longer customer review. It checks how the cards behave when the text takes six lines. Before launch, this section will be filled with genuine reviews from Google.',
                                        'Placeholder for a short customer review. Before launch, it will be replaced with a genuine review from Google.',
                                        'Placeholder for a detailed review: the driver describes the breakdown, the repair and the waiting time. Before launch, it will be replaced with a genuine review from Google.',
                                        'Placeholder for a real customer review. Before launch, this section will be filled with genuine reviews from Google.',
                                    ];
                                    $review_author = get_sub_field( 'author' ) ?: 'Natalia K.';
                                    $review_date = get_sub_field( 'date' ) ?: '3 months ago';
                                    $review_comment = get_sub_field( 'comment' ) ?: ( $review_fallbacks[ $review_index ] ?? $review_fallbacks[0] );
                                    $review_avatar = get_sub_field( 'avatar' );
                                    $review_avatar_url = is_array( $review_avatar ) && ! empty( $review_avatar['url'] ) ? $review_avatar['url'] : get_template_directory_uri() . '/assets/img/home/review-avatar.webp';
                                    $review_avatar_alt = is_array( $review_avatar ) && ! empty( $review_avatar['alt'] ) ? $review_avatar['alt'] : 'Natalia K.';
                                    ?>
                                    <li class="reviews__slide swiper-slide">
                                        <figure class="reviews__card card card--flat">
                                            <svg class="reviews__stars icon" width="112" height="15" role="img" aria-label="Rated 5 out of 5" focusable="false">
                                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-rating-stars"></use>
                                            </svg>
                                            <figcaption class="reviews__author">
                                                <span class="reviews__avatar">
                                                    <img class="ibg" width="133" height="200" alt="<?php echo esc_attr( $review_avatar_alt ); ?>" loading="lazy" src="<?php echo esc_url( $review_avatar_url ); ?>">
                                                </span>
                                                <span class="reviews__person">
                                                    <span class="reviews__name title title--fourth"><?php echo esc_html( $review_author ); ?></span>
                                                    <span class="text text--caption text--muted"><?php echo esc_html( $review_date ); ?></span>
                                                </span>
                                            </figcaption>
                                            <blockquote class="reviews__quote">
                                                <p class="reviews__comment text text--muted"><?php echo nl2br( esc_html( $review_comment ) ); ?></p>
                                            </blockquote>
                                        </figure>
                                    </li>
                                    <?php $review_index++; ?>
                                <?php endwhile; ?>
                            <?php else : ?>
                            <li class="reviews__slide swiper-slide">
                                <figure class="reviews__card card card--flat">
                                    <svg class="reviews__stars icon" width="112" height="15" role="img"
                                        aria-label="Rated 5 out of 5" focusable="false">
                                        <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-rating-stars"></use>
                                    </svg>
                                    <figcaption class="reviews__author">
                                        <span class="reviews__avatar">
                                            <img class="ibg" width="133" height="200" alt="Natalia K." loading="lazy"
                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/home/review-avatar.webp">
                                        </span>
                                        <span class="reviews__person">
                                            <span class="reviews__name title title--fourth">Natalia K.</span>
                                            <span class="text text--caption text--muted">3 months ago</span>
                                        </span>
                                    </figcaption>
                                    <blockquote class="reviews__quote">
                                        <p class="reviews__comment text text--muted">
                                            Placeholder for a real customer review. Before launch, this section will be
                                            filled with genuine reviews from Google.
                                        </p>
                                    </blockquote>
                                </figure>
                            </li>
                            <li class="reviews__slide swiper-slide">
                                <figure class="reviews__card card card--flat">
                                    <svg class="reviews__stars icon" width="112" height="15" role="img"
                                        aria-label="Rated 5 out of 5" focusable="false">
                                        <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-rating-stars"></use>
                                    </svg>
                                    <figcaption class="reviews__author">
                                        <span class="reviews__avatar">
                                            <img class="ibg" width="133" height="200" alt="Natalia K." loading="lazy"
                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/home/review-avatar.webp">
                                        </span>
                                        <span class="reviews__person">
                                            <span class="reviews__name title title--fourth">Natalia K.</span>
                                            <span class="text text--caption text--muted">3 months ago</span>
                                        </span>
                                    </figcaption>
                                    <blockquote class="reviews__quote">
                                        <p class="reviews__comment text text--muted">
                                            Placeholder for a customer review of medium length, a little longer than the
                                            first one. It will be replaced with a genuine review from Google.
                                        </p>
                                    </blockquote>
                                </figure>
                            </li>
                            <li class="reviews__slide swiper-slide">
                                <figure class="reviews__card card card--flat">
                                    <svg class="reviews__stars icon" width="112" height="15" role="img"
                                        aria-label="Rated 5 out of 5" focusable="false">
                                        <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-rating-stars"></use>
                                    </svg>
                                    <figcaption class="reviews__author">
                                        <span class="reviews__avatar">
                                            <img class="ibg" width="133" height="200" alt="Natalia K." loading="lazy"
                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/home/review-avatar.webp">
                                        </span>
                                        <span class="reviews__person">
                                            <span class="reviews__name title title--fourth">Natalia K.</span>
                                            <span class="text text--caption text--muted">3 months ago</span>
                                        </span>
                                    </figcaption>
                                    <blockquote class="reviews__quote">
                                        <p class="reviews__comment text text--muted">
                                            Placeholder for a longer customer review. It checks how the cards behave
                                            when the text takes six lines. Before launch, this section will be filled
                                            with genuine reviews from Google.
                                        </p>
                                    </blockquote>
                                </figure>
                            </li>
                            <li class="reviews__slide swiper-slide">
                                <figure class="reviews__card card card--flat">
                                    <svg class="reviews__stars icon" width="112" height="15" role="img"
                                        aria-label="Rated 5 out of 5" focusable="false">
                                        <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-rating-stars"></use>
                                    </svg>
                                    <figcaption class="reviews__author">
                                        <span class="reviews__avatar">
                                            <img class="ibg" width="133" height="200" alt="Natalia K." loading="lazy"
                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/home/review-avatar.webp">
                                        </span>
                                        <span class="reviews__person">
                                            <span class="reviews__name title title--fourth">Natalia K.</span>
                                            <span class="text text--caption text--muted">3 months ago</span>
                                        </span>
                                    </figcaption>
                                    <blockquote class="reviews__quote">
                                        <p class="reviews__comment text text--muted">
                                            Placeholder for a short customer review. Before launch, it will be replaced
                                            with a genuine review from Google.
                                        </p>
                                    </blockquote>
                                </figure>
                            </li>
                            <li class="reviews__slide swiper-slide">
                                <figure class="reviews__card card card--flat">
                                    <svg class="reviews__stars icon" width="112" height="15" role="img"
                                        aria-label="Rated 5 out of 5" focusable="false">
                                        <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-rating-stars"></use>
                                    </svg>
                                    <figcaption class="reviews__author">
                                        <span class="reviews__avatar">
                                            <img class="ibg" width="133" height="200" alt="Natalia K." loading="lazy"
                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/home/review-avatar.webp">
                                        </span>
                                        <span class="reviews__person">
                                            <span class="reviews__name title title--fourth">Natalia K.</span>
                                            <span class="text text--caption text--muted">3 months ago</span>
                                        </span>
                                    </figcaption>
                                    <blockquote class="reviews__quote">
                                        <p class="reviews__comment text text--muted">
                                            Placeholder for a detailed review: the driver describes the breakdown, the
                                            repair and the waiting time. Before launch, it will be replaced with a
                                            genuine review from Google.
                                        </p>
                                    </blockquote>
                                </figure>
                            </li>
                            <li class="reviews__slide swiper-slide">
                                <figure class="reviews__card card card--flat">
                                    <svg class="reviews__stars icon" width="112" height="15" role="img"
                                        aria-label="Rated 5 out of 5" focusable="false">
                                        <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-rating-stars"></use>
                                    </svg>
                                    <figcaption class="reviews__author">
                                        <span class="reviews__avatar">
                                            <img class="ibg" width="133" height="200" alt="Natalia K." loading="lazy"
                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/home/review-avatar.webp">
                                        </span>
                                        <span class="reviews__person">
                                            <span class="reviews__name title title--fourth">Natalia K.</span>
                                            <span class="text text--caption text--muted">3 months ago</span>
                                        </span>
                                    </figcaption>
                                    <blockquote class="reviews__quote">
                                        <p class="reviews__comment text text--muted">
                                            Placeholder for a real customer review. Before launch, this section will be
                                            filled with genuine reviews from Google.
                                        </p>
                                    </blockquote>
                                </figure>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div data-att-slider-nav="" class="reviews__nav">
                        <button type="button" class="reviews__button reviews__button--prev swiper-button-prev"
                            aria-label="Previous review">
                            <svg class="icon" width="12" height="16" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-slider-arrow"></use>
                            </svg>
                        </button>
                        <button type="button" class="reviews__button swiper-button-next" aria-label="Next review">
                            <svg class="icon" width="12" height="16" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-slider-arrow"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section data-att-request="" class="request request--wide">
            <div class="request__container">
                <div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
                    class="request__head reveal">
                    <span class="section-label">
                        <span class="icon-circle">
                            <svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
                                <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-contact-us"></use>
                            </svg>
                        </span>
                        <span class="section-label__text"><?php echo esc_html( okko_text( 'request_label', 'Contact' ) ); ?></span>
                    </span>
                    <h2 class="title"><?php echo esc_html( okko_text( 'request_title', 'Call us or send a request' ) ); ?></h2>
                </div>
                <?php get_template_part( 'template-parts/request-card' ); ?>
            </div>
        </section>
    </div>
</main>
<?php get_footer(); ?>