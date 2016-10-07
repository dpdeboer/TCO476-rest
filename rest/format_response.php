<?php 
// assumes $response has a response buffer and
// puts the formatted response buffer in $fnResponse
if (empty($outputType)) {
	$outputType = 'json'; // the default output type
}

if (!headers_sent()) {
	if ($outputType == 'text') {
		header('content-type: text/html');
	} else {
		header('content-type: application/json');
	}
	if (empty($response['code'])) {
		// if no code, assume 200.
		// this could probably be made smarter, but the default is good for now.
		$response['code'] = 200;
	}
	$headerString = 'X-PHP-Response-Code: '.$response['code'];
	header($headerString, true, $response['code']);
	header('Access-Control-Allow-Origin: *');
}

$thisParam = "callback";
if (array_key_exists($thisParam, $_GET)) {
	if (!empty($_GET[$thisParam])) {
		$jsonpTag = $_GET[$thisParam]; // set by jquery ajax call when using jsonp data type
	}
}
if ($outputType == 'text') {
	$fnResponse = $response['data'];
} else {
	$fnResponse = json_encode($response);
}

if (!empty($jsonpTag)) { 
	// format and send output
	// no error information is returned in the JSONP response!
	$fnResponse = $jsonpTag . '(' . json_encode($fnResponse) . ')';
}
?>