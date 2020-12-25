<?php 
// -- Piwik Tracking API init -- 
require_once "/PATH_TO/PiwikTracker.php";
PiwikTracker::$URL = 'http://YOUR_PIWIK_URL';
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="refresh" content="1;url=http://mywebsite.com/mydownload.zip">
	<title></title>
</head>
<body>
	<?php
		// --Our Log Download Code --
		echo '<img src="'. str_replace("&","&amp;", Piwik_getUrlTrackAction( $idSite = {$IDSITE}, $actionUrl = "http://mywebsite.com/mydownload.zip", $actionType = "download")) . '" alt="" />';			
	?>
</body>
</html>
