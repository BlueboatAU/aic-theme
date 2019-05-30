<?php
/**
 * Template name: Portfolios
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
				<h1 class="page-title">Investment Portfolios</h1>
			</div>
		
		<div class="content page-band portfolios-page">
		<div class="container">

			<?php
			$args = array(
			    'post_type'      => 'portfolio',
			    'posts_per_page' => -1
			);

			$query = new WP_Query($args);
			?>
		    <div class="row justify-content-center">
			<?php if ( $query->have_posts() ) : ?>

			<?php while ( $query->have_posts() ) : $query->the_post();
		        ?>
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
