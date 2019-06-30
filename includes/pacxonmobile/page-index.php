<?php
global $showPacxonSideAd;
global $showPacxonTopAdsInsteadOfSide;
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
<td width="10px;">
&nbsp;
</td>
<td align="right">
	<?php adsystem("allpage_responsive");     ?><div style="line-height:20px;">&nbsp;</div>
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
	<?php if ($GLOBALS['homepage_728x90_ad_include'])
	{
	?>
	<div style="line-height:9px;"><br/></div>
	<?php adsystem("allpage_responsive");     ?><div style="line-height:20px;">&nbsp;</div>
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
if ($showPacxonTopAdsInsteadOfSide)
{
?>
<div style="line-height:14px;"><br/></div>
<hr class="hr1" width="774px;" noshade="noshade"/>
<div style="line-height:7px;"><br/></div>
<?php
}
?>
<?php echo get_current_page_content("section2");?>
