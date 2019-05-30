<?php
/**
 * Template name: Initiative
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aictheme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="hero-image text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/default-header.jpg">
				
			</div>

			<?php
				while ( have_posts() ) :
					the_post(); ?>
		
			<div class="content page-band">
			<div class="container">
				<div class="row justify-content-center">
					<h1 class="page-title"><?php echo the_title(); ?></h1>
				</div>
			    <div class="row">
					<div class="col-md-5">
						<?php echo get_field('column_left'); ?>
					</div>
					<div class="col-md-5 offset-md-1">
						<?php echo get_field('column_right'); ?>
					</div>
				</div>
			</div>
			</div>
			<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
