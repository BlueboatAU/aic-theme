<?php
get_header();

$image = get_field('hero_image');
$url = $image['url'];
$heroTitle = get_field('hero_title');
$heroSubText = get_field('hero_sub_text');
?>

	<div class="hero-image parallax-window" data-parallax="scroll" data-image-src="<?php echo $url; ?>">
		<div class="container">
			<div style="">

			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-md-8 col-lg-4 col-xl-6 hero-overlay">
					<h2><?php echo $heroTitle; ?></h2>
				</div>
			</div>
		</div>
			<?php 
			while ( have_posts() ) :
				the_post(); 
			?>

			<div class="page-band dark-bg">
				<div class="container">
					<div class="row justify-content-center">
						<h3 class="text-bg">About Skills Futures</h3>
					</div>
					<div class="row justify-content-center">
						<div class="col-sm-6 col-md-8">
							<p class="featured-page-description"><?php the_content(); ?></p>
						</div>
					</div>
				</div>
			</div><!-- End page-band -->

			<?php endwhile; ?>

	</div>


<div class="page-band">
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-xl-9">
			<div class="section-title">
				<h3 class="text-bg">What's happening</h3>
			</div>
			<?php
			    $newsLoop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 6 ) );
			    if ( $newsLoop->have_posts() ) : ?>
					<div class="row">
			        <?php while ( $newsLoop->have_posts() ) : $newsLoop->the_post(); ?>
			        	<div class="col-6">
			            <div class="post-card">
			                <?php if ( has_post_thumbnail() ) { ?>
			                    <div class="post-image">
			                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			                    </div>
			                <?php } ?>
			                <div class="post-meta">
			                	<h4><?php aictheme_posted_on(); ?></h4>
			                </div>
			                <div class="post-title">
			                    <a href="<?php the_permalink(); ?>"><h2><?php echo get_the_title(); ?></h2></a>
			                </div>
			            </div>
			            </div>
			        <?php endwhile; ?>
					</div>
			    <?php endif;
			    wp_reset_postdata();
			?>

		</div>
		<div class="col-lg-4 col-xl-3">
			<div class="home-sidebar">
				<div class="section-title">
					<h3 class="text-bg">Face-to-face</h3>
				</div>
				<?php
				    $newsCatLoop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 6, 'category_name' => 'face-to-face' ) );
				    if ( $newsCatLoop->have_posts() ) :
				        while ( $newsCatLoop->have_posts() ) : $newsCatLoop->the_post(); ?>
				            <div class="sidebar-post">
				                <div class="post-title">
				                    <h2><?php echo get_the_title(); ?></h2>
				                    <a href="<?php the_permalink(); ?>">Read more ></a>
				                </div>
				            </div>
				        <?php endwhile;
				    endif;
				    wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</div>
</div>


<?php

get_footer();
?>