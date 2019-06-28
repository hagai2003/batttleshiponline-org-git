<div id="maincontainer">
<div id="topsection">
<div class="innertube">
<table cellspacing="2" cellpadding="1" border="0"><tr>
<td class="titletd1">
<a href="<?php echo gethomepage();?>"><img src="<?php print_logo_url();?>" class="logoimg" alt="<?php echo $GLOBALS['logo_image_alt']?>" /></a>
</td>
<td class="titletd2">
<?php if (@$GLOBALS['addthis_display2'])
{
?>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {services_exclude: 'print', data_track_clickback: false, data_use_cookies: false}; </script>
<!-- AddThis Button END -->
<?php
}
?>
</td>
<td class="titletd3">
<?php
if (!@$GLOBALS['addthis_display2'])
{
?>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript"> var addthis_config={services_exclude: 'print', data_track_clickback: false, data_use_cookies: false} </script>
<!-- AddThis Button END -->
<?php
}
?>
<div id="cse-search-form" style="width: 100%;height:24px;"><?php p('h110');?></div>
</td>
</tr></table>
<hr class="hr1" noshade="noshade" />
</div>
</div>
<div id="contentwrapper">
<div id="contentcolumn">
<div class="innertube">