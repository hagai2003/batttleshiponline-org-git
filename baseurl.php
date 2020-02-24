<?php

// CSS files should reside in /includes/template-name/
//  - general.css is always included
//  - $theme.css is included only if $include_theme_css=true

$flip_debug_mode = false;		// reverse the automatically suggested $debug_mode, localhost => if false => debug on , server => if true => debug on

// -----------------
// template info
// -----------------
$template_name="pacxon";		// template name   // pacxon , digsolitaire
$include_theme_css = false;		// should include CSS of theme (e.x. color)
$theme = "purple";				// name of the css file and artwork folder

$lang ="en";				// interface language (for p,nep)
$meta_charset = "UTF-8";	// meta charset
$meta_language = "en";		// for the html meta language tag
$google_cse_lang = "en";	// lower case, 2 char langauge id - for google search box message
$showPacxonTopAdsInsteadOfSide=false;
$showPacxonTopAdsInsteadOfSide720=true;

// ----------------
// Misc accounts
// ----------------
$addthis_pubid = "hagai2003";
$google_analytics_pubid = "UA-869385-35";
$google_cse_unique_id = "003904161240944717949:frqhmb0muro";
$addthis_display2=true;

// ------------------------------
// site name, url and basic info
// ------------------------------
$website_title_name="Battleship Online";			// DigSolitaire - header title (Hagai)  - e.x. Pacxon, Dig Solitaire, Web Hangman
$website_title_desc="Battleship Online";		// DigSolitaire - header short desc (Hagai)

$website_single_word_name="Battleship";    // used in places like 'Here are a few more articles about Solitaire'

$digsolitaire_flip_header_h1=true;							// flip h1 and h3 in header of digsolitaire template (valid for digsolitaire.com)

$site_creation_year = "2012"; // for footer message "copyright [xxxx]-[this year]
$site_name_with_tld = "Battleshiponline.org";  // only first letter is upper-case
$site_name_for_index = "BattleshipOnline.org"; // all first letters of words are upper-case - e.x. - WildWildTaxi.net

$site_base_url = "https://www.".strtolower($site_name_with_tld);
$site_base_url_local = "http://localhost/";

$site_name_for_terms = $site_name_with_tld;						// the site name that will appear in the terms of use page
$site_name_for_terms_caps = strtoupper($site_name_with_tld);	// the site name that will appear in the terms of use page

$menuAdditionalItem="<li><div style='line-height:22px'>&nbsp;</div></li><li><span style='margin-left:15px;color:white;'><b>More Games:</b></span></li><li><a target=\"_blank\" href=\"https://www.webpacman.com\">Pacman</a></li><li><a target=\"_blank\" href=\"https://www.solitaireking.com\">Solitaire</a></li><li><a target=\"_blank\" href=\"https://www.livesudoku.com\">Sudoku</a></li><li><a target=\"_blank\" href=\"https://www.digbejeweled.com\">Bejeweled</a></li><li><a target=\"_blank\" href=\"https://www.jspuzzles.com\">Free Jigsaw Puzzles</a></li>";

// ------------------------------------------------------------------------------
// some titles of pages and divs (links page, contact [age, articles page)
// ------------------------------------------------------------------------------
$header_index_page=$website_title_name;								// either '$website_title_name' or '$site_name_for_index'
$header_links_page=$website_title_name." Links";					// links page header
$header_contact_page="Contact Us";									// contact page
$header_more_articles_page="More Info About ".$website_title_name;	// used for more_articles PAGE when it appears
$articles_div_h3_header   ="More Info About ".$website_title_name;  // used for more_articles DIV in digsolitaire h3 title of articles div on main page when articles number > 0
$games_div_h3_header	  ="Play More ".$website_title_name." Games";				// used for more_games DIV in digsolitaire games box below games in every games page

$logo_image_filename=strtolower(str_replace (" ","",$website_title_name)."-logo.png");	// logo file namee.x. "wildwildtaxi-logo.jpg";
$logo_image_alt = $website_title_name;													// logo alt
$logo_image_width=400;  // doesn't have to be set
$logo_image_height=400; // doesn't have to be set

$head_favicon=strtolower(str_replace (" ","",$website_title_name)."-favicon.png");	// logo file namee.x. "wildwildtaxi-favicon.jpg";
$GLOBALS['favicon']="uartwork/battleship-og-img.png";
$gameicon_prefix = "gicons";		// name of icons folder
$gameicon_type = "jpg";				// type of game icons
$gameicon_file_prefix = "thumb-";	// prefix for each icon file (can be empty)

// ---------------------
// Social stuff
// ---------------------
$includePlusOne=false;

$opengraph_sitename = $website_title_name;
$facebook_comments_admin_user = "628029191";
$facebook_app_id = "";
$facebook_include_og_tags = true;

