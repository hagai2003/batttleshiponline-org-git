      <div id="wrapper" class="back-black" >
  			<nav class="navbar navbar-dark navbar-expand-lg d-inline align-items-start sidebar sidebar-dark accordion p-0 toggled back-black"
  			id="side-nav" >
  					<div class="container-fluid d-flex flex-column p-0" style="margin-right:30px;background-color:black">


              <div id="menudiv" align="left">
                <a class=" nav-link"  href="<?php gethomepage();?>">
                    <img src="<?php print_logo_url();?>" class="logoimg" alt="<?php echo $GLOBALS['logo_image_alt']?>" />
                </a>
                <hr class="hr1"/>
              <ul>
              <?php template_html_menu("where intoolbar>'0'",'<li><a href="','">','</a></li>',$GLOBALS['main_menu_number_of_games'],0,"","",$GLOBALS['main_menu_show_more_articles_page_if_relevant']);?>
              <?php if (isset($GLOBALS['menuAdditionalItem']))
              {
              	echo $GLOBALS['menuAdditionalItem'];
              } ?>
              </ul>
              </div>

  					</div>
  			</nav>
          <div class="d-flex flex-column back-black" id="content-wrapper" style="background-color: rgb(0,0,0);">
              <div id="content" class="back-black">
                  <nav class="navbar navbar-light navbar-expand shadow  static-top back-black" id="top-nav" style="background-color: rgb(0,0,0);padding-top:0px;padding-bottom:0px;">
                      <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
                        <i class="fas fa-bars"></i>
                        </button>
                        <div  style="display: inline-block;margin: 0 auto;">
                          <h2>Battleship Games</h2>

                      </div>
                        </div>
                  </nav>

  								<!-- <div class="container"> -->
                  <div class="container" style="max-width:none;">
  							  <div class="row row-centered margin-top-non-mobile">
  							    <div class="gamediv col-sm-12 text-left">

                      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                      <!-- battleship-responsive -->
                      <ins class="adsbygoogle adslot_1 d-none d-md-block"
                           style="display:block"
                           data-ad-client="ca-pub-1609789099200669"
                           data-ad-slot="5001911059"
                           data-full-width-responsive="true"></ins>
                      <script>
                           (adsbygoogle = window.adsbygoogle || []).push({});
                      </script>
                      <br/>

<?php return; ?>
<div id="maincontainer">
<div id="topsection">
<div class="innertube">
<table cellspacing="2" cellpadding="1" border="0"><tr>
<td class="titletd1">
<a href="<?php echo gethomepage();?>"><img src="<?php print_logo_url();?>" class="logoimg" alt="<?php echo $GLOBALS['logo_image_alt']?>" /></a>
</td>
<td class="titletd2">
<?php if (@$GLOBALS['addthis_display2'] && (!$mobileDetect->isMobile()) )
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
global $mobileDetect;
if ((!@$GLOBALS['addthis_display2']) && (!$mobileDetect->isMobile()))
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
<?php
if (!$mobileDetect->isMobile())
{
?>
<div id="cse-search-form" style="width: 100%;height:24px;"><?php p('h110');?></div>
<?php } ?>
</td>
</tr></table>
<hr class="hr1" noshade="noshade" />
</div>
</div>
<div id="contentwrapper">
<div id="contentcolumn">
<div class="innertube">
