<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/LTSuperior-SemiBold.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/LTSuperior-Medium.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/LTSuperior-Bold.woff2" as="font"
        type="font/woff2" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico">
    <meta name="description"
        content="OKKO-Service in Perl: truck, trailer and car transporter repair, advanced truck electronics and 24/7 roadside assistance on the A8 and A64.">
    <title>OKKO | <?php wp_title(); ?><?php if (wp_title('', false)) {
          echo ' | ';
      } ?><?php bloginfo('name'); ?></title>
    <link rel="modulepreload" crossorigin href="<?php echo get_template_directory_uri(); ?>/assets/js/common.min.js">
    <link rel="modulepreload" crossorigin
        href="<?php echo get_template_directory_uri(); ?>/assets/js/main.min.js?v=1792417478693">
    <link rel="modulepreload" crossorigin
        href="<?php echo get_template_directory_uri(); ?>/assets/js/heromap.min.js?v=1792417478693">
    <link rel="modulepreload" crossorigin
        href="<?php echo get_template_directory_uri(); ?>/assets/js/advantages.min.js?v=1792417478693">
    <script type="module" crossorigin=""
        src="<?php echo get_template_directory_uri(); ?>/assets/js/main.min.js?v=1792417478693"></script>
    <script type="module" crossorigin=""
        src="<?php echo get_template_directory_uri(); ?>/assets/js/heromap.min.js?v=1792417478693"></script>
    <script type="module" crossorigin=""
        src="<?php echo get_template_directory_uri(); ?>/assets/js/advantages.min.js?v=1792417478693"></script>
    <link rel="stylesheet" crossorigin=""
        href="<?php echo get_template_directory_uri(); ?>/assets/css/style.min.css?v=1792417478693">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wrapper">
        <header data-att-header="" data-att-header-scroll="100" class="header">
            <div class="header__container">
                <?php
                $header_phone = okko_text( 'contact_phone', '+49 160 97322294', 'option' );
                $header_book = okko_header_book_link();
                ?>
                <a href="<?php echo esc_attr( 'tel:' . preg_replace( '/[^0-9+]/', '', $header_phone ) ); ?>" class="header__phone btn btn--yellow"
                    aria-label="<?php echo esc_attr( sprintf( __( 'Call %s', 'okko' ), $header_phone ) ); ?>"><?php echo esc_html( $header_phone ); ?></a>
                <button type="button" data-att-menu="" class="header__icon icon-menu" aria-label="<?php esc_attr_e( 'Menu', 'okko' ); ?>"
                    aria-expanded="false" aria-controls="header-menu">
                    <span class="icon-menu__lines">
                        <span></span>
                        <span></span>
                    </span>
                    <span class="icon-menu__txt"><?php esc_html_e( 'Menu', 'okko' ); ?></span>
                </button>
                <div class="header__menu menu" id="header-menu">
                    <div class="menu__body">
                        <a href="<?php echo esc_url( okko_home_url() ); ?>" class="menu__logo" aria-label="<?php esc_attr_e( 'OKKO-Service: home page', 'okko' ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-dr.svg" width="207"
                                height="54" alt="OKKO-Service">
                        </a>
                        <nav class="menu__nav" aria-label="<?php esc_attr_e( 'Main menu', 'okko' ); ?>">
                            <?php if ( has_nav_menu( 'header_main' ) ) : ?>
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'header_main',
                                    'container'      => false,
                                    'depth'          => 2,
                                    'items_wrap'     => '<ul class="menu__list">%3$s</ul>',
                                    'fallback_cb'    => false,
                                    'walker'         => new Okko_Header_Menu_Walker(),
                                ) );
                                ?>
                            <?php else : ?>
                            <ul class="menu__list">
                                <li class="menu__item menu__item--sub">
                                    <a href="/services/" class="menu__link" aria-label="Services"
                                        aria-expanded="false" aria-controls="header-services">Services</a>
                                    <ul class="menu__sub" id="header-services" hidden>
                                        <li>
                                            <a href="/engine/" class="menu__sublink" aria-label="Engine Repair">Engine
                                                Repair</a>
                                        </li>
                                        <li>
                                            <a href="/suspension/" class="menu__sublink"
                                                aria-label="Suspension Diagnostics and Repair">Suspension Diagnostics
                                                and Repair</a>
                                        </li>
                                        <li>
                                            <a href="/transmission/" class="menu__sublink"
                                                aria-label="Gearboxes, Clutches and Transmissions">Gearboxes, Clutches
                                                and Transmissions</a>
                                        </li>
                                        <li>
                                            <a href="/pneumatics/" class="menu__sublink"
                                                aria-label="Pneumatics">Pneumatics</a>
                                        </li>
                                        <li>
                                            <a href="/hydraulics/" class="menu__sublink"
                                                aria-label="Hydraulics">Hydraulics</a>
                                        </li>
                                        <li>
                                            <a href="/cooling/" class="menu__sublink"
                                                aria-label="Cooling System">Cooling System</a>
                                        </li>
                                        <li>
                                            <a href="/services/" class="menu__all btn btn--blue"
                                                aria-label="View all services">
                                                <svg class="icon" width="20" height="20" aria-hidden="true"
                                                    focusable="false">
                                                    <use
                                                        href="<?php echo get_template_directory_uri(); ?>/assets/img/spritemap.svg#sprite-eye-scan">
                                                    </use>
                                                </svg>
                                                View all services
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu__item">
                                    <a href="/roadside/" class="menu__link" aria-label="24/7 Assistance">24/7
                                        Assistance</a>
                                </li>
                                <li class="menu__item">
                                    <a href="/fleet/" class="menu__link" aria-label="For Businesses">For
                                        Businesses</a>
                                </li>
                                <li class="menu__item">
                                    <a href="/about/" class="menu__link" aria-label="About Us">About Us</a>
                                </li>
                                <li class="menu__item">
                                    <a href="/contacts/" class="menu__link" aria-label="Contacts">Contacts</a>
                                </li>
                            </ul>
                            <?php endif; ?>
                        </nav>
                        <a href="<?php echo esc_url( $header_book['url'] ); ?>" class="menu__book btn"<?php echo $header_book['target'] ? ' target="' . esc_attr( $header_book['target'] ) . '" rel="noopener"' : ''; ?>><?php echo esc_html( $header_book['title'] ); ?></a>
                    </div>
                </div>
            </div>
        </header>