// -----------------------
// template menu options
// -----------------------
$main_menu_number_of_games=6;			// how many items to show in menu (items = anything, not only games)
$main_menu_show_links_page=true;		// show links page on main
$main_menu_show_contactus_page=true;	// show contact page on main
$main_menu_show_more_articles_page_if_relevant=false;  // show 'more-articles' page in menu if number of valid menu items exceeds $main_menu_number_of_games
$index_game_thumb_class="imgThumb";		// <img> class when displaying game icons in main menu

// ---------------------------------------------------
// digsolitaire games thumbs table on index page
// ---------------------------------------------------
$index_games_per_line=4;

// ---------------------------------------------------
// digsolitaire games sub-menu (menu below games) options
// ---------------------------------------------------
$games_menu_games_per_line=4;   // (number of columns)

// width of every column:
$game_table_column1=170;
$game_table_column2=140;
$game_table_column3=140;
$game_table_column4=150;

$index_games_max_games=12;
$index_game_thumb_width=131;
$index_game_thumb_height=89;
$games_menu_games_max_games=16;

// ---------------------------------------------
//  ads MUST use this format:
// ---------------------------------------------
//  adname_SIZE_ad_include = true/false
//  adname_SIZE_ad_type = adsense, cpmstar etc
//
// ---------------------------------------------
//	e.x. variables & file name:
// ---------------------------------------------
//	$homepage_728x90_ad_type = "adsense";
//	$homepage_728x90_ad_type = "adsense";
//  inc-ad-homepage_728x90-adsense.php
// ---------------------------------------------

$homepage_728x90_ad_include = true;
$homepage_728x90_ad_type = "adsense"; // cpmstar or adsense

$homepage_160x600_ad_include = false;
$homepage_160x600_ad_type = "adsense"; // cpmstar or adsense

$gamepage_728x90_ad_include = true;
$gamepage_728x90_ad_type = "adsense";

$gamepage_160x600_ad_include = false;
$gamepage_160x600_ad_type = "adsense";

$gamepage_300x250_ad_include = false;
$gamepage_300x250_ad_type = "adsense";

$debug_ads_url_prefix = "/includes/assets/img/ad_728";

// -----------------------
// footer stuff
// -----------------------
$footer_link_to_homepage = true; // add link to homepage on non-index pages
$footer_link_to_homepage_anchor = $website_title_name;

// ---------------------
// for upload module
// ---------------------
$gameicon_width = 120;   // For uploader
$gameicon_height = 90;   // For uploader
$screenshots_width = 450;   // For uploader
$screenshots_height = 250;   // For uploader

// --------------------------------------------
// contact page info (image is auto-generated)
// --------------------------------------------
$contact_image_filename="contactus.png";   // contact us image
$contact_image_background_color = array("0", "0", "0"); // black
$contact_image_text_color= array("255", "255", "255"); // white
$contact_image_font = "arial.ttf";
$contact_email="admin@".strtolower($site_name_with_tld);
$contact_image_font_size= 14;
$contact_image_width= 250;
$contact_image_height= 40;

//=======================================================
//
//       Don't change anything beyond this point
//
// ======================================================
//
$version = 3;
$subversion = 0;
global $conn5;

function establish_db()
{
	global $conn5;
	$GLOBALS['workoffline'] = false;

	if ((isset($GLOBALS['dbonoff'])) && ($GLOBALS['dbonoff'] == true))
	{
		if ((isset($_SERVER['HTTP_HOST'])) && ($_SERVER['HTTP_HOST'] == "localhost"))
		{
			$conn5 = mysqli_connect("localhost", "root", "root") or $GLOBALS['workoffline'] = true;  // host/user/pass
//			$conn5 = mysqli_connect("localhost", "root", "") or $GLOBALS['workoffline'] = true;  // host/user/pass
			mysqli_select_db($conn5,"battleships") or $GLOBALS['workoffline'] = true;
		}
		else
		{
//			$conn5 = mysqli_connect("hagaizenberg.dyndns.org", "mongoose", "cola5595") or $GLOBALS['workoffline'] = true;  // host/user/pass
//			$conn5 = @mysqli_connect("man839a0z.db.8759362.hostedresource.com", "man839a0z", "ii89aaapOIOa") or $GLOBALS['workoffline'] = true;
			$conn5 = mysqli_connect("localhost", "avatarga_battle", "dd4\$fkoDx") or $GLOBALS['workoffline'] = true;  // host/user/pass
			@mysqli_select_db($conn5,"avatarga_battles") or $GLOBALS['workoffline'] = true;
		}

		if (!$GLOBALS['workoffline'])
		{
			mysqli_query($conn5,"SET character_set_results=utf8");
		}
		if ($GLOBALS['workoffline'] && !$GLOBALS['allow_offline_mode'])
		{
			echo "The site is down for maintenance, Please check back later.";
			exit();
		}
	}
	else
	{
		$GLOBALS['workoffline'] = true;
	}
}
establish_db();
?>
