<!--Piwik-->
 <script type = "text/javascript">
	var pkBaseURL = (("https:" == document.location.protocol) ? "https://$PIWIK_URL" : "http://$PIWIK_URL");
	document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
 </script>
 <script type = "text/javascript">
	try {
		var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", $SITE_ID);
		piwikTracker.addEcommerceView(
			"M-2542", //sku
			"Holy Hand Grenade", //name
			"Gold Things", //category
			14.99); //price
		piwikTracker.trackPageView();
		piwikTracker.enableLinkTracking();
	} catch (err) {}
</script>
<noscript><p><img src ="$PIWIK_URL/piwik.php?idsite=1" style = "border:0" alt = ""/></p></noscript>
<!--End Piwik Tracking Code-->