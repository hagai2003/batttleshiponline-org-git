<?php
	$topBoxTitle="Editors Pick";
	$topBoxGameID1=25;
	$topBoxGameID2=29;
	$topBoxGameID3=27;
	$topBoxGameID4=32;
	$topBoxGameID5=31;
	$topBoxGameID6=36;

	printEmptyDivWithHeight(16);

	funzolaTopBox($topBoxTitle,$topBoxGameID1,$topBoxGameID2,$topBoxGameID3,$topBoxGameID4,$topBoxGameID5,$topBoxGameID6);

	printEmptyDivWithHeight(35);
	$sortby="2";
	funzolaSortBox($sortby);
	printEmptyDivWithHeight(15);

	// printing first group of 12 games

	$line1Game1=getFunzolaRandomGameID();
	$line1Game2=getFunzolaRandomGameID();
	$line1Game3=getFunzolaRandomGameID();
	$line1Game4=getFunzolaRandomGameID();
	$line1Game5=getFunzolaRandomGameID();
	$line1Game6=getFunzolaRandomGameID();

	$line2Game1=getFunzolaRandomGameID();
	$line2Game2=getFunzolaRandomGameID();
	$line2Game3=getFunzolaRandomGameID();
	$line2Game4=getFunzolaRandomGameID();
	$line2Game5=getFunzolaRandomGameID();
	$line2Game6=getFunzolaRandomGameID();

	funzolaCategoryGames2Lines($line1Game1,$line1Game2,$line1Game3,$line1Game4,$line1Game5,$line1Game6,
						$line2Game1,$line2Game2,$line2Game3,$line2Game4,$line2Game5,$line2Game6);


	printEmptyDivWithHeight(6);

	// printing second group of 12 games
	$line1Game1=getFunzolaRandomGameID();
	$line1Game2=getFunzolaRandomGameID();
	$line1Game3=getFunzolaRandomGameID();
	$line1Game4=getFunzolaRandomGameID();
	$line1Game5=getFunzolaRandomGameID();
	$line1Game6=getFunzolaRandomGameID();

	$line2Game1=getFunzolaRandomGameID();
	$line2Game2=getFunzolaRandomGameID();
	$line2Game3=getFunzolaRandomGameID();
	$line2Game4=getFunzolaRandomGameID();
	$line2Game5=getFunzolaRandomGameID();
	$line2Game6=getFunzolaRandomGameID();


	funzolaCategoryGames2Lines($line1Game1,$line1Game2,$line1Game3,$line1Game4,$line1Game5,$line1Game6,
						$line2Game1,$line2Game2,$line2Game3,$line2Game4,$line2Game5,$line2Game6);
	
	?>

