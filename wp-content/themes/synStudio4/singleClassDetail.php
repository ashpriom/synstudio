<?php
	$postID = get_the_ID();
	if(function_exists('pll_current_language')){ $currentLang = pll_current_language('slug'); }
	if(function_exists('pll_get_post')){ $translationID = pll_get_post($postID,'en');}
	if(function_exists('get_option')){ $options = get_option('synstudio-options'); $redundant_options = get_option( 'sample_theme_options' ); }
	
	//if(function_exists('GetPreSemester')){ $preSemesterID = GetPreSemester();}
	//global $wpdb;
	// $thisSemester = $wpdb->get_row( "SELECT semester_name_en, semester_name_fr, start_date, end_date, early_registration, late_registration FROM syn1_syn_semester WHERE semester_id = $preSemesterID ");
	//$earlyRegistrationDate = $thisSemester->early_registration;
	//$lateRegistrationDate = $thisSemester->late_registration;

	//$today = date('Y-m-d');
	//$format = 'Y-m-d';

	//$earlyRegistrationDatePretty = DateTime::createFromFormat($format, $earlyRegistrationDate);
	//$lateRegistrationDatePretty = DateTime::createFromFormat($format, $lateRegistrationDate);

	//$sevenBeforeERD = new DateTime($earlyRegistrationDate);
	//$sevenBeforeERD->modify('-7 days');
	//$sevenBeforeERD = $sevenBeforeERD->format('Y-m-d');
	//$sevenBeforeERDPretty = DateTime::createFromFormat($format, $sevenBeforeERD);

	/*
	$sevenBeforeLRD = new DateTime($lateRegistrationDate);
	$sevenBeforeLRD->modify('-7 days');
	$sevenBeforeLRD = $sevenBeforeLRD->format('Y-m-d');
	$sevenBeforeLRDPretty = DateTime::createFromFormat($format, $sevenBeforeLRD);
	*/
?>

<?php
	function firstListElement($content){
	    $pos = strpos($content, '</li>');
	    return substr($content, 0, $pos+1);
   	}
	$shortDesc = get_post_meta($postID, 'class_info_' . $currentLang, true);
	$shortDesc = firstListElement($shortDesc);
	$shortDesc = html_entity_decode(strip_tags($shortDesc));
?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slideshow.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery_cookie.min.js"></script>

<script type="application/ld+json">
	{
	  "@context": "http://schema.org",
	  "@type": "Course",
	  "name": "<?php echo get_the_title(); ?>",
	  "description": "<?php echo $shortDesc; ?>",
	  "provider": {
	    "@type": "EducationalOrganization",
	    "name": "Syn Studio",
	    "sameAs": "https://synstudio.ca"
	  }
	}
</script>

<?php if($currentLang=="en"){ ?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "item": {
      "@id": "https://synstudio.ca",
      "name": "Home"
    }
  },{
    "@type": "ListItem",
    "position": 2,
    "item": {
      "@id": "https://synstudio.ca/classes",
      "name": "All Classes"
    }
  },{
    "@type": "ListItem",
    "position": 3,
    "item": {
      "@id": "<?php echo get_permalink(); ?>",
      "name": "<?php echo get_the_title(); ?>"
    }
  }]
}
</script>
<?php }else{ ?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "item": {
      "@id": "https://synstudio.ca/francais/",
      "name": "Accueil"
    }
  },{
    "@type": "ListItem",
    "position": 2,
    "item": {
      "@id": "https://synstudio.ca/cours-arts/",
      "name": "Cours d'art"
    }
  },{
    "@type": "ListItem",
    "position": 3,
    "item": {
      "@id": "<?php echo get_permalink(); ?>",
      "name": "<?php echo get_the_title(); ?>"
    }
  }]
}
</script>
<?php } ?>

