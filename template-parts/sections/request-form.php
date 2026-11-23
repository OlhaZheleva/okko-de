<section data-att-request="" class="request request--wide">
    <div class="request__container">
        <div data-att-form-wrapper="" data-att-watcher="" data-att-watcher-once="" data-att-watcher-threshold="0.1" class="request__card card reveal">
            <div class="request__body">
                <form data-att-form="dev" class="request__form" action="#" method="POST">
                    <fieldset class="request__types">
                        <legend class="visually-hidden">Request type</legend>
                        <label class="request__type"><input class="request__type-input" type="radio" name="type" value="repair" checked><span class="request__type-text">Book a service</span></label>
                        <label class="request__type"><input class="request__type-input" type="radio" name="type" value="roadside"><span class="request__type-text">Roadside assistance</span></label>
                    </fieldset>
                    <div class="request__fields">
                        <label class="request__field"><input class="request__input" type="text" name="name" placeholder="*Name" autocomplete="name" required></label>
                        <label class="request__field"><input class="request__input" type="tel" name="phone" placeholder="*Phone" autocomplete="tel" required></label>
                        <label class="request__field"><input class="request__input" type="text" name="company" placeholder="Company" autocomplete="organization"></label>
                        <label class="request__field request__field--select">
                            <select class="request__input" name="branch" aria-label="*Branch" required>
                                <option value="" selected disabled hidden>*Branch</option>
                                <option value="perl">OKKO-Service Perl</option>
                                <option value="second" disabled>Second branch (coming soon)</option>
                            </select>
                            <svg class="icon" width="12" height="6" aria-hidden="true" focusable="false"><use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-chevron-down' ); ?>"></use></svg>
                        </label>
                        <label class="request__field request__field--select request__field--wide">
                            <select class="request__input" name="service" aria-label="*Select a service" required>
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
                            <svg class="icon" width="12" height="6" aria-hidden="true" focusable="false"><use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-chevron-down' ); ?>"></use></svg>
                        </label>
                        <label class="request__field request__field--wide"><textarea class="request__input request__input--area" name="message" placeholder="What’s wrong with the vehicle? (make, model, symptoms)"></textarea></label>
                    </div>
                    <button class="request__submit btn btn--blue btn--full" type="submit" aria-label="Submit request">
                        <span>Submit request</span>
                        <svg class="icon" width="21" height="6" aria-hidden="true" focusable="false"><use href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/spritemap.svg#sprite-arrow' ); ?>"></use></svg>
                    </button>
                    <label class="request__consent">
                        <input class="request__consent-input" type="checkbox" name="consent" value="1" required>
                        <span class="request__consent-text text">I agree to the processing of my personal data in accordance with the <a class="request__consent-link link" href="#" aria-label="Privacy Policy">Privacy Policy</a></span>
                    </label>
                </form>
                <p class="request__note text text--muted">We’ll call you back and confirm the price before any work begins.</p>
            </div>
            <div data-att-form-message="" class="request__success" role="status" tabindex="-1">
                <p class="title title--second">Thank you!</p>
                <p class="text text--muted">We’ll call you back soon.</p>
            </div>
        </div>
    </div>
</section>