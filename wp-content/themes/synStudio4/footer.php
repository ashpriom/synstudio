<?php
/**
 * @package WordPress
 * @subpackage SynStudio_Theme
 *
 * footer.php is loaded in all webpages, except concept art diploma pages.
 */
if (function_exists('pll_current_language')) { $currentLang = pll_current_language('slug'); }
?>

	<div id="footer">

		<div class="footer-left">
	 		
	 		<?php
			if ($currentLang == "fr") { ?>
		 		<a href="/francais/">Accueil</a> || &nbsp;
		 		<a href="/a-propos/">À propos de nous</a> || &nbsp;
		 		<a href="/cours/">Nos cours</a> || &nbsp;
		 		<a href="/ateliers/">Nos ateliers</a> || &nbsp;
		 		<a href="/resources-fr/">Ressources</a> || &nbsp;
		 		<a href="http://blog.synstudio.ca/fr">Blogue</a> || &nbsp;
		 		<a href="<?php echo get_template_directory_uri(); ?>/docs/Politiques.pdf">Nos politiques</a> || &nbsp;
		 		<a href="/politique-de-confidentialite/">Politique de confidentialité</a> || &nbsp;
		 		<a href="/contactez-nous/">Contactez-nous</a>
		 		<br/><br/>
	  			460 St. Catherine Ouest, #508. Montreal. H3B 1A7
		  	<?php }

			else { ?>
		 		<a href="/home">Home</a> || &nbsp;
		 		<a href="/about">About</a> || &nbsp;
		 		<a href="/classes">Classes</a> || &nbsp;
		 		<a href="/workshops">Workshops</a> || &nbsp;
		 		<a href="/resources">Resources</a> || &nbsp;
		 		<a href="http://synstudio.ca/blog/">Blog</a> || &nbsp;
		 		<a href="<?php echo get_template_directory_uri(); ?>/docs/Policies.pdf">School Policies</a> || &nbsp;
		 		<a href="/privacy-policy">Privacy Policy</a> || &nbsp;<a href="/contact-us">Contact us</a>
		 		<br/><br/>
	  			460 St. Catherine West, #508. Montreal. H3B 1A7
		  	<?php } ?>

	  		<br/><br/>
	  		&copy; <?php echo date("Y"); ?> Syn Studio
	  	</div>

	  	<div class="footer-right">
	  		<?php if ($currentLang == "fr") { ?> Commandité par <?php } else{ ?> Sponsored By <?php } ?>
	  		<br/><br/>
	  		<a href="http://www.artstation.com/" target="_blank"> <!-- Hovering over the sponsor logo changes to another image -->
	  			<img src="<?php echo get_template_directory_uri(); ?>/images/artstation.png" title="Artstation" alt="Artstation"
	  				onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/images/artstation-color.png';"
	         		onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/images/artstation.png';">
	  			</img>
	  		</a>
	  		<a href="http://www.wacom.com/" target="_blank"> <!-- Hovering over the sponsor logo changes to another image -->
	  			<img src="<?php echo get_template_directory_uri(); ?>/images/wacom.png" title="Wacom" alt="Wacom"
	  				onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/images/wacom-color.png';"
	         		onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/images/wacom.png';">
	  			</img>
	  		</a>
	  	</div>

	</div>

</div> <!-- this closing div is wrapper class started in header.php -->

<?php wp_footer(); ?>

<style>
	#mobile-header { display: none; }
	@media only screen and (max-width: 768px){
		#mobile-header { display: block;}
		#nav-wrapper { display: none; }
	}
</style>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.sidr.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.touchwipe.1.1.1.js"></script>

