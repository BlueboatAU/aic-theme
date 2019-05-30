<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aictheme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


				<?php aictheme_post_thumbnail(); ?>

				<div class="entry-content container">
					<div class="row justify-content-center">
						<div class="col-12 col-lg-8">
							<div class="row justify-content-between align-items-center">
								<div class="col-10">
									<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
								</div>
								<div class="col-2">
									<a class="post-title-back-btn" onclick="history.back()">Back</a>
								</div>
							</div>
							<div class="entry-meta">
								<?php aictheme_posted_on(); ?>
							</div><!-- .entry-meta -->
							<div class="entry-copy">
							<?php the_content(); ?>
							</div>
							<?php if (get_field('insights_pdf_file')): ?>
								<a href="<?php echo get_field('insights_pdf_file'); ?>" class="dl-btn">Download</a>
							<?php endif; ?>
						</div>
					</div>
				</div><!-- .entry-content -->

				<!--<footer class="entry-footer">
					<?php aictheme_entry_footer(); ?>
				</footer> .entry-footer -->
			</article><!-- #post-<?php the_ID(); ?> -->

			<?php


		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
