<?php

	require('./ortc.php');

	// Genarate a random string to use as token
	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	$URL = 'http://ortc-developers.realtime.co/server/2.1';
	$AK = 'ENTER-YOUR-REALTIME-APPKEY';
	$PK = 'ENTER-YOUR-REALTIME-PRIVATE-KEY';

	// Get a random string to use as Realtime token
	$TK = generateRandomString();
	$CH = 'yellow';
	 

	// mocking the user login credentials
	// username: demo
	// password: demo
	$_USERPASS['demo'] = 'demo';

	// get the POST request with the user credentials
	$entityBody = file_get_contents('php://input');
	$json_o = json_decode($entityBody, true);


	if ((isset($json_o['user']) == true) && (isset($json_o['pass'])) && in_array($json_o['user'], $_USERPASS) && strcmp($json_o['pass'], $_USERPASS[$json_o['user']]) == 0)  {
		// we have valid credentials
	    $rt = new Realtime( $URL, $AK, $PK, $TK );
	    $ttl = 180000;

	    // authenticate the tolen for the user
	    $result = $rt->auth(
	        array(
	            $CH => 'w'
	        ),
	        0,
	        $ttl
	    );
	    if ($result == 1){
	    	// authenticated, return the generated token
	    	echo "{\"status\":\"success\",\"token\":\"".$TK."\"}";
	    }elseif ($result == 0) {
	    	// error authenticating the token
	    	echo "{\"status\":\"error\"}";
	    }
	}else{
		// invalid credentials
		echo "{\"status\":\"error\"}";
	}

?>