<?php
	$GLOBALS['includePlusOne']=true;
?>
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td><h3 class="pageName"><?php p('h101');?> <?php echo $GLOBALS['header_index_page']?></h3>
</td><td style="width:250px;text-align:right;">
<!-- Place this tag where you want the +1 button to render -->
<g:plusone></g:plusone>

<!-- Place this render call where appropriate -->
</td>
</tr>
</table>
<div class="bodyText">
<?php echo get_current_page_content("section1");?>
<table cellspacing="0" cellpadding="0" style="border:0;width:638px;">
<?php
// fetching number of relevant menu items
$total_records=get_mysql_count("tgames","where type='game' and published='1'");

// fetching all games
$gamesql = "select gameid,gameinternalname,gamename from tgames where type='game' and published='1'  order by gameid asc";
$query = mysql_query($gamesql) or errorpage(false,$gamesql,nep("i141"));
$counter = 0;
?>
<tr>
<?php
while (($row = mysql_fetch_array($query)) && ($counter<$GLOBALS['index_games_max_games']))
{
	$counter = $counter +1;
	$gameinternalname = $row['gameinternalname'];
	$gamename = $row['gamename'];
	$gameid = $row['gameid'];
	echo '<td class="gameThumbTD">';
	print_game_thumb(returnbaseurl().$GLOBALS['gameicon_prefix'].'/'.$GLOBALS['gameicon_file_prefix'].$gameinternalname.".".$GLOBALS['gameicon_type'],$gamename,get_page_url($gameinternalname,"php"));
	echo '</td>';

	if ((($counter % $GLOBALS['index_games_per_line']) == 0) && ($counter<$total_records)  && ($counter<$GLOBALS['index_games_max_games']))
	{
		echo '</tr><tr>';
	}
}
//echo $counter;
//echo $total_records;
while (($counter % $GLOBALS['index_games_per_line']) <> 0)
{
	echo '<td>&nbsp;</td>';
	$counter=$counter+1;
}
?>
</tr>
</table>

<?php if ($GLOBALS['digsolitaire_highscores']) 
{ 	// showing high-scores ?>
<div style="text-align:left;" name="highscoreDiv" id="highscoreDiv" >
<?php 
	recentScores();
?>
</div>
<?php } ?>

<?php echo get_current_page_content("section2");?>
<?php 
	// <!-- all articles table - START - if number of articles > 0-->  
	if ($GLOBALS['index_show_more_articles_section'] & (get_mysql_count("tgames","where type='article' and published='1'")>0))
	{
		?>
		<br/>
		<h3 class="pageName"><?php echo $GLOBALS['articles_div_h3_header'];?></h3>
		<ul>
		<?php
		$where_clause="where type='article'";
		template_html_menu(
			$where_clause,
			'<li><a class="sidebarText" href="',
			'">',
			'</a></li>',
			$GLOBALS['games_menu_games_max_games'],
			0,
			"",
			"",
			false,
			true
			);
		?>
		</ul>
		<?php 
		// <!-- all articles table - END - if number of articles > 0-->  
	}
?>
<br/>
<?php adsystem("homepage_728x90"); ?>
</div>
