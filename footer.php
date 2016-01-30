<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uxrennes-theme
 */

?>

			</div>

			<?php if (!is_home() && !is_front_page()) : ?>
			<footer role="contentinfo" class="uxr-footer">
				<div class="uxr-grid-container">
					<h2 class="uxr-title-beta">Ça vous a plu ?</h2>
					<p class="uxr-big">Inscrivez-vous à notre newsletter pour connaître la date de nos prochains évènements UX à Rennes :</p>

					<?php /*<!-- Begin MailChimp Signup Form -->*/ ?>
					<div id="mc_embed_signup">
						<form action="//uxrennes.us10.list-manage.com/subscribe/post?u=83e7122c13f5d54afc5fd0918&amp;id=36b6978bd8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate mc-form">
							<div id="mc_embed_signup_scroll" class="mc_embed_signup_scroll">
								<div class="uxr-table">
									<div class="mc-field-group">
										<label for="mce-EMAIL">
											<span class="uxr-footer_form-label">Mon adresse email</span>
											<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Mon adresse email" title="Mon adresse email" required="required" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" />
										</label>
									</div>
									<div class="clear"><button type="submit" name="subscribe" id="mc-embedded-subscribe" class="button">Je m’inscris !</button></div>
								</div>
								<div id="mce-responses" class="clear">
									<div class="response" id="mce-error-response" style="display:none"></div>
									<div class="response" id="mce-success-response" style="display:none"></div>
								</div><!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
								<div style="position: absolute; left: -5000px;"><input type="text" name="b_83e7122c13f5d54afc5fd0918_36b6978bd8" tabindex="-1" value=""></div>
							</div>
						</form>
					</div>
					<?php /*<!--End mc_embed_signup-->*/ ?>

					<div class="uxr-footer_more">
						<p>Vous pouvez aussi nous suivre sur <a href="http://www.meetup.com/fr/RennesUX/">Meetup</a> et sur <a href="https://twitter.com/uxrennes">Twitter</a>.</p>
						<p>Quelque chose à nous dire ? <a href="mailto:&#099;&#111;&#108;&#108;&#101;&#099;&#116;&#105;&#102;&#046;&#117;&#120;&#114;&#101;&#110;&#110;&#101;&#115;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">Contactez-nous !</a></p>
					</div>
				</div>
			</footer>
			<?php endif; ?>

		</div>

		<?php wp_footer(); ?>

	</body>
</html>