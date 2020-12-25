<?php

function piwik_data($stats_url) {				
	$ch = curl_init($stats_url);
	
	curl_setopt ($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$result = curl_exec($ch);
	
	curl_close($ch);
	
	return $result;
}

$data_url = 'http://YOUR_PIWIK_URL/piwik/index.php?module=API&method=Live.getCounters&idSite=YOUR_SITE_ID&lastMinutes=60&format=json&token_auth=anonymous';

$result = piwik_data($data_url);

$result_array = json_decode($result);

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Visitors in Last Hour</title>
</head>
<body>
<?php echo $result_array[0]->visits; ?>	
</body>
</html>