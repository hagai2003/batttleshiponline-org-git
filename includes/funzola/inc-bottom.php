<br/><br/>
<div width="100%" class="footercolor">
	<span style="line-height:15px">&nbsp;</span>

	<table border="0" class="maintab footercolor" align="center" border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr>
		<td style="width:25px;">&nbsp;</td>

		<td style="width:355;">
			<img src="/artwork/funzola-logo-footer.png"/ alt="Funzola Footer Logo"/>
		</td>

		<td>
			<p align="center">
				<a class="bottomlinks" href="/">Home</a> |
				<a class="bottomlinks" href="/">New Games</a> |
				<a class="bottomlinks" href="/retrogames.php">Retro Games</a> |
				<a class="bottomlinks" href="/">Links </a> |
				<a class="bottomlinks" href="/">Contact Us</a> |
				<a class="bottomlinks" href="/">Terms of Use</a>
				<br/><br/>
				<span class="footertext">While using this website you agree to have read and accept our terms of use and privacy policy</span><br/>
				<span class="footertext"><?php p('a122');?> &copy; <?php if (date("Y") == $GLOBALS['site_creation_year']) {echo date("Y");} else {echo $GLOBALS['site_creation_year']."-".date("Y");}?> <?php print(str_replace("www.","",strtolower($GLOBALS['site_name_with_tld'])));?> <?php p('a123');?></span><br/>
				<br/>
			</p>
		</td>
		</tr>
	</table>
</div>

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

<?php 
// if it's a game
if (get_mysql_record("select type from tgames where gameinternalname='".$pagename."'") == "game")
{
	global $pagename;

// printing google code 
?>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<?php 

// printing twitter code 
?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<?php 

// printing facebook code 
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=463898970315697";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php }
?>
