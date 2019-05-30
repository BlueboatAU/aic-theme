<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
				<div class="row mx-0">
					<div class="section-title">
						<h1 class="page-title text-bg"><?php echo the_title(); ?></h1>
					</div>
				</div>
			    <div class="row">
					<div class="col-md-5">
						<?php the_content(); ?>
					</div>
					<div class="col-md-6 offset-md-1">
						<div class="page-image"><?php the_post_thumbnail(); ?></div>
						<?php if (get_field('image_caption')): ?>
							<p class="image-caption small"><?php echo  get_field('image_caption'); ?></p>
						<?php endif; ?>
						<blockquote><?php the_field('blockquote'); ?></blockquote>
					</div>
				</div>
			</div>
			</div>
			<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
