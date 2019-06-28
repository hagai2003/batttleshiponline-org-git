<div class="bodyText">
<?php if (isset($GLOBALS['header_contact_page']))
{
?>
<h3 class="pageName"><?php echo $GLOBALS['header_contact_page'];?></h3>
<?php
}
?>
<?php 
$section1 = get_current_page_content("section1");
if ($section1 != "")
{
	echo '<p>';
	echo $section1;
	echo '</p>';
}
?>
<img src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix'].'/'.$GLOBALS['contact_image_filename']?>" alt=""/>
<?php
$section2 = get_current_page_content("section2");
if ($section2 != "")
{
	echo '<p>';
	echo $section2;
	echo '</p>';
}

?>
</div>