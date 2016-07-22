<?php get_header(); ?>

	<div class="site-content">

		<?php if ( have_posts() ) : ?>

			<?php while( have_posts() ) : the_post(); ?>

			<?php endwhile; ?>

		<?php endif; ?>

	</div>

<?php get_footer(); ?>
