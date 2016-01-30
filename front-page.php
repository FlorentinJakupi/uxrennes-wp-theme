<?php
/**
 * Homepage
 *
 * @package uxrennes-theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="uxr-layout-alpha">

					<div id="logo" class="uxr-logo-main">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-uxrennes.svg" width="150" height="150" alt="UX Rennes" data-pin-nopin="true" />
					</div>

					<?php /*<h1>Notre site est en cours<span> de pixellisation !</span></h1>*/ ?>
					<h1 class="uxr-title-gamma">
						<?php the_title(); ?>
					</h1>

					<div class="uxr-big">
						<?php the_content(); ?>
					</div>

					<?php /* Begin MailChimp Signup Form */ ?>
					<div id="mc_embed_signup">
						<form action="//uxrennes.us10.list-manage.com/subscribe/post?u=83e7122c13f5d54afc5fd0918&amp;id=36b6978bd8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate mc-form" target="UXlink">
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
					<?php /* End mc_embed_signup */ ?>

					<p class="uxr-link">
						<a href="https://twitter.com/uxrennes" target="UXlink" rel="nofollow">@uxrennes</a>
					</p>

				</div>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main>
	</div>

<?php get_footer(); ?>
