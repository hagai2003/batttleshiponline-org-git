<?php
	$topBoxTitle="Editors Picks";
	$topBoxGameID1=25;
	$topBoxGameID2=29;
	$topBoxGameID3=27;
	$topBoxGameID4=32;
	$topBoxGameID5=31;
	$topBoxGameID6=36;

	printEmptyDivWithHeight(16);

	funzolaTopBox($topBoxTitle,$topBoxGameID1,$topBoxGameID2,$topBoxGameID3,$topBoxGameID4,$topBoxGameID5,$topBoxGameID6);

	printEmptyDivWithHeight(40);

	$categoryName1="Platform";
	$categoryName2="Action";
	$categoryName3="Shooters";
	
	$categoryURL1="retro-platform.php";
	$categoryURL2="retro-action.php";
	$categoryURL3="retro-shooters.php";

	$category1Game1=getFunzolaRandomGameID();
	$category1Game2=getFunzolaRandomGameID();
	$category1Game3=getFunzolaRandomGameID();
	$category1Game4=getFunzolaRandomGameID();
	$category1Game5=getFunzolaRandomGameID();
	$category1Game6=getFunzolaRandomGameID();
	$category1Game7=getFunzolaRandomGameID();
	$category1Game8=getFunzolaRandomGameID();

	$category2Game1=getFunzolaRandomGameID();
	$category2Game2=getFunzolaRandomGameID();
	$category2Game3=getFunzolaRandomGameID();
	$category2Game4=getFunzolaRandomGameID();
	$category2Game5=getFunzolaRandomGameID();
	$category2Game6=getFunzolaRandomGameID();
	$category2Game7=getFunzolaRandomGameID();
	$category2Game8=getFunzolaRandomGameID();

	$category3Game1=getFunzolaRandomGameID();
	$category3Game2=getFunzolaRandomGameID();
	$category3Game3=getFunzolaRandomGameID();
	$category3Game4=getFunzolaRandomGameID();
	$category3Game5=getFunzolaRandomGameID();
	$category3Game6=getFunzolaRandomGameID();
	$category3Game7=getFunzolaRandomGameID();
	$category3Game8=getFunzolaRandomGameID();

	funzola3CategoryBoxes($categoryName1,$categoryName2,$categoryName3,
						$categoryURL1,$categoryURL2,$categoryURL3,
						$category1Game1,$category1Game2,$category1Game3,$category1Game4,$category1Game5,$category1Game6,$category1Game7,$category1Game8,
						$category2Game1,$category2Game2,$category2Game3,$category2Game4,$category2Game5,$category2Game6,$category2Game7,$category2Game8,
						$category3Game1,$category3Game2,$category3Game3,$category3Game4,$category3Game5,$category3Game6,$category3Game7,$category3Game8);

	printEmptyDivWithHeight(16);

	$categoryName1="Puzzles";
	$categoryName2="Random";
	$categoryName3="New";
	
	$categoryURL1="retrogames-puzzles.php";
	$categoryURL2="retrogames-random.php";
	$categoryURL3="/";

	$category1Game1=getFunzolaRandomGameID();
	$category1Game2=getFunzolaRandomGameID();
	$category1Game3=getFunzolaRandomGameID();
	$category1Game4=getFunzolaRandomGameID();
	$category1Game5=getFunzolaRandomGameID();
	$category1Game6=getFunzolaRandomGameID();
	$category1Game7=getFunzolaRandomGameID();
	$category1Game8=getFunzolaRandomGameID();

	$category2Game1=getFunzolaRandomGameID();
	$category2Game2=getFunzolaRandomGameID();
	$category2Game3=getFunzolaRandomGameID();
	$category2Game4=getFunzolaRandomGameID();
	$category2Game5=getFunzolaRandomGameID();
	$category2Game6=getFunzolaRandomGameID();
	$category2Game7=getFunzolaRandomGameID();
	$category2Game8=getFunzolaRandomGameID();

	$category3Game1=getFunzolaRandomGameID();
	$category3Game2=getFunzolaRandomGameID();
	$category3Game3=getFunzolaRandomGameID();
	$category3Game4=getFunzolaRandomGameID();
	$category3Game5=getFunzolaRandomGameID();
	$category3Game6=getFunzolaRandomGameID();
	$category3Game7=getFunzolaRandomGameID();
	$category3Game8=getFunzolaRandomGameID();

	funzola3CategoryBoxes($categoryName1,$categoryName2,$categoryName3,
						$categoryURL1,$categoryURL2,$categoryURL3,
						$category1Game1,$category1Game2,$category1Game3,$category1Game4,$category1Game5,$category1Game6,$category1Game7,$category1Game8,
						$category2Game1,$category2Game2,$category2Game3,$category2Game4,$category2Game5,$category2Game6,$category2Game7,$category2Game8,
						$category3Game1,$category3Game2,$category3Game3,$category3Game4,$category3Game5,$category3Game6,$category3Game7,$category3Game8);

	?>

