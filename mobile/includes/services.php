<?php
// pacxon specific - show side ads always (unless in page-game object width > 610
global $showPacxonSideAd;
$showPacxonSideAd=true;

global $pageExistChecked;
global $pageExist;

$pageExistChecked=false;
$pageExist=false;

// ---------------------------------------------
// default values for newly added parameters
// ---------------------------------------------

// ---------------------------------------------
// added option to change $uartwork_prefix
// but if it's not defined then we keep it "uartwork"
// ---------------------------------------------
if (!isset($GLOBALS['uartwork_prefix']))
{
	$GLOBALS['uartwork_prefix']="uartwork";
}

// ---------------------------------------------
// added option to change css general name
// but if it's not defined then we keep it "general.css"
// ---------------------------------------------
if (!isset($GLOBALS['general_css']))
{
	$GLOBALS['general_css']="general.css";
}

// ---------------------------------------------
// games border color defaults to white
// ---------------------------------------------
if (!isset($GLOBALS['game_object_border_color']))
{
	$GLOBALS['game_object_border_color']="ffffff";
}
if (!isset($GLOBALS['enableCategories']))
{
	$GLOBALS['enableCategories']=false;
}

// ---------------------------------------------- 
// assaf template function - start
// ---------------------------------------------- 
function getcatdisplayname($icatid)
{
	global $categories;
	return $categories[$icatid]['catdisplayname'];
}

function getcatdirectory($icatid)
{
	global $categories;
	return $categories[$icatid]['catfolder'];
}

function getcatpagename($icatid)
{
	global $categories;
	return $categories[$icatid]['pagename'];
}

function getcattype($icatid)
{
	global $categories;
	return $categories[$icatid]['type'];
}

function protectstring($original, $mode)
{
	$newstr = $original;
	$newstr = trim($newstr);
	if (($mode == "mysql") || ($mode == "mysqlstrict"))
	{	
		if (!$GLOBALS['workoffline'])
		{
			$newstr = mysql_real_escape_string($newstr);
		}
	}
	$newstr = strip_tags($newstr);
	$clean = array(chr(0),"%", "//", ";", "&", "<", ">", "www", "http", "ftp","script");
	$newstr= str_ireplace($clean," ",$newstr);
	return $newstr;
}

// ---------------------------------------------- 
// assaf template function - end
// ---------------------------------------------- 

function p($msg)
{
	$var = "$msg".'_'.$GLOBALS['lang'];
	echo $GLOBALS[$var];
}

function nep($msg)
{
	$var = "$msg".'_'.$GLOBALS['lang'];
	return $GLOBALS[$var];
}
 
// ---------------------------------------------
//  ads MUST use this format:   
// ---------------------------------------------
//  adname_SIZE_ad_include = true/false
//  adname_SIZE_ad_type = adsense, cpmstar etc  
// 
// ---------------------------------------------
//	e.x. variables & file name:
// ---------------------------------------------
//	      $homepage_728x90_ad_type = "adsense";
//	  	  $homepage_728x90_ad_type = "adsense";
//  inc-ad-homepage_728x90-adsense.php
// ---------------------------------------------
function adsystem($ad_name)
{
	//echo $ad_name."_ad_include<br/>";
	if ($GLOBALS[$ad_name."_ad_include"])
	{
		if ($GLOBALS['debug_mode'])
		{
			$img_ad = $GLOBALS['debug_ads_url_prefix'].strstr($ad_name,"_").".jpg";
			echo '<img src="'.$img_ad.'" alt="local ad"/>';
		}
		else
		{ 
			$ad_file_to_include="inc-ad-".$ad_name."-".$GLOBALS[$ad_name."_ad_type"].".php";

			if (file_exists($ad_file_to_include))
			{
				include($ad_file_to_include);
			}
			else
			{
				echo "Error: missing adfile: ".$ad_file_to_include;
			}
		}
	}
}

// --------------------------------------------
//  hagai digsolitaire template functions
// --------------------------------------------
function print_game_thumb($image,$html_title,$href)
{
?>
<a class="sidebarTextUnderline" href="<?php echo $href;?>"><?php echo $html_title;?></a><br/>
<a class="sidebarTextUnderline" href="<?php echo $href;?>"><img width="<?php echo $GLOBALS['index_game_thumb_width']?>px" height="<?php echo $GLOBALS['index_game_thumb_height']?>px" class="<?php echo $GLOBALS['index_game_thumb_class'];?>" alt="<?php echo $html_title;?>" src="<?php echo $image;?>" /></a>
<?php
}

function get_ad_content_deprecated($ad_name)  // Hagai: get ad content from DB but we decided to get it from files
{

	$gamesql = "select adcontent from ads where adname='".$ad_name."'";
	$query = mysql_query($gamesql) or errorpage(false,402,nep("a131"), "","");
	
	if ($row = mysql_fetch_array($query))
	{
		return $row['adcontent'];
	}
	else
	{
		echo $gamesql ;
		errorpage(false,402,nep("a131"), "","");
		exit(0);
	}
}

function get_page_content($page_internal_name,$section_name)
{
	if ($page_internal_name == "index")
	{
		$gamesql = "select ".$section_name." from tgames where type='".$page_internal_name."'";
	}
	else
	{
		$gamesql = "select ".$section_name." from tgames where gameinternalname='".$page_internal_name."'";
	}
	$query = mysql_query($gamesql) or errorpage(false,442,nep("a131"), "","");
	
	if ($row = mysql_fetch_array($query))
	{
		$result=$row[$section_name];
		
		// updating global variables such as $website_single_word_name, $site_name_with_tld etc.

		$result=str_replace('$website_single_word_name',$GLOBALS['website_single_word_name'],$result);
		$result=str_replace('$site_name_with_tld',$GLOBALS['site_name_with_tld'],$result);
		$result=str_replace('$website_title_name',$GLOBALS['website_title_name'],$result);
		$result=str_replace('$contact_us_page',get_contact_page_name(),$result);
		

		return $result;
	}
	else
	{
		return "";
	}
}

function get_page_content_by_type($page_type,$section_name)
{
	return get_page_content(get_page_name_by_type($page_type),$section_name);
}

function get_page_name_by_type($type)
{
	$gamesql = "select gameinternalname from tgames where type='".$type."'";
	$query = mysql_query($gamesql) or errorpage(false,402,nep("a131"), "","");
	
	if ($row = mysql_fetch_array($query))
	{
		return $row['gameinternalname'];
	}
	else
	{
		return "";
	}	
}
function get_contact_page_name()
{
	return get_page_name_by_type("contact").".php";
}
function get_termsofuse_page_name()
{
	return get_page_name_by_type("termsofuse").".php";
}
function get_links_page_name()
{
	return get_page_name_by_type("links").".php";
}
function get_search_page_name()
{
	return get_page_name_by_type("search").".php";
}
function get_more_articles_page_name()
{
	return get_page_name_by_type("morearticles").".php";
}

