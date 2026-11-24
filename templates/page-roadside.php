<?php
/**
 * Template Name: Roadside Assistance Page
 */
get_header();
?>

<main class="page">
	<div data-att-roadside="" class="roadside">
		<?php if ( okko_section_is_visible( 'show_hero' ) ) : ?>
		<section data-att-hero="" class="hero hero--top">
			<?php
			$contact_phone = okko_language_field( 'contact_phone', '+49 160 97322294', 'option' );
			$contact_phone_number = preg_replace( '/\s+/', '', $contact_phone );
			$hero_desktop_image = okko_img( 'hero_desktop_image', get_template_directory_uri() . '/assets/img/hero/roadside-assistance.webp', 'Mechanic in uniform repairing a truck with tools' );
			$hero_mobile_image = okko_img( 'hero_mobile_image', get_template_directory_uri() . '/assets/img/hero/roadside-assistance-mb.webp', 'Mechanic in uniform repairing a truck with tools' );
			?>
			<div class="hero__frame">
				<picture class="hero__picture">
					<source srcset="<?php echo esc_url( $hero_desktop_image['url'] ); ?>" media="(min-width: 48.061em)"
						width="1702" height="924" type="<?php echo esc_attr( $hero_desktop_image['id'] ? get_post_mime_type( $hero_desktop_image['id'] ) : 'image/webp' ); ?>">
					<img class="hero__image ibg" src="<?php echo esc_url( $hero_mobile_image['url'] ); ?>" width="516"
						height="1176" alt="<?php echo esc_attr( $hero_mobile_image['alt'] ); ?>" fetchpriority="high">
				</picture>
				<div class="hero__container">
					<div class="hero__card card card--sm">
						<h1 class="hero__title title"><?php echo esc_html( okko_text( 'hero_title', 'Broken down on the road?' ) ); ?></h1>
						<p class="hero__text text text--muted">
							<?php echo nl2br( esc_html( okko_text( 'hero_text', 'We’ll come to you with the necessary equipment and carry out the repair on-site. It’s faster and cheaper than towing the truck to the workshop.' ) ) ); ?>
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
		<?php if ( okko_section_is_visible( 'show_help' ) ) : ?>
		<section data-att-help="" class="help">
			<div class="help__container">
				<div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="help__head reveal">
					<h2 class="title"><?php echo esc_html( okko_text( 'help_title', 'How we help' ) ); ?></h2>
					<span class="section-label">
						<span class="icon-circle">
							<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-handshake' ); ?>"></use>
							</svg>
						</span>
						<span class="section-label__text"><?php echo esc_html( okko_text( 'help_label', 'Two options' ) ); ?></span>
					</span>
				</div>
				<ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="help__list reveal">
					<?php if ( have_rows( 'help_items' ) ) : ?>
						<?php $help_index = 0; ?>
						<?php while ( have_rows( 'help_items' ) ) : the_row(); ?>
							<?php
							$help_fallbacks = [
								[ 'badge' => 'Main option', 'badge_style' => '', 'title' => 'Repair directly on the road', 'text' => 'A mobile technician arrives with tools and diagnostic equipment and carries out the repair on-site. The truck can continue its journey.', 'note' => 'Most issues with the electrical system, pneumatics, engine, or minor mechanical faults can be fixed without towing.' ],
								[ 'badge' => 'If on-site repair isn’t possible', 'badge_style' => 'dark', 'title' => 'Towing arrangements', 'text' => 'If the repair cannot be completed on-site, we’ll arrange for the truck to be towed to our workshop in Perl.', 'note' => 'While the truck is being repaired, the driver can wait comfortably in our rest area.' ],
							];
							$help_fallback = $help_fallbacks[ $help_index ] ?? [ 'badge' => '', 'badge_style' => '', 'title' => '', 'text' => '', 'note' => '' ];
							$help_badge = get_sub_field( 'badge' ) ?: $help_fallback['badge'];
							$help_badge_style = get_sub_field( 'badge_style' ) ?: $help_fallback['badge_style'];
							$help_title = get_sub_field( 'title' ) ?: $help_fallback['title'];
							$help_text = get_sub_field( 'text' ) ?: $help_fallback['text'];
							$help_note = get_sub_field( 'note' ) ?: $help_fallback['note'];
							?>
							<li class="help__card card">
								<span class="badge<?php echo 'dark' === $help_badge_style ? ' badge--dark' : ''; ?>"><?php echo esc_html( $help_badge ); ?></span>
								<div class="help__body">
									<h3 class="help__card-title title title--third"><?php echo esc_html( $help_title ); ?></h3>
									<p class="text text--muted"><?php echo nl2br( esc_html( $help_text ) ); ?></p>
								</div>
								<p class="help__note text text--muted"><?php echo nl2br( esc_html( $help_note ) ); ?></p>
							</li>
							<?php $help_index++; ?>
						<?php endwhile; ?>
					<?php else : ?>
					<li class="help__card card">
						<span class="badge">Main option</span>
						<div class="help__body">
							<h3 class="help__card-title title title--third">Repair directly on the road</h3>
							<p class="text text--muted">
								A mobile technician arrives with tools and diagnostic equipment and carries out the
								repair on-site. The truck can continue its journey.
							</p>
						</div>
						<p class="help__note text text--muted">
							Most issues with the electrical system, pneumatics, engine, or minor mechanical faults can
							be fixed without towing.
						</p>
					</li>
					<li class="help__card card">
						<span class="badge badge--dark">If on-site repair isn’t possible</span>
						<div class="help__body">
							<h3 class="help__card-title title title--third">Towing arrangements</h3>
							<p class="text text--muted">
								If the repair cannot be completed on-site, we’ll arrange for the truck to be towed to
								our workshop in Perl.
							</p>
						</div>
						<p class="help__note text text--muted">
							While the truck is being repaired, the driver can wait comfortably in our rest area.
						</p>
					</li>
					<?php endif; ?>
				</ul>
			</div>
		</section>
		<?php endif; ?>
		<?php if ( okko_section_is_visible( 'show_coverage' ) ) : ?>
		<section data-att-coverage="" class="coverage">
			<div class="coverage__container">
				<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="coverage__title title reveal"><?php echo esc_html( okko_text( 'coverage_title', 'Where we provide roadside assistance' ) ); ?></h2>
				<div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="coverage__body reveal">
					<div class="coverage__area card">
						<p class="title title--second"><?php echo esc_html( okko_text( 'coverage_area_title', 'Where we provide roadside assistance' ) ); ?></p>
						<ul class="coverage__list">
							<?php if ( have_rows( 'coverage_places' ) ) : ?>
								<?php while ( have_rows( 'coverage_places' ) ) : the_row(); ?>
									<li class="coverage__place">
										<span class="coverage__pin">
											<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
												<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
											</svg>
										</span>
										<span class="text text--muted"><?php echo esc_html( get_sub_field( 'text' ) ); ?></span>
									</li>
								<?php endwhile; ?>
							<?php else : ?>
							<li class="coverage__place">
								<span class="coverage__pin">
									<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted">Perl and surrounding areas</span>
							</li>
							<li class="coverage__place">
								<span class="coverage__pin">
									<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted">Trier and surrounding area</span>
							</li>
							<li class="coverage__place">
								<span class="coverage__pin">
									<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted">Saarland</span>
							</li>
							<li class="coverage__place">
								<span class="coverage__pin">
									<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted">A8 motorway</span>
							</li>
							<li class="coverage__place">
								<span class="coverage__pin">
									<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted">A64 motorway</span>
							</li>
							<li class="coverage__place">
								<span class="coverage__pin">
									<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted">Luxembourg</span>
							</li>
							<li class="coverage__place">
								<span class="coverage__pin">
									<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted">France</span>
							</li>
							<li class="coverage__place">
								<span class="coverage__pin">
									<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted">Switzerland</span>
							</li>
							<li class="coverage__place">
								<span class="coverage__pin">
									<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted">Belgium</span>
							</li>
							<li class="coverage__place">
								<span class="coverage__pin">
									<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted">Netherlands</span>
							</li>
							<li class="coverage__place">
								<span class="coverage__pin">
									<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted">Spain</span>
							</li>
							<li class="coverage__place">
								<span class="coverage__pin">
									<svg class="icon" width="11" height="14" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted">Italy</span>
							</li>
							<?php endif; ?>
						</ul>
					</div>
					<?php
					$contact_phone = okko_language_field( 'contact_phone', '+49 160 97322294', 'option' );
					$contact_phone_number = preg_replace( '/\s+/', '', $contact_phone );
					?>
					<a class="coverage__call card" href="tel:<?php echo esc_attr( $contact_phone_number ); ?>" aria-label="<?php echo esc_attr( 'Call ' . $contact_phone ); ?>">
						<span class="badge"><?php echo esc_html( okko_text( 'coverage_hotline_badge', '24/7 hotline' ) ); ?></span>
						<span class="coverage__number title title--third"><?php echo esc_html( $contact_phone ); ?></span>
						<span class="text text--muted"><?php echo nl2br( esc_html( okko_text( 'coverage_hotline_text', 'Call us as soon as you realize you can’t continue driving.' ) ) ); ?></span>
					</a>
				</div>
			</div>
		</section>
		<?php endif; ?>
		<?php if ( okko_section_is_visible( 'show_vehicles' ) ) : ?>
		<section data-att-vehicles="" class="vehicles vehicles--wide">
			<div class="vehicles__container">
				<div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="vehicles__head reveal">
					<h2 class="vehicles__title title"><?php echo esc_html( okko_text( 'vehicles_title', 'Most common breakdowns on the road' ) ); ?></h2>
				</div>
				<ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="vehicles__list reveal">
					<?php
					$vehicle_fallbacks = [
						[ 'title' => 'Electronics repair and programming', 'text' => 'Control units, CPC, EBS, Actros keys, wiring, chip tuning', 'button' => 'Learn more' ],
						[ 'title' => 'Pneumatics', 'text' => 'Truck and trailer pneumatic systems', 'button' => 'Learn more' ],
						[ 'title' => 'Tire service and tires', 'text' => 'Truck and trailer tire replacement, tire repair and balancing', 'button' => 'Learn more' ],
						[ 'title' => 'Brake repair', 'text' => 'Truck and trailer braking systems', 'button' => 'Learn more' ],
					];
					?>
					<?php if ( have_rows( 'vehicle_items' ) ) : ?>
						<?php $vehicle_index = 0; ?>
						<?php while ( have_rows( 'vehicle_items' ) ) : the_row(); ?>
							<?php
							$vehicle_fallback = $vehicle_fallbacks[ $vehicle_index ] ?? [ 'title' => '', 'text' => '', 'button' => 'Learn more' ];
							$vehicle_title = get_sub_field( 'title' ) ?: $vehicle_fallback['title'];
							$vehicle_text = get_sub_field( 'text' ) ?: $vehicle_fallback['text'];
							$vehicle_link = get_sub_field( 'link' );
							$vehicle_url = is_array( $vehicle_link ) && ! empty( $vehicle_link['url'] ) ? $vehicle_link['url'] : home_url( '/' );
							$vehicle_button = get_sub_field( 'button_label' ) ?: ( is_array( $vehicle_link ) && ! empty( $vehicle_link['title'] ) ? $vehicle_link['title'] : $vehicle_fallback['button'] );
							?>
							<li class="vehicles__card card card--hover-dark">
								<div class="vehicles__body">
									<h3 class="title title--third"><?php echo esc_html( $vehicle_title ); ?></h3>
									<p class="text text--muted"><?php echo nl2br( esc_html( $vehicle_text ) ); ?></p>
								</div>
								<a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( $vehicle_url ); ?>" aria-label="<?php echo esc_attr( $vehicle_button . ': ' . $vehicle_title ); ?>">
									<svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-question' ); ?>"></use>
									</svg>
									<span><?php echo esc_html( $vehicle_button ); ?></span>
								</a>
							</li>
							<?php $vehicle_index++; ?>
						<?php endwhile; ?>
					<?php else : ?>
					<li class="vehicles__card card card--hover-dark">
						<div class="vehicles__body">
							<h3 class="title title--third">Electronics repair and programming</h3>
							<p class="text text--muted">Control units, CPC, EBS, Actros keys, wiring, chip tuning</p>
						</div>
						<a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							aria-label="Learn more: Electronics repair and programming">
							<svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-question' ); ?>"></use>
							</svg>
							<span>Learn more</span>
						</a>
					</li>
					<li class="vehicles__card card card--hover-dark">
						<div class="vehicles__body">
							<h3 class="title title--third">Pneumatics</h3>
							<p class="text text--muted">Truck and trailer pneumatic systems</p>
						</div>
						<a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							aria-label="Learn more: Pneumatics">
							<svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-question' ); ?>"></use>
							</svg>
							<span>Learn more</span>
						</a>
					</li>
					<li class="vehicles__card card card--hover-dark">
						<div class="vehicles__body">
							<h3 class="title title--third">Tire service and tires</h3>
							<p class="text text--muted">Truck and trailer tire replacement, tire repair and balancing
							</p>
						</div>
						<a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							aria-label="Learn more: Tire service and tires">
							<svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-question' ); ?>"></use>
							</svg>
							<span>Learn more</span>
						</a>
					</li>
					<li class="vehicles__card card card--hover-dark">
						<div class="vehicles__body">
							<h3 class="title title--third">Brake repair</h3>
							<p class="text text--muted">Truck and trailer braking systems</p>
						</div>
						<a class="vehicles__button btn btn--blue btn--full" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							aria-label="Learn more: Brake repair">
							<svg class="icon" width="20" height="20" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-question' ); ?>"></use>
							</svg>
							<span>Learn more</span>
						</a>
					</li>
					<?php endif; ?>
				</ul>
			</div>
		</section>
		<?php endif; ?>
		<?php if ( okko_section_is_visible( 'show_instructions' ) ) : ?>
		<section data-att-instructions="" class="instructions">
			<?php
			$instructions_desktop_image = okko_img( 'instructions_desktop_image', get_template_directory_uri() . '/assets/img/roadside/before-arrive.webp', 'Mechanic in a blue cap tightening a wheel on a blue truck' );
			$instructions_mobile_image = okko_img( 'instructions_mobile_image', get_template_directory_uri() . '/assets/img/roadside/before-arrive-mb.webp', 'Mechanic in a blue cap tightening a wheel on a blue truck' );
			$instructions_image_alt = okko_text( 'instructions_image_alt', 'Mechanic in a blue cap tightening a wheel on a blue truck' );
			?>
			<picture class="instructions__picture">
				<source srcset="<?php echo esc_url( $instructions_desktop_image['url'] ); ?>" media="(min-width: 51.311em)" width="1074"
					height="1224" type="<?php echo esc_attr( $instructions_desktop_image['id'] ? get_post_mime_type( $instructions_desktop_image['id'] ) : 'image/webp' ); ?>">
				<img class="instructions__image" src="<?php echo esc_url( $instructions_mobile_image['url'] ); ?>" width="540"
					height="708" alt="<?php echo esc_attr( $instructions_image_alt ); ?>" loading="lazy">
			</picture>
			<div class="instructions__container">
				<div class="instructions__content">
					<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="instructions__title title reveal"><?php echo esc_html( okko_text( 'instructions_title', 'Before we arrive' ) ); ?></h2>
					<ol data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
						class="instructions__list reveal">
						<?php if ( have_rows( 'instruction_items' ) ) : ?>
							<?php $instruction_index = 1; ?>
							<?php while ( have_rows( 'instruction_items' ) ) : the_row(); ?>
								<li class="instructions__card card">
									<span class="badge" aria-hidden="true"><?php echo esc_html( $instruction_index ); ?></span>
									<p class="title title--third"><?php echo nl2br( esc_html( get_sub_field( 'text' ) ) ); ?></p>
								</li>
								<?php $instruction_index++; ?>
							<?php endwhile; ?>
						<?php else : ?>
						<li class="instructions__card card">
							<span class="badge" aria-hidden="true">1</span>
							<p class="title title--third">Set up a warning triangle and turn on your hazard lights.</p>
						</li>
						<li class="instructions__card card">
							<span class="badge" aria-hidden="true">2</span>
							<p class="title title--third">Have the following details ready: make, model, license plate
								number.</p>
						</li>
						<li class="instructions__card card">
							<span class="badge" aria-hidden="true">3</span>
							<p class="title title--third">
								Tell us your exact location — motorway, direction of travel, kilometer marker, or
								nearest exit.
							</p>
						</li>
						<li class="instructions__card card">
							<span class="badge" aria-hidden="true">4</span>
							<p class="title title--third">
								Describe what happened: which warning lights are on, any unusual sounds, and when the
								problem started.
							</p>
						</li>
						<?php endif; ?>
					</ol>
				</div>
			</div>
		</section>
		<?php endif; ?>
		<?php if ( okko_section_is_visible( 'show_faq' ) ) : ?>
		<section data-att-faq="" class="faq faq--center">
			<div class="faq__container">
				<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="faq__title title reveal"><?php echo esc_html( okko_text( 'faq_title', 'Frequently Asked Questions' ) ); ?></h2>
				<div data-att-spollers="" data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="faq__list reveal">
					<?php if ( have_rows( 'faq_items' ) ) : ?>
						<?php $faq_index = 0; ?>
						<?php while ( have_rows( 'faq_items' ) ) : the_row(); ?>
							<details class="faq__item"<?php if ( 0 === $faq_index ) : ?> data-att-spollers-open="" open<?php endif; ?>>
								<summary class="faq__question">
									<h3 class="faq__question-text title title--third"><?php echo esc_html( get_sub_field( 'question' ) ); ?></h3>
									<span class="faq__toggle" aria-hidden="true"></span>
								</summary>
								<div class="faq__answer text text--muted"><?php echo nl2br( esc_html( get_sub_field( 'answer' ) ) ); ?></div>
							</details>
							<?php $faq_index++; ?>
						<?php endwhile; ?>
					<?php else : ?>
					<details class="faq__item" data-att-spollers-open="" open>
						<summary class="faq__question">
							<h3 class="faq__question-text title title--third">How long will it take you to arrive?</h3>
							<span class="faq__toggle" aria-hidden="true"></span>
						</summary>
						<div class="faq__answer text text--muted">
							It depends on where you are and what’s wrong with the vehicle. We’ll give you an estimated
							arrival time over the phone.
						</div>
					</details>
					<details class="faq__item">
						<summary class="faq__question">
							<h3 class="faq__question-text title title--third">How much does the call-out cost?</h3>
							<span class="faq__toggle" aria-hidden="true"></span>
						</summary>
						<div class="faq__answer text text--muted">
							We’ll tell you the cost over the phone before we come out. No unexpected charges on-site.
						</div>
					</details>
					<details class="faq__item">
						<summary class="faq__question">
							<h3 class="faq__question-text title title--third">Do you work at night and on weekends?</h3>
							<span class="faq__toggle" aria-hidden="true"></span>
						</summary>
						<div class="faq__answer text text--muted">Yes. Our phone line is available 24/7, seven days a
							week.</div>
					</details>
					<details class="faq__item">
						<summary class="faq__question">
							<h3 class="faq__question-text title title--third">What if a spare part is needed?</h3>
							<span class="faq__toggle" aria-hidden="true"></span>
						</summary>
						<div class="faq__answer text text--muted">
							Our technician carries the most commonly needed parts. If a specific part is required, we’ll
							let you know how quickly we can get it.
						</div>
					</details>
					<?php endif; ?>
				</div>
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
				<?php get_template_part( 'template-parts/request-card', null, array( 'request_type' => 'roadside' ) ); ?>
			</div>
		</section>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
?>