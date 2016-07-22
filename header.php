<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="site-header">
		<div class="row">

			<div class="medium-3 show-for-medium-up column text-left tagline">WordPress Development</div>

			<h1 class="text-center small-12 medium-6 column"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Hand Built</a></h1>

			<div class="medium-3 show-for-medium-up column text-right tagline">Tualatin, Ore.</div>

		</div>
	</header>

