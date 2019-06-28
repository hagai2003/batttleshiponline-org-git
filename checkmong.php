<?php

$version="1.0"; // 05/03/2013

echo 'checkmong version '.$version;
echo '<br/>';
checkFile('.htaccess');
echo '<br/>';
checkFile('index.php');
echo '<br/>';
checkFile('index.html');
echo '<br/>';
checkFile('index.htm');
echo '<br/>';
checkFile('default.htm');
echo '<br/>';
checkFile('default.html');
echo '<br/>';
checkFile('wp-config.php');
echo '<br/>';
checkFile('baseurl.php');
echo '<br/>';
checkFile('checkmong.php');
echo '<br/>';
echo date('F').'-'.date('Y');

function checkFile($filename)
{
	if (file_exists($filename)) 
	{
	    echo "$filename modified: " . date ("F d Y H:i:s.", filemtime($filename));
		echo '<br/>';
		echo "$filename size: ".filesize($filename);
	} 
	else 
	{
		echo "$filename does not exist";
	}

}
?>