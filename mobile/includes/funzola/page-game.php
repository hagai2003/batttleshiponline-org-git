<?php

	$gameid = get_current_page_content("gameid");

	$alreadyvoted=false;

	if (isset($_SESSION['spvote1']))
	{
		if ($_SESSION['spvote1'] == $gameid)
		{
			//echo 'You already voted for this game';
			$alreadyvoted=true;
		}
		else
		if (isset($_SESSION['spvote2']))
		{
			if ($_SESSION['spvote2'] == $gameid)
			{
				//echo 'You already voted for this game';
				$alreadyvoted=true;
			}
		}
	}

	printFunzolaBanner728x90();

	printEmptyDivWithHeight(20);

	printFunzolaGame();

	printEmptyDivWithHeight(20);

	printFunzolaGameDescAndAd($alreadyvoted);

	//printFunzolaGameDescAndFacebook();

	$category1Game1=getFunzolaRandomGameID();
	$category1Game2=getFunzolaRandomGameID();
	$category1Game3=getFunzolaRandomGameID();
	$category1Game4=getFunzolaRandomGameID();
	$category1Game5=getFunzolaRandomGameID();
	$category1Game6=getFunzolaRandomGameID();
	$category1Game7=getFunzolaRandomGameID();
	$category1Game8=getFunzolaRandomGameID();
	$category1Game9=getFunzolaRandomGameID();
	$category1Game10=getFunzolaRandomGameID();
	$category1Game11=27; getFunzolaRandomGameID();
	$category1Game12=getFunzolaRandomGameID();

	printEmptyDivWithHeight(20);

	printFunzolaMoreGamesAndFacebook($category1Game1,$category1Game2,$category1Game3,$category1Game4,
									 $category1Game5,$category1Game6,$category1Game7,$category1Game8,$category1Game9);

	//printEmptyDivWithHeight(20);
	//funzolaGamepageMoreGames($category1Game1,$category1Game2,$category1Game3,$category1Game4,$category1Game5,$category1Game6,
	//					$category1Game7,$category1Game8,$category1Game9,$category1Game10,$category1Game11,$category1Game12);

	printEmptyDivWithHeight(20);

	printFunzolaScreenshots();


	?>

