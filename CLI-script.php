<?php
	$bleh = file_get_contents("https://api.twitch.tv/kraken/search/streams?q=starcraft");
	$blah = json_decode($bleh);

	print_r($blah);
?>