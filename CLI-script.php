<?php
	$limit = 10;
	$max_status_char = 64;
	$external_player = "omxplayer";

	$stdin = fopen('php://stdin', 'r');

	$content = file_get_contents("https://api.twitch.tv/kraken/search/streams?q=Starcraft%20II");
	$content_dec = json_decode($content, true);
	
	usort($content_dec['streams'], function($a, $b) {
	    return $b['viewers'] - $a['viewers'];
	});

	for ($i=0; $i < $limit-1; $i++) { 
		echo $i." - ".substr($content_dec['streams'][$i]['channel']['status'], 0, $max_status_char ) ."\t".$content_dec['streams'][$i]['viewers']."\n";
	}

	echo "\nSelect a stream: ";
	$selection = fgets($stdin);
	if(preg_match("/[0-9]/", $selection)){
		system("livestreamer ".$content_dec['streams'][intval($selection)]['channel']['url']." mobile_high -np ".$external_player);
	}
	else{
		exit("Invalid selection.");
	}

?>
