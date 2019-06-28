<?php
global $showPacxonSideAd;
?>
</div>
</div>
</div>
<div id="leftcolumn">
<div class="innertube">
<div id="menudiv">
<ul>
<?php template_html_menu("where intoolbar>'0'",'<li><a href="','">','</a></li>',$GLOBALS['main_menu_number_of_games'],0,"","",$GLOBALS['main_menu_show_more_articles_page_if_relevant']);?>
</ul>
</div>
</div>
</div>
<div id="rightcolumn">
<div class="innertube">
<?php 
if (get_current_page_uri()=="index")
{
	if (isset($showPacxonSideAd) && $showPacxonSideAd)
	{
		adsystem("homepage_160x600"); 
		echo("\n");
	}
}
else
{
	if ($showPacxonSideAd)
	{
		adsystem("gamepage_160x600"); 
		echo("\n");
	}
}
?>
</div>
</div>
<div id="footer">
<?php 
if (get_current_page_uri()=="index")
{
	//adsystem("homepage_728x90"); 
}
elseif (get_current_page_uri().".php"==get_termsofuse_page_name())
{
	// don't print ads on terms of use
}
else
{
	//adsystem("gamepage_728x90"); 
}
?>
<br/><br/>
<hr class="hr1" noshade="noshade" />
<?php if (get_current_page_uri()=="index") { ?>
&copy; <?php p('a122');?> <?php echo $GLOBALS['site_creation_year'];?><?php if (date("Y") > $GLOBALS['site_creation_year']) {echo '-'.date("Y");}?> <?php p('h103');?> <?php echo $GLOBALS['site_name_with_tld'];?><br/>
<a href="<?php echo get_contact_page_name();?>" class="link1"><?php p('a121');?></a> | <a href="<?php echo get_termsofuse_page_name();?>" class="link1"><?php p('a120');?></a>
<?php } else { ?>
<?php if ($GLOBALS['footer_link_to_homepage']) { ?><a class="link1" href="<?php gethomepage();?>"><?php echo $GLOBALS['website_title_name']?></a> | <?php }?> &copy; <?php p('a122');?> <?php echo $GLOBALS['site_creation_year'];?><?php if (date("Y") > $GLOBALS['site_creation_year']) {echo '-'.date("Y");}?> <?php p('h103');?> <?php echo $GLOBALS['site_name_with_tld'];?><br/><br/>
<?php } ?>
</div>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo $GLOBALS['addthis_pubid'];?>"></script>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript"> 
  google.load('search', '1', {language : '<?php echo $GLOBALS['google_cse_lang'];?>', style : google.loader.themes.ESPRESSO});
  google.setOnLoadCallback(function() {
    var customSearchOptions = {};  var customSearchControl = new google.search.CustomSearchControl(
      '<?php echo $GLOBALS['google_cse_unique_id']?>', customSearchOptions);
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    var options = new google.search.DrawOptions();
    options.enableSearchboxOnly("<?php echo returnbaseurl().get_search_page_name();?>");
    customSearchControl.draw('cse-search-form', options);
  }, true);
</script>
