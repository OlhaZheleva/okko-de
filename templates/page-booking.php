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
				<div data-att-form-wrapper="" data-att-watcher="" data-att-watcher-once=""
					data-att-watcher-threshold="0.1" class="request__card card reveal">
					<div class="request__body">
						<form data-att-form="dev" class="request__form" action="#" method="POST">
							<fieldset class="request__types">
								<legend class="visually-hidden">Request type</legend>
								<label class="request__type">
									<input class="request__type-input" type="radio" name="type" value="repair" checked>
									<span class="request__type-text">Book a repair</span>
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
								aria-label="Send request">
								<span>Send request</span>
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
						<p class="request__note text text--muted">We’ll call you back and provide an estimated cost
							before work begins.</p>
					</div>
					<div data-att-form-message="" class="request__success" role="status" tabindex="-1">
						<p class="title title--second">Thank you!</p>
						<p class="text text--muted">We’ll call you back soon.</p>
					</div>
				</div>
				<div data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1"
					class="request__info reveal">
					<a class="card request__call card--hover-dark" href="tel:+4916097322294"
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
<?php get_footer(); ?>