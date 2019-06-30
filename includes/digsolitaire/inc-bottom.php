</td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;</td>
<td align="left">
<br />
<p align="center" class="bodyText">	
<?php if (get_current_page_uri()=="index") { ?>
<a href="<?php echo get_contact_page_name();?>"><?php p('a121');?></a> | <?php if (isset($GLOBALS['google_plus_id'])) { ?>
<a href="https://plus.google.com/<?php echo $GLOBALS['google_plus_id'];?>" rel="publisher">Find us on Google+</a> | 
<?php } ?>
<a href="<?php echo get_termsofuse_page_name();?>"><?php p('a120');?></a> 
<?php } else { ?>
<?php if ($GLOBALS['footer_link_to_homepage']) { ?><a href="<?php gethomepage();?>"><?php echo $GLOBALS['website_title_name']?></a> | <?php }?>
<?php } ?>
<?php p('a122');?> &copy; <?php if (date("Y") == $GLOBALS['site_creation_year']) {echo date("Y");} else {echo $GLOBALS['site_creation_year']."-".date("Y");}?> <?php print(str_replace("www.","",strtolower($GLOBALS['site_name_with_tld'])));?> <?php p('a123');?>

<br/>
</p>
&nbsp;<br />
</td>
</tr>
</table>
<script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js#pubid=<?php echo $GLOBALS['addthis_pubid'];?>"></script>
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
<?php if ($GLOBALS['includePlusOne'])
{
?>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<?php
}
?>