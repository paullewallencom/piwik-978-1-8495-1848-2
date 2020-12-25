<?php
	//Set the id of your piwik site here
	$idSite = 1;
	$token_auth = 'your user token here';
	
	//Create a PiwikTracker Object
	$piwikTracker = new PiwikTracker($idSite, 'http://your_piwik_url.com/piwik/');
	
	//Visitor Id from our site's user database
	$piwikTracker->setVisitorId( "33c31e01394bdc63" );

	// Sends Tracker request via http

	$piwikTracker->doTrackPageView('Get Page Title From DataBase Here');

	// You can also track Goal conversions

	$piwikTracker->doTrackGoal($idGoal = 1, $revenue = 10);

?>
