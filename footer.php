<footer data-att-footer="" class="footer">
    <div class="footer__container">
        <div data-att-watcher="" data-att-watcher-once="" class="footer__contacts reveal">
            <?php
            $contact_phone = okko_text( 'contact_phone', '+49 160 97322294', 'option' );
            $contact_phone_url = str_replace( ' ', '', $contact_phone );
            $contact_lat = okko_text( 'contact_lat', '49.4740', 'option' );
            $contact_lng = okko_text( 'contact_lng', '6.37540', 'option' );
            $contact_map_fallback = sprintf(
                'https://maps.google.com/maps?q=%s,%s&z=15&hl=en&output=embed',
                rawurlencode( $contact_lat ),
                rawurlencode( $contact_lng )
            );
            $contact_map_url = okko_text( 'contact_map_url', $contact_map_fallback, 'option' );
            $contact_directions_url = add_query_arg(
                array( 'api' => '1', 'destination' => $contact_lat . ',' . $contact_lng ),
                'https://www.google.com/maps/dir/'
            );
            $contact_directions_link = okko_link( 'contact_directions_link', $contact_directions_url, 'Get directions', 'option' );
            $contact_directions_field = function_exists( 'get_field' ) ? get_field( 'contact_directions_link', 'option' ) : null;
            $contact_directions_target = is_array( $contact_directions_field ) && ! empty( $contact_directions_field['url'] )
                ? $contact_directions_link['target']
                : '_blank';
            ?>
            <address class="footer__card">
                <ul class="footer__info">
                    <li class="footer__info-item">
                        <span class="footer__info-icon">
                            <svg class="icon" width="18" height="18" aria-hidden="true" focusable="false">
                                <use
                                    href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-phone">
                                </use>
                            </svg>
                        </span>
                        <span class="footer__info-body">
                            <a class="footer__info-value link" href="tel:<?php echo esc_attr( $contact_phone_url ); ?>"
                                aria-label="<?php echo esc_attr( 'Call OKKO-Service: ' . $contact_phone ); ?>"><?php echo esc_html( $contact_phone ); ?></a>
                            <span class="footer__info-note text text--caption text--muted"><?php echo esc_html( okko_text( 'contact_phone_caption', '24/7, 7 days a week', 'option' ) ); ?></span>
                        </span>
                    </li>
                    <li class="footer__info-item">
                        <span class="footer__info-icon">
                            <svg class="icon" width="14" height="18" aria-hidden="true" focusable="false">
                                <use
                                    href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-pin-small">
                                </use>
                            </svg>
                        </span>
                        <span class="footer__info-body">
                            <span class="footer__info-value"><?php echo esc_html( okko_text( 'contact_address', 'Trierer Str. 51, 66706 Perl', 'option' ) ); ?></span>
                        </span>
                    </li>
                    <li class="footer__info-item">
                        <span class="footer__info-icon">
                            <svg class="icon" width="18" height="18" aria-hidden="true" focusable="false">
                                <use
                                    href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-clock">
                                </use>
                            </svg>
                        </span>
                        <span class="footer__info-body">
                            <span class="footer__info-value"><?php echo esc_html( okko_text( 'contact_opening_hours', 'Mon–Fri 08:00–18:00', 'option' ) ); ?></span>
                            <span class="footer__info-note text text--caption text--muted"><?php echo esc_html( okko_text( 'contact_opening_hours_caption', 'Emergency assistance — 24/7, 7 days a week.', 'option' ) ); ?></span>
                        </span>
                    </li>
                    <li class="footer__info-item">
                        <span class="footer__info-icon">
                            <svg class="icon" width="18" height="18" aria-hidden="true" focusable="false">
                                <use
                                    href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-route">
                                </use>
                            </svg>
                        </span>
                        <span class="footer__info-body">
                            <span class="footer__info-value"><?php echo esc_html( okko_text( 'contact_directions_note', 'Exit 8 A8 (Saarbrücken–Luxembourg), 14 km from A64', 'option' ) ); ?></span>
                        </span>
                    </li>
                    <li class="footer__info-item">
                        <span class="footer__info-icon">
                            <svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
                                <use
                                    href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-location">
                                </use>
                            </svg>
                        </span>
                        <span class="footer__info-body">
                            <span class="footer__info-value"><?php echo esc_html( $contact_lat . ', ' . $contact_lng ); ?></span>
                        </span>
                    </li>
                </ul>
            </address>
            <div class="footer__map"
                data-footer-map="<?php echo esc_url( $contact_map_url ); ?>"
                data-footer-map-title="Map: OKKO-Service, Trierer Str. 51, 66706 Perl"></div>
            <a class="footer__directions btn btn--yellow btn--full"
                href="<?php echo esc_url( $contact_directions_link['url'] ); ?>" target="<?php echo esc_attr( $contact_directions_target ); ?>"
                rel="noopener noreferrer" aria-label="<?php echo esc_attr( $contact_directions_link['title'] . ' to OKKO-Service in Google Maps' ); ?>">
                <svg class="icon" width="14" height="18" aria-hidden="true" focusable="false">
                    <use href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-pin-small">
                    </use>
                </svg>
                <span><?php echo esc_html( $contact_directions_link['title'] ); ?></span>
            </a>
        </div>
        <div data-att-watcher="" data-att-watcher-once="" class="footer__body reveal">
            <div class="footer__menus">
                <nav class="footer__group footer__group--services" aria-label="Services">
                    <p class="footer__label badge badge--yellow">Services</p>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a class="footer__link link text" href="electronics.html"
                                aria-label="Truck electronics repair">Truck electronics repair</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__link link text" href="diagnostics.html"
                                aria-label="Computer diagnostics">Computer diagnostics</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__link link text" href="engine.html" aria-label="Engine repair">Engine
                                repair</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__link link text" href="brakes.html" aria-label="Brake repair">Brake
                                repair</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__link link text" href="suspension.html"
                                aria-label="Suspension diagnostics and repair">Suspension diagnostics and repair</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__link link text" href="transmission.html"
                                aria-label="Gearboxes, clutches and transmissions">Gearboxes, clutches and
                                transmissions</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__link link text" href="pneumatics.html"
                                aria-label="Pneumatics">Pneumatics</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__link link text" href="hydraulics.html"
                                aria-label="Hydraulics">Hydraulics</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__link footer__link--more link text" href="services.html"
                                aria-label="All services">
                                <span>All services</span>
                                <svg class="icon" width="21" height="6" aria-hidden="true" focusable="false">
                                    <use
                                        href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-arrow">
                                    </use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
                <nav class="footer__group" aria-label="Company">
                    <p class="footer__label badge badge--yellow">Company</p>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a class="footer__link link text" href="about.html" aria-label="About us">About us</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__link link text" href="fleet.html" aria-label="For transport companies">For
                                transport companies</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__link link text" href="waiting.html" aria-label="Driver amenities">Driver
                                amenities</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__link link text" href="contacts.html"
                                aria-label="Branches and contacts">Branches and contacts</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__link link text" href="roadside.html"
                                aria-label="24/7 roadside assistance">24/7 roadside assistance</a>
                        </li>
                    </ul>
                </nav>
                <div class="footer__group">
                    <p class="footer__label badge badge--yellow">Region</p>
                    <ul class="footer__list">
                        <li class="footer__item text">Perl</li>
                        <li class="footer__item text">Trier</li>
                        <li class="footer__item text">Saarland</li>
                    </ul>
                </div>
            </div>
            <div class="footer__group footer__group--langs">
                <ul class="footer__langs" aria-label="Language">
                    <li>
                        <a class="footer__lang" href="de/index.html" lang="de" aria-label="Deutsch">
                            <img class="footer__flag"
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/flags/de.svg" width="16"
                                height="12" alt="Flag of Germany">
                            De
                        </a>
                    </li>
                    <li>
                        <span class="footer__lang footer__lang--active" aria-current="true">
                            <img class="footer__flag"
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/flags/us.svg" width="16"
                                height="12" alt="Flag of the United States">
                            En
                        </span>
                    </li>
                    <li>
                        <a class="footer__lang" href="lt/index.html" lang="lt" aria-label="Lietuvių">
                            <img class="footer__flag"
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/flags/lt.svg" width="16"
                                height="12" alt="Flag of Lithuania">
                            Lt
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer__bottom">
                <p class="footer__copy text text--caption">© 2026 OKKO-Service · Perl, Saarland</p>
                <ul class="footer__legal">
                    <li>
                        <a class="footer__legal-link link text text--caption" href="#"
                            aria-label="Impressum">Impressum</a>
                    </li>
                    <li>
                        <a class="footer__legal-link link text text--caption" href="#"
                            aria-label="Privacy policy">Privacy policy</a>
                    </li>
                    <li>
                        <a class="footer__legal-link link text text--caption" href="#" aria-label="Cookie">Cookie</a>
                    </li>
                </ul>
            </div>
            <img data-att-watcher="" data-att-watcher-once="" class="footer__logo reveal"
                src="<?php echo get_template_directory_uri(); ?>/assets/img/home/okko-footer.svg" width="594"
                height="153" alt="OKKO-Service" loading="lazy">
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>