<!-- Piwik --> 
<script type="text/javascript">
	var pkBaseURL = (("https:" == document.location.protocol) ? "https://$PIWIK_URL" : "http://$PIWIK_URL");
	document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try {
	var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", $SITE_ID);
	tracker.setCookieDomain('*.holyhandgrenadeareus.com');
	tracker.setDomains('*.holyhandgrenadeareus.com');
	piwikTracker.trackPageView();
	piwikTracker.enableLinkTracking();
	} catch( err ) {}
</script>
<noscript><p><img src="$PIWIK_URL/piwik.php?idsite=$SITE_ID" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->