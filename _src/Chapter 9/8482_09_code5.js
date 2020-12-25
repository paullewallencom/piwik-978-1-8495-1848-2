function log_custom_variable($index,$key,$value) {

	return 'piwikTracker.setCustomVariable('.$index.',"'.$key.'","'.$value.'","visit");' . "\n";

}