<script type="text/javascript">
	function closeDetailBox(a){
	   $(a).hide();
	}

	$(document).ready(function (){
		if($(window).width() < 768){
	        $('#carousel').jcarousel({
	            horizontal: true,
	            scroll: 1,
	            auto: 2,
	            wrap: 'last',
	            initCallback: mycarousel_initCallback
	        });

	        $( "#col2 a" ).bind( "click", function(event) {
	            event.preventDefault();
	        });

	        //Add Close link in description boxes
	        $( ".details-box" ).each(function(index){
	           var idBox = $( this ).attr("id");
	           $( this ).append("<a href='javascript:closeDetailBox(\"#"+idBox+"\");' class='detail-boxLink'>CLOSE(X)</a>");
	        });
		}

		else{
		    $('#carousel').jcarousel({
				vertical: true,
				scroll: 1,
				auto: 2,
				wrap: 'last',
				initCallback: mycarousel_initCallback
		   	});
		}

		//Front page Carousel - Initial Setup
	   	$('div#slideshow-carousel a img').css({'opacity': '0.5'});
	   	$('div#slideshow-carousel a img:first').css({'opacity': '1.0'});
	   	$('div#slideshow-carousel li a:first').append('<span class="arrow"></span>')

	  	//Combine jCarousel with Image Display
	    $('div#slideshow-carousel li a').hover(
	       	function(){
	       		if (!$(this).has('span').length) {
	        		$('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
	   	    		$(this).stop(true, true).children('img').css({'opacity': '1.0'});
	       		}
	       	},
	       	function(){
	       		$('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
	       		$('div#slideshow-carousel li a').each(function () {
	       			if ($(this).has('span').length) $(this).children('img').css({'opacity': '1.0'});
	       		});
	       	}
		).click(function(){
		      	$('span.arrow').remove();
				$(this).append('<span class="arrow"></span>');
	       		$('div#slideshow-main li').removeClass('active');
	       		$('div#slideshow-main li.' + $(this).attr('rel')).addClass('active');
	       	return false;
		});

		var slideshowItems = $("div#slideshow-main li").size();
		var r = 2;
		var slider = function() {
			$('div#slideshow-main li').removeClass('active');
		    $('div#slideshow-main li.p' + r).addClass('active');
			$('span.arrow').remove();
			$('div#slideshow-carousel a img').css({'opacity': '0.5'});
		   	$('div#slideshow-carousel li.jcarousel-item-' + r + ' a img:first').css({'opacity': '1.0'});
			$('div#slideshow-carousel li.jcarousel-item-' + r + ' a:first').append('<span class="arrow"></span>')

			if (r<slideshowItems) {
				r = r + 1;
			}
			else {
				r = 1;
			}
		};
		var interval = setInterval(slider, 5000);

		// when the user hovers in, clear the interval; if they hover out, restart it again
		$('#slideshow-carousel').hover(function() {
			clearInterval(interval);
		},function() {
			interval = setInterval(slider, 5000);
		});
	});


	//Carousel Tweaking
	function mycarousel_initCallback(carousel) {
		// Pause autoscrolling if the user moves with the cursor over the clip.
		carousel.clip.hover(function() {
			carousel.stopAuto();
		}, function() {
			carousel.startAuto();
		});
	}

	function showDetails(a){
		$(".details-box").hide();
		$(a).show();
	}

	function hideDetails(){
		$(".details-box").hide();
	}

</script>

<div id="content" class="class-details"> <!-- content: start -->

	<?php while ( have_posts() ) : the_post(); ?>
	<?php echo "<h1>" . get_the_title() ."</h1>"; ?>
    <?php
    	$postID = get_the_ID();
		if (($postID==4191)||($postID==46)) {
			echo "<style>";
			echo ".info-box1 {min-height: 270px;}";
			echo "</style>";
		}
	?>

  	<div class="breadcrum">
  		<p>
  			<?php
			if (get_post_meta($postID, 'breadcrumb_' . $currentLang, true)!=""){
				echo get_post_meta($postID, 'breadcrumb_' . $currentLang, true);
			}
			else{
				if($currentLang == "en"){ echo "<a href=\"http://synstudio.ca/classes/\"/>All Classes</a>"; }
				else { echo "<a href=\"http://synstudio.ca/cours-arts/\"/>Toutes les classes</a>"; }
			}
			?>
		</p>
   	</div>

  	<div style="display: none;"><?php the_content(); ?></div>

 	<div id="col1" onmouseover="hideDetails();"> <!-- column 1: start -->

   		<div id="welcomeHero">

     		<?php // $postID = get_the_ID(); ?>

    		<div id="slideshow-main">
      			<ul></ul>
     		</div>

     	<div id="slideshow-carousel"><ul id="carousel" class="jcarousel jcarousel-skin-tango"></ul></div>

     	<script type="text/javascript">

		 		<?php
				/*	echo get_post_meta($postID, 'slideshow_' . $currentLang, true);
						A loop field named "slider" with sub-fields "image"
				    It uses the Custom Field Suite plugin's loop functionality.
				    Prints Javascript snippet for the slider code in next blocks of code.
				*/

				    if($currentLang=="en"){
						$fields = CFS()->get('slider');
					}
					else{
						$fields = CFS()->get('slider',$translationID);
					}
					$i=0;
					foreach ((array)$fields as $field) {
						$i++;
						echo "var slide".$i." = { \n";
					    echo "slideLarge:\"".$field['image'];
					    echo "\",\n";

					    $slideID = get_attachment_id($field['image']);
					    $thumbSource = wp_get_attachment_image_src($slideID,'slidethumb',false);

					    if(empty($field['small_image'])){
					    	echo "slideSmall:\"".$thumbSource[0];
						}
						else{
							echo "slideSmall:\"".$field['small_image'];
						}
					    echo "\",\n";
					    if($currentLang=="en"){
					    	echo "slideText1:\"".$field['text1'];
					    }
					    else{
					    	echo "slideText1:\"".$field['text2'];
					    }
					    echo "\",\n";
					    if($currentLang=="en" && $field['text3']!=""){
					    	echo "slideText2:\"&nbsp;&nbsp;Level <span class='Website-Body-Text-C0'>".$field['text3'];
					    }
					    elseif($currentLang=="fr" && $field['text3']=="General"){
					    	echo "slideText2:\"&nbsp;&nbsp;Niveau <span class='Website-Body-Text-C0'>GÉNÉRAL";
					    }
					    elseif($currentLang=="fr" && $field['text3']=="Special"){
					    	echo "slideText2:\"&nbsp;&nbsp;Niveau <span class='Website-Body-Text-C0'>SPÉCIAL";
					    }
					    elseif($currentLang=="fr" && $field['text3']=="Advanced"){
					    	echo "slideText2:\"&nbsp;&nbsp;Niveau <span class='Website-Body-Text-C0'>AVANCÉ";
					    }
					    elseif($field['text3']==""){
					    	if($currentLang=="en" || $currentLang=="fr"){
					    		echo "slideText2:\"<span class='Website-Body-Text-C0'>";
					    	}
					    }
					    else{
					    	echo "slideText2:\"&nbsp;&nbsp;Niveau <span class='Website-Body-Text-C0'>".$field['text3'];
					    }
					    echo "</span><span class='Website-Body-Text-C1'>".$field['text4'];
					    echo "</span>";
					    echo "\",\n";
					    if($currentLang=="en"){
					    	echo "slideLink:\"".$field['link'];
					    }
					    else{
					    	echo "slideLink:\"".get_permalink();
					    }
					    echo "\",\n";
					    echo "}; \n";
					}
				?>

			//Find out number of Slides
			var totalSlides2 = 0;
			<?php
				for ($countVble0 = 1; $countVble0 <= 50; $countVble0++) {
					echo "if( typeof slide".$countVble0." != 'undefined' ) {";
					echo "totalSlides2++;";
					echo "} else { }";
				}
			?>

			for (var i2=1; i2<=totalSlides2; i2++){

				//Items for Large Image
				if (i2==1) {
					var listItem = "<li class='p" + i2 + " active'><a href=''><img src='' width='545' height='342' alt=''/><span class='opacity'></span><span class='content'><h1></h1><p></p></span></a></li>";
				}
				else {
					var listItem = "<li class='p" + i2 + "'><a href=''><img src='' width='545' height='342' alt=''/><span class='opacity'></span><span class='content'><h1></h1><p></p></span></a></li>";
				}

				$("#slideshow-main ul").append(listItem);

				//Items for Small Image
				var listItemSmall = "<li><a href='#' rel='p" + i2 + "'><img id='p" + i2 + "ImageSmall' src='' width='154' height='127' alt='#'/></a></li>";
	          	$("#slideshow-carousel ul").append(listItemSmall);
			}

			//count array elements
			var arrayElements = "";
			for (var countVble=1; countVble<=totalSlides2; countVble++){
				arrayElements = arrayElements + "var count"+countVble+" = 0;";
				arrayElements = arrayElements + "for (i in slide"+countVble+") {";
				arrayElements = arrayElements + "if (slide"+countVble+".hasOwnProperty(i)) {";
				arrayElements = arrayElements + "count"+countVble+"++;";
				arrayElements = arrayElements + "}";
				arrayElements = arrayElements + "}";
			}
			eval(arrayElements);

			//Apply array values
			for (var i2=1; i2<=totalSlides2; i2++){
				var builtSlide1 = "$('.p" + i2 + " a').attr('href',slide" + i2 + ".slideLink); $('.p" + i2 + " img').attr('src',slide" + i2 + ".slideLarge); $('#p" + i2 + "ImageSmall').attr('src',slide" + i2 + ".slideSmall);";
				var builtSlide2 = " $('.p" + i2 + " h1').append(slide" + i2 + ".slideText1); $('.p" + i2 + " p').append(slide" + i2 + ".slideText2);";
				var slideTest = "count" + i2;
				if ((eval(slideTest)!=3)||eval(slideTest)!=2) {
					eval(builtSlide1)
					if (eval("slide" + i2 + ".slideText1")!="") {
						eval(builtSlide2)
					}
					else {
						var hideSection = " $('.p" + i2 + " h1').css('display','none'); $('.p" + i2 + " p').css('display','none');";
						eval(hideSection)
					}
				}
				else{
					eval(builtSlide1)
					var hideSection = " $('.p" + i2 + " h1').css('display','none'); $('.p" + i2 + " p').css('display','none');";
					eval(hideSection)
				}
			}

		</script>

     	<div class="clear"></div>

   	</div>

</div> <!-- column 1: end -->

<div id="col2"> <!-- column 2: start -->

	<!-- Triggers effects on the boxes on right on mouseover -->
	<?php if ($currentLang == "en") { ?>
		<a href="#" id="lnk-teacherInfo" onmouseover="showDetails('#cnt-teacherInfo')">Teacher Info</a>
		<a href="#" id="lnk-description" onmouseover="showDetails('#cnt-description')">Description</a>
		<a href="#" id="lnk-courseOutline" onmouseover="showDetails('#cnt-courseOutline')">Course Outline</a>
		<a href="#" id="lnk-schedule" onmouseover="showDetails('#cnt-schedule')">Schedule</a>
		<a href="#" id="lnk-preRequisites" onmouseover="showDetails('#cnt-preRequisites')">Pre-Requisites</a>
	<?php } else { ?>
		<a href="#" id="lnk-teacherInfo" onmouseover="showDetails('#cnt-teacherInfo')"> À propos du prof</a>
		<a href="#" id="lnk-description" onmouseover="showDetails('#cnt-description')">Description</a>
		<a href="#" id="lnk-courseOutline" onmouseover="showDetails('#cnt-courseOutline')">Plan de cours</a>
		<a href="#" id="lnk-schedule" onmouseover="showDetails('#cnt-schedule')">Horaire</a>
		<a href="#" id="lnk-preRequisites" onmouseover="showDetails('#cnt-preRequisites')">Pré-requis</a>
	<?php } ?>

</div> <!-- column 2: end -->

<!-- Content boxes at the bottom -->
<div id="cnt-teacherInfo" class="details-box">
  	<h3><?php
  		if($currentLang=="en"){ ?>
	  		Teacher Information
	  	<?php } else{ ?>
	  		À PROPOS DES PROFESSEUR
	  	<?php } ?>
  	</h3>
	<div class="text">
		<?php
		if($currentLang=="en"){
			$attachment_id1 = get_post_meta($postID, 'teacher_photo1', true);
			$attachment_id2 = get_post_meta($postID, 'teacher_photo2', true);
		}
		else{
			$attachment_id1 = get_post_meta($translationID, 'teacher_photo1', true);
			$attachment_id2 = get_post_meta($translationID, 'teacher_photo2', true);
		}
		?>
		<div class="thumbnail"><?php echo wp_get_attachment_image($attachment_id1, small); echo wp_get_attachment_image($attachment_id2, small); ?></div>
		<?php echo get_post_meta($postID, 'teacher_info_' . $currentLang, true); ?>
	</div>
	<div class="bgd-box"></div>
</div>

<div id="cnt-courseOutline" class="details-box">
	<h3><?php
  		if($currentLang=="en"){ ?>
	  		Course Outline
	  	<?php } else{ ?>
	  		PLAN DE COURS
	  	<?php } ?>
  	</h3>
   	<div class="text"><?php echo get_post_meta($postID, 'course_outline_' . $currentLang, true); ?></div>
   	<div class="bgd-box"></div>
</div>

<div id="cnt-schedule" class="details-box">
  	<h3><?php if($currentLang=="en"){?> Schedule <?php } else{ ?> HORAIRE <?php } ?></h3>
   	<div class="text"><?php echo get_post_meta($postID, 'schedule_' . $currentLang, true); ?></div>
   	<div class="bgd-box"></div>
</div>

<div id="cnt-description" class="details-box">
  	<h3><?php if($currentLang=="en"){?> Description <?php } else{ ?> DESCRIPTION <?php } ?></h3>
   	<div class="text"><?php echo get_post_meta($postID, 'description_' . $currentLang, true); ?></div>
   	<div class="bgd-box"></div>
</div>

<div id="cnt-preRequisites" class="details-box">
	<h3><?php
  		if($currentLang=="en"){ ?>
	  		Pre-requisite
	  		<?php }
  		else{ ?>
  			PRÉ-REQUIS
	  		<?php
  		} ?>
  	</h3>
   	<div class="text"><?php echo get_post_meta($postID, 'pre_requisite_' . $currentLang, true); ?></div>
   	<div class="bgd-box"></div>
</div>
<!-- content boxes: end -->

<!-- column 3: start -->
<div id="col3" onmouseover="hideDetails();">
	<div id="registration" class="info-box1Wrapper infobox-classpage">
	  	<div class="info-box1">
	  		<h2><?php if($currentLang=="en"){?> Registration <?php } else{ ?> Inscription <?php } ?></h2>
			<div class="text"><?php echo get_post_meta($postID, 'registration_info_' . $currentLang, true); ?>
				<?php
	                if($currentLang=="en"){$class_offered = get_post_meta($postID, 'class_offered', true); }
	                else{ $class_offered = get_post_meta($translationID, 'class_offered', true); }
	                if($class_offered == "1"){ ?>
						<h3>
							<?php
						 	if ($currentLang=="en"){
						 		if(!in_category('workshops') && $postID != 8397){
									echo $redundant_options['deadline_en'];

									/*if (($today > $sevenBeforeERD) && ($today < $earlyRegistrationDate)){
										echo "<br>".$options['early_deadline_en']." ".$earlyRegistrationDatePretty->format('F j, Y')." at 11:59 PM";
	    							}
	    							if (($today > $earlyRegistrationDate) && ($today < $sevenBeforeLRD)){
										echo "<br>Registration Deadline is: ".$sevenBeforeLRDPretty->format('F j, Y')." at 11:59 PM";
	    							}
	    							if (($today > $sevenBeforeLRD) && ($today < $lateRegistrationDate)){
										echo "<br>".$options['late_deadline_en']." ".$lateRegistrationDatePretty->format('F j, Y')." at 11:59 PM";
	    							}*/
								}
							}
							else {
							 	if(!in_category('workshops-fr') && $postID != 11019){
									echo $redundant_options['deadline_fr'];

									/*$locale = 'fr_FR.utf8';
									setlocale(LC_ALL, $locale);
									if (($today > $sevenBeforeERD) && ($today < $earlyRegistrationDate)){
										echo "<br>".$options['early_deadline_fr']." ".strftime('%d %B %Y', strtotime($earlyRegistrationDatePretty->format('F j, Y')))." à 23h59.";
	    							}
	    							if (($today > $earlyRegistrationDate) && ($today < $sevenBeforeLRD)){
										echo "<br>Date limite d'inscription est: ".strftime('%d %B %Y', strtotime($sevenBeforeLRD->format('F j, Y')))." à 23h59.";
	    							}
	    							if (($today > $sevenBeforeLRD) && ($today < $lateRegistrationDate)){
										echo "<br>".$options['late_deadline_fr']." ".strftime('%d %B %Y', strtotime($lateRegistrationDatePretty->format('F j, Y')))." à 23h59.";
	    							}*/
	    						}
							}
							?>
						</h3>
					<?php } ?>
			</div></br>

			<div> <!-- Paypal Code: show it if the class is offered -->
				<?php
					if($class_offered == "1"){
				 		echo get_post_meta($postID, 'paypal_button_' . $currentLang, true);
				 	}
				?>
			</div>

	   	</div>
  	</div>

	<div class="info-box1Wrapper infobox-classpage">
  		<div class="info-box1">
  			<h2><?php if($currentLang=="en"){?> Info <?php } else{ ?> Infos <?php } ?></h2>
    		<div class="text"><?php echo get_post_meta($postID, 'class_info_' . $currentLang, true); ?></div>
   		</div>
  	</div>


	<?php
	// Close loop before div Column 3 closes, to add Newsletter Box independently
		endwhile; // end of the loop.
	?>

   	<!-- Join Our Newsletter : start -->
   	<?php
   		$cat = 'General';
   		$catID = get_cat_ID($cat);
   		query_posts('cat=' . $catID);
   		while (have_posts()) : the_post();
   		$postID = get_the_ID();
   		if ($postID = "145") {
   			echo "<div id='newsletter-box' class='info-box1Wrapper infobox-classpage'>";
   				echo "<div class='info-box1'>";
   					echo '<h2>' . get_the_title() . '</h2>';
   					echo "<div class='text'>";
   						the_excerpt();
   						the_content();
   					echo "</div>";
   				echo "</div>";
   			echo "</div>";
   		}

   		endwhile;
    ?>

</div> <!-- column 3: end -->
</div> <!-- content: end -->

<?php get_footer(); ?>
