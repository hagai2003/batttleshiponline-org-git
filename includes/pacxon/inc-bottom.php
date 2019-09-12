<footer class="sticky-footer">
		<div class="container my-auto">
			<!-- <hr class="hr1" noshade="noshade" /> -->
			<?php if (get_current_page_uri()=="index") { ?>
			<a href="<?php echo get_contact_page_name();?>" class="link1"><?php p('a121');?></a> | <a href="<?php echo get_termsofuse_page_name();?>" class="link1"><?php p('a120');?></a>
			<?php } else { ?>
			<?php if ($GLOBALS['footer_link_to_homepage']) { ?><a class="link1" href="<?php gethomepage();?>"><?php echo $GLOBALS['website_title_name']?></a> | <?php }?> &copy; <?php p('a122');?> <?php echo $GLOBALS['site_creation_year'];?><?php if (date("Y") > $GLOBALS['site_creation_year']) {echo '-'.date("Y");}?> <?php p('h103');?> <?php echo $GLOBALS['site_name_with_tld'];?><br/><br/>
			<?php } ?>
			&nbsp;&nbsp;&nbsp;&nbsp;			&nbsp;&nbsp;&nbsp;&nbsp;

			&copy; <?php echo $GLOBALS['site_creation_year'];?><?php if (date("Y") > $GLOBALS['site_creation_year']) {echo '-'.date("Y");}?> <?php p('h103');?> <?php echo $GLOBALS['site_name_with_tld'];?>

		</div>
</footer>
					    </div>
							    <!-- <div class="col-sm-3" style="padding-right:8px;padding-left:12px;">
							      <p>
                      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                      <style type="text/css">
                      .adslot_1 { display:inline-block; width: 120px; height: 600px; }
                      @media (max-width: 400px) { .adslot_1 { display: none; } }
                      @media (min-width:400px) { .adslot_1 { width: 120px; height: 600px; } }
                      @media (min-width:1000px) { .adslot_1 { width: 160px; height: 600px; } }
                      </style>
                      <ins class="adsbygoogle adslot_1"
                           data-ad-client="ca-pub-1609789099200669"
                           data-ad-slot="5384186523"
                           data-ad-format="auto"
                           data-full-width-responsive="true"></ins>
                      <script>
                           (adsbygoogle = window.adsbygoogle || []).push({});
                      </script>
                    </p>
							    </div> -->
							  </div>
							</div>

            </div>


        </div>
    </div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="/includes/assets/js/jquery.min.js"></script>
    <script src="/includes/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/includes/assets/js/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="/includes/assets/js/script.min.js"></script>

</body>

</html>


<?php return;?>
<?php
adsystem("allpage_responsive");
?>
<?php
global $showPacxonSideAd;
?>
</div>
</div>
</div>
<div id="leftcolumn">
<div class="innertube">
<div id="menudiv">
<?php if ($mobileDetect->isMobile()) { ?><b><u>Menu:</u></b><br/> <?php } ?>

<ul>
<?php template_html_menu("where intoolbar>'0'",'<li><a href="','">','</a></li>',$GLOBALS['main_menu_number_of_games'],0,"","",$GLOBALS['main_menu_show_more_articles_page_if_relevant']);?>
<?php if (isset($GLOBALS['menuAdditionalItem']))
{
	echo $GLOBALS['menuAdditionalItem'];
} ?>
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
if ((get_current_page_uri()=="index")&$GLOBALS['pacxon_show_index_bottom_ad'])
{
	adsystem("homepage_728x90");
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
<?php if (!$mobileDetect->isMobile()) { ?>
<script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo $GLOBALS['addthis_pubid'];?>"></script>
<script src="https://www.google.com/jsapi" type="text/javascript"></script>
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
<?php } ?>
