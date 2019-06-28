<?php
global $showPacxonSideAd;
global $showPacxonTopAdsInsteadOfSide;
global $showPacxonTopAdsInsteadOfSide720;
// if this is set, ads will appear on top of the games with 720
if ($showPacxonTopAdsInsteadOfSide720)
{
	$showPacxonSideAd=false;
?>
	<?php if ($GLOBALS['gamepage_728x90_ad_include'])
	{
	?>
	<div style="line-height:9px;"><br/></div>
	<?php adsystem("gamepage_728x90"); ?>
	<div style="line-height:22px;"><br/></div>
	<?php
	}
	?>

<?php
}
?>
<?php echo get_current_page_content("section1");?>
<?php echo get_current_page_content("section2");?>