<?php
/**
 * Template Name: Contacts Page
 */
get_header();
?>
<main class="page">
	<div data-att-contacts="" class="contacts">
		<?php if ( okko_section_is_visible( 'show_hero' ) ) : ?>
		<section data-att-hero="" class="hero hero--compact">
			<?php
			$contact_phone = okko_language_field( 'contact_phone', '+49 160 97322294', 'option' );
			$contact_phone_number = preg_replace( '/\s+/', '', $contact_phone );
			$hero_call_label = okko_text( 'hero_call_label', 'Call' );
			$hero_desktop_image = okko_img( 'hero_desktop_image', get_template_directory_uri() . '/assets/img/hero/contacts.webp', 'Three OKKO-Service mechanics laughing together in the workshop' );
			$hero_mobile_image = okko_img( 'hero_mobile_image', get_template_directory_uri() . '/assets/img/hero/contacts-mb.webp', 'Three OKKO-Service mechanics laughing together in the workshop' );
			?>
			<div class="hero__frame">
				<picture class="hero__picture">
					<source srcset="<?php echo esc_url( $hero_desktop_image['url'] ); ?>" media="(min-width: 48.061em)" width="2313"
						height="2560" type="<?php echo esc_attr( $hero_desktop_image['id'] ? get_post_mime_type( $hero_desktop_image['id'] ) : 'image/webp' ); ?>">
					<img class="hero__image ibg" src="<?php echo esc_url( $hero_mobile_image['url'] ); ?>" width="516" height="1176"
						alt="<?php echo esc_attr( $hero_mobile_image['alt'] ); ?>" fetchpriority="high">
				</picture>
				<div class="hero__container">
					<div class="hero__card card card--sm">
						<h1 class="hero__title title"><?php echo esc_html( okko_text( 'hero_title', 'Branches & Contacts' ) ); ?></h1>
						<div class="hero__actions">
							<a class="hero__button btn btn--yellow btn--full" href="tel:<?php echo esc_attr( $contact_phone_number ); ?>"
								aria-label="<?php echo esc_attr( $hero_call_label . ' ' . $contact_phone ); ?>">
								<span>
									<span class="hero__button-word"><?php echo esc_html( $hero_call_label ); ?></span>
									<?php echo esc_html( $contact_phone ); ?>
								</span>
							</a>
						</div>
					</div>
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

<?php
get_footer();
?>