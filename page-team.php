<?php
/**
 * Template name: Team
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aictheme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main team-page">
			<?php 
				while ( have_posts() ) :
						the_post(); ?>

			<div class="hero-image text-center parallax-window" data-parallax="scroll" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/default-header.jpg"></div>

			<div class="page-band">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-band-header">Management Committee</h2>
						</div>
						<?php
						$args = array(
						    'post_type'      => 'team-member',
						    'posts_per_page' => -1,
						    'tax_query' => array(
							            array(
							                'taxonomy' => 'team-member-cats',
							                'field'    => 'slug', // term_id, slug  
							                'terms'    => 'management-committee' 
							            ),
							           )
									);

						$query = new WP_Query($args);

						if ( $query->have_posts() ) :			    
						    while ( $query->have_posts() ) : $query->the_post(); 

						    team_loop(); 

						    endwhile;  
							endif;
						wp_reset_postdata(); ?>


				 	</div><!-- row -->
				</div><!-- container -->
			</div><!-- page-band -->

			<div class="page-band light-grey-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-band-header">Clinical Investigators</h2>
						</div>
						<?php
						$args = array(
						    'post_type'      => 'team-member',
						    'posts_per_page' => -1,
						    'tax_query' => array(
							            array(
							                'taxonomy' => 'team-member-cats',
							                'field'    => 'slug', // term_id, slug  
							                'terms'    => 'clinical-investigators' 
							            ),
							           )
									);

						$query = new WP_Query($args);

						if ( $query->have_posts() ) :			    
						    while ( $query->have_posts() ) : $query->the_post(); 

						    team_loop(); 

						    endwhile;  
							endif;
						wp_reset_postdata(); ?>


				 	</div><!-- row -->
				</div><!-- container -->
			</div><!-- page-band -->


			<div class="page-band">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-band-header">Associate Investigators</h2>
						</div>
						<?php
						$args = array(
						    'post_type'      => 'team-member',
						    'posts_per_page' => -1,
						    'tax_query' => array(
							            array(
							                'taxonomy' => 'team-member-cats',
							                'field'    => 'slug', // term_id, slug  
							                'terms'    => 'associate-investigators' 
							            ),
							           )
									);

						$query = new WP_Query($args);

						if ( $query->have_posts() ) :			    
						    while ( $query->have_posts() ) : $query->the_post(); 

						    team_loop(); 

						    endwhile;  
							endif;
						wp_reset_postdata(); ?>


				 	</div><!-- row -->
				</div><!-- container -->
			</div><!-- page-band -->


<?php endwhile;  // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
