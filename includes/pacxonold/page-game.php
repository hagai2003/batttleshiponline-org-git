<?php
global $showPacxonSideAd;
global $showPacxonTopAdsInsteadOfSide;
global $showPacxonTopAdsInsteadOfSide720;
// if game is big - don't show side ads
if (is_numeric(get_current_page_content("objectwidth")) & get_current_page_content("objectwidth")>610)
{
	$showPacxonSideAd=false;
}
// if this is set, ads will appear on top of the games
if ($showPacxonTopAdsInsteadOfSide)
{
	$showPacxonSideAd=false;
?>
<table width="750px;" style="margin-top:8px;">
<tr>
<td align="left" valign="top">
	<?php echo get_current_page_content("section1");?>
</td>
<td width="25px">
	&nbsp;
</td>
<td align="right">
	<?php adsystem("gamepage_300x250"); ?>
</td>
</tr>
</table>
<?php
if ($showPacxonTopAdsInsteadOfSide)
{
?>
<div style="line-height:16px;"><br/></div>
<hr class="hr1" width="774px;" noshade="noshade"/>
<div style="line-height:11px;"><br/></div>
<?php
}
?>
<?php
}
// if this is set, ads will appear on top of the games with 720
elseif ($showPacxonTopAdsInsteadOfSide720)
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
	<div>
	<?php echo get_current_page_content("section1");?>
	</div>
<?php
}
else
{
?>
<?php echo get_current_page_content("section1");?>
<?php
}
?>
<p style="margin-left:0px;margin-top:20px;border:<?php echo get_current_page_content("objectborder");?>px solid #<?php echo $GLOBALS['game_object_border_color'];?>;width:<?php echo get_current_page_content("objectwidth");?>px;height:<?php echo get_current_page_content("objectheight");?>px;">
<?php 
$script=get_current_page_content("gamescript");
if (strpos($script,"script") || strpos($script,"object")) 
{ 
	// if "gameinstruction" has "<script" in it we assume novelgames (or other embedded game) 
	echo $script;
}
else
{
?>
<object width="<?php echo get_current_page_content("objectwidth");?>" height="<?php echo get_current_page_content("objectheight");?>"><param name="salign" value="<?php echo get_current_page_content("objectalign");?>"/><param name="align" value="<?php echo get_current_page_content("objectalign");?>"/><param name="movie" value="games/<?php echo get_game_swf_name();?>.swf"/><param name="allowFullScreen" value="true"/><embed src="games/<?php echo get_game_swf_name();?>.swf" allowfullscreen="true" align="<?php echo get_current_page_content("objectalign");?>" salign="<?php echo get_current_page_content("objectalign");?>" type="application/x-shockwave-flash" width="<?php echo get_current_page_content("objectwidth");?>" height="<?php echo get_current_page_content("objectheight");?>"></embed></object>
<?php
}
?>
</p>
<?php echo get_current_page_content("section2");?>