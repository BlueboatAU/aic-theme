<?php
/**
 * Investment portfolios archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aictheme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

			<div class="hero-image text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/default-header.png">
				<h1 class="page-title">Investment Portfolios</h1>
			</div>
		
		<div class="content page-band portfolios-page">
		<div class="container">
			<?php while ( have_posts() ) :
				the_post(); ?>
		    <div class="row justify-content-center">

				<div class="col-md-5">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php the_post_thumbnail(); ?>
					
					<div class="entry-content">
						<?php the_title( '<h2 class="entry-title">', '</h2>' );

						the_content();
						
						if (get_field('investment_portfolio_pdf')):

						$pdf = get_field('investment_portfolio_pdf');
						$pdfURL = $pdf['url'];
						?>
						<a class="dl-btn" href="<?php echo $pdfURL; ?>">DOWNLOAD</a>
					<?php endif ?>
					</div><!-- .entry-content -->

				</article><!-- #post-<?php the_ID(); ?> -->
				</div>
			<?php endwhile;

			the_posts_navigation();

			endif;
			?>
			</div>
		</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
