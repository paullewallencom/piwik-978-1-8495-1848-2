<?php
	
	//The url to your Piwik folder
	$p_url = "";
	//The id of your site in Piwik
	$site_id = "";
	//Your Piwik token_auth
	$token_auth = "";

	function write_log($message) {		
        $log_file = 'logfile.txt';
		
		$fp = fopen($log_file, 'a') or exit("Can't open logfile!");
		
        $time = @date('Y-m-d');
		
        fwrite($fp, "$time:$message" . PHP_EOL);
		
		fclose($fp);
    }
	
	function read_log() {		
		$log_file = 'logfile.txt';
		
		$fp = fopen($log_file, 'r') or exit("Can't open logfile!");
		
		$log_rows = array();
		
		while(!feof($fp))	{
			$log_parts = explode(":", fgets($fp));
			if (count($log_parts) == 2){
				$log_rows[$log_parts[0]] = $log_parts[1];
			}
		}
		
		fclose($fp);
		
		return $log_rows;
	}
	
	function piwik_data($stats_url) {				
		$ch = curl_init($stats_url);
		
		curl_setopt ($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		$result = curl_exec($ch);
		
		curl_close($ch);
		
		return json_decode($result);
	}
	
	function merge_data($p_url,$site_id,$token_auth){
		$stats_url =  $p_url."?module=API&method=VisitsSummary.getVisits&idSite=".$site_id."&period=day&date=last30&format=JSON&token_auth=".$token_auth;
		$log_data = read_log();
		$stats_data = piwik_data($stats_url);
		$merged_data = array();
		
		foreach ($log_data as $k => $v) {
			$merged_data[$k]['notes'] = trim($v);
		}
		
		foreach ($stats_data as $k => $v) {
			if (array_key_exists($k, $merged_data)) {
				$merged_data[$k]['visits'] = (int)$v;
			}else{
				$merged_data[$k]['visits'] = (int)$v;
				$merged_data[$k]['notes'] = null;
			}
		}
		
		return $merged_data;
	}
	
	if (isset($_POST['message']) && strlen($_POST['message']) > 0) {
		write_log($_POST['message']);
	}

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
		google.load('visualization', '1', {packages: ['annotatedtimeline']});
		function drawVisualization() {
			var data = new google.visualization.DataTable();
			data.addColumn('date', 'Date');
			data.addColumn('number', 'Visits');
			data.addColumn('string', 'title1');
			data.addRows([
			<?php
				$data = merge_data($p_url,$site_id,$token_auth);
				foreach ($data as $k => $v) {
					echo "[new Date(";
					$date_array = explode("-",$k);
					echo $date_array[0].",".$date_array[1].",".$date_array[2]."),";
					echo $data[$k]['visits'].",";
					echo "'".$data[$k]['notes']."'],";
				}
			?>
			]);
			
			var annotatedtimeline = new google.visualization.AnnotatedTimeLine(
			document.getElementById('visualization'));
			annotatedtimeline.draw(data, {'displayAnnotations': true});
		}
		
		google.setOnLoadCallback(drawVisualization);
	</script>
	<title>Website Log</title>
</head>
<body>
	<div id="wrapper">
		<header>
			<h1>Website Log</h1>
		</header>
		<form action="" method="post">
			What Changed?: <input type="text" name="message" size="50"/>
			<input type="submit" name="mysubmit" value="Log Change" />
		</form>
		<h2>Website Log Chart</h2>
		<div id="visualization" style="width: 1000px; height: 600px;"></div>
		<footer>
			<p></p>
		</footer>
	</div>
</body>
</html>