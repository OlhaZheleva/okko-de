<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/LTSuperior-SemiBold.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/LTSuperior-Medium.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/LTSuperior-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
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
</head>

<body>
    <div class="wrapper">
        <header data-att-header="" data-att-header-scroll="100" class="header">
            <div class="header__container">
                <a href="tel:+4916097322294" class="header__phone btn btn--yellow"
                    aria-label="Call OKKO-Service: +49 160 97322294">+49 160 97322294</a>
                <button type="button" data-att-menu="" class="header__icon icon-menu" aria-label="Menu"
                    aria-expanded="false" aria-controls="header-menu">
                    <span class="icon-menu__lines">
                        <span></span>
                        <span></span>
                    </span>
                    <span class="icon-menu__txt">Menu</span>
                </button>
                <div class="header__menu menu" id="header-menu">
                    <div class="menu__body">
                        <a href="/" class="menu__logo" aria-label="OKKO-Service: home page">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-dr.svg" width="207"
                                height="54" alt="OKKO-Service">
                        </a>
                        <nav class="menu__nav" aria-label="Main menu">
                            <ul class="menu__list">
                                <li class="menu__item menu__item--sub">
                                    <a href="services.html" class="menu__link" aria-label="Services"
                                        aria-expanded="false" aria-controls="header-services">Services</a>
                                    <ul class="menu__sub" id="header-services" hidden>
                                        <li>
                                            <a href="/engine/" class="menu__sublink"
                                                aria-label="Engine Repair">Engine Repair</a>
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
                        </nav>
                        <a href="/booking/" class="menu__book btn" aria-label="Book Now">Book Now</a>
                    </div>
                </div>
            </div>
        </header>