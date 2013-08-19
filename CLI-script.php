<?php
	$bleh = file_get_contents("https://api.twitch.tv/kraken/search/streams?q=Starcraft%20II&limit=10");
	$blah = json_decode($bleh, true);
	
	foreach($blah["streams"] as $stream){
		echo $stream["channel"]["status"]." - ".$stream["viewers"]."\n";
	}
?>
