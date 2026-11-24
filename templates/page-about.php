<?php
/**
 * Template Name: About Page
 */
get_header();
?>
<main class="page">
	<div data-att-about="" class="about">
		<?php if ( okko_section_is_visible( 'show_hero' ) ) : ?>
		<section data-att-hero="" class="hero">
			<?php
			$contact_phone = okko_language_field( 'contact_phone', '+49 160 97322294', 'option' );
			$contact_phone_number = preg_replace( '/\s+/', '', $contact_phone );
			$contact_address = okko_language_field( 'contact_address', 'Trierer Str. 51, 66706 Perl', 'option' );
			$contact_opening_hours = okko_language_field( 'contact_opening_hours', 'Mon–Fri 08:00–18:00', 'option' );
			$contact_assistance_note = okko_language_field( 'contact_opening_hours_caption', 'Roadside assistance — 24/7', 'option' );
			$hero_desktop_image = okko_img( 'hero_desktop_image', get_template_directory_uri() . '/assets/img/hero/about.webp', 'Four OKKO-Service mechanics in work overalls standing in the workshop' );
			$hero_mobile_image = okko_img( 'hero_mobile_image', get_template_directory_uri() . '/assets/img/hero/about-mobile.webp', 'Four OKKO-Service mechanics in work overalls standing in the workshop' );
			?>
			<div class="hero__frame">
				<picture class="hero__picture">
					<source srcset="<?php echo esc_url( $hero_desktop_image['url'] ); ?>" media="(min-width: 48.061em)" width="2100"
						height="1140" type="<?php echo esc_attr( $hero_desktop_image['id'] ? get_post_mime_type( $hero_desktop_image['id'] ) : 'image/webp' ); ?>">
					<img class="hero__image ibg" src="<?php echo esc_url( $hero_mobile_image['url'] ); ?>" width="938" height="1600"
						alt="<?php echo esc_attr( $hero_mobile_image['alt'] ); ?>"
						fetchpriority="high">
				</picture>
				<div class="hero__container">
					<div class="hero__card card card--sm">
						<h1 class="hero__title title"><?php echo esc_html( okko_text( 'hero_title', 'About OKKO-Service' ) ); ?></h1>
						<p class="hero__text text text--muted">
							<?php echo nl2br( esc_html( okko_text( 'hero_text', 'A truck service center in Perl, at the crossroads of Germany, Luxembourg, and France — just a few kilometers from the A8 motorway and the autobahn.' ) ) ); ?>
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
		<?php if ( okko_section_is_visible( 'show_strengths' ) ) : ?>
		<section data-att-strengths="" class="strengths">
			<div class="strengths__container">
				<h2 data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="strengths__title title reveal"><?php echo esc_html( okko_text( 'strengths_title', 'What makes us different' ) ); ?></h2>
				<ul data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="strengths__list reveal">
					<?php if ( have_rows( 'strengths_items' ) ) : ?>
						<?php while ( have_rows( 'strengths_items' ) ) : the_row(); ?>
							<li class="strengths__card card card--dark card--flat-mobile">
								<span class="icon-circle icon-circle--sm">
									<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-' . sanitize_key( get_sub_field( 'icon' ) ) ); ?>"></use>
									</svg>
								
								</span>
								<h3 class="title title--third"><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
							</li>
						<?php endwhile; ?>
					<?php else : ?>
					<li class="strengths__card card card--dark card--flat-mobile">
						<span class="icon-circle icon-circle--sm">
							<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-receipt' ); ?>"></use>
							</svg>
						</span>
						<h3 class="title title--third">Truck electronics specialists — our core area of expertise</h3>
					</li>
					<li class="strengths__card card card--dark card--flat-mobile">
						<span class="icon-circle icon-circle--sm">
							<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-receipt' ); ?>"></use>
							</svg>
						</span>
						<h3 class="title title--third">We take on complex repairs that other service centers refuse</h3>
					</li>
					<li class="strengths__card card card--dark card--flat-mobile">
						<span class="icon-circle icon-circle--sm">
							<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-helpdesk' ); ?>"></use>
							</svg>
						</span>
						<h3 class="title title--third">We provide roadside assistance and repairs 24/7</h3>
					</li>
					<li class="strengths__card card card--dark card--flat-mobile">
						<span class="icon-circle icon-circle--sm">
							<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-truck' ); ?>"></use>
							</svg>
						</span>
						<h3 class="title title--third">A full service cycle: truck, trailer, and car transporter — all
							in one place</h3>
					</li>
					<?php endif; ?>
				</ul>
				<div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="strengths__bottom reveal">
					<a class="strengths__call card card--flat" href="tel:<?php echo esc_attr( $contact_phone_number ); ?>"
						aria-label="<?php echo esc_attr( 'Call ' . $contact_phone ); ?>">
						<span class="badge badge--yellow"><?php echo esc_html( okko_text( 'strengths_call_badge', 'Talk to a technician' ) ); ?></span>
						<span class="strengths__number title title--third"><?php echo esc_html( $contact_phone ); ?></span>
						<span class="text text--muted">
							<?php echo nl2br( esc_html( okko_text( 'strengths_call_text', 'Describe the problem — we’ll tell you whether we can take it on and how much time to allow.' ) ) ); ?>
						</span>
					</a>
					<div class="strengths__contacts card card--flat">
						<h3 class="title title--second"><?php echo esc_html( okko_text( 'strengths_contacts_title', 'Contact information' ) ); ?></h3>
						<ul class="strengths__rows">
							<li class="strengths__row">
								<span class="strengths__row-icon">
									<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-pin-small' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted"><?php echo esc_html( $contact_address ); ?></span>
							</li>
							<li class="strengths__row">
								<span class="strengths__row-icon">
									<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-schedule' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted"><?php echo esc_html( $contact_opening_hours ); ?></span>
							</li>
							<li class="strengths__row">
								<span class="strengths__row-icon">
									<svg class="icon" width="16" height="16" aria-hidden="true" focusable="false">
										<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-clock-alt' ); ?>"></use>
									</svg>
								</span>
								<span class="text text--muted"><?php echo esc_html( $contact_assistance_note ); ?></span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>
		<?php if ( okko_section_is_visible( 'show_team' ) ) : ?>
		<section data-att-team="" class="team">
			<div class="team__container">
				<div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="team__tiles reveal">
					<?php
					$team_tile_fallbacks = [
						[ 'desktop' => 'team.webp', 'mobile' => 'team-600.webp', 'alt' => 'OKKO-Service mechanics team in work overalls in the workshop', 'title' => 'Team' ],
						[ 'desktop' => 'equipment.webp', 'mobile' => 'equipment-600.webp', 'alt' => 'Mechanics repairing a car transporter truck in the service bay', 'title' => 'Equipment and Service Bays' ],
					];
					?>
					<?php if ( have_rows( 'team_tiles' ) ) : ?>
						<?php $team_tile_index = 0; ?>
						<?php while ( have_rows( 'team_tiles' ) ) : the_row(); ?>
							<?php
							$team_fallback = $team_tile_fallbacks[ $team_tile_index ] ?? [ 'desktop' => 'team.webp', 'mobile' => 'team-600.webp', 'alt' => '', 'title' => '' ];
							$team_desktop_image = get_sub_field( 'desktop_image' );
							$team_mobile_image = get_sub_field( 'mobile_image' );
							$team_desktop_url = is_array( $team_desktop_image ) && ! empty( $team_desktop_image['url'] ) ? $team_desktop_image['url'] : get_template_directory_uri() . '/assets/img/about/' . $team_fallback['desktop'];
							$team_mobile_url = is_array( $team_mobile_image ) && ! empty( $team_mobile_image['url'] ) ? $team_mobile_image['url'] : get_template_directory_uri() . '/assets/img/about/' . $team_fallback['mobile'];
							$team_alt = get_sub_field( 'alt' ) ?: $team_fallback['alt'];
							$team_title = get_sub_field( 'title' ) ?: $team_fallback['title'];
							?>
							<div class="team__tile">
								<picture>
									<source media="(max-width: 600px)" srcset="<?php echo esc_url( $team_mobile_url ); ?>" type="<?php echo esc_attr( is_array( $team_mobile_image ) && ! empty( $team_mobile_image['ID'] ) ? get_post_mime_type( $team_mobile_image['ID'] ) : 'image/webp' ); ?>">
									<img class="team__image ibg" width="636" height="424" alt="<?php echo esc_attr( $team_alt ); ?>" loading="lazy" src="<?php echo esc_url( $team_desktop_url ); ?>">
								</picture>
								<h2 class="team__tile-title title"><?php echo esc_html( $team_title ); ?></h2>
							</div>
							<?php $team_tile_index++; ?>
						<?php endwhile; ?>
					<?php else : ?>
					<div class="team__tile">
						<picture>
							<source media="(max-width: 600px)" srcset="./assets/img/about/team-600.webp"
								type="image/webp">
							<img class="team__image ibg" width="636" height="424"
								alt="OKKO-Service mechanics team in work overalls in the workshop" loading="lazy"
								src="./assets/img/about/team.webp">
						</picture>
						<h2 class="team__tile-title title">Team</h2>
					</div>
					<div class="team__tile">
						<picture>
							<source media="(max-width: 600px)" srcset="./assets/img/about/equipment-600.webp"
								type="image/webp">
							<img class="team__image ibg" width="636" height="424"
								alt="Mechanics repairing a car transporter truck in the service bay" loading="lazy"
								src="./assets/img/about/equipment.webp">
						</picture>
						<h2 class="team__tile-title title">Equipment and Service Bays</h2>
					</div>
					<?php endif; ?>
				</div>
				<div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="team__warranty reveal">
					<div class="team__warranty-media">
						<?php $warranty_image = okko_img( 'warranty_image', get_template_directory_uri() . '/assets/img/about/guarantee.webp', 'Mechanic with a clipboard giving a thumbs up' ); ?>
						<picture>
							<source media="(max-width: 600px)" srcset="<?php echo esc_url( $warranty_image['id'] ? $warranty_image['url'] : get_template_directory_uri() . '/assets/img/about/guarantee-600.webp' ); ?>"
								type="<?php echo esc_attr( $warranty_image['id'] ? get_post_mime_type( $warranty_image['id'] ) : 'image/webp' ); ?>">
							<img class="team__warranty-image ibg" width="1115" height="498"
								alt="<?php echo esc_attr( $warranty_image['alt'] ); ?>" loading="lazy"
								src="<?php echo esc_url( $warranty_image['url'] ); ?>">
						</picture>
					</div>
					<div class="team__warranty-body">
						<span class="team__warranty-icon">
							<svg class="icon" width="42" height="42" aria-hidden="true" focusable="false">
								<use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-warranty' ); ?>"></use>
							</svg>
						</span>
						<h2 class="title"><?php echo esc_html( okko_text( 'warranty_title', 'Warranty' ) ); ?></h2>
						<p class="text text--muted">
							<?php echo nl2br( esc_html( okko_text( 'warranty_text', 'We provide a warranty on all completed work. The exact terms depend on the type of repair and the specific component.' ) ) ); ?>
						</p>
					</div>
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
				<?php get_template_part( 'template-parts/request-card' ); ?>
			</div>
		</section>
		<?php endif; ?>
	</div>
</main>
<?php get_footer(); ?>