function get_current_page_content($section_name)
{
	return get_page_content(get_current_page_uri(),$section_name);
}
function get_current_page_uri()
{
	global $pagename;
	return $pagename;

	// FIXED on 12-11-2012 for folder support
	$file = $_SERVER["REQUEST_URI"];
	$break = Explode('/', $file);
	$pfile = $break[count($break) - 1];
	if (strstr($pfile, '?', true))
	{
		$pfile = strstr($pfile, '?', true);
	}
	$filegameinternalname = substr($pfile, 0, strlen($pfile) - 4);
	if (($filegameinternalname=="") && (("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==returnbaseurl()) || ("http://www.".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==returnbaseurl()))) 
	{
		return "index";
	}
	elseif ($filegameinternalname=="index")					
	{
		if (("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==returnbaseurl().'index.php') || ("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==returnbaseurl().'/index.php') ||
			("http://www.".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==returnbaseurl().'index.php') || ("http://www.".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==returnbaseurl().'/index.php'))
		{
			return "index";
		}
		else
		{	
			return "404";
		}
	}
	return $filegameinternalname;
}


function get_current_full_uri()  // for 'http://localhost/ggg/hangman.php' it'll 'return ggg/hangma'   (and it'll return 'index' for / also)
{
	$pagename=$_SERVER['REQUEST_URI'];
	if (substr($pagename, -4) == ".php")
	{
		//$pagename=str_replace(".php","",$pagename);
		$pagename=substr($pagename,0,(strlen($pagename)-4));
	}
	if ($pagename[0]=="/")
	{
		$pagename=substr($pagename,1);
	}
	if (strpos($pagename,"?") >0)
	{
		$pagename=substr($pagename,0,strpos($pagename,"?"));
		if (substr($pagename, -4) == ".php")
		{
			$pagename=substr($pagename,0,(strlen($pagename)-4));
		}
	}
	if ($pagename=="")
	{
		return "index";
	}
	else
	{
		return $pagename;
	}
}
function does_page_exist($page_internal_name)
{
	return does_mysql_record_exist("tgames","where gameinternalname='".$page_internal_name."'");
}

function get_gameid_by_internalname($page_internal_name)
{
	return get_mysql_record("select gameinternalname from tgames where gameinternalname='".$page_internal_name."'");
}

function does_mysql_record_exist($table,$where)
{
	$numRecords = get_mysql_count($table,$where);
	if ($numRecords > 0) 
	{
		return true;
	}
	else
	{
		return false;
	}
}

function get_mysql_record($query)
{
	$result = mysql_query($query) or die(mysql_error().$query);
	$row = mysql_fetch_array($result);
	return $row[0];

}

function get_mysql_count($table,$where)
{
	$mysqlquery="SELECT COUNT(*) AS num FROM ".$table." ".$where;
	$data = mysql_query($mysqlquery)  or errorpage(false,403,nep("a131"), "","",$mysqlquery);
	$row = mysql_fetch_assoc($data);
	$numRecords = $row['num'];
	return $numRecords;
}

function get_page_url($gameinternalname,$suffix)
{
	if ($gameinternalname=="index")
	{
		return returnhomepage();
	}
	else
	{
		return returnwwwroot().$gameinternalname.".".$suffix;
	}
}


// $ignore_contact_and_links_page  - ignore baseurl input for showing links and contactus page
function template_html_menu($where_clause,
			$menu_prefix,
			$menu_middle,
			$menu_suffix,
			$limit, 
			$seperator_num=0,
			$seperator_html="",
			$compensate_html="",
			$show_more_articles_button_if_relevant=false,
			$ignore_contact_and_links_pages=false) 
{
	// menu is showing only games and articles, and if 'links' or 'contact' pages are tagged in baseurl 
	// then we also showing them at end

	$additional_where=" and (type='game' || type='article' || type='index')";

	$show_links_page=false;
	if (($GLOBALS['main_menu_show_links_page']) & (!$ignore_contact_and_links_pages))
	{
		$limit=$limit-1;
		$show_links_page=true;
	}
	$show_contact_page=false;
	if (($GLOBALS['main_menu_show_contactus_page']) & (!$ignore_contact_and_links_pages))
	{
		$limit=$limit-1;
		$show_contact_page=true;
	}

	// fetching number of relevant menu items
	$total_records=get_mysql_count("tgames",$where_clause.$additional_where." and published='1' limit 0,".$limit);
	//echo '$total_records='.$total_records;

	$show_more_articles=false;
	if ($total_records>$limit)
	{
		// we've got more records than we're willing to show
		
		// checking whether to show more articles button
		if ($show_more_articles_button_if_relevant)
		{
			$show_more_articles=true;
		}
		// limiting number of records to $limit
		$total_records = $limit;
	}
	
	// fetching all menu items
	$gamesql = "select gameid,gameinternalname,digsolitmenu,gamename,type from tgames ".$where_clause.$additional_where." and published='1' order by intoolbar asc limit 0,".$limit;
	$query = mysql_query($gamesql) or errorpage(false,401,nep("a131"), "","");
	$counter = 0;

	while ($row = mysql_fetch_array($query))
	{
		$counter = $counter +1;
		$gameinternalname = $row['gameinternalname'];
		$gamename = $row['gamename'];

		// specifically for digsolitaire template
		// you can have the toolbar menu to show a different text than that of the thumbnails on the index menu
		// if 'digsolitmenu' is set in table than this text will show
		if ($GLOBALS['template_name'] == "digsolitaire")
		{
			$digsolitmenu = $row['digsolitmenu'];
			if ($digsolitmenu != "")
			{
				$gamename=$digsolitmenu;
			}
		}

		$gameid = $row['gameid'];
		
		$type = $row['type'];

		echo $menu_prefix;
		
		if ($type=="index")
		{
			echo returnhomepage();
		}
		else
		{
			echo get_page_url($gameinternalname,"php");
		}
		echo $menu_middle;
		echo $gamename;
		echo $menu_suffix;

		if (($seperator_num>0) && (($counter % $seperator_num) == 0) && $counter<$total_records)
		{
			echo $seperator_html;
		}

	}
	
	// show more_articles button
	if ($show_more_articles)
	{
		echo $menu_prefix;
		echo get_more_articles_page_name();
		echo $menu_middle;
		echo get_page_content_by_type("morearticles","gamename");
		echo $menu_suffix;
		$counter=$counter+1;
	}

	if ($show_links_page)
	{
		echo $menu_prefix;
		echo get_links_page_name();
		echo $menu_middle;
		echo get_page_content_by_type("links","gamename");
		echo $menu_suffix;
		$counter=$counter+1;
	}

	if ($show_contact_page)
	{
		echo $menu_prefix;
		echo get_contact_page_name();
		echo $menu_middle;
		echo get_page_content_by_type("contact","gamename");
		echo $menu_suffix;
		$counter=$counter+1;
	}

	while (($seperator_num>0) && (($counter % $seperator_num) <> 0))
	{
		echo $compensate_html;
		$counter=$counter+1;
	}
}

function handle_specific_pages()
{
	$file = $_SERVER["REQUEST_URI"];
	$break = Explode('/', $file);
	$pfile = $break[count($break) - 1];
	//echo $pfile;
	
	if ($pfile == $GLOBALS['contact_image_filename'])
	{
		$text = $GLOBALS['contact_email'];
		// Create a contact-us image
		$im = imagecreatetruecolor($GLOBALS['contact_image_width'], $GLOBALS['contact_image_height']);

		$backgroundColour = ImageColorAllocate($im,$GLOBALS['contact_image_background_color'][0],$GLOBALS['contact_image_background_color'][1],$GLOBALS['contact_image_background_color'][2]);
		$textColour = ImageColorAllocate($im,$GLOBALS['contact_image_text_color'][0],$GLOBALS['contact_image_text_color'][1],$GLOBALS['contact_image_text_color'][2]);

		// Make the background red
		imagefilledrectangle($im, 0, 0, 299, 99, $backgroundColour);
	
		// Path to our ttf font file
		$font_file = './fonts/'.$GLOBALS['contact_image_font'];

		// Draw the text 'PHP Manual' using font size 13
		imagefttext($im, $GLOBALS['contact_image_font_size'], 0, 10, 25, $textColour, $font_file, $text);

		// Output image to the browser
		header('Content-Type: image/png');

		imagepng($im);
		imagedestroy($im);
		exit(0);
	}
	// handling CSS files, all should be in the specific template folder
	if (strpos($pfile,".css")>0)
	{
		$already_cssed=false;
		$tempalte_file_path="includes/".$GLOBALS['template_name']."/".$pfile;
		if (file_exists($tempalte_file_path))
		{
			$already_cssed=true;
			header("Content-type: text/css");
		}
		if (@include($tempalte_file_path))
		{
			// only relavant to localhost where the css cannot be checked for existence
			if (!$already_cssed)
			{
				header("Content-type: text/css");
			}
			exit(0);
		}
	}
}

function errorpage($a,$b,$c)
{
	echo $a;
	echo "</br>";
	echo $b;
	echo "</br>";
	echo $c;
	echo "</br>";
}

function error_page_404($page)
{
	// including 404 page
	header('HTTP/1.0 404 Not Found');
	$pagetoinclude="includes/".$GLOBALS['template_name']."/page-404.php";     // this page template is static since we don't want it in the pages table really
	if (!@include($pagetoinclude))
	{
		// worst case - no 404 page found - printing 404 Messages
		p('a511');
		echo '.';
		echo '<br/><br/>';
		p('a512');
		echo '.';
	}
}

function get_logo_url()
{
	return returnbaseurl().$GLOBALS['uartwork_prefix'].'/'.$GLOBALS['logo_image_filename'];
}

function print_logo_url()
{
	echo get_logo_url();
}

function print_link_page_links($prefix,$before_link,$after_link,$suffix)
{
	if (isset($GLOBALS["link_page_html1"]))
	{
		echo $prefix;
		$lindex=1;
		while ((isset($GLOBALS["link_page_html".$lindex])) && ($GLOBALS["link_page_html".$lindex] != ""))
		{
			echo $before_link;
			echo $GLOBALS["link_page_html".$lindex];
			echo $after_link;
			$lindex=$lindex+1;
		}
		echo $suffix;
	}
}

function print_more_articles($prefix,$middle,$suffix)
{
	// fetching all articles
	$gamesql = "select gameid,gameinternalname,gamename,type from tgames where type='article' and published='1' order by intoolbar asc";
	$query = mysql_query($gamesql) or errorpage(false,401,nep("a131"), "","");
	$counter = 0;

	while ($row = mysql_fetch_array($query))
	{
		$counter = $counter +1;
		$gameinternalname = $row['gameinternalname'];
		$gamename = $row['gamename'];
		$gameid = $row['gameid'];
		//$category = $row['category'];
		$type = $row['type'];

		echo $prefix;
		echo get_page_url($gameinternalname,"php");
		echo $middle;
		echo $gamename;
		echo $suffix;
	}
}

function get_game_swf_name()
{
	$swf = get_current_page_content("objectname");
	if ($swf =="")
	{
		return get_current_page_content("gameinternalname");
	}
	else
	{
		return $swf;
	}
}

function get_current_page_name()
{
	if (get_current_page_uri()=="index")
	{
		return $GLOBALS['website_title_name'];
	}
	else
	{
		return get_current_page_content("gamename");
	}
}
function getbaseurl()
{
	if ((isset($_SERVER['HTTP_HOST'])) && ($_SERVER['HTTP_HOST'] == "localhost"))
	{
		echo $GLOBALS['site_base_url_local'];
	}
	else
	{
		echo $GLOBALS['site_base_url'].'/';
	}
}

function returnbaseurl()
{
	if ((isset($_SERVER['HTTP_HOST'])) && ($_SERVER['HTTP_HOST'] == "localhost"))
	{
		return $GLOBALS['site_base_url_local'];
	}
	else
	{
		return $GLOBALS['site_base_url'].'/';
	}
}

function gethomepage()
{
	if ((isset($_SERVER['HTTP_HOST'])) && ($_SERVER['HTTP_HOST'] == "localhost"))
	{
		echo $GLOBALS['site_base_url_local'];
	}
	else
	{
		echo $GLOBALS['site_base_url'];
	}
}

function returnhomepage()
{
	if ((isset($_SERVER['HTTP_HOST'])) && ($_SERVER['HTTP_HOST'] == "localhost"))
	{
		return $GLOBALS['site_base_url_local'];
	}
	else
	{
		return $GLOBALS['site_base_url'];
	}
}

function returnwwwroot()
{
	if ((isset($_SERVER['HTTP_HOST'])) && ($_SERVER['HTTP_HOST'] == "localhost"))
	{
		$wwwroot = $GLOBALS['site_base_url_local'];
	}
	else
	{
		$wwwroot = $GLOBALS['site_base_url'].'/';
	}
	
	$wwwroot=str_replace("http://","",$wwwroot);
	if (strpos($wwwroot,"/"))
	{
		$wwwroot=strstr($wwwroot,"/");
	}
	//echo '$wwwroot='.$wwwroot;
	return $wwwroot;
}

if (substr(returnbaseurl(),0,16) == "http://localhost")
{
	$debug_mode = true;
	error_reporting( E_ALL );
	ini_set("display_errors", 1);	
}
else
{
	error_reporting(0);
	$debug_mode = false;
}

if ($debug_mode)
{
	$include_google_analytics = false;
}
else
{
	$include_google_analytics = true;
}

if ($flip_debug_mode)
{
	$debug_mode = !$debug_mode;
}

function printHighScores($novel_gameid, $duration)
{
?>
<table border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;border:1px solid white;">
<colgroup>
	<col width="20px" style="width:20px;" />
	<col width="234px" style="width:234px;" />
	<col width="200px" style="width:200px;" />
 	<col width="235px" style="width:245px;" />
</colgroup>

<tr><td colspan="4" style="padding-top:8px;padding-bottom:8px;"><span class="sidebarOrange">&nbsp;<?php //echo get_current_page_content("gamename"); ?>&nbsp;&nbsp;Hall of Fame:</span>
&nbsp; (
	<!--	<a onclick="javascript:updateScores(<?php echo $novel_gameid; ?>,'recent');return false;" id="recent" name="recent" class="whiteColorDuration aunderline" href="#">Recent</a> |  -->
		<a onclick="javascript:updateScores(<?php echo $novel_gameid; ?>,'thisweek');return false;" id="thisweek" name="thisweek" class="whiteColorDuration aunderline" href="#">This Week</a> | 
		<a onclick="javascript:updateScores(<?php echo $novel_gameid; ?>,'thismonth');return false;" id="thismonth" name="thismonth" class="whiteColorDuration" href="#">This Month</a> | 
		<a onclick="javascript:updateScores(<?php echo $novel_gameid; ?>,'alltimes');return false;" id="alltimes" name="alltimes" class="whiteColorDuration" href="#">All TImes</a>)</td></tr>

<tr>
	<th>&nbsp;</th>
	<th align="left" style="text-align:left;"><span aiign="left">Name</span<</th>
	<th align="left" style="text-align:left;"><span aiign="left">Score</span<</th>
	<th align="left" style="text-align:left;"><span aiign="left">Date</span<</th>
</tr>

<?php
	$where_clause=" where gameid=".$novel_gameid;

	if ($duration=="thismonth")
	{
		$gamesql = "select name,score,date from highscores ".$where_clause." and YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) order by score desc,date desc limit 0,".$GLOBALS['digsolitaire_highscores_limit_game_page'];
	}
	elseif ($duration=="thisweek")
	{
		$gamesql = "select name,score,date from highscores ".$where_clause." and YEARWEEK(date) = YEARWEEK(CURRENT_DATE)  order by score desc,date desc limit 0,".$GLOBALS['digsolitaire_highscores_limit_game_page'];
	}
	elseif ($duration=="alltimes")
	{
		$gamesql = "select name,score,date from highscores ".$where_clause." order by score desc,date desc limit 0,".$GLOBALS['digsolitaire_highscores_limit_game_page'];
	}
	else
	{
		// recent scores
		$gamesql = "select name,score,date from highscores ".$where_clause." order by date desc,date desc limit 0,".$GLOBALS['digsolitaire_highscores_limit_game_page'];
	}

	//echo $gamesql;
	$query = mysql_query($gamesql) or errorpage(false,402,nep("a201"), "","");
	//echo 'mysql_error()='.mysql_error(); 
	$counter = 0;

	while ($row = mysql_fetch_array($query))
	{
		echo '<tr><td>&nbsp;</td>';
		if ($row['name']=="")
		{
			echo '<td class="moregamestd"><span class="sidebarText">Anonymous</span></td>';
		}
		else
		{
			echo '<td class="moregamestd"><span class="sidebarText">'.$row['name'].'</span></td>';
		}
		echo '<td class="moregamestd"><span class="sidebarText">'.$row['score'].'</td>';
		echo '<td class="moregamestd"><span class="sidebarText">'.$row['date'].'</td>';
		echo '</tr>';
	}
?>

<tr><td colspan="4" style="padding-top:0px;padding-bottom:8px;line-height:8px;">&nbsp;</td></tr>

</table>
<?php 
} 
// end function printHighScores()

function recentScores()
{
?>
<p>
New games added: 
<a class="sidebarTextUnderline" href="Scorpion-Solitaire.php">Scorpion Solitaire</a>, 
<a class="sidebarTextUnderline" href="Tripeaks-Solitaire.php">Tripeaks Solitaire</a>, 
<a class="sidebarTextUnderline" href="Russian-Solitaire.php">Russian Solitaire</a>, 
<a class="sidebarTextUnderline" href="Yukon-Solitaire.php">Yukon-Solitaire</a>.
<br/>
</p>

<table border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;border:1px solid white;">
<colgroup>
	<col width="50px" style="width:50px;" />
	<col width="200px" style="width:200px;" />
	<col width="210px" style="width:210px;" />
	<col width="100px" style="width:100px;" />
 	<col width="150px" style="width:150px;" />
	<col width="5px" style="width:5px;" />
</colgroup>

<tr><td colspan="6" style="padding-top:8px;padding-bottom:8px;"><span style="margin-left:32px;" class="sidebarOrange">&nbsp;<?php //echo get_current_page_content("gamename"); ?>&nbsp;Recent Game Scores:</span>
&nbsp; 

<tr>
	<th>&nbsp;</th>
	<th align="left" style="text-align:left;"><span aiign="left">Game</span<</th>
	<th align="left" style="text-align:left;"><span aiign="left">Name</span<</th>
	<th align="left" style="text-align:left;"><span aiign="left">Score</span<</th>
	<th align="left" style="text-align:left;"><span aiign="left">Date</span<</th>
	<th>&nbsp;</th>
</tr>

<?php
	//$where_clause=" where gameid=".$novel_gameid;
	$where_clause="";
	// recent scores
	$gamesql = "select gameid,name,score,date from highscores ".$where_clause." order by date desc limit 0,".$GLOBALS['digsolitaire_highscores_limit_game_page'];
	
	//echo $gamesql;
	$query = mysql_query($gamesql) or errorpage(false,402,nep("a201"), "","");
	//echo 'mysql_error()='.mysql_error(); 
	$counter = 0;

	while ($row = mysql_fetch_array($query))
	{
		echo '<tr style="margin-top:20px;">';
		echo '<td valign="top" align="center"><a href="'.getGameLinkName($row['gameid']).'"><img style="border:0px;margin-top:0px;" src="/gicons/play_icon.gif" width="20" height="20"/></a></td>';
		echo '<td class="moregamestd"><span class="sidebarText"><a class="orangeLinkTurnsWhite" href="'.getGameLinkName($row['gameid']).'">'.getGameName($row['gameid']).'</a></td>';
		if ($row['name']=="")
		{
			echo '<td class="moregamestd"><span class="sidebarText">Anonymous</span></td>';
		}
		else
		{
			echo '<td class="moregamestd"><span class="sidebarText">'.$row['name'].'</span></td>';
		}
		echo '<td class="moregamestd"><span class="sidebarText">'.$row['score'].'</td>';
		echo '<td class="moregamestd"><span class="sidebarText">'.$row['date'].'</td>';
		echo '<td></td>';
		echo '</tr>';
	}
?>

<tr><td colspan="6" style="padding-top:0px;padding-bottom:8px;line-height:8px;">&nbsp;</td></tr>

</table>
<?php 
} 
// end function printHighScores()

function getGameName($gameid)
{
	if ($gameid==159)
		return "Freecell Solitaire";
	elseif ($gameid==118)
		return "Spider Solitaire";
	elseif ($gameid==80)
		return "Klondike Solitaire";
	elseif ($gameid==196)
		return "Forty Thieves Solitaire";
	elseif ($gameid==106)
		return "Pyramid Solitaire";
	elseif ($gameid==126)
		return "Aces Up Solitaire";
	elseif ($gameid==61)
		return "Peg Solitaire";
	elseif ($gameid==240)
		return "Gin Rummy";
	elseif ($gameid==151)
		return "Demon Solitaire";
	elseif ($gameid==127)
		return "Gaps Solitaire";
	elseif ($gameid==103)
		return "Golf Solitaire";
	elseif ($gameid==269)
		return "Scorpion Solitaire";
	elseif ($gameid==184)
		return "Tripeaks Solitaire";
	elseif ($gameid==281)
		return "Russian Solitaire";
	elseif ($gameid==199)
		return "Yukon-Solitaire";
	else
		return "";
}

function getGameLinkName($gameid)
{
	if ($gameid==159)
		return "Freecell-Solitaire.php";
	elseif ($gameid==118)
		return "Spider-Solitaire.php";
	elseif ($gameid==80)
		return "Klondike-Solitaire.php";
	elseif ($gameid==196)
		return "Forty-Thieves-Solitaire.php";
	elseif ($gameid==106)
		return "Pyramid-Solitaire.php";
	elseif ($gameid==126)
		return "Aces-Up-Solitaire.php";
	elseif ($gameid==61)
		return "Peg-Solitaire.php";
	elseif ($gameid==240)
		return "Gin-Rummy.php";
	elseif ($gameid==151)
		return "Demon-Solitaire.php";
	elseif ($gameid==127)
		return "Gaps-Solitaire.php";
	elseif ($gameid==103)
		return "Golf-Solitaire.php";
	elseif ($gameid==269)
		return "Scorpion-Solitaire.php";
	elseif ($gameid==184)
		return "Tripeaks-Solitaire.php";
	elseif ($gameid==281)
		return "Russian-Solitaire.php";
	elseif ($gameid==199)
		return "Yukon-Solitaire.php";
	else
		return "";
}

function printFunzolaCategories($category)
{
	if (!pageExists())
	{
		$category=10;
	}
	global $categories;
	$first=true;
	$itemspacer="&nbsp;&nbsp;&nbsp;";

	foreach ($categories as $cat) 
	{
		if ($cat['type'] == getcattype($category))
		{
	 		if ($first)
			{
				$first=false;
			}
			else
			{		
				echo $itemspacer."|".$itemspacer;
			}
			if ($cat['catnum'] == $category)
			{
				echo '<a class="menuitem'.neworold().'selected" href="'.returnbaseurl().$cat['pagename'].'">'.$cat['catdisplayname'].'</a>';
			}
			else
			{
				echo '<a class="menuitem'.neworold().'" href="'.returnbaseurl().$cat['pagename'].'">'.$cat['catdisplayname'].'</a>';
			}
		}
	}
}

function neworold()
{
	global $pagename;
	if (pageExists())
	{
		//echo get_page_content($pagename,'category');
		return getcattype(get_page_content($pagename,'category'));
	}
	else
	{
		return "new";
	}
}

function isnewpage()
{
	if (neworold() == "new")
		return true;
	else
		return false;
}

function isretropage()
{
	if (neworold() == "retro")
		return true;
	else
		return false;
}

function neworoldhomepage()
{
	if (isnewpage())
	{
		return returnbaseurl();
	}
	else
	{
		return returnbaseurl().$GLOBALS['retrogames_root'];
	}
}

function pageExists()
{
	global $pageExistChecked;
	global $pageExist;

	if ($pageExistChecked)
	{
		return $pageExist;
	}
	$pageExistChecked=true;

	global $pagename;
	//echo '$pagename='.$pagename.'<br/>';;

	$lastslash=strrpos($pagename,"/");
	
	if (($lastslash>0) & ($GLOBALS['enableCategories']))
	{
		//echo 'folder page';

		$folder=substr($pagename,0,$lastslash);
		$pagename=substr($pagename,($lastslash+1));
		
		//echo '$folder='.$folder.'<br/>';;
		//echo '$pagename='.$pagename.'<br/>';;

		// handling folders
		if (does_page_exist($pagename) && strpos($_SERVER["REQUEST_URI"],".php"))
		{
			// only games are supported in folders
			if (get_mysql_record("select type from tgames where gameinternalname='".$pagename."'") == "game")
			{
				$game_category=get_mysql_record("select category from tgames where gameinternalname='".$pagename."'");
				$category_folder=getcatdirectory($game_category);
				//echo "category_folder=$category_folder";
				if ($category_folder==$folder)
				{
					//echo 'valid folder page';
					$pageExist=true;
					return true;
				}
				else
				{
					//echo 'not folder page';
					$pageExist=false;
					return false;
				}
			}
			else
			{
				$pageExist=false;
				return false;
			}
		}
	}

	// handling non-folder pages
	if ((does_page_exist($pagename) && strpos($_SERVER["REQUEST_URI"],".php")) || ($pagename=="index"))
	{
		if ((get_mysql_record("select type from tgames where gameinternalname='".$pagename."'") == "game") & ($GLOBALS['enableCategories']))
		{
			$game_category=get_mysql_record("select category from tgames where gameinternalname='".$pagename."'");
			$category_folder=getcatdirectory($game_category);
			if ($category_folder=="")
			{
				$pageExist=true;
				return true;
			}
			else
			{
				$pageExist=false;
				return false;
			}
		}
		else
		{
			$pageExist=true;
			return true;
		}
	}
	else
	{
		$pageExist=false;
		return false;
	}
}

function printFunzolaTopBoxGame($gameID)
{
	?>
		<table border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;width:309px;height:92px;text-align:right;vertical-align:middle;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/top_box_game_bg.png);background-position:top left;background-repeat:no-repeat;">
		<tbody>
			<tr>
				<td style="width:118px;vertical-align:middle" align="right" rowspan="2"><a href="<?php echo getPageInternalURL($gameID);?>"><?php printFunzolaGameThumb($gameID);?></a></td>
				<td align="left" style="width:191px;height:62px;"><p align="left" style="margin-left:8px;margin-top:8px;" ><a class="topboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID);?>"><?php echo getGameNameByID($gameID);?></a></p></td>
			</tr>
			<tr>
				<td style="vertical-align:top;width:191px;" align="right">
					<table border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;width:191px;height:19px;">
						<tr>
						<td style="width:101px;">&nbsp;</td>
						<td style="width:76px;text-align:center;vertical-align:middle;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/start_<?php echo neworold();?>game.png);background-position:top left;background-repeat:no-repeat;"><a class="topboxplaynowbutton" href="<?php echo getPageInternalURL($gameID);?>">Play now</a></td>
						<td style="width:6px;">&nbsp;</td>
						</tr>
					</table>	
				</td>
			</tr>
		</tbody>
		</table>
	<?php
}

function printFunzolaGameThumb($gameID)
{ 
	$gameName=getGameNameByID($gameID);
	?>
	<img class="gamethumbimage<?php echo neworold();?>" src="<?php echo returnbaseurl().$GLOBALS['gameicon_prefix']."/".getGameInternalNameByID($gameID).".".$GLOBALS['gameicon_type'];?>" alt="<?php echo getGameNameByID($gameID);?>" width="<?php echo $GLOBALS['gameicon_width'];?>" height="<?php echo $GLOBALS['gameicon_height'];?>"/>  
	<?php
}

function getGameNameByID($gameID)
{
	$query="select gamename from tgames where gameid=".$gameID;
	return get_mysql_record($query);
}

function getGameInternalNameByID($gameID)
{
	$query="select gameinternalname from tgames where gameid=".$gameID;
	return get_mysql_record($query);
}

function getGameTypeByID($gameID)
{
	$query="select type from tgames where gameid=".$gameID;
	return get_mysql_record($query);
}

function getGameCategoryByID($gameID)
{
	$query="select category from tgames where gameid=".$gameID;
	return get_mysql_record($query);
}

function printEmptyDivWithHeight($height)
{
	echo '<div style="line-height:'.$height.'px;">';
	echo '&nbsp;';
	echo '</div>';
}

// TODO 
function getPageInternalURL($gameID)
{
	$category=getGameCategoryByID($gameID);
	$folder=getcatdirectory($category);
	if ($folder!= "")
	{
		return $folder."/".getGameInternalNameByID($gameID).".php";
	}
	else
	{
		return getGameInternalNameByID($gameID).".php";
	}
}

function funzolaTopBox($topBoxTitle,$topBoxGameID1,$topBoxGameID2,$topBoxGameID3,$topBoxGameID4,$topBoxGameID5,$topBoxGameID6)
{ ?>
	<table class="maintab" align="center" valign="top" border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr>
			<td style="width:635px;">
				<table style="width:635px;height:326px;" valign="top" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="3" style="width:635px;height:40px;text-align:right;vertical-align:top;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/top_box_title_wrapper.png);background-position:top right;background-repeat:no-repeat;">
						<?php printEmptyDivWithHeight(3); ?>
						<div align="center" class="<?php echo neworold(); ?>topmenutitle">
							<?php echo $topBoxTitle;?>
						</div>
						</td>
					</tr>
					<tr>
						<td><?php printFunzolaTopBoxGame($topBoxGameID1);?></td>
						<td style="width:18px;">&nbsp;</td>
						<td><?php printFunzolaTopBoxGame($topBoxGameID2);?></td>
					</tr>
					<tr>
						<td><?php printFunzolaTopBoxGame($topBoxGameID3);?></td>
						<td style="width:18px;">&nbsp;</td>
						<td><?php printFunzolaTopBoxGame($topBoxGameID4);?></td>
					</tr>
					<tr>
						<td><?php printFunzolaTopBoxGame($topBoxGameID5);?></td>
						<td style="width:18px;">&nbsp;</td>
						<td><?php printFunzolaTopBoxGame($topBoxGameID6);?></td>
					</tr>
				</table>
			</td>
			<td style="width:11px;text-align:right;vertical-align:middle;">&nbsp;</td>
			
			<td style="width:330px;height:326px;text-align:center;vertical-align:middle;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/banner_330_324_bg.png);background-position:top right;background-repeat:no-repeat;">
			<?php echo adsystem("gamepage_300x250");?>
			</td>
		</tr>
	</tbody>
	</table>
<?php
} 

function print2TextGames($gameID1,$gameID2)
{ // height is 50 ?>
	<table style="height:50px;width:326px;table-layout:fixed;" border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr style="height:16px;">
			<td style="width:80px;"></td>
			<td style="vertical-align:middle;width:20px;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID1);?>"><img style="border:0px;" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']."/".neworold();?>_plus_icon_13x12.png"/></a></td>
			<td style="vertical-align:middle;width:210px;text-align:left;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID1);?>"><?php echo getGameNameByID($gameID1);?></a></td>
			<td style="width:16px;"></td>
		</tr>
		<tr><td colspan="4"><?php printEmptyDivWithHeight(4);?></td></tr>
		<tr style="height:16px;">
			<td style="width:80px;"></td>
			<td style="vertical-align:middle;width:20px;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID2);?>"><img style="border:0px;" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']."/".neworold();?>_plus_icon_13x12.png"/></a></td>
			<td style="vertical-align:middle;width:210px;text-align:left;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID2);?>"><?php echo getGameNameByID($gameID2);?></a></td>
			<td style="width:16px;"></td>
		</tr>
		<tr><td colspan="4"><?php printEmptyDivWithHeight(14);?></td></tr>
	</tbody>
	</table>
<?php } 

function print4TextGames($gameID1,$gameID2,$gameID3,$gameID4)
{ // height is 50 ?>
	<table style="height:50px;width:326px;table-layout:fixed;" border="0" cellspacing="0" cellpadding="0">
	<colgroup>
		<col width="25px" style="width:25px;" />
		<col width="20px" style="width:20px;" />
		<col width="117px" style="width:117px;" />
		<col width="27px" style="width:27px;" />
		<col width="20px" style="width:20px;" />
		<col width="117px" style="width:117px;" />
	</colgroup>
	<tbody>
		<tr style="height:16px;">
			<td></td> 
			<td style="vertical-align:middle;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID1);?>"><img style="border:0px;" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']."/".neworold();?>_plus_icon_13x12.png"/></a></td>
			<td style="vertical-align:middle;text-align:left;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID1);?>"><?php echo getGameNameByID($gameID1);?></a></td>
			<td></td> 
			<td style="vertical-align:middle;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID2);?>"><img style="border:0px;" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']."/".neworold();?>_plus_icon_13x12.png"/></a></td>
			<td style="vertical-align:middle;text-align:left;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID2);?>"><?php echo getGameNameByID($gameID2);?></a></td>
		</tr>
		<tr><td colspan="6"><?php printEmptyDivWithHeight(4);?></td></tr>

		<tr style="height:16px;">
			<td></td> 
			<td style="vertical-align:middle;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID3);?>"><img style="border:0px;" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']."/".neworold();?>_plus_icon_13x12.png"/></a></td>
			<td style="vertical-align:middle;text-align:left;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID3);?>"><?php echo getGameNameByID($gameID3);?></a></td>
			<td></td> 
			<td style="vertical-align:middle;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID4);?>"><img style="border:0px;" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']."/".neworold();?>_plus_icon_13x12.png"/></a></td>
			<td style="vertical-align:middle;text-align:left;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL($gameID4);?>"><?php echo getGameNameByID($gameID4);?></a></td>
		</tr>

		<tr><td colspan="6"><?php printEmptyDivWithHeight(14);?></td></tr>
	</tbody>
	</table>
<?php } 

function getFunzolaRandomGameID()
{
	return get_mysql_record("select * from tgames where type='game' ORDER BY RAND() LIMIT 0,1;;")	;
}

function funzola3CategoryBoxes($categoryName1,$categoryName2,$categoryName3,
						$categoryURL1,$categoryURL2,$categoryURL3,
						$category1Game1,$category1Game2,$category1Game3,$category1Game4,$category1Game5,$category1Game6,$category1Game7,$category1Game8,
						$category2Game1,$category2Game2,$category2Game3,$category2Game4,$category2Game5,$category2Game6,$category2Game7,$category2Game8,
						$category3Game1,$category3Game2,$category3Game3,$category3Game4,$category3Game5,$category3Game6,$category3Game7,$category3Game8)
{ 
	if (false)
	{
	echo "category1Game1=$category1Game1<br/>";
	echo "category1Game2=$category1Game2<br/>";
	echo "category1Game3=$category1Game3<br/>";
	echo "category1Game4=$category1Game4<br/>";
	echo "category1Game5=$category1Game5<br/>";
	echo "category1Game6=$category1Game6<br/>";
	echo "category1Game7=$category1Game7<br/>";
	echo "category1Game8=$category1Game8<br/>";

	echo "category2Game1=$category2Game1<br/>";
	echo "category2Game2=$category2Game2<br/>";
	echo "category2Game3=$category2Game3<br/>";
	echo "category2Game4=$category2Game4<br/>";
	echo "category2Game5=$category2Game5<br/>";
	echo "category2Game6=$category2Game6<br/>";
	echo "category2Game7=$category2Game7<br/>";
	echo "category2Game8=$category2Game8<br/>";

	echo "category3Game1=$category3Game1<br/>";
	echo "category3Game2=$category3Game2<br/>";
	echo "category3Game3=$category3Game3<br/>";
	echo "category3Game4=$category3Game4<br/>";
	echo "category3Game5=$category3Game5<br/>";
	echo "category3Game6=$category3Game6<br/>";
	echo "category3Game7=$category3Game7<br/>";
	echo "category3Game8=$category3Game8<br/>";
	}
	?>
	<table style="width:980px;height:323px;table-layout:fixed;text-align:center;vertical-align:top;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/mainpagegames.png);background-position:top right;background-repeat:no-repeat;" border="0" class="maintab" align="center" border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr style="height:35px;vertical-align:middle;text-align:center;">
			<td style="width:326px;height:35px;" colspan="2"><a class="mainpageCategoriesAtBottom" href="<?php echo $categoryURL1;?>"><?php echo $categoryName1;?></a></td>
			<td style="width:326px;height:35px;" colspan="2"><a class="mainpageCategoriesAtBottom" href="<?php echo $categoryURL2;?>"><?php echo $categoryName2;?></a></td>
			<td style="width:326px;height:35px;" colspan="2"><a class="mainpageCategoriesAtBottom" href="<?php echo $categoryURL3;?>"><?php echo $categoryName3;?></a></td>
		</tr>
		<tr><td colspan="6"><?php printEmptyDivWithHeight(3);?></td></tr>
		<?php // first row of games ?>
		<tr>
			<?php for  ($xcat = 1; $xcat <= 3; $xcat++) { // printing 6 games?>
				<?php for  ($ycatgame = 1; $ycatgame <= 2; $ycatgame++) { ?>
				<td style="width:163px;height:80px;" ><a href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php printFunzolaGameThumb(${'category'.$xcat.'Game'.$ycatgame});?></a></td>
				<?php } ?>
			<?php } ?>
		</tr>
		<tr >
			<?php for  ($xcat = 1; $xcat <= 3; $xcat++) { // printing 6 games?>
				<?php for  ($ycatgame = 1; $ycatgame <= 2; $ycatgame++) { ?>
				<td style="width:163px;height:34px;vertical-align:top;" align="center"><p style="width:140px;margin:0px;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php echo getGameNameByID(${'category'.$xcat.'Game'.$ycatgame});?></a></p></td>
				<?php } ?>
			<?php } ?>
		</tr>
		<tr><td colspan="6"><?php printEmptyDivWithHeight(3);?></td></tr>

		<?php // second row of games ?>
		<tr>
			<?php for  ($xcat = 1; $xcat <= 3; $xcat++) { // printing 6 games?>
				<?php for  ($ycatgame = 3; $ycatgame <= 4; $ycatgame++) { ?>
				<td style="width:163px;height:80px;" ><a href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php printFunzolaGameThumb(${'category'.$xcat.'Game'.$ycatgame});?></a></td>
				<?php } ?>
			<?php } ?>
		</tr>
		<tr >
			<?php for  ($xcat = 1; $xcat <= 3; $xcat++) { // printing 6 games?>
				<?php for  ($ycatgame = 3; $ycatgame <= 4; $ycatgame++) { ?>
				<td style="width:163px;height:34px;vertical-align:top;" align="center" ><p style="width:140px;margin:0px;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php echo getGameNameByID(${'category'.$xcat.'Game'.$ycatgame});?></a></p></td>
				<?php } ?>
			<?php } ?>
		</tr>
		<tr><td colspan="6"><?php printEmptyDivWithHeight(3);?></td></tr>

		<?php // text row of games ?>
		<tr>
			<td style="width:326px;height:50px;text-align:center;vertical-align:top;" colspan="2">
					<?php // print2TextGames($category1Game5,$category1Game6); ?>
					<?php print4TextGames($category1Game5,$category1Game6,$category1Game7,$category1Game8); ?>
					
			</td>
			<td style="width:326px;height:50px;text-align:center;vertical-align:top;" colspan="2">
					<?//php print2TextGames($category2Game5,$category2Game6); ?>
					<?php print4TextGames($category2Game5,$category2Game6,$category2Game7,$category2Game8); ?>
			</td>
			<td style="width:326px;height:50px;text-align:center;vertical-align:top;" colspan="2">
					<?//php print2TextGames($category3Game5,$category3Game6); ?>
					<?php print4TextGames($category3Game5,$category3Game6,$category3Game7,$category3Game8); ?>
			</td>
		</tr>
	</tbody>
	</table>
<?php 
} 

function funzolaSortBox($sortby)
{ // width 980px ?>
	<table class="maintab" align="center" valign="top" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
	<colgroup>
		<col class="<?php echo neworold();?>gamecategoryicon" />
		<col class="<?php echo neworold();?>gamecategoryiconrest" />
		<col width="292px" style="width:292px;" />
		<col width="398px" style="width:398px;" />
	</colgroup>
	<tbody>
		<tr>
			<td style="vertical-align:middle;" class="<?php echo neworold();?>gamecategoryicon"><img style="border:0px;" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']."/".neworold();?>games_icon.png"/></td>
			<td style="vertical-align:middle;" class="<?php echo neworold();?>gamecategoryiconrest"><span class="menutext"><?php echo getFunzolaCategorySingleName(); ?></span></td>
			<td style="width:292px;"></td>

			<td style="width:398px;text-align:center;vertical-align:middle;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/sortby_box.png);background-position:top left;background-repeat:no-repeat;">
				<span class="newsortbyText">Sort By:</span>&nbsp;&nbsp;
				<a href="" class="newsortbyOptions">Game Name</a>&nbsp;|&nbsp;
				<a href="" class="newsortbyOptions">Release Date</a>&nbsp;|&nbsp;
				<a href="" class="newsortbyOptions">Top Rating</a>
			</td>

		</tr>
	</tbody>
	</table>
<?php
} 

function getFunzolaCategorySingleName()
{
	$catname=get_current_page_content("gamename");
	$catname=str_replace('Retro Games - ','',$catname);
	$catname=str_replace('Games','',$catname);
	return $catname;
}

function funzolaCategoryGames2Lines(
						$line1Game1,$line1Game2,$line1Game3,$line1Game4,$line1Game5,$line1Game6,
						$line2Game1,$line2Game2,$line2Game3,$line2Game4,$line2Game5,$line2Game6)
{ ?>
	<table style="width:980px;height:260px;table-layout:fixed;text-align:center;vertical-align:top;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/categorygames.png);background-position:top right;background-repeat:no-repeat;" border="0" class="maintab" align="center" border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr><td colspan="6"><?php printEmptyDivWithHeight(3);?></td></tr>
		<?php // first row of games ?>
		<tr>
			<?php for  ($xcat = 1; $xcat <= 6; $xcat++) { // printing 6 games?>
				<td style="width:163px;height:80px;" ><a href="<?php echo getPageInternalURL(${'line1Game'.$xcat});?>"><?php printFunzolaGameThumb(${'line1Game'.$xcat});?></a></td>
			<?php } ?>
		</tr>
		<tr >
			<?php for  ($xcat = 1; $xcat <= 6; $xcat++) { // printing 6 games?>
				<td style="width:163px;height:34px;vertical-align:top;" align="center"><p style="width:140px;margin:0px;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL(${'line1Game'.$xcat});?>"><?php echo getGameNameByID(${'line1Game'.$xcat});?></a></p></td>
			<?php } ?>
		</tr>
		<tr><td colspan="6"><?php printEmptyDivWithHeight(3);?></td></tr>

		<?php // second row of games ?>
		<tr>
			<?php for  ($xcat = 1; $xcat <= 6; $xcat++) { // printing 6 games?>
				<td style="width:163px;height:80px;" ><a href="<?php echo getPageInternalURL(${'line2Game'.$xcat});?>"><?php printFunzolaGameThumb(${'line2Game'.$xcat});?></a></td>
			<?php } ?>
		</tr>
		<tr >
			<?php for  ($xcat = 1; $xcat <= 6; $xcat++) { // printing 6 games?>
				<td style="width:163px;height:34px;vertical-align:top;" align="center"><p style="width:140px;margin:0px;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL(${'line2Game'.$xcat});?>"><?php echo getGameNameByID(${'line2Game'.$xcat});?></a></p></td>
			<?php } ?>
		</tr>

	</tbody>
	</table>
<?php 
} 

function printFunzolaBanner728x90()
{ ?>
		<table class="maintab" align="center" valign="top" border="0" cellspacing="0" cellpadding="0"  style="table-layout:fixed;width:980px;height:118px;text-align:right;vertical-align:middle;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/game_728x90_banner.png);background-position:top left;background-repeat:no-repeat;">
		<tr><td align="center">
		<?php echo adsystem("gamepage_728x90");?>
		</td></tr>
		</table>
<?php
}

function printFunzolaGame()
{ ?>
		<table class="maintab" align="center" valign="top" border="0" cellspacing="0" cellpadding="0"  style="table-layout:fixed;width:980px;text-align:center;vertical-align:top;">
		<tr><td style="width:980px;height:46px;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/game_box_top.png);background-position:top left;background-repeat:no-repeat;text-align:left;">
			
			<table class="maintab" align="center" valign="top" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<colgroup>
				<col width="26px" style="width:26px;" />
				<col width="628px" style="width:628px;" />
				<col width="302px" style="width:302px;" />
				<col width="24px" style="width:24px;" />
				</colgroup>
			<tr><td></td>
			<td style="text-align:left;"><a href="<?php echo neworoldhomepage();?>" class="menuitem<?php echo neworold();?>"><?php echo ucfirst(neworold());?> Games</a>&nbsp;
			<img style="border:0px;" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix'];?>/top_menu_big_seperator.png"/>&nbsp;
			<a href="<?php echo getcatpagename(get_current_page_content("category"));?>" class="menuitem<?php echo neworold();?>"><?php echo getcatdisplayname(get_current_page_content("category"));?></a>&nbsp;
			<img style="border:0px;" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix'];?>/top_menu_big_seperator.png"/>&nbsp;
			<span class="gamePageGameName"><?php echo get_current_page_content("gamename");?></span></td>
			<td>
				<?php if (false) { ?>
				<div class="g-plusone" data-size="medium" ></div>
				<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
				<?php } else { ?>
				<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style ">
					<a class="addthis_button_tweet" style="width:100px;" ></a>
					<a class="addthis_button_google_plusone" g:plusone:size="medium" style="width:85px;" ></a>
					<a class="addthis_button_facebook_like" fb:like:layout="button_count" style="width:90px;" ></a>
					</div>
					<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
					<!-- AddThis Button END -->
				<?php } ?>
			</td>


			<td></td></tr></table>
		</td></tr>

		<tr><td style="width:980px;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/game_box_middle.png);background-position:top left;background-repeat:repeat-y;">
		<?php printEmptyDivWithHeight(10); ?>

		<object width="<?php echo get_current_page_content("objectwidth");?>px" height="<?php echo get_current_page_content("objectheight");?>px">
		<param name="movie" value="<?php echo returnbaseurl().$GLOBALS['games_folder_prefix']; ?>/<?php echo get_current_page_content("gameinternalname");?>.swf"/>
		<param name="quality" value="high"/>
		<param name="menu" value="true"/>
		<embed width="<?php echo get_current_page_content("objectwidth");?>px" height="<?php echo get_current_page_content("objectheight");?>px" src="<?php echo returnbaseurl().$GLOBALS['games_folder_prefix']; ?>/<?php echo get_current_page_content("gameinternalname");?>.swf" quality="high" type="application/x-shockwave-flash"></embed>
		</object>

		</td></tr>

		<tr><td style="width:980px;height:131px;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/game_box_bottom_retro.png);background-position:top left;background-repeat:no-repeat;">
		</td></tr>

		</table>
<?php
}

function getratingimage($rating)
{
	if ($rating <= 0){$rateimg = "funzola-rating-0.png";}
	if ($rating >= 0.5){$rateimg = "funzola-rating-0.png";}
	if ($rating >= 1  ){$rateimg = "funzola-rating-1.png";}
	if ($rating >= 1.5){$rateimg = "funzola-rating-15.png";}
	if ($rating >= 2  ){$rateimg = "funzola-rating-2.png";}
	if ($rating >= 2.5){$rateimg = "funzola-rating-25.png";}
	if ($rating >= 3  ){$rateimg = "funzola-rating-3.png";}
	if ($rating >= 3.5){$rateimg = "funzola-rating-35.png";}
	if ($rating >= 4  ){$rateimg = "funzola-rating-4.png";}
	if ($rating >= 4.5){$rateimg = "funzola-rating-45.png";}
	if ($rating >= 5  ){$rateimg = "funzola-rating-5.png";}
	return $rateimg;
}

function printFunzolaGameDescAndFacebook($gameID)
{ 
	$thumbsup = get_current_page_content("thumbsup");
	$totalvotes = get_current_page_content("thumbsup") + get_current_page_content("thumbsdown");
	
	?>
	<table class="maintab" align="center" valign="top" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;height:325px;">
	<colgroup>
	<col width="610px" style="width:610px;" />
	<col width="10px" style="width:10px;" />
	<col width="360px" style="width:360px;" />
	</colgroup>
		<tr>
			<td style="height:325px;vertical-align:top;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/game_info_box.png);background-position:top right;background-repeat:no-repeat">
				<table border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
					<?php printEmptyDivWithHeight(12); ?>
					<colgroup>
					<col width="12px" style="width:12px;" />
					<col width="406px" style="width:400px;" />
					<col width="180px" style="width:186px;" />
					<col width="12px" style="width:12px;" />
					</colgroup>
					<td></td>
					<td>
						<span class="gamePageGameDescriptionTitle"><?php echo get_current_page_content("gamename");?></span>
						<?php printEmptyDivWithHeight(5); ?>
						<?php 
						if ((get_current_page_content("thumbsdown")+get_current_page_content("thumbsup"))>0){$ratingpic = getratingimage(get_current_page_content("score"));} else {$ratingpic = "funzola-rating-5.png";}  
						?>
						<img alt="game rating" style="border:0px;" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/<?php echo $ratingpic?>"/>						
						<?php printEmptyDivWithHeight(20); ?>						
						<span class="gamePageGameDescription"><?php echo get_current_page_content("gameinstructions");?></span>
					</td>

					<td style="text-align:center;vertical-align:top;">
						<?php printEmptyDivWithHeight(10); ?>
						<table align="center" valign="top" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
							<colgroup>
							<col width="48px" style="width:48px;" />
							<col width="53px" style="width:53px;" />
							<col width="10px" style="width:10px;" />
							<col width="53px" style="width:53px;" />
							<col width="22px" style="width:22px;" />
							</colgroup>
							<tr><td colspan="5"><span class="gamePageWhatDoYouThinkTitle">What do you think?</span></td></tr>
							<tr><td colspan="5"><?php printEmptyDivWithHeight(12); ?></td></tr>
							<tr><td>&nbsp;</td><td><span id="votethumbup"><img id="gamevoteup" onclick="votegame(1);return false;" /></span></td>
								<td>&nbsp;</td><td><span id="votethumbdown"><img id="gamevotedown" onclick="votegame(0);return false;" /></span></td>
								<td>&nbsp;</td>
							</tr>
							<tr><td colspan="5"><?php printEmptyDivWithHeight(12); ?></td></tr>
							<tr><td colspan="5"><span class="gamePageWhatDoYouThinkText" id="votestats"><?php
								echo $totalvotes.' Votes - ';
								if ($totalvotes > 0)
								{
									echo number_format((100*$thumbsup/$totalvotes), 0)."%";
								}
								else
								{
									echo "0%";
								}
								?>
								&nbsp;Like it</span></td></tr>
						</table>
					</td>
					<td></td>
				</table>
			</td>
			<td style="text-align:right;vertical-align:top;">
			<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=463898970315697";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
			</td>
			
			<td style="vertical-align:top;text-align:center;height:325px;">
			<table border="0" cellpadding="0" cellspacing="0" style="height:325px;" style="vertical-align:top;">
			<tr><td class="game-facebook-top-td"></td></tr>
				<tr><td class="game-facebook-middle-td" style="vertical-align:top;">
				<div class="fb-comments" data-num-posts="2" data-width="340" data-colorscheme="light" data-href="<?php echo currentURL();?>"></div>
				</td></tr>
				<tr><td class="game-facebook-bottom-td"></td></tr>
			</table>
			</td>
		</tr>
	</table>
<?php
}

function printFunzolaGameDescAndAd($alreadyvoted=false)
{ 
	$thumbsup = get_current_page_content("thumbsup");
	$totalvotes = get_current_page_content("thumbsup") + get_current_page_content("thumbsdown");
	
	?>
	<table class="maintab" align="center" valign="top" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;height:270px;">
	<colgroup>
	<col width="650px" style="width:650px;" />
	<col width="10px" style="width:10px;" />
	<col width="320px" style="width:320px;" />
	</colgroup>
		<tr>
			<td style="vertical-align:top;">
				<table cellspacing="0" cellpadding="0" border="0">
				<tr><td class="game-desc-top-td"></td></tr>
				<tr><td class="game-desc-middle-td" style="vertical-align:top;height:240px;">
					<table cellspacing="0" cellpadding="0"  style="table-layout:fixed;">
						<colgroup>
						<col width="12px" style="width:12px;" />
						<col width="456px" style="width:456px;" />
						<col width="626px" style="width:170px;" />
						<col width="12px" style="width:12px;" />
						</colgroup>
						<tr>
							<td></td>
							<td style="vertical-align:top;">
								<?php printEmptyDivWithHeight(5); ?>
								<span class="gamePageGameDescriptionTitle"><?php echo get_current_page_content("gamename");?></span>
								<?php printEmptyDivWithHeight(5); ?>
								<?php 
								if ((get_current_page_content("thumbsdown")+get_current_page_content("thumbsup"))>0){$ratingpic = getratingimage(get_current_page_content("score"));} else {$ratingpic = "funzola-rating-5.png";}  
								?>
								<img alt="game rating" style="border:0px;" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/<?php echo $ratingpic?>"/>						
							</td>
							<td>
								<table cellspacing="0" cellpadding="0" style="table-layout:fixed;">
									<colgroup>
										<col width="35px" style="width:35px;" />
										<col width="50px" style="width:50px;" />
										<col width="50px" style="width:50px;" />
										<col width="35px" style="width:35px;" />
									</colgroup>
									<tr  style="line-height:44px;">
										<td style="line-height:44px;"><span class="gameVotePercent">30%</span></td>
										<?php if ($alreadyvoted) { ?>
										<td style="line-height:44px;"><span id="votethumbup" class="gamevoteupdisabled"></span></td>
										<td style="line-height:44px;"><span id="votethumbdown" class="gamevotedowndisabled"></span></td>
										<?php } else { ?>
										<td style="line-height:44px;"><span id="votethumbup"><img style="border:none;" id="gamevoteup" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/funzola_vote_up.png" onclick="votegame(1);return false;" onmouseover="this.src='<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/funzola_vote_up_hover.png'" onmouseout="this.src='<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/funzola_vote_up.png'"/></span></td>
										<td style="line-height:44px;"><span id="votethumbdown"><img style="border:none;" id="gamevotedown" src="<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/funzola_vote_down.png" onclick="votegame(0);return false;" onmouseover="this.src='<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/funzola_vote_down_hover.png'" onmouseout="this.src='<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/funzola_vote_down.png'"/></span></td>
										<?php } ?>
										<td style="line-height:44px;"><span class="gameVotePercent">70%</span></td>
									</tr>
									<tr>
										<?php if ($alreadyvoted) { ?>
										<td colspan="4" style="text-align:center;"><span class="gamePageWhatDoYouThinkText" id="votestats">Thanks for voting!</span></td>
										<?php } else { ?>
										<td colspan="4" style="text-align:center;"><span class="gamePageWhatDoYouThinkText" id="votestats">What do you think?</span></td>
										<?php } ?>
									</tr>
								</table>				
								<?php printEmptyDivWithHeight(10); ?>
							</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td colspan="2"><span class="gamePageGameDescription"><?php echo get_current_page_content("gameinstructions");?></span></td>
							<td></td>
						</tr>
					</table>
				</td></tr>
				<tr><td class="game-desc-bottom-td"></td></tr>
				</table>
			</td>
			<td style="text-align:right;vertical-align:top;">
			</td>
			
			<td style="vertical-align:top;text-align:center;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/funzola_320_270_box.png);background-position:top right;background-repeat:no-repeat">
			<?php printEmptyDivWithHeight(10); ?>
			<?php echo adsystem("gamepage_300x250");?>
			</td>
		</tr>
	</table>
<?php
}

function currentURL()
{
	if (strpos($_SERVER['REQUEST_URI'],"?")) 
	{ 
		return $GLOBALS['site_base_url'].substr($_SERVER['REQUEST_URI'],0,strpos($_SERVER['REQUEST_URI'],"?")); 
	} 
	else 
	{ 
		return $GLOBALS['site_base_url'].$_SERVER['REQUEST_URI'];
	}
}

function printFunzolaScreenshots()
{ 
?>
	<table class="maintab" align="center" valign="top" border="0" cellspacing="0" cellpadding="0"  style="table-layout:fixed;width:980px;height:304px;text-align:right;vertical-align:middle;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/game-screenshots.png);background-position:top left;background-repeat:no-repeat;">

	<colgroup>
		<col width="490px" style="width:490px;" />
		<col width="490px" style="width:490px;" />
	</colgroup>

	<tr>
	<td style="height:36px;" class="gamePageGameScreenshotTitle" colspan="2"><?php //echo  get_current_page_content("gamename");?> Screenshots
	</td>
	</tr>

	<tr>
	<td style="height:250px;" align="center">
	<img class="screenshotthumb<?php echo neworold();?>" src="<?php echo returnbaseurl().$GLOBALS['games_screenshot_prefix']."/".get_current_page_content("gameinternalname").$GLOBALS['screenshot_suffix1'].".".$GLOBALS['gamescreenshot_type'];?>" alt="<?php echo  get_current_page_content("gamename");?>" width="<?php echo $GLOBALS['screenshots_width'];?>" height="<?php echo $GLOBALS['screenshots_height'];?>"/>  
	</td>

	<td style="height:250px;" align="center">
	<img class="screenshotthumb<?php echo neworold();?>" src="<?php echo returnbaseurl().$GLOBALS['games_screenshot_prefix']."/".get_current_page_content("gameinternalname").$GLOBALS['screenshot_suffix2'].".".$GLOBALS['gamescreenshot_type'];?>" alt="<?php echo  get_current_page_content("gamename");?>" width="<?php echo $GLOBALS['screenshots_width'];?>" height="<?php echo $GLOBALS['screenshots_height'];?>"/>  
	</td>
	</tr>

	<tr>
	<td class="gamePageGameScreenshotTitle" colspan="2"><?php 	printEmptyDivWithHeight(5);?>
	</td>
	</tr>

	</table>
<?php
}

///
function funzolaGamepageMoreGames($category1Game1,$category1Game2,$category1Game3,$category1Game4,$category1Game5,$category1Game6,
						$category1Game7,$category1Game8,$category1Game9,$category1Game10,$category1Game11,$category1Game12)
{ 
	if (false)
	{
	echo "category1Game1=$category1Game1<br/>";
	echo "category1Game2=$category1Game2<br/>";
	echo "category1Game3=$category1Game3<br/>";
	echo "category1Game4=$category1Game4<br/>";
	echo "category1Game5=$category1Game5<br/>";
	echo "category1Game6=$category1Game6<br/>";
	echo "category1Game7=$category1Game7<br/>";
	echo "category1Game8=$category1Game8<br/>";
	echo "category1Game7=$category1Game9<br/>";
	echo "category1Game8=$category1Game10<br/>";
	echo "category1Game7=$category1Game11<br/>";
	echo "category1Game8=$category1Game12<br/>";

	}
	?>
	<table style="width:980px;height:282px;table-layout:fixed;text-align:center;vertical-align:top;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/game_moregames.png);background-position:top right;background-repeat:no-repeat;" border="0" class="maintab" align="center" border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr style="height:35px;vertical-align:middle;text-align:center;">
			<td style="width:326px;height:35px;" colspan="6"><a href="<?php echo getcatpagename(get_current_page_content("category"));?>" class="menuitem<?php echo neworold();?>">More  <?php echo getcatdisplayname(get_current_page_content("category"));?> Games</a></td>
		</tr>
		<tr><td colspan="6"><?php printEmptyDivWithHeight(12);?></td></tr>
		<?php // first row of games ?>
		<tr>
			<?php $xcat = 1; // printing 6 games?>
				<?php for  ($ycatgame = 1; $ycatgame <= 6; $ycatgame++) { ?>
				<td style="width:163px;height:80px;" ><a href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php printFunzolaGameThumb(${'category'.$xcat.'Game'.$ycatgame});?></a></td>
				<?php } ?>
		</tr>
		<tr >
			<?php $xcat = 1; // printing 6 games?>
				<?php for  ($ycatgame = 1; $ycatgame <= 6; $ycatgame++) { ?>
				<td style="width:163px;height:34px;vertical-align:top;" align="center"><p style="width:140px;margin:0px;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php echo getGameNameByID(${'category'.$xcat.'Game'.$ycatgame});?></a></p></td>
				<?php } ?>
		</tr>
		<tr><td colspan="6"><?php printEmptyDivWithHeight(3);?></td></tr>

		<?php // second row of games ?>
		<tr>
			<?php $xcat = 1; // printing 6 games?>
				<?php for  ($ycatgame = 7; $ycatgame <= 12; $ycatgame++) { ?>
				<td style="width:163px;height:80px;" ><a href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php printFunzolaGameThumb(${'category'.$xcat.'Game'.$ycatgame});?></a></td>
				<?php } ?>
		</tr>
		<tr >
			<?php $xcat = 1; // printing 6 games?>
				<?php for  ($ycatgame = 7; $ycatgame <= 12; $ycatgame++) { ?>
				<td style="width:163px;height:34px;vertical-align:top;" align="center" ><p style="width:140px;margin:0px;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php echo getGameNameByID(${'category'.$xcat.'Game'.$ycatgame});?></a></p></td>
				<?php } ?>
		</tr>
		<tr><td colspan="6"><?php printEmptyDivWithHeight(3);?></td></tr>

	</tbody>
	</table>
<?php 
} 

function printFunzolaMoreGamesAndFacebook($category1Game1,$category1Game2,$category1Game3,$category1Game4,
									 $category1Game5,$category1Game6,$category1Game7,$category1Game8,$category1Game9)
{
?>
	<table class="maintab" align="center" valign="top" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;height:270px;">
	<colgroup>
	<col width="480px" style="width:480px;" />
	<col width="10px" style="width:10px;" />
	<col width="490px" style="width:490px;" />
	</colgroup>
		<tr>
			<td style="text-align:center;vertical-align:top;">
				<table border="0" cellpadding="0" cellspacing="0" >
					<tr><td class="game-facebook-top-td"></td></tr>
					<tr><td class="game-facebook-middle-td" style="vertical-align:top;height:367px;">
					<div class="fb-comments" data-num-posts="2" data-width="460" data-colorscheme="light" data-href="<?php echo currentURL();?>"></div>
					</td></tr>
					<tr><td class="game-facebook-bottom-td"></td></tr>
				</table>
			</td>
			<td style="text-align:right;vertical-align:top;">
			</td>			
			<td style="height:399px;vertical-align:top;text-align:center;">

				<table style="width:490px;height:399px;table-layout:fixed;text-align:center;vertical-align:top;background-image:url(<?php echo returnbaseurl().$GLOBALS['uartwork_prefix']; ?>/game_moregames_3row.png);background-position:top right;background-repeat:no-repeat;" border="0" class="maintab" align="center" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr style="height:35px;vertical-align:middle;text-align:center;">
						<td style="width:399px;height:35px;" colspan="3"><a href="<?php echo getcatpagename(get_current_page_content("category"));?>" class="menuitem<?php echo neworold();?>">More  <?php echo getcatdisplayname(get_current_page_content("category"));?> Games</a></td>
					</tr>
					<tr><td colspan="3"><?php printEmptyDivWithHeight(12);?></td></tr>
					<?php // first row of games ?>
					<tr>
						<?php $xcat = 1; // printing 3 games?>
							<?php for  ($ycatgame = 1; $ycatgame <= 3; $ycatgame++) { ?>
							<td style="width:163px;height:80px;" ><a href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php printFunzolaGameThumb(${'category'.$xcat.'Game'.$ycatgame});?></a></td>
							<?php } ?>
					</tr>
					<tr >
						<?php $xcat = 1; // printing 3 games?>
							<?php for  ($ycatgame = 1; $ycatgame <= 3; $ycatgame++) { ?>
							<td style="width:163px;height:34px;vertical-align:top;" align="center"><p style="width:140px;margin:0px;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php echo getGameNameByID(${'category'.$xcat.'Game'.$ycatgame});?></a></p></td>
							<?php } ?>
					</tr>
					<tr><td colspan="3"><?php printEmptyDivWithHeight(3);?></td></tr>

					<?php // second row of games ?>
					<tr>
						<?php $xcat = 1; // printing 3 games?>
							<?php for  ($ycatgame = 4; $ycatgame <= 6; $ycatgame++) { ?>
							<td style="width:163px;height:80px;" ><a href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php printFunzolaGameThumb(${'category'.$xcat.'Game'.$ycatgame});?></a></td>
							<?php } ?>
					</tr>
					<tr >
						<?php $xcat = 1; // printing 3 games?>
							<?php for  ($ycatgame = 4; $ycatgame <= 6; $ycatgame++) { ?>
							<td style="width:163px;height:34px;vertical-align:top;" align="center" ><p style="width:140px;margin:0px;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php echo getGameNameByID(${'category'.$xcat.'Game'.$ycatgame});?></a></p></td>
							<?php } ?>
					</tr>
					<tr><td colspan="3"><?php printEmptyDivWithHeight(3);?></td></tr>

					<?php // second third of games ?>
					<tr>
						<?php $xcat = 1; // printing 3 games?>
							<?php for  ($ycatgame = 7; $ycatgame <= 9; $ycatgame++) { ?>
							<td style="width:163px;height:80px;" ><a href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php printFunzolaGameThumb(${'category'.$xcat.'Game'.$ycatgame});?></a></td>
							<?php } ?>
					</tr>
					<tr >
						<?php $xcat = 1; // printing 3 games?>
							<?php for  ($ycatgame = 7; $ycatgame <= 9; $ycatgame++) { ?>
							<td style="width:163px;height:34px;vertical-align:top;" align="center" ><p style="width:140px;margin:0px;"><a class="categoryboxgamenamelink<?php echo neworold();?>" href="<?php echo getPageInternalURL(${'category'.$xcat.'Game'.$ycatgame});?>"><?php echo getGameNameByID(${'category'.$xcat.'Game'.$ycatgame});?></a></p></td>
							<?php } ?>
					</tr>
					<tr><td colspan="3"><?php printEmptyDivWithHeight(3);?></td></tr>

				</tbody>
				</table>
			</td>
		</tr>
	</table>

<?php
}
?>