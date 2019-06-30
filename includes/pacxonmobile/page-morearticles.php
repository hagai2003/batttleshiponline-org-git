<h1><?php echo $GLOBALS['header_more_articles_page'];?></h1>
<?php 
echo get_current_page_content("section1");
?>
<ul>
<?php
print_more_articles("<li><a class='link1' href='","'>","</a></li>");
?>
</ul>
<?php
echo get_current_page_content("section2");
?>