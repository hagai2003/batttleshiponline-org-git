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
	<?php adsystem("allpage_responsive");    ?>
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
	<?php adsystem("allpage_responsive");     ?>
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
<div style="line-height:10px;">&nbsp;</div>
<script> 
var originalW = <?php echo get_current_page_content("objectwidth");?>;
var originalH = <?php echo get_current_page_content("objectheight");?>;
var gameSWF = 'games/<?php echo get_game_swf_name();?>.swf';
</script>
<div id="gameObjectHolder" style="text-align:center;border-radius: 5px;margin-top:5px;margin-bottom:5px;">
	You need to install Flash in order to play this game in your browser.
</div>
<?php
}
?>
<?php echo get_current_page_content("section2");?>