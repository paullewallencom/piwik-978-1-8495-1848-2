import flash.external.ExternalInterface

playBtn.addEventListener(
MouseEvent.CLICK, ExternalInterface.call('piwikTracker.setCustomVariable', 1,'Video', 'Play', 'page'));
