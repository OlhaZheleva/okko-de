<?php
/**
 * Template Name: Services Page
 */
get_header();
?>
<main class="page">
	<div data-att-services="" class="services">
		<?php if ( okko_section_is_visible( 'show_hero' ) ) : ?>
		<section data-att-hero="" class="hero hero--compact">
			<?php
			$contact_phone = okko_language_field( 'contact_phone', '+49 160 97322294', 'option' );
			$contact_phone_number = preg_replace( '/\s+/', '', $contact_phone );
			$hero_desktop_image = okko_img( 'hero_desktop_image', get_template_directory_uri() . '/assets/img/hero/all-services.webp', 'Mechanic in work overalls repairing a truck with tools in the workshop' );
			$hero_mobile_image = okko_img( 'hero_mobile_image', get_template_directory_uri() . '/assets/img/hero/all-services-mb.webp', 'Mechanic in work overalls repairing a truck with tools in the workshop' );
			?>
			<div class="hero__frame">
				<picture class="hero__picture">
					<source srcset="<?php echo esc_url( $hero_desktop_image['url'] ); ?>" media="(min-width: 48.061em)" width="2100"
						height="1140" type="<?php echo esc_attr( $hero_desktop_image['id'] ? get_post_mime_type( $hero_desktop_image['id'] ) : 'image/webp' ); ?>">
					<img class="hero__image ibg" src="<?php echo esc_url( $hero_mobile_image['url'] ); ?>" width="516" height="1176"
						alt="<?php echo esc_attr( $hero_mobile_image['alt'] ); ?>"
						fetchpriority="high">
				</picture>
				<div class="hero__container">
					<div class="hero__card card card--sm">
						<h1 class="hero__title title"><?php echo esc_html( okko_text( 'hero_title', 'Services' ) ); ?></h1>
						<p class="hero__text text text--muted">
							<?php echo nl2br( esc_html( okko_text( 'hero_text', 'Repairs for trucks, trailers, and car transporters — from routine maintenance to complex electronics.' ) ) ); ?>
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
		<?php if ( okko_section_is_visible( 'show_catalog' ) ) : ?>
		<section data-att-catalog="" class="catalog">
			<div class="catalog__container">
				<?php if ( have_rows( 'catalog_groups' ) ) : ?>
					<?php while ( have_rows( 'catalog_groups' ) ) : the_row(); ?>
						<div class="catalog__group">
							<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
								class="catalog__title title reveal"><?php echo esc_html( get_sub_field( 'title' ) ); ?></h2>
							<ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
								class="catalog__list reveal">
								<?php if ( have_rows( 'services' ) ) : ?>
									<?php while ( have_rows( 'services' ) ) : the_row(); ?>
										<?php
										$service_title = get_sub_field( 'title' );
										$service_link = get_sub_field( 'link' );
										$service_url = is_array( $service_link ) && ! empty( $service_link['url'] ) ? $service_link['url'] : home_url( '/' );
										$service_aria_label = is_array( $service_link ) && ! empty( $service_link['title'] ) ? $service_link['title'] : $service_title;
										?>
										<li class="catalog__item">
											<a class="catalog__card card card--hover-blue" href="<?php echo esc_url( $service_url ); ?>" aria-label="<?php echo esc_attr( $service_aria_label ); ?>">
												<h3 class="title title--third"><?php echo esc_html( $service_title ); ?></h3>
												<p class="text"><?php echo nl2br( esc_html( get_sub_field( 'text' ) ) ); ?></p>
											</a>
										</li>
									<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</div>
					<?php endwhile; ?>
				<?php else : ?>
				<div class="catalog__group">
					<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__title title reveal">Electronics and Diagnostics</h2>
					<ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__list reveal">
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="electronics.html"
								aria-label="Electronics Repair and Programming">
								<h3 class="title title--third">Electronics Repair and Programming</h3>
								<p class="text">Control units, CPC, EBS, Actros keys, wiring, chip tuning.</p>
							</a>
						</li>
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="diagnostics.html"
								aria-label="Computer Diagnostics">
								<h3 class="title title--third">Computer Diagnostics</h3>
								<p class="text">Fault code reading and troubleshooting of electronic control units.</p>
							</a>
						</li>
					</ul>
				</div>
				<div class="catalog__group">
					<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__title title reveal">Mechanics</h2>
					<ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__list reveal">
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="engine.html"
								aria-label="Engine Repair">
								<h3 class="title title--third">Engine Repair</h3>
								<p class="text">Routine maintenance, filters, injectors, timing belt, cylinder head.</p>
							</a>
						</li>
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="brakes.html" aria-label="Brake Repair">
								<h3 class="title title--third">Brake Repair</h3>
								<p class="text">Truck and trailer braking systems.</p>
							</a>
						</li>
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="suspension.html"
								aria-label="Suspension Diagnostics and Repair">
								<h3 class="title title--third">Suspension Diagnostics and Repair</h3>
								<p class="text">Suspension, axles, steering.</p>
							</a>
						</li>
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="transmission.html"
								aria-label="Gearboxes, Clutches and Transmissions">
								<h3 class="title title--third">Gearboxes, Clutches and Transmissions</h3>
								<p class="text">Gearbox, clutch, driveshaft, transfer case.</p>
							</a>
						</li>
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="pneumatics.html"
								aria-label="Pneumatics">
								<h3 class="title title--third">Pneumatics</h3>
								<p class="text">Truck and trailer pneumatic systems.</p>
							</a>
						</li>
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="hydraulics.html"
								aria-label="Hydraulics">
								<h3 class="title title--third">Hydraulics</h3>
								<p class="text">Hydraulic systems, hoses, cylinders, pumps.</p>
							</a>
						</li>
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="cooling.html"
								aria-label="Cooling System">
								<h3 class="title title--third">Cooling System</h3>
								<p class="text">Radiators, pumps, thermostats, hoses.</p>
							</a>
						</li>
					</ul>
				</div>
				<div class="catalog__group">
					<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__title title reveal">Bodywork</h2>
					<ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__list reveal">
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="accident.html"
								aria-label="Bodywork and Accident Repair">
								<h3 class="title title--third">Bodywork and Accident Repair</h3>
								<p class="text">Cab, frame, accident damage repair.</p>
							</a>
						</li>
					</ul>
				</div>
				<div class="catalog__group">
					<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__title title reveal">Tires, Trailers and Car Transporters</h2>
					<ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__list reveal">
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="tires.html"
								aria-label="Tire Service and Tires">
								<h3 class="title title--third">Tire Service and Tires</h3>
								<p class="text">Replacement, repair and balancing — trucks and trailers.</p>
							</a>
						</li>
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="trailers.html"
								aria-label="Trailer and Semi-Trailer Repair">
								<h3 class="title title--third">Trailer and Semi-Trailer Repair</h3>
								<p class="text">Schmitz, Krone, Kögel, Schwarzmüller and others.</p>
							</a>
						</li>
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="carriers.html"
								aria-label="Car Transporter Body Repair">
								<h3 class="title title--third">Car Transporter Body Repair</h3>
								<p class="text">Rolfo, Kässbohrer, Lohr — body hydraulics and mechanics.</p>
							</a>
						</li>
					</ul>
				</div>
				<div class="catalog__group">
					<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__title title reveal">Additional Technical Services</h2>
					<ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__list reveal">
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="tachograph.html"
								aria-label="Tachographs">
								<h3 class="title title--third">Tachographs</h3>
								<p class="text">Tachograph inspection and servicing.</p>
							</a>
						</li>
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="aircon.html"
								aria-label="Air Conditioning Recharge">
								<h3 class="title title--third">Air Conditioning Recharge</h3>
								<p class="text">Air conditioning system servicing and refrigerant recharge.</p>
							</a>
						</li>
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="welding.html" aria-label="Welding">
								<h3 class="title title--third">Welding</h3>
								<p class="text">Frames, mounts and metal structures.</p>
							</a>
						</li>
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="glass.html" aria-label="Glass">
								<h3 class="title title--third">Glass</h3>
								<p class="text">Windshield and side window replacement.</p>
							</a>
						</li>
					</ul>
				</div>
				<div class="catalog__group">
					<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__title title reveal">Vehicle Inspection</h2>
					<ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__list reveal">
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="inspection.html"
								aria-label="TÜV/HU Inspection Preparation">
								<h3 class="title title--third">TÜV/HU Inspection Preparation</h3>
								<p class="text">Inspection and correction of any issues before the vehicle inspection.
								</p>
							</a>
						</li>
					</ul>
				</div>
				<div class="catalog__group">
					<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__title title reveal">Roadside Assistance</h2>
					<ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="catalog__list reveal">
						<li class="catalog__item">
							<a class="catalog__card card card--hover-blue" href="roadside.html"
								aria-label="24/7 Roadside Assistance">
								<h3 class="title title--third">24/7 Roadside Assistance</h3>
								<p class="text">We come to you and carry out repairs directly on the road. Available
									24/7.</p>
							</a>
						</li>
					</ul>
				</div>
				<?php endif; ?>
			</div>
		</section>
		<?php endif; ?>
		<div data-att-assist="" class="assist">
			<section data-att-request="" class="request request--wide">
				<div class="request__container">
					<div data-att-form-wrapper="" data-att-watcher="" data-att-watcher-once=""
						data-att-watcher-threshold="0.1" class="request__card card reveal">
						<div class="request__body">
							<form data-att-form="dev" class="request__form" action="#" method="POST">
								<fieldset class="request__types">
									<legend class="visually-hidden">Request type</legend>
									<label class="request__type">
										<input class="request__type-input" type="radio" name="type" value="repair"
											checked>
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
											<use href="./assets/img/spritemap.svg#sprite-chevron-down"></use>
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
											<use href="./assets/img/spritemap.svg#sprite-chevron-down"></use>
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
										<use href="./assets/img/spritemap.svg#sprite-arrow"></use>
									</svg>
								</button>
								<label class="request__consent">
									<input class="request__consent-input" type="checkbox" name="consent" value="1"
										required>
									<span class="request__consent-text text">
										I agree to the processing of my personal data in accordance with the
										<a class="request__consent-link link" href="#"
											aria-label="Privacy Policy">Privacy Policy</a>
									</span>
								</label>
							</form>
							<p class="request__note text text--muted">We’ll call you back and confirm the price before
								any work begins.</p>
						</div>
						<div data-att-form-message="" class="request__success" role="status" tabindex="-1">
							<p class="title title--second">Thank you!</p>
							<p class="text text--muted">We’ll call you back soon.</p>
						</div>
					</div>
				</div>
			</section>
			<?php if ( okko_section_is_visible( 'show_breakdown' ) ) : ?>
			<section data-att-breakdown="" class="breakdown breakdown--wide breakdown--dark breakdown--card">
				<div class="breakdown__container">
					<div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="breakdown__intro reveal">
						<h2 class="breakdown__title title"><?php echo esc_html( okko_text( 'breakdown_title', 'Broken down on the road?' ) ); ?></h2>
						<span class="breakdown__label section-label">
							<span class="icon-circle">
								<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
									<use href="./assets/img/spritemap.svg#sprite-settings"></use>
								</svg>
							</span>
							<span class="section-label__text"><?php echo esc_html( okko_text( 'breakdown_label', 'We’ll fix it on-site' ) ); ?></span>
						</span>
						<p class="breakdown__text text">
							<?php echo nl2br( esc_html( okko_text( 'breakdown_text', 'We provide roadside assistance on the A8, A64, around Perl, Trier, and Saarland. In most cases, we repair the vehicle on-site — no towing required.' ) ) ); ?>
						</p>
						<div class="breakdown__actions">
							<?php $breakdown_info_link = okko_link( 'breakdown_info_link', home_url( '/' ), 'How it works' ); ?>
							<a class="breakdown__button btn btn--blue" href="<?php echo esc_url( $breakdown_info_link['url'] ); ?>" aria-label="<?php echo esc_attr( $breakdown_info_link['title'] ); ?>" target="<?php echo esc_attr( $breakdown_info_link['target'] ); ?>">
								<svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
									<use href="./assets/img/spritemap.svg#sprite-question"></use>
								</svg>
								<span><?php echo esc_html( $breakdown_info_link['title'] ); ?></span>
							</a>
							<?php
							$contact_phone = okko_language_field( 'contact_phone', '+49 160 97322294', 'option' );
							$contact_phone_number = preg_replace( '/\s+/', '', $contact_phone );
							?>
							<a class="breakdown__button btn btn--yellow" href="tel:<?php echo esc_attr( $contact_phone_number ); ?>"
								aria-label="<?php echo esc_attr( 'Call ' . $contact_phone ); ?>">
								<svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
									<use href="./assets/img/spritemap.svg#sprite-phone"></use>
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
										<use href="./assets/img/spritemap.svg#sprite-truck"></use>
									</svg>
								</span>
								<span class="text text--muted">Vehicle make, model, and license plate number</span>
							</li>
							<li class="breakdown__item">
								<span class="breakdown__icon">
									<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
										<use href="./assets/img/spritemap.svg#sprite-location"></use>
									</svg>
								</span>
								<span class="text text--muted">Your exact location — motorway, direction of travel,
									kilometer marker</span>
							</li>
							<li class="breakdown__item">
								<span class="breakdown__icon">
									<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
										<use href="./assets/img/spritemap.svg#sprite-flash"></use>
									</svg>
								</span>
								<span class="text text--muted">Which warning lights are on</span>
							</li>
							<li class="breakdown__item">
								<span class="breakdown__icon">
									<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
										<use href="./assets/img/spritemap.svg#sprite-clock"></use>
									</svg>
								</span>
								<span class="text text--muted">What happened and when the problem started</span>
							</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</section>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php
get_footer();
?>