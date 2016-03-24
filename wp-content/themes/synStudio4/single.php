<?php
/*
	Concept Art & Design Workshop and Masterclass
	Load different templates based on the type of class we offer.
*/
$postID = get_the_ID();
if($postID==6502){ get_header("masterClass");} // activate header-masterClass.php, header-masterClass2.php and so on.
elseif($postID==10088){ get_header("masterClass2"); }
elseif ($postID==10212) { get_header("masterClass3"); }
elseif ($postID==10320 || $postID==12105 || $postID==12106) { get_header("masterClass4"); }
elseif ($postID==12457 || $postID==12459) { get_header("masterClassArtstation"); }
elseif ($postID==12458 || $postID==12460) { get_header("masterClassWacom"); }
else{ get_header(); }

if ( have_posts() ) { the_post(); rewind_posts(); }

if ( in_category(4) || in_category(48) ) {
	if ($postID==6502) { include(TEMPLATEPATH . '/singleClassMaster.php'); } // masterclass
	elseif ($postID==12105 || $postID==12106 || $postID==12457 || $postID==12458 || $postID==12459 || $postID==12460) { include(TEMPLATEPATH . '/masterclass.php'); } // masterclass
	elseif ($postID==8397 || $postID==11019) { include(TEMPLATEPATH . '/singleIntenseClassDetail.php'); } // this is template for full time intensive
	else { include(TEMPLATEPATH . '/singleClassDetail.php'); } // regular class
}
else{
	if ( in_category(1) ) { include(TEMPLATEPATH . '/singleNewsletter.php'); }
  	else{
		if(in_category(8) || in_category(92)){ include(TEMPLATEPATH . '/singlePodcast.php'); }
		elseif (in_category(29) || in_category(95)){ include(TEMPLATEPATH . '/singleInterview.php'); }
		else{include(TEMPLATEPATH . '/singleDefault.php'); }
	}
}

get_footer();

?>
