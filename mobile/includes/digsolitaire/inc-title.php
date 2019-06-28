<noscript>
<h1><?php echo get_current_page_name(); ?></h1>
<?php p('h109');?> <?php echo get_current_page_name();?>.<br/><?php echo get_current_page_content("metadescription");?>
</noscript>
<table style="width:920px;height:60px;padding-top:5px;margin-bottom:5px;border:0;" cellspacing="0" cellpadding="0">
<tr>
<td style="width:80px;" align="center"><a href="<?php echo gethomepage();?>"><img style="border-style:none" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix'].'/'.$GLOBALS['logo_image_filename']?>" alt="<?php echo $GLOBALS['logo_image_alt']?>" /></a>&nbsp;&nbsp;</td>
<?php if (!$GLOBALS['digsolitaire_flip_header_h1'])
{  // option1 - not flipping h1 and h2) 
?>
<td style="width:600px;">
<h1 class="logo" style="display:inline"><?php echo $GLOBALS['website_title_name']; ?></h1><span class="tagline"> | </span>
&nbsp;&nbsp;
<h2 class="tagline" style="display:inline;"><?php echo $GLOBALS['website_title_desc'];?></h2>
</td>
<?php 
}
else 
{ // option2 - flipping h1 and h2) ?>
<td style="width:600px;">
<h2 class="logo" style="display:inline"><?php echo $GLOBALS['website_title_name']; ?></h2><span class="tagline"> | </span>
&nbsp;&nbsp;
<h1 class="tagline" style="display:inline;"><?php echo $GLOBALS['website_title_desc'];?></h1>
</td>
<?php
}
?>

<td align="left" style="width:270px;text-align:left;">
<div id="cse-search-form" style="width: 100%;height:24px;"><?php p('h110');?></div>
<br/>
<table cellspacing="0" cellpadding="0" style="border:0;"><tr>
<td style="padding-top:5px;">
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true,services_exclude: 'print',data_use_cookies: false };</script>
<!-- AddThis Button END -->
</td><td style="width:20px;">&nbsp;</td><td style="padding-top:5px;">
<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" send="true" layout="button_count" width="150" show_faces="false" action="like" font="arial"></fb:like>
</td></tr></table>
</td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" style="border:0;">
<tr style="background-color:#FF6600;">
<td colspan="6"><p style="padding:0px;margin:0px;line-height:4px;height:4px;">&nbsp;</p></td>
</tr>
<tr style="background-color:#D3DCE6;">
<td colspan="6"><p style="padding:0px;margin:0px;line-height:1px;height:1px;">&nbsp;</p></td>
</tr>
<tr style="background-color:#FFCC00;">
<td width="15px" nowrap="nowrap">&nbsp;</td>
<td width="705px" height="24px" colspan="3">
<table style="border:0;" cellpadding="0" cellspacing="0" id="navigation">
<tr>
<?php template_html_menu("where intoolbar>'0'",'<td class="navText" nowrap="nowrap"><a href="','">','</a></td>',$GLOBALS['main_menu_number_of_games']);;?>
</tr>
</table>
</td>
<td width="40px">&nbsp;</td>
<td width="100%">&nbsp;</td>
</tr>
<tr style="background-color:#D3DCE6;">
<td colspan="6"><p style="padding:0px;margin:0px;line-height:1px;height:1px;">&nbsp;</p></td>
</tr>
<tr style="background-color:#FF6600;">
<td colspan="6"><p style="padding:0px;margin:0px;line-height:4px;height:4px;">&nbsp;</p></td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" style="border:0;">
<tr style="background-color:#000000;">
<td style="width:260px;padding-top:10px;vertical-align:top;text-align:left;background-color:#000000;padding-left:5px;" ><br/>
<?php adsystem("homepage_160x600"); ?>
</td>
<td style="width:30px;background-color:#000000;vertical-align:top;text-align:left;" ><br/>
&nbsp;
</td>
<td style="width:720px;vertical-align:top;text-align:left;vertical-align:top;">
<br/><br/>
