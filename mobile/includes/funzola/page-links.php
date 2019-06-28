<div class="bodyText">
<?php if (isset($GLOBALS['header_links_page']))
{
?>
<h3 class="pageName"><?php echo $GLOBALS['header_links_page'];?></h3>
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

print_link_page_links("<ul>","<li>","</li>","</ul>");

$section2 = get_current_page_content("section2");
if ($section2 != "")
{
	echo '<p>';
	echo $section2;
	echo '</p>';
}

?>
</div>