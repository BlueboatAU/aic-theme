<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aictheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


	<?php wp_head(); ?>

		<style>
	.nav-container{
		position: fixed;
		z-index: 10000;
		width: 100%;
		-webkit-transition: all 0.3s;
		transition: all 0.3s;
	}

	.nav-link {
		color: #fff !important;
		text-decoration: none;
	    text-transform: uppercase;
	}
	
	#content {
		position: relative;
	}

	.nav-display{
		-ms-transform: translate(0px, 0px) !important;
		-webkit-transform: translate(0px, 0px) !important;
		transform: translate(0px, 0px) !important;
		-webkit-transition: all 0.3s; /* Safari */
		transition: all 0.3s
	}
	
	.nav-hide{
		-ms-transform: translate(0px, -128px);
		-webkit-transform: translate(0px, -128px);
		transform: translate(0px, -128px);
		-webkit-transition: all 0.3s; /* Safari */
		transition: all 0.3s
	}

	.push-down {
		-ms-transform: translate(0px, 56px);
		-webkit-transform: translate(0px, 56px);
		transform: translate(0px, 56px);
		-webkit-transition: all 0.3s; /* Safari */
   		 transition: all 0.3s
	}

	/*-- Menu display on desktop ---*/
	@media (min-width: 768px) {

		.nav-container{
			-ms-transform: translate(0px, 0px);
			-webkit-transform: translate(0px, 0px);
			transform: translate(0px, 0px);
		}

		.push-down {
			-ms-transform: translate(0px, 56px) !important;
			-webkit-transform: translate(0px, 56px) !important;
			transform: translate(0px, 56px) !important;
		}

		.nav-display{
			-ms-transform: translate(0px, 0px) !important;
			-webkit-transform: translate(0px, 0px) !important;
			transform: translate(0px, 0px) !important;
		}
		
		.nav-hide{
			-ms-transform: translate(0px, -128px);
			-webkit-transform: translate(0px, -128px);
			transform: translate(0px, -128px);
		}


	}

	.hidden {
		display: none;
	}



</style>

<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133571782-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-133571782-1');
	</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aictheme' ); ?></a>

	<header style="position: relative; z-index: 999999;">
		<div class="nav-container nav-hide">
			<nav class="navbar navbar-expand-md" role="navigation">
				<div class="container-fluid">
					<span class="brand-container">
						<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
							<img src="<?= get_template_directory_uri(); ?>/imgs/logo.svg" class="logo" alt="aictheme">
						</a>	  
					</span>
					<button id="mobile-menu-icon" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">	
						<img id="navbar-hamburger" class="mobile-menu-btn" src="<?= get_template_directory_uri(); ?>/imgs/menu-white.svg" alt="menu">
						<img id="navbar-close" class="mobile-menu-btn hidden" src="<?= get_template_directory_uri(); ?>/imgs/menu-close.svg" alt="Close menu">
					</button>
					<?php
					wp_nav_menu( array(
						'menu'   		    => 'Primary Menu',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-example-navbar-collapse-1',
						'menu_class'        => 'nav navbar-nav ml-auto',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
						'walker'            => new WP_Bootstrap_Navwalker(),
					) );
					?>
				</div>
			</nav>
		</div>
		
		<div class="home-header nav-display">
			<div class="container-fluid d-flex justify-content-between">
					<span class="brand-container">
						<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
							<img src="<?= get_template_directory_uri(); ?>/imgs/logo.svg" class="logo" alt="aictheme">
						</a>	  
					</span>
					<div class="header-right d-flex justify-content-end">
						<span id="menu-icon" class="menu-btn d-none d-lg-block">MENU</span>
						<button class="menu-btn d-block d-lg-none">&#9776;</button>
						<div class="d-flex justify-content-center header-social">
							<a class="social-icon" href=""><img src="<?= get_template_directory_uri(); ?>/imgs/icon-fb.svg" class="" alt="facebook"></a>
							<a class="social-icon" href=""><img src="<?= get_template_directory_uri(); ?>/imgs/icon-twitter.svg" class="" alt="twitter"></a>
							<a class="social-icon" href=""><img src="<?= get_template_directory_uri(); ?>/imgs/icon-yt.svg" class="" alt="youtube"></a>
							<a class="social-icon" href=""><img src="<?= get_template_directory_uri(); ?>/imgs/icon-li.svg" class="" alt="linked in"></a>
						</div>
						<div class="header-search d-none d-lg-block">
							<?php get_search_form( ); ?>
						</div>
						
						
					</div>
				</div>
		</div>

	</header>


<div id="<?php if(!is_front_page()){ echo 'content';}else{echo'home';}?>">
