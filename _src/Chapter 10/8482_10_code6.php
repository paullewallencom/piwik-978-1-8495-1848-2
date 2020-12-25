<?php
	define('PIWIK_INCLUDE_PATH', realpath('ReplaceWithThePathToYourPiwikFolder'));
	define('PIWIK_USER_PATH', realpath('PIWIK_INCLUDE_PATH'));
	define('PIWIK_ENABLE_DISPATCH', false);
	define('PIWIK_ENABLE_ERROR_HANDLER', false);
	define('PIWIK_ENABLE_SESSION_START', false);
	require_once PIWIK_INCLUDE_PATH . "/index.php";
	require_once PIWIK_INCLUDE_PATH . "/core/API/Request.php";
	Piwik_FrontController::getInstance()->init();
	// This inits the API Request with the specified parameters
	$request = new Piwik_API_Request('
				method=Referers.getKeywordsForPageUrl
				&idSite=1
				&date=yesterday
				&period=week
				&url=http://www.stephanmiller.com/my-link-lists/92-free-classified-ad-sites/
				&format=XML
				&token_auth=anonymous
	');
	// Calls the API and fetch XML data back
	$result = $request->process();
	echo $result;
?>