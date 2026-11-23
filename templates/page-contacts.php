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
				<div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="request__info reveal">
					<a class="card request__call card--dark" href="tel:+4916097322294"
						aria-label="Call +49 160 97322294">
						<span class="badge">Faster — by phone</span>
						<span class="request__number title title--third">+49 160 97322294</span>
						<span class="text text--muted">
							Not all drivers fill out forms from the cab. Give us a call — we’re available 24/7.
						</span>
					</a>
					<div class="card request__next">
						<h2 class="title title--third">What happens next</h2>
						<p class="text text--muted">
							We’ll call you back during business hours, arrange the date and time of your visit, tell you
							what to bring, and give you an estimate of how long the repair will take.
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