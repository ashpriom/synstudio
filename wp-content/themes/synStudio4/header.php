<?php
/**
 * @package WordPress
 * @subpackage SynStudio_Theme
 * header.php is the standard site header loaded in all pages except - concept art diploma pages and specific pages stated in single.php, which is used to load special headers depending on certain post IDs.
 **/
?>

<?php
$postID = get_the_ID();

// Check polylang.wordpress.com/documentation/documentation-for-developers/functions-reference/
if (function_exists('pll_current_language')) { $currentLang = pll_current_language(slug); }
if(function_exists('pll_get_post')){ $translationID = pll_get_post($postID,'en');}

// Resolve meta tags using Content Field Suite
if(in_category(4) || in_category(48)){
	if($currentLang=="en"){ $attachment_id = get_post_meta($postID, 'thumbnail', true); }
	else{ $attachment_id = get_post_meta($translationID, 'thumbnail', true); }
	$metaImage = wp_get_attachment_image_url($attachment_id,'large',false);
}
elseif(in_category(8) || in_category(92)){ $metaImage = get_post_meta($postID, 'podcastsImage', true); }
else{ $templateDir = get_template_directory_uri(); $metaImage .= $templateDir ."/css/images/synlogo.jpg"; }

$metaTitle = get_post_meta($postID, 'meta_title', true);
$metaDesc = get_post_meta($postID, 'meta_description', true);
$metaKeywords = get_post_meta($postID, 'meta_keywords', true);
if($metaKeywords == ""){$metaKeywords = "syn studio, art school, montreal, canada, art class";}
?>


