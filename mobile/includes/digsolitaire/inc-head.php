<?php 
$page_metatitle = get_current_page_content("metatitle");
if ($page_metatitle=="")
{
	$page_metatitle = get_current_page_content("gamename");
}
$page_metadescription = get_current_page_content("metadescription");
$page_keywords = get_current_page_content("metatags");

// ---------------------------------------------------------------------
// checking if it's a game page and if so - showing specific thumb
// ---------------------------------------------------------------------
$pagename=get_current_full_uri();
$pagetype=get_page_content($pagename,'type');

if ($pagetype == 'game')
{
	$pageThumb=returnbaseurl().$GLOBALS['gameicon_prefix'].'/'.$GLOBALS['gameicon_file_prefix'].$pagename.".".$GLOBALS['gameicon_type'];
}
else
{
	$pageThumb=returnbaseurl().$GLOBALS['uartwork_prefix'].'/'.$GLOBALS['logo_image_filename'];
}
$faveIcon=returnbaseurl().$GLOBALS['uartwork_prefix'].'/'.$GLOBALS['logo_image_filename'];   // favicons is always the website's logo

?>
<title><?php echo $page_metatitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $GLOBALS['meta_charset'];?>"/>
<meta http-equiv="Content-Language" content="<?php echo $GLOBALS['meta_language'];?>" />
<meta name="language" content="<?php echo $GLOBALS['meta_language'];?>"/>
<meta name="keywords" content="<?php echo $page_keywords;?>" />
<meta name="description" content="<?php echo $page_metadescription;?>" />
<base href="<?php echo getbaseurl();?>" />
<?php

// -----------------
// facebook headers
// -----------------
if ($GLOBALS['facebook_include_og_tags'] == true)
{
?>
<meta property="og:title" content="<?php echo $page_metatitle;?>" />
<meta property="og:type" content="game" />
<meta property="og:url" content="<?php echo returnhomepage().$_SERVER['REQUEST_URI'];?>" />
<meta property="og:image" content="<?php echo $pageThumb;?>" />
<meta itemprop="image" content="<?php echo $pageThumb;?>" />
<meta property="og:description" content="<?php echo $page_metadescription;?>" />
<meta property="og:site_name" content="<?php echo $GLOBALS['opengraph_sitename'];?>" />
<?php
}

if ($GLOBALS['facebook_comments_admin_user'] != "")
{
?>
<meta property="fb:admins" content="<?php echo $GLOBALS['facebook_comments_admin_user'];?>"/>
<?php
}

if ($GLOBALS['facebook_app_id'] != "")
{
?>
<meta property="fb:app_id" content="<?php echo $GLOBALS['facebook_app_id'];?>"/>
<?php
}
?>
<link rel="shortcut icon" href="<?php echo $faveIcon;?>" />
<?php
// trying to include website specific css - e.x. - galaga.css
// otherwise including general.css
if (@file_exists(strtolower($GLOBALS['website_single_word_name']).".css"))
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo returnbaseurl().strtolower($GLOBALS['website_single_word_name']).".css";?>" />
<?php  }
else {
?>
<link rel="stylesheet" type="text/css" href="<?php echo returnbaseurl();?>general.css"/>
<?php } ?>
<?php if ($GLOBALS['include_theme_css']) {?>
<link rel="stylesheet" type="text/css" href="<?php echo returnbaseurl().$GLOBALS['theme'];?>.css"/>
<?php } ?>
<?php
if ($GLOBALS['include_google_analytics'])
{
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $GLOBALS['google_analytics_pubid']; ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php
}
?>

<script type="text/javascript">
function updateScores(novel_gameid,duration)
{
	//alert(novel_gameid+duration);

	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser does not support Ajax reqeusts!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			//document.myForm.time.value = ajaxRequest.responseText;
			document.getElementById('highscoreDiv').innerHTML=ajaxRequest.responseText;//.innerHtml=ajaxRequest.responseText;

			//document.getElementById('recent').className="whiteColorDuration";
			document.getElementById('thisweek').className="whiteColorDuration";
			document.getElementById('thismonth').className="whiteColorDuration";
			document.getElementById('alltimes').className="whiteColorDuration";

			document.getElementById(duration).className += " aunderline";

			//alert(document.getElementById('highscoreDiv'));
			//alert(document.getElementById('highscoreDiv').innerHTML);
			//alert(ajaxRequest.responseText);
		}
	}
	request="/updateScores.php?gameid="+novel_gameid+"&duration="+duration;
	//alert(request)
	ajaxRequest.open("GET",request , true);
	ajaxRequest.send(null); 
}
</script>

