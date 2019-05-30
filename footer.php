<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aictheme
 */

?>

</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container-fluid">
			<div class="row light-grey-bg">
				<div class="container">
					<div class="row justify-content-center logo-row">
						<div class="col-md-4">
							<p class="logo-header">An initiative of The Australia-Indonesia Centre</p>
							<img src="<?= get_template_directory_uri(); ?>/imgs/aic-logo.svg" class="aic-logo" alt="aic logo">	
						</div> 
						<div class="col-md-8">
							<p class="logo-header">Other initiatives:</p>
							<div class="row align-content-center initiative-logos">
								<div class="col-3"><img src="<?= get_template_directory_uri(); ?>/imgs/reelozind-logo.svg" class="logo" alt="reelozind logo"></div>
								<div class="col-3"><img src="<?= get_template_directory_uri(); ?>/imgs/pair-logo.svg" class="logo" alt="pair logo"></div>
								<div class="col-3"><img src="<?= get_template_directory_uri(); ?>/imgs/digital-economy-logo.svg" class="logo" alt="digital economy logo"></div>
								<div class="col-3"><img src="<?= get_template_directory_uri(); ?>/imgs/ai-com-logo.svg" class="logo" alt="aic logo"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row dark-bg footer-connect">
				<div class="container">

							<div class="row border-top mx-0">
								<div class="col-9 px-0"><strong>Connect with us</strong></div>
								<div class="col-3 px-0">
									<div class="row justify-content-end">
										<a class="social-icon" href=""><img src="<?= get_template_directory_uri(); ?>/imgs/icon-fb.svg" class="" alt="facebook"></a>
										<a class="social-icon" href=""><img src="<?= get_template_directory_uri(); ?>/imgs/icon-twitter.svg" class="" alt="twitter"></a>
										<a class="social-icon" href=""><img src="<?= get_template_directory_uri(); ?>/imgs/icon-yt.svg" class="" alt="youtube"></a>
										<a class="social-icon" href=""><img src="<?= get_template_directory_uri(); ?>/imgs/icon-li.svg" class="" alt="linked in"></a>
									</div>
								</div>
							</div>

				</div>
			</div>
			<div class="row baseline">
				<div class="container">
					<p><?php echo get_field('footer_paragraph', 'options');?></p>
					<p><?php echo get_field('baseline_text', 'options');?> <span>© The Australia-Indonesia Centre <?php echo date(Y); ?></span></p>
				</div>	
			</div>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->


<script>

// var navHeight = jQuery(".nav-container").height();
// jQuery('#content').css("top", navHeight);
// jQuery('#content').css("margin-bottom", navHeight);

// Navigation

jQuery(document).ready(function(){

	// Helper functions
	function showMenu()
	{
		jQuery(".nav-container").removeClass("nav-hide");
		jQuery(".nav-container").addClass("nav-display");
	}

	function hideMenu()
	{
		jQuery(".nav-container").removeClass("nav-display");
		jQuery(".nav-container").addClass("nav-hide");
	}
	function hideHeader()
	{
		jQuery(".home-header").removeClass("nav-display");
		jQuery(".home-header").addClass("nav-hide");
	}
	function showHeader()
	{
		jQuery(".home-header").removeClass("nav-hide");
		jQuery(".home-header").addClass("nav-display");
	}
	function pushDown()
	{
		jQuery('#home').addClass('push-down');
	}

	function pushUp()
	{
		jQuery('#home').removeClass('push-down');
	}

	function addBackgroundColor()
	{
		jQuery(".nav-container").addClass("bg-colour");
	}

	function removeBackgroundColor()
	{
		jQuery(".nav-container").removeClass("bg-colour");
	}

	// Hook up nav menu icon click event
	jQuery("#menu-icon").click(function(){
		
		showMenu();
		pushDown();
		hideHeader();

	});


	// Onscroll event, fires every time the user scrolls
	window.onscroll = function(e)
	{
		// Check direction of scroll
		if(this.previousScroll > this.scrollY) // Scrolling up
		{
			showMenu();
			addBackgroundColor();
				if(this.scrollY < 300)
				{
					removeBackgroundColor();
					pushUp();
					hideMenu();
					showHeader();
				}
			
		}
		else if (this.previousScroll < this.scrollY && this.scrollY > 0) // Scrolling down, check for negative scroll values which can occur in safari when the user pulls the page down
		{
			hideMenu();
		}

		this.previousScroll = this.scrollY;
	}

	// Toggle mobile menu icon based on bootstrap events firing
	jQuery(function() {
		jQuery('#bs-example-navbar-collapse-1')
			.on('show.bs.collapse', function() {
				jQuery('#navbar-hamburger').addClass('hidden');
				jQuery('#navbar-close').removeClass('hidden');    
			})
			.on('hide.bs.collapse', function() {
				jQuery('#navbar-hamburger').removeClass('hidden');
				jQuery('#navbar-close').addClass('hidden');        
			});
	});

});

</script>


<?php wp_footer(); ?>

</body>
</html>
