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
		$download_url = str_replace(".php",".zip","http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		echo '<img src="'. str_replace("&","&amp;", Piwik_getUrlTrackPageView( $idSite = {$IDSITE}, $customTitle = "MyDownload-".$download_url)) . '" alt="" />';			
	?>
</body>
</html>
