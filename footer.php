	<footer class="site-footer">

		<?php if ( ! is_single() ) : ?>

		<div class="row show-for-medium-up">
			<div class="medium-4 column text-left tagline">Technology Leadership</div>
			<div class="medium-4 column"><div class="daniel-mug"></div></div>
			<div class="medium-4 column text-right tagline">Tualatin, Ore.</div>
		</div>

		<div class="row show-for-small-only">
			<div class="small-12 column"><div class="daniel-mug"></div></div>
			<div class="small-12 column text-center tagline">Technology Leadership</div>
			<div class="small-12 column text-center tagline">Tualatin, Ore.</div>
		</div>

		<?php endif; ?>

		<div class="row">
			<div class="columns text-center">
				<div class="made-by">
					<small>Made in <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/oregon.svg' ); ?>" /> by <a href="https://danielbachhuber.com/">Daniel Bachhuber</a><br /><a href="https://github.com/danielbachhuber"><i class="fa fa-github"></i> Github</a> &bull; <a href="https://twitter.com/danielbachhuber"><i class="fa fa-twitter"></i> Twitter</a> &bull; <a href="https://www.linkedin.com/in/danielbachhuber"><i class="fa fa-linkedin"></i> LinkedIn</a></small>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>

	<?php if ( 'handbuilt.co' === parse_url( home_url(), PHP_URL_HOST )
		&& ! current_user_can( 'manage_options' ) ) : ?>
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-49623239-1', 'auto');
		ga('send', 'pageview');

		</script>
	<?php endif; ?>

</body>
</html>
