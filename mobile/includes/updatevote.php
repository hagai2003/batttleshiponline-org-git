<?php 
session_start();
$GLOBALS['dbonoff'] = true;
require("../baseurl.php");
require("services.php");

$userrating = protectstring($_REQUEST['vote'],"mysql");
$gameid = protectstring($_REQUEST['gameid'],"mysql");

if (isset($_SESSION['spvote1']))
{
	if ($_SESSION['spvote1'] == $gameid)
	{
		echo 'You already voted for this game';
		exit();
	}
	else
	if (isset($_SESSION['spvote2']))
	{
		if ($_SESSION['spvote2'] == $gameid)
		{
			echo 'You already voted for this game';
			exit();			
		}
		else
		{	
			$_SESSION['spvote2'] = $_SESSION['spvote1'];
			$_SESSION['spvote1'] = $gameid;	
		}
	}
	else
	{	
		$_SESSION['spvote2'] = $_SESSION['spvote1'];
		$_SESSION['spvote1'] = $gameid;	
	}
}
else
{
	$_SESSION['spvote1'] = $gameid;
}

if ($userrating ==1) 
{
  mysql_query("update tgames set thumbsup = thumbsup + 1 where gameid=".$gameid) or returnerror("error 107"); // die (mysql_error());	
}
else
if ($userrating == 0) 
{
  mysql_query("update tgames set thumbsdown = thumbsdown + 1 where gameid=".$gameid) or returnerror("error 108");// die (mysql_error());	
}
else
{
	echo "Invalid request";
	return;
}

if (!is_numeric($gameid))
{
	echo "Invalid request";
	return;
}
mysql_query("update tgames set score = 5*(thumbsup/(thumbsdown + thumbsup)) where gameid=".$gameid) or returnerror("error 109");

$votessql = "select gameid,thumbsup,thumbsdown from tgames where gameid = '".$gameid."'";
$query = mysql_query($votessql) or returnerror("error 110");  //or die (mysql_error());
$row = mysql_fetch_array($query);
$thumbsup = $row['thumbsup'];
$thumbsdown = $row['thumbsdown'];
$totalvotes = $thumbsup + $thumbsdown;
// rewrite the statistics -- keep this part identical to gameinclude.php
//echo $totalvotes." ";
//if ($totalvotes == 1) {echo "Vote";} else {echo "Votes";}  // vote / votes
//echo " - ";
if ($totalvotes > 0)
{
//	echo number_format((100*$thumbsup/$totalvotes), 0)."%";
}
else
{
//	echo "0%";
}
//echo ' Liked it';
// end rewrite statistics
//echo '<br/>Thanks for voting!';
echo 'Thanks for voting!';
function returnerror($which)
{
	echo $which;
	exit(0);
}

?>