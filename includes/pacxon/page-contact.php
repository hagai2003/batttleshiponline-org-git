<?php if (isset($header_contact_page))
{
?>
<h1><?php echo $GLOBALS['header_contact_page'];?></h1>
<?php
}
?>
<?php echo get_current_page_content("section1");?>
<img src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix'].'/'.$GLOBALS['contact_image_filename']?>"/>
<?php echo get_current_page_content("section2");?>