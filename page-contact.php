<?php
/**
 * Template name: Contact
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
			    <div class="row justify-content-center">
			    	<div class="col-12 text-center contact-page-details">
					<?php if(get_field('address', 'option')):
						?>
						<p><?php echo get_field('address', 'option'); ?></p>
					<?php endif; ?>
					<?php if(get_field('phone_number', 'option')): ?>
						<h3>Phone:</h3><p><a class="" target="_blank" href="tel:<?php echo get_field('phone_number', 'option'); ?>"><?php echo get_field('phone_number', 'option'); ?></a></p>
					<?php endif; ?>
					<?php if(get_field('fax_number', 'option')):
						?>
						<h3>Fax:</h3><p><?php echo get_field('fax_number', 'option'); ?></p>
					<?php endif; ?>
					<?php if(get_field('email_address', 'option')): ?>
						<h3>Email:</h3><p><a class="" target="_blank" href="mailto:<?php echo get_field('email_address', 'option'); ?>"><?php echo get_field('email_address', 'option'); ?></a></p>
					<?php endif; ?>
					</div>
				</div>
			</div>
			</div>
			<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();
