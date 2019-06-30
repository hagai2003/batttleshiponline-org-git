<?php
global $showPacxonSideAd;
?>
</div>
</div>
</div>
<div id="leftcolumn">
<div class="innertube">
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
<br/>
<hr class="hr1" noshade="noshade" />
<?php if (get_current_page_uri()=="index") { ?>
&copy; <?php p('a122');?> <?php echo $GLOBALS['site_creation_year'];?><?php if (date("Y") > $GLOBALS['site_creation_year']) {echo '-'.date("Y");}?> <?php p('h103');?> <?php echo $GLOBALS['site_name_with_tld'];?><br/>
<a href="<?php echo get_contact_page_name();?>" class="link1"><?php p('a121');?></a> | <a href="<?php echo get_termsofuse_page_name();?>" class="link1"><?php p('a120');?></a>
<?php } else { ?>
<?php if ($GLOBALS['footer_link_to_homepage']) { ?><a class="link1" href="<?php gethomepage();?>"><?php echo $GLOBALS['website_title_name']?></a> | <?php }?> &copy; <?php p('a122');?> <?php echo $GLOBALS['site_creation_year'];?><?php if (date("Y") > $GLOBALS['site_creation_year']) {echo '-'.date("Y");}?> <?php p('h103');?> <?php echo $GLOBALS['site_name_with_tld'];?><br/><br/>
<?php } ?>
</div>
</div>
<script> 
$( document ).ready(function() {

var gameobject = document.getElementById("gameObjectHolder"); 
if (gameobject != null)
{

var aspect = originalH / originalW;
var newWidth = (window.innerWidth - 50);
if (newWidth > originalW) { newWidth = originalW; }
var newHeight = Math.round(newWidth * aspect);

if ($.flash.hasVersion())
{
    $('#gameObjectHolder').flash({swf:gameSWF ,height:newHeight,width:newWidth});
}
else
{
    $('#gameObjectHolder').css("border","2px solid #8AC007");
}
}
})
</script>