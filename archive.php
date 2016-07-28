<?php get_header(); ?>

	<div class="site-content">

		<?php if ( have_posts() ) : ?>
			
			<div class="row">
				<div class="columns medium-8 medium-centered">

				<?php while( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?>

						<header class="page-header">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php edit_post_link( ' <small><i class="fa fa-pencil"></i></small>' ); ?></h3>
						</header>

						<div class="page-content">
							<?php the_excerpt(); ?>
						</div>

					</article>

				<?php endwhile; ?>

				<?php echo Hand_Built::get_template_part( 'pagination' ); ?>

				</div>

			</div>

		<?php endif; ?>

	</div>

<?php get_footer(); ?>
