<?php
/**
 * Template Name: Fleet Page
 */
get_header();
?>
<main class="page">
	<div data-att-fleet="" class="fleet">
		<?php if ( okko_section_is_visible( 'show_hero' ) ) : ?>
		<section data-att-hero="" class="hero hero--compact">
			<?php
			$contact_phone = okko_language_field( 'contact_phone', '+49 160 97322294', 'option' );
			$contact_phone_number = preg_replace( '/\s+/', '', $contact_phone );
			$hero_desktop_image = okko_img( 'hero_desktop_image', get_template_directory_uri() . '/assets/img/hero/fleet-service.webp', 'White truck with a yellow trailer driving past a container port' );
			$hero_mobile_image = okko_img( 'hero_mobile_image', get_template_directory_uri() . '/assets/img/hero/fleet-service-mb.webp', 'White truck with a yellow trailer driving past a container port' );
			?>
			<div class="hero__frame">
				<picture class="hero__picture">
					<source srcset="<?php echo esc_url( $hero_desktop_image['url'] ); ?>" media="(min-width: 48.061em)" width="2100"
						height="1140" type="<?php echo esc_attr( $hero_desktop_image['id'] ? get_post_mime_type( $hero_desktop_image['id'] ) : 'image/webp' ); ?>">
					<img class="hero__image ibg" src="<?php echo esc_url( $hero_mobile_image['url'] ); ?>" width="516" height="1176"
						alt="<?php echo esc_attr( $hero_mobile_image['alt'] ); ?>" fetchpriority="high">
				</picture>
				<div class="hero__container">
					<div class="hero__card card card--sm">
						<h1 class="hero__title title"><?php echo esc_html( okko_text( 'hero_title', 'Fleet Service' ) ); ?></h1>
						<p class="hero__text text text--muted">
							<?php echo nl2br( esc_html( okko_text( 'hero_text', 'Every hour of downtime costs money. Our goal is to get your vehicle back on the road as quickly as possible and keep your business running smoothly.' ) ) ); ?>
						</p>
						<div class="hero__actions">
							<a class="hero__button btn btn--yellow btn--full" href="tel:<?php echo esc_attr( $contact_phone_number ); ?>"
								aria-label="<?php echo esc_attr( 'Call ' . $contact_phone ); ?>">
								<span>
									<span class="hero__button-word"><?php echo esc_html( okko_text( 'hero_call_label', 'Call' ) ); ?></span>
									<?php echo esc_html( $contact_phone ); ?>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>
		<?php if ( okko_section_is_visible( 'show_offer' ) ) : ?>
		<section data-att-offer="" class="offer">
			<div class="offer__container">
				<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="offer__title title reveal"><?php echo esc_html( okko_text( 'offer_title', 'What we offer companies' ) ); ?></h2>
				<ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="offer__list reveal">
					<?php
					$offer_fallbacks = [
						[ 'icon' => 'receipt', 'title' => 'VAT Invoice', 'text' => 'Full documentation for accounting purposes.' ],
						[ 'icon' => 'receipt', 'title' => 'Quote in Advance', 'text' => 'A list of required work and the cost — before we start.' ],
						[ 'icon' => 'road-perspective', 'title' => 'Roadside Assistance', 'text' => 'Our vehicle is equipped for call-outs on the A8 and A64 motorways.' ],
						[ 'icon' => 'warranty', 'title' => 'Warranty', 'text' => 'All work is covered by a warranty.' ],
					];
					?>
					<?php if ( have_rows( 'offer_items' ) ) : ?>
						<?php $offer_index = 0; ?>
						<?php while ( have_rows( 'offer_items' ) ) : the_row(); ?>
							<?php
							$offer_fallback = $offer_fallbacks[ $offer_index ] ?? [ 'icon' => 'receipt', 'title' => '', 'text' => '' ];
							$offer_icon = get_sub_field( 'icon' ) ?: $offer_fallback['icon'];
							$offer_title = get_sub_field( 'title' ) ?: $offer_fallback['title'];
							$offer_text = get_sub_field( 'text' ) ?: $offer_fallback['text'];
							?>
							<li class="offer__card card card--flat-mobile">
								<span class="icon-circle icon-circle--sm">
									<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-' . sanitize_key( $offer_icon ) ); ?>"></use>
									</svg>
								</span>
								<h3 class="title title--second"><?php echo esc_html( $offer_title ); ?></h3>
								<p class="text text--muted"><?php echo nl2br( esc_html( $offer_text ) ); ?></p>
							</li>
							<?php $offer_index++; ?>
						<?php endwhile; ?>
					<?php else : ?>
					<li class="offer__card card card--flat-mobile">
						<span class="icon-circle icon-circle--sm">
							<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-receipt' ); ?>"></use>
							</svg>
						</span>
						<h3 class="title title--second">VAT Invoice</h3>
						<p class="text text--muted">Full documentation for accounting purposes.</p>
					</li>
					<li class="offer__card card card--flat-mobile">
						<span class="icon-circle icon-circle--sm">
							<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-receipt' ); ?>"></use>
							</svg>
						</span>
						<h3 class="title title--second">Quote in Advance</h3>
						<p class="text text--muted">A list of required work and the cost — before we start.</p>
					</li>
					<li class="offer__card card card--flat-mobile">
						<span class="icon-circle icon-circle--sm">
							<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-road-perspective' ); ?>"></use>
							</svg>
						</span>
						<h3 class="title title--second">Roadside Assistance</h3>
						<p class="text text--muted">Our vehicle is equipped for call-outs on the A8 and A64 motorways.
						</p>
					</li>
					<li class="offer__card card card--flat-mobile">
						<span class="icon-circle icon-circle--sm">
							<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-warranty' ); ?>"></use>
							</svg>
						</span>
						<h3 class="title title--second">Warranty</h3>
						<p class="text text--muted">All work is covered by a warranty.</p>
					</li>
					<?php endif; ?>
				</ul>
			</div>
		</section>
		<?php endif; ?>
		<?php if ( okko_section_is_visible( 'show_request' ) ) : ?>
		<section data-att-request="" class="request request--wide">
			<div class="request__container">
				<div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="request__head reveal">
					<span class="section-label">
						<span class="icon-circle">
							<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-contact-us' ); ?>"></use>
							</svg>
						</span>
						<span class="section-label__text"><?php echo esc_html( okko_text( 'request_label', 'Contacts' ) ); ?></span>
					</span>
					<h2 class="title"><?php echo esc_html( okko_text( 'request_title', 'Call us or submit a request' ) ); ?></h2>
				</div>
				<div data-att-form-wrapper="" data-att-watcher="" data-att-watcher-once=""
					data-att-watcher-threshold="0.1" class="request__card card reveal">
					<div class="request__body">
						<form data-att-form="dev" class="request__form" action="#" method="POST">
							<fieldset class="request__types">
								<legend class="visually-hidden">Request type</legend>
								<label class="request__type">
									<input class="request__type-input" type="radio" name="type" value="repair" checked>
									<span class="request__type-text">Book a service</span>
								</label>
								<label class="request__type">
									<input class="request__type-input" type="radio" name="type" value="roadside">
									<span class="request__type-text">Roadside assistance</span>
								</label>
							</fieldset>
							<div class="request__fields">
								<label class="request__field">
									<input class="request__input" type="text" name="name" placeholder="*Name"
										autocomplete="name" required>
								</label>
								<label class="request__field">
									<input class="request__input" type="tel" name="phone" placeholder="*Phone"
										autocomplete="tel" required>
								</label>
								<label class="request__field">
									<input class="request__input" type="text" name="company" placeholder="Company"
										autocomplete="organization">
								</label>
								<label class="request__field request__field--select">
									<select class="request__input" name="branch" aria-label="*Branch" required>
										<option value="" selected disabled hidden>*Branch</option>
										<option value="perl">OKKO-Service Perl</option>
										<option value="second" disabled>Second branch (coming soon)</option>
									</select>
									<svg class="icon" width="12" height="6" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-chevron-down' ); ?>"></use>
									</svg>
								</label>
								<label class="request__field request__field--select request__field--wide">
									<select class="request__input" name="service" aria-label="*Select a service"
										required>
										<option value="" selected disabled hidden>*Select a service</option>
										<option value="electronics">Electronics Repair and Programming</option>
										<option value="diagnostics">Computer Diagnostics</option>
										<option value="engine">Engine Repair</option>
										<option value="brakes">Brake Repair</option>
										<option value="suspension">Suspension Diagnostics and Repair</option>
										<option value="transmission">Gearboxes, Clutches and Transmissions</option>
										<option value="pneumatics">Pneumatics</option>
										<option value="hydraulics">Hydraulics</option>
										<option value="cooling">Cooling System</option>
										<option value="accident">Bodywork and Accident Repair</option>
										<option value="tires">Tire Service and Tires</option>
										<option value="trailers">Trailer and Semi-Trailer Repair</option>
										<option value="carriers">Car Transporter Body Repair</option>
										<option value="tachograph">Tachographs</option>
										<option value="aircon">Air Conditioning Recharge</option>
										<option value="welding">Welding</option>
										<option value="glass">Glass</option>
										<option value="inspection">TÜV/HU Inspection Preparation</option>
										<option value="roadside">24/7 Roadside Assistance</option>
									</select>
									<svg class="icon" width="12" height="6" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-chevron-down' ); ?>"></use>
									</svg>
								</label>
								<label class="request__field request__field--wide">
									<textarea class="request__input request__input--area" name="message"
										placeholder="What’s wrong with the vehicle? (make, model, symptoms)"></textarea>
								</label>
							</div>
							<button class="request__submit btn btn--blue btn--full" type="submit"
								aria-label="Submit request">
								<span>Submit request</span>
								<svg class="icon" width="21" height="6" aria-hidden="true" focusable="false">
									<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-arrow' ); ?>"></use>
								</svg>
							</button>
							<label class="request__consent">
								<input class="request__consent-input" type="checkbox" name="consent" value="1" required>
								<span class="request__consent-text text">
									I agree to the processing of my personal data in accordance with the
									<a class="request__consent-link link" href="#" aria-label="Privacy Policy">Privacy
										Policy</a>
								</span>
							</label>
						</form>
						<p class="request__note text text--muted">We’ll call you back and confirm the price before any
							work begins.</p>
					</div>
					<div data-att-form-message="" class="request__success" role="status" tabindex="-1">
						<p class="title title--second">Thank you!</p>
						<p class="text text--muted">We’ll call you back soon.</p>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
?>