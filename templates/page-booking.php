<?php
/**
 * Template Name: Booking Page
 */
get_header();
?>
<main class="page">
	<div data-att-booking="" class="booking">
		<section data-att-heromap="" class="heromap">
			<div class="heromap__okko" aria-hidden="true">
				<span class="heromap__gradient"></span>
			</div>
			<div class="heromap__map">
				<div class="heromap__map-img">
					<img fetchpriority="high" src="./assets/img/home/map-en.svg" width="1145" height="1034"
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
						<use href="./assets/img/spritemap.svg#sprite-close"></use>
					</svg>
				</button>
				<picture>
					<source media="(max-width: 600px)" srcset="./assets/img/common/branch-perl-600.webp"
						type="image/webp">
					<img class="heromap__photo" width="306" height="156" alt="OKKO-Service Perl" loading="lazy"
						src="./assets/img/common/branch-perl.webp">
				</picture>
				<div class="heromap__info">
					<p class="heromap__name" id="heromap-branch-upper-title">OKKO-Service Perl</p>
					<div class="heromap__contacts">
						<p class="heromap__contact">
							<span class="heromap__icon">
								<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
									<use href="./assets/img/spritemap.svg#sprite-pin-small"></use>
								</svg>
							</span>
							<span class="heromap__value">
								Trierer Str. 51, 66706 Perl
								<br>
								49.4740, 6.37540
							</span>
						</p>
						<a class="heromap__contact" href="tel:+4916097322294" aria-label="Call +49 160 97322294">
							<span class="heromap__icon">
								<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
									<use href="./assets/img/spritemap.svg#sprite-phone"></use>
								</svg>
							</span>
							<span class="heromap__value">+49 160 97322294</span>
						</a>
					</div>
					<a class="heromap__route btn btn--yellow btn--full"
						href="https://www.google.com/maps/dir/?api=1&amp;destination=49.4740,6.37540" target="_blank"
						rel="noopener" aria-label="Get directions to OKKO-Service Perl (opens in a new tab)">Get
						directions</a>
				</div>
			</div>
			<div class="heromap__branch" id="heromap-branch-lower" role="dialog"
				aria-labelledby="heromap-branch-lower-title" hidden>
				<button class="heromap__close" type="button" aria-label="Close">
					<svg class="icon" width="6" height="7" aria-hidden="true" focusable="false">
						<use href="./assets/img/spritemap.svg#sprite-close"></use>
					</svg>
				</button>
				<picture>
					<source media="(max-width: 600px)" srcset="./assets/img/common/branch-perl-600.webp"
						type="image/webp">
					<img class="heromap__photo" width="306" height="156" alt="OKKO-Service Perl" loading="lazy"
						src="./assets/img/common/branch-perl.webp">
				</picture>
				<div class="heromap__info">
					<p class="heromap__name" id="heromap-branch-lower-title">OKKO-Service Perl</p>
					<div class="heromap__contacts">
						<p class="heromap__contact">
							<span class="heromap__icon">
								<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
									<use href="./assets/img/spritemap.svg#sprite-pin-small"></use>
								</svg>
							</span>
							<span class="heromap__value">
								Trierer Str. 51, 66706 Perl
								<br>
								49.4740, 6.37540
							</span>
						</p>
						<a class="heromap__contact" href="tel:+4916097322294" aria-label="Call +49 160 97322294">
							<span class="heromap__icon">
								<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
									<use href="./assets/img/spritemap.svg#sprite-phone"></use>
								</svg>
							</span>
							<span class="heromap__value">+49 160 97322294</span>
						</a>
					</div>
					<a class="heromap__route btn btn--yellow btn--full"
						href="https://www.google.com/maps/dir/?api=1&amp;destination=49.4740,6.37540" target="_blank"
						rel="noopener" aria-label="Get directions to OKKO-Service Perl (opens in a new tab)">Get
						directions</a>
				</div>
			</div>
			<div class="heromap__backdrop" hidden></div>
			<div class="heromap__container">
				<h1 class="heromap__title title title--hero">
					BOOK A SERVICE
					<br>
					APPOINTMENT
				</h1>
				<div class="heromap__card card card--sm">
					<p class="heromap__copy text text--muted">
						Fill out the form — we’ll call you back, arrange a convenient time, and let you know
						approximately how long the repair will take. If it’s urgent, it’s best to call us directly.
					</p>
					<div class="heromap__actions">
						<a class="heromap__button btn btn--yellow btn--full" href="tel:+4916097322294"
							aria-label="Call +49 160 97322294">+49 160 97322294</a>
					</div>
				</div>
			</div>
		</section>
		<section data-att-request="" class="request request--wide">
			<div class="request__container">
				<?php get_template_part( 'template-parts/request-card' ); ?>
				<div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="request__info reveal">
					<?php
					$contact_phone = okko_language_field( 'contact_phone', '+49 160 97322294', 'option' );
					$contact_phone_number = preg_replace( '/\s+/', '', $contact_phone );
					?>
					<a class="card request__call card--hover-dark" href="tel:<?php echo esc_attr( $contact_phone_number ); ?>"
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
	</div>
</main>
<?php get_footer(); ?>