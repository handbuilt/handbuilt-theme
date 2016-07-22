<?php get_header(); ?>

	<div class="site-content">

		<?php echo Hand_Built::get_template_part( 'branded-intro' ); ?>

		<section class="home-panel">
			<div class="row with-border">
				<h3 class="section-title">Professionally</h3>
				<div class="text-center columns">
					<p>I've been fortunate to work with a number of impressive companies over the years.</p>
				</div>
				<div class="columns">
					<ul class="small-block-grid-1 medium-block-grid-3 text-center">
						<li><a href="http://fusion.net"><img style="max-width:80px" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/fusion.svg' ); ?>" alt="Fusion" /></a></li>
						<li><a href="https://pantheon.io"><img style="max-width:200px" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/pantheon.svg' ); ?>" alt="Pantheon" /></a></li>
						<li><a href="https://airbnb.com"><img style="max-width:200px" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/airbnb.svg' ); ?>" alt="Airbnb" /></a></li>
						<li><a href="http://www.pbs.org/wgbh/frontline/"><img style="max-width:200px" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/frontline.svg' ); ?>" alt="PBS Frontline" /></a></li>
						<li><a href="https://vip.wordpress.com"><img style="max-width:200px" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/wordpress_orange.svg' ); ?>" alt="WordPress.com VIP" /></a></li>
						<li><a href="https://newrepublic.com/"><img style="max-width:175px" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/new-republic.svg' ); ?>" alt="New Republic" /></a></li>
						<li class="show-for-medium-up"><a href="https://easydigitaldownloads.com"><img style="max-width:200px" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/edd.svg' ); ?>" alt="Easy Digital Downloads" /></a></li>
						<li><a href="http://suntimes.com"><img style="max-width:200px" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/chicagosuntimes.svg' ); ?>" alt="Chicago Sun-Times" /></a></li>
						<li class="show-for-medium-up"><a href="https://hmn.md/"><img style="max-width:175px" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/humanmade_orange.svg' ); ?>" alt="Humanmade" /></a></li>
					</ul>
				</div>
			</div>
		</section>

		<section class="home-panel">
			<div class="row with-border">
				<h3 class="section-title">Open Source</h3>
				<div class="text-center columns">
					<p>Use WordPress? You're using code I've designed, maintained, or substantially contributed to.</p>
				</div>
				<div class="columns medium-10 medium-centered">
					<a href="https://wp-cli.org/"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/wp-cli.png' ); ?>" alt="WP-CLI" /></a>
					<a href="https://v2.wp-api.org/"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/wp-rest-api.jpg' ); ?>" alt="WordPress REST API" /></a>
				</div>
				<div class="columns medium-10 medium-centered">
					<ul class="small-block-grid-1 medium-block-grid-3" style="padding-top:1.5rem;">
						<li>
							<h3><a href="http://fieldmanager.org/">Fieldmanager</a></h3>
							<p>A toolkit for developers to create complex administration screens in WordPress</p>
						</li>
						<li>
							<h3><a href="https://wordpress.org/plugins/shortcode-ui/">Shortcake</a></h3>
							<p>Shortcake makes using WordPress shortcodes a piece of cake</p>
						</li>
						<li>
							<h3><a href="https://wordpress.org/plugins/wp-redis/">WP Redis</a></h3>
							<p>Back your WP Object Cache with Redis</p>
						</li>
					</ul>
				</div>
				<div class="columns medium-10 medium-centered">
					<p class="greyed">As well as <a href="https://wordpress.org/plugins/co-authors-plus/">Co-Authors Plus</a>, <a href="https://wordpress.org/plugins/edit-flow/">Edit Flow</a>, <a href="https://wordpress.org/plugins/jetpack/">Jetpack</a>, <a href="https://wordpress.org/plugins/post-meta-inspector/">Post Meta Inspector</a>, <a href="https://wordpress.org/plugins/publishing-checklist/">Publishing Checklist</a>, <a href="https://wordpress.org/plugins/rewrite-rules-inspector/">Rewrite Rules Inspector</a>, <a href="https://wordpress.org/plugins/safe-redirect-manager/">Safe Redirect Manager</a>, <a href="https://github.com/humanmade/Salty-WordPress">Salty WordPress</a>, <a href="https://wordpress.org/plugins/wp-native-php-sessions/">WP Native PHP Sessions</a>, and <a href="https://wordpress.org/plugins/wp-saml-auth/">WP SAML Auth</a>. The list goes on for a while.</p>
				</div>
			</div>
		</section>

		<section class="home-panel">
			<div class="row with-border">
				<h3 class="section-title">Blog</h3>
				<div class="text-center columns">
					<p>What I've discovered recently.</p>
				</div>
				<div class="columns">
					<?php
						$post_query = new WP_Query( array(
							'post_type'      => 'post',
							'posts_per_page' => 3,
							'post_status'    => 'publish',
						)); ?>
					<ul class="small-block-grid-1 medium-block-grid-3">
					<?php if ( $post_query->have_posts() ) : ?>
						<?php while( $post_query->have_posts() ) : $post_query->the_post(); ?>
							<li><h3><a title="<?php echo esc_attr( get_the_excerpt() ); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php the_excerpt(); ?>
							</li>
						<?php endwhile; ?>
					<?php endif; ?>
					</ul>
				</div>
			</div>
		</section>

	</div>

<?php get_footer(); ?>
