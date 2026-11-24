<?php
/**
 * Template Name: Contacts Page
 */
get_header();
?>
<main class="page">
	<div data-att-contacts="" class="contacts">
		<section data-att-hero="" class="hero hero--compact">
			<div class="hero__frame">
				<picture class="hero__picture">
					<source srcset="./assets/img/hero/contacts.webp" media="(min-width: 48.061em)" width="2313"
						height="2560" type="image/webp">
					<img class="hero__image ibg" src="./assets/img/hero/contacts-mb.webp" width="516" height="1176"
						alt="Three OKKO-Service mechanics laughing together in the workshop" fetchpriority="high">
				</picture>
				<div class="hero__container">
					<div class="hero__card card card--sm">
						<h1 class="hero__title title">Branches &amp; Contacts</h1>
						<div class="hero__actions">
							<a class="hero__button btn btn--yellow btn--full" href="tel:+4916097322294"
								aria-label="Call +49 160 97322294">
								<span>
									<span class="hero__button-word">Call</span>
									+49 160 97322294
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
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
	</div>
</main>

<?php
get_footer();
?>