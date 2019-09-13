<?php
session_start();
$GLOBALS['dbonoff'] = true;
global $pagename;
require("baseurl.php");
include("includes/services.php");
include("includes/lang.php");
include("includes/lang.php");

handle_specific_pages();
$pagename=get_current_full_uri();

//echo '$pagename='.$pagename;
pageExists();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<?php
include("includes/".$GLOBALS['template_name']."/inc-head.php");
?>
</head>
<body class="text-center  back-black" id="page-top" style="color: #CCCCCC;"  ondragstart="return false;" ondrop="return false;">
<?php
include("includes/".$GLOBALS['template_name']."/inc-title.php");
// ---------------------------
// page content - starting
// ---------------------------
if (pageExists())
{
	$pagetoinclude="includes/".$GLOBALS['template_name']."/page-".get_page_content($pagename,'type').".php";

	if (!@include($pagetoinclude)) //(file_exists($pagetoinclude))
	{
		error_page_404("Template Page");
	}
}
else
{
	error_page_404($_SERVER["REQUEST_URI"]);
}

// ---------------------------
// page content - ending
// ---------------------------
include("includes/".$GLOBALS['template_name']."/inc-bottom.php");
?>
</body>
</html>