<script>
	jQuery('#responsive-menu-button').sidr({
	name: 'sidr-main',
	<?php
		if ($currentLang == "fr") { ?>
			source: '.menu-main-nav-fr-container'
		<?php }

		else { ?>
			source: '.menu-main-nav-container'
		<?php }
	?>
	});

	jQuery( window ).load(function() {
		if(jQuery("#sidr-main").length !== 0){
			jQuery(".sidr-class-sub-menu").hide();
			jQuery( "li.sidr-class-menu-item ul.sidr-class-sub-menu" ).each(function(){
			jQuery( this ).after("<div class='lnk-plus'>+</div>");
			});
	        jQuery(".lnk-plus").toggle(function(){
	            var id1= jQuery( this ).parent().attr("id");
	            jQuery("#" + id1 + " ul.sidr-class-sub-menu").show();
	            jQuery("#" + id1 + " .sidr-class-menu-item-has-children ul").hide();
	            jQuery( this ).html("-");
	        },function(){
	            var id1= jQuery( this ).parent().attr("id");
	            jQuery("#" + id1 + " ul.sidr-class-sub-menu").hide();
	            jQuery( this ).html("+");
	        });
		}
	});
</script>

<!-- Menu effects for iPad and iPhone Only! -->
<script>
		jQuery(document).ready(function($){
			var deviceAgent = navigator.userAgent.toLowerCase();
			var agentID = deviceAgent.match(/(ipad|iphone)/);
			if (agentID) {
				jQuery('#responsive-menu-button').sidr({
					name: 'sidr-main',
					<?php
					if ($currentLang == "fr") { ?>
						source: '.menu-main-nav-fr-container'
					<?php }

					else { ?>
						source: '.menu-main-nav-container'
					<?php }
					?>
				});

				if(jQuery("#sidr-main").length !== 0) {
					jQuery(window).bind('touchstart click', function(){
						//return false
					});
			      	jQuery( ".lnk-plus" ).toggle(function() {
			        var id1= jQuery( this ).parent().attr("id");
			        jQuery("#" + id1 + " ul.sidr-class-sub-menu").show("slow");
			        jQuery("#" + id1 + " .sidr-class-menu-item-has-children ul").hide("slow");
			        jQuery( this ).html("-");
			        }, function() {
	                var id1= jQuery( this ).parent().attr("id");
	                jQuery("#" + id1 + " ul.sidr-class-sub-menu").hide("slow");
	                jQuery( this ).html("+");
	            	});

	        	}
	 		}
		});
</script>

<!-- Swipe to open or close mobile menu -->
<script>
      jQuery(window).touchwipe({
        wipeLeft: function() {
          // Close
          jQuery.sidr('close', 'sidr-main');
        },
        wipeRight: function() {
          // Open
          jQuery.sidr('open', 'sidr-main');
        },
        min_move_x: 70, // a minimum of 70px right or left swipe is detected.
     	min_move_y: 20,
        preventDefaultEvents: false
      });
</script>

<!-- Responsible.js enables switch between mobile and desktop versions -->
<script src="<?php echo get_template_directory_uri(); ?>/js/responsible.min.js"></script>

<script>
  	responsible.init({
    cssPath: '<?php echo get_template_directory_uri(); ?>/css/responsive.min.css',
    desktopWidth: 1000,
    toggleThreshold: 768, // if the window is smaller than this width, the mobile toggle will display
    
    desktopToggleDisplay: true,
	<?php
		if ($currentLang == "en") {
			echo "desktopToggleText: \"Switch to Mobile Version\",";
		}
		else {
			echo "desktopToggleText: \"changez a la version mobile\",";
		}
	?>
  	
  	mobileToggleDisplay: true,
	<?php
		if ($currentLang == "en") {
			echo "mobileToggleText: \"Switch to Desktop Version\",";
		}
		else {
			echo "mobileToggleText: \"changez a la version bureau\",";
		}
	?>
	mobileToggleAlign: 'right', 
    mobileToggleBottom: '0px' 
    });
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-37910846-1', 'auto');
  ga('send', 'pageview');
</script>

<!-- Piwik disabled <noscript><p><img src="http://192.168.2.200/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>-->

</body>
</html>
