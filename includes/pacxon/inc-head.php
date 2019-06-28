<?php 
include("includes/Mobile_Detect.php");
global $mobileDetect;
$mobileDetect = new Mobile_Detect;

if ($mobileDetect->isMobile()) { 
$homepage_728x90_ad_include = false;
$homepage_160x600_ad_include = false;
$gamepage_728x90_ad_include = false;
$gamepage_160x600_ad_include = false;
$gamepage_300x250_ad_include = false;
$allpage_responsive_ad_include = true;
$allpage_responsive_ad_type = "adsense";
}

$page_metatitle = get_current_page_content("metatitle");
$page_metadescription = get_current_page_content("metadescription");
$page_keywords = get_current_page_content("metatags");

if (isset($GLOBALS['favicon']))
{
	$faveIcon=returnbaseurl().$GLOBALS['favicon'];   // favicons is always the website's logo
}
else
{
	$faveIcon=returnbaseurl().$GLOBALS['uartwork_prefix'].'/'.$GLOBALS['logo_image_filename'];   // favicons is always the website's logo
}
?>
<title><?php echo $page_metatitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $GLOBALS['meta_charset'];?>"/>
<meta http-equiv="Content-Language" content="<?php echo $GLOBALS['meta_language'];?>" />
<meta name="language" content="<?php echo $GLOBALS['meta_language'];?>"/>
<meta name="keywords" content="<?php echo $page_keywords;?>" />
<meta name="description" content ="<?php echo $page_metadescription;?>" />
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
<meta property="og:image" content="<?php echo $faveIcon;?>" />
<meta property="og:description" content="<?php echo $page_metadescription;?>" />
<meta name=viewport content="width=device-width, initial-scale=1">
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
<link rel="shortcut icon" href="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix'].'/'.$GLOBALS['head_favicon']?>" />
<?php if ($mobileDetect->isMobile()) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo returnbaseurl();?>generalmobile.css"/>
<?php } else { ?>
<link rel="stylesheet" type="text/css" href="<?php echo returnbaseurl();?><?php echo $GLOBALS['general_css'];?>"/>
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