<!DOCTYPE html>
<!--
     _______.____    ____ .__   __.         _______..___________. __    __   _______   __    ______
    /       |\   \  /   / |  \ |  |        /       ||           ||  |  |  | |       \ |  |  /  __  \
   |   (    ` \   \/   /  |   \|  |       |   (	   ``  -|  |    `|  |  |  | |  .  .  ||  | |  |  |  |
    \   \      \_    _/   |  . `  |        \   \        |  |     |  |  |  | |  |  |  ||  | |  |  |  |
.	 )   |       |  |     |  |\   |    .	)   |       |  |     |  `  '  | |  '  '  ||  | |  `  '  |
|_______/        |__|     |__| \__|    |_______/        |__|      \______/  |_______/ |__|  \______/

-->

<html <?php language_attributes(); ?>>
	<head>
		<!-- EN Analytical Sketching -->
		<?php if($postID==6710){ ?>
			<!-- Google Analytics Content Experiment code -->
			<script>function utmx_section(){}function utmx(){}(function(){var
			k='68290260-21',d=document,l=d.location,c=d.cookie;
			if(l.search.indexOf('utm_expid='+k)>0)return;
			function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
			indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
			length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
			'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
			'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
			'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
			valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
			'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
			</script><script>utmx('url','A/B');</script>
			<!-- End of Google Analytics Content Experiment code -->
		<?php } ?>
		<!-- EN Analytical Sketching -->
		<!-- FR Analytical Sketching -->
		<?php if($postID==11029){ ?>
			<!-- Google Analytics Content Experiment code -->
			<script>function utmx_section(){}function utmx(){}(function(){var
			k='68290260-22',d=document,l=d.location,c=d.cookie;
			if(l.search.indexOf('utm_expid='+k)>0)return;
			function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
			indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
			length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
			'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
			'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
			'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
			valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
			'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
			</script><script>utmx('url','A/B');</script>
			<!-- End of Google Analytics Content Experiment code -->
		<?php } ?>
		<!-- FR Analytical Sketching -->
		<?php if($postID==634 || $postID==12171){ ?>
		<!-- Facebook Pixel Code - sep 2016 -->
			<script>
			!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
			n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
			document,'script','https://connect.facebook.net/en_US/fbevents.js');

			fbq('init', '1601202580180253');
			fbq('track', "PageView");</script>
			<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=1601202580180253&ev=PageView&noscript=1"
			/></noscript>
		<!-- End Facebook Pixel Code -->
		<script>
			// Lead
			fbq('track', 'Lead');

			// Complete Registration
			fbq('track', 'CompleteRegistration');
		</script>
		<?php } ?>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>">
		<meta name="viewport" content="width=device-width,user-scalable=no,minimum-scale=1,maximum-scale=1,initial-scale=1">
		<meta name="title" content="<?php echo $metaTitle; ?>">
		<meta name="description" content="<?php echo $metaDesc; ?>">
		<meta name="keywords" content="<?php echo $metaKeywords; ?>">
		<meta name="author" content="Syn Studio">
		<meta name="copyright" content="Syn Studio" />
		<meta name="p:domain_verify" content="ed36e341a2434aae18c7121607bc9247"/>
		<meta name="google-site-verification" content="TfjOiPpkpWW7TlZeMwprhmSFJpcrTbsS_FkF5Y8phDY" />
		<meta name="google-site-verification" content="1CwlCi8XhLIV00tdrklmNHx5j5mhNeNPLVMdPK6qsaM" />
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="Syn Studio"/>
		<meta name="twitter:title" content="<?php echo $metaTitle; ?>">
		<meta name="twitter:creator" content="Syn Studio">
		<meta name="twitter:domain" content="synstudio.ca">
		<meta name="twitter:image:src" content="<?php echo $metaImage; ?>">
		<meta property="og:site_name" content="Syn Studio">
		<meta property="og:url" content="<?php the_permalink(); ?>">
		<meta property="og:type" content="website">
		<meta property="og:title" content="<?php echo $metaTitle; ?>">
		<meta property="og:description" content="<?php echo $metaDesc; ?>">
		<meta property="og:image" content="<?php echo $metaImage; ?>">
		<meta property="og:image:width" content="545" />
		<meta property="og:image:height" content="342" />
		<meta itemprop="name" content="<?php echo $metaTitle; ?>">
		<meta itemprop="description" content="<?php echo $metaDesc; ?>">
		<meta itemprop="image" content="<?php echo $metaImage; ?>">
		<title><?php wp_title('&#32;&#58;', true, 'right'); ?><?php bloginfo('name'); if($currentLang == "fr"){echo " ecole d'art à Montréal, Québec, Canada";} else{echo " Art School in Montreal, Quebec, Canada";}?>
		</title>
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">
		<link rel="canonical" href="<?php the_permalink(); ?>">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.sidr.light.css" type="text/css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/synstudioResponsive.min.css" type="text/css" media="screen">
		<link rel="dns-prefetch" href="http://platform.twitter.com" />
		<link rel='dns-prefetch' href='//s0.wp.com' />
		<link rel='dns-prefetch' href='https://connect.facebook.net' />
		<link rel='dns-prefetch' href='https://dc.skyglue.com' />
		<link rel='dns-prefetch' href='https://www.googletagmanager.com' />

		<?php if ($currentLang == "fr") { ?> <Style> .info-box1 h2 {font-size: 1.6em;} .info-box10 .mailform2{width: 350px !important; } </style> 
		<?php } ?>

		<style>
			#mobile-header { display: none; }
			@media only screen and (max-width: 768px){ /* Load mobile menu for screen sizes 767px and below. See footer.php for more. */
				#mobile-header { display: block;}
				#nav-wrapper { display: none; }
			}
		</style>
		
		<?php wp_enqueue_script("jquery"); ?>	
		<?php $options = get_option( 'sample_theme_options' ); // Custom theme options. See theme_options_do_page() in functions.php ?>
		<?php wp_head(); ?>
		
		<script type="application/ld+json">
			{
			  	"@context": "http://schema.org",
			  	"@type": "EducationalOrganization",
			  	"name": "Syn Studio",
			  	"alternateName": "Galerie Synesthésie",
			  	"url": "https://synstudio.ca",
			  	"logo": "https://synstudio.ca/synstudio-logo.jpg",
			  	"contactPoint": 
			  	[
			  		{
				    	"@type": "ContactPoint",
				    	"telephone": "+1-514-998-7625",
				    	"email": "info@synstudio.ca",
				    	"contactType": "customer service",
				    	"availableLanguage": 
				    		[
	      						"English",
	      						"French"
	      					]
			  		},
			  		{
				    	"@type": "ContactPoint",
				    	"telephone": "+1-514-998-7625",
				    	"email": "info@synstudio.ca",
				    	"contactType": "sales",
				    	"availableLanguage": 
				    		[
	      						"English",
	      						"French"
	      					]
			  		},
			  		{
				    	"@type": "ContactPoint",
				    	"telephone": "+1-514-998-7625",
				    	"email": "info@synstudio.ca",
				    	"contactType": "billing support",
				    	"availableLanguage": 
				    		[
	      						"English",
	      						"French"
	      					]
			  		}
			  	],
			  	"sameAs": 
			  	[
				    "https://www.facebook.com/SynStudio",
				    "https://www.instagram.com/synstudio/",
				    "https://twitter.com/SynStudio",
				    "https://www.youtube.com/user/SynStudioMontreal",
				    "http://synstudio.tumblr.com/"
				],
				"address": 
				{
			      	"@type": "PostalAddress",
			      	"addressCountry" : "CA",
			      	"addressRegion": "CA",
			      	"addressLocality": "Montreal",
			      	"postalCode": "H3B 1A7",
			      	"streetAddress": "460 Saint Catherine West, #508"
			    }
			}
		</script>
	
	</head>

	<body>
		<!-- Google Tag Manager -->
	        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MJ8KT7"
	        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	        })(window,document,'script','dataLayer','GTM-MJ8KT7');</script>
    	<!-- End Google Tag Manager -->

    	<!-- SkyGlue -->
		<script type="text/javascript">
		   var _sgq = _sgq || [];
		   _sgq.push(['setSgAccount', 'jjkqccji']);
		   setTimeout(function() {
			 var sg = document.createElement('script'); sg.type = 'text/javascript'; sg.async = true;
			 sg.src = ("https:" == document.location.protocol ? "https://dc" : "http://cdn0") + ".skyglue.com/sgtracker.js";
			 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sg, s);
		   }, 1);
		</script>

		<div id="wrapper"> <!-- Main Content Wrapper: Start, ends in footer -->
		<div id="header"> <!-- header: start -->
		
		<!-- Popup Message Cookie -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery_cookie.min.js"></script>
		<script type="text/javascript">
			jQuery( document ).ready(function( $ ) {
			 	$("#close-msg").bind( "click", function() {
					$("#popup-message").hide();
					$.cookie("syn-popup", "true", { path: '/' });
				});
			});
		</script>

		<!-- pop-up message: start -->
		<?php
		  	if($currentLang=="en"){ $cat = 'Pop-up Message'; } else{ $cat = 'Pop-up Message FR'; }
		  	$catID = get_cat_ID($cat);
		  	query_posts('cat=' . $catID);
				while (have_posts()) : the_post();
				 	$postID = get_the_ID();
					echo '<div id="popup-message" style="display:none;">';
					echo '<a id="close-msg" href="javascript: ;">X</a>';
				 	echo '<h2>' . get_the_title() . '</h2>';
				  	the_content();
					echo '</div>';
					echo '<script type="text/javascript">jQuery( document ).ready(function( $ ) {';
					echo 'if ($.cookie("syn-popup")=="true"){';
					echo '$("#popup-message").hide();';
					echo '} else {';
					echo '$("#popup-message").show();';
					echo '}';
					echo '});</script>';
				endwhile;
			wp_reset_query();
	  	?>
		<!-- pop-up message: end -->

			<div id="logo">
				<?php if($currentLang=="en"){ ?><a href="/home/">Syn Studio - Art School</a> <?php }
				else{ ?><a href="/francais/">Syn Studio - École d’art à Montréal</a> <?php } ?>
			</div>

			<div id="language">
	   			<div class="phone">514 998-7625</div>
	   			<?php 
	   			if (function_exists('pll_the_languages')){
	   				pll_the_languages(array('hide_current'=>1, 'show_flags'=>1)); // See Polylang reference
				}
	   			?>
			</div>

			<div id="nav">
				
				<div id="mobile-header">
					<a id="responsive-menu-button" href="#sidr-main"><img alt="Toggle menu" src="<?php echo get_template_directory_uri(); ?>/images/responsive/mobi-toogleMenu.png"></a>
				</div>

		  		<div id="nav-wrapper">
					<?php
					if ( $currentLang == "fr"){ wp_nav_menu( array('menu' => 'Main Nav FR' ));}
					else{ wp_nav_menu( array('menu' => 'Main Nav' )); }
					?>
		   		</div>

		   		<div id="social">
					<?php 
					if ($currentLang == "fr") { echo "<h4>GARDEZ LE CONTACT</h4>"; }
					else { echo "<h4>Stay in touch</h4>"; }
					?>
				  	<a href="http://www.facebook.com/SynStudio" target="_blank" title="Facebook" id="lnk-facebook">Facebook</a>
					<a href="https://twitter.com/SynStudio" target="_blank" title="Twitter" id="lnk-twitter">Twitter</a>
				  	<a href="https://www.youtube.com/user/SynStudioMontreal" target="_blank" title="You Tube" id="lnk-youtube">YouTube</a>
				</div>
			
			</div>
		</div> <!-- header: end....wrapper ends in footer.php -->
