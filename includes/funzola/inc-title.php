<noscript>
<h1><?php echo get_current_page_name(); ?></h1>
<?php p('h109');?> <?php echo get_current_page_name();?>.<br/><?php echo get_current_page_content("metadescription");?>
</noscript>

<table style="height:130px;" border="0" class="maintab" align="center" border="0" cellspacing="0" cellpadding="0">
<tbody>
	<tr>
		<td style="width:2px;">&nbsp;</td>
		<td style="width:568px;padding-top:22px;height;text-align:left;vertical-align:top;">
		&nbsp;&nbsp;<a href="<?php echo gethomepage();?>"><img src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix'].'/'.$GLOBALS['logo_image_filename'];?>" style="border:0px;width:<?php echo $GLOBALS['logo_width'];?>px;height:<?php echo $GLOBALS['logo_height'];?>px" alt="FunZola"></a></td>

		<td style="width:383px;text-align:right;vertical-align:middle;">
		<table style="width:410px;" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="2" style="height:30px;;">			
			</td>
		</tr>
		<tr>
			<td><a href="<?php echo returnbaseurl();?>" ><img <?php if (!isnewpage()) echo 'class="transparency06"';?> id="newgamesilink" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/button_newgames.png" onmouseover="this.src='<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/button_newgames_over.png'" onmouseout="this.src='<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/button_newgames.png'"/></a></td>
			<td><a href="<?php echo returnbaseurl();?>retrogames.php" ><img <?php if (!isretropage()) echo 'class="transparency06"';?> id="retrogamesilink" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/button_retrogames.png" onmouseover="this.src='<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/button_retrogames_over.png'" onmouseout="this.src='<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/button_retrogames.png'"/></a></td>
		</tr>
		</table>
		</td>

		<td style="width:18px;">
			<span>&nbsp;</span>
		<td>
	</tr>
</tbody>
</table>

<table class="maintab" style="background-image:url(artwork/menu_<?php echo neworold();?>games.png);background-position:top;background-repeat:no-repeat;" align="center" border="0" cellspacing="0" cellpadding="0">
<tbody>
	<tr>
		<td style="width:30px;">&nbsp;</td>
		<td style="width:718px;padding-top:8px;height:45px;text-align:left;vertical-align:top;">

<?php printFunzolaCategories(get_page_content($pagename,'category')); ?>
		</td>

		<td style="width:232px;text-align:center;vertical-align:top;">
		<img src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix'];?>/search_dummy.png"/>
		</td>
	</tr>
</tbody>
</table>