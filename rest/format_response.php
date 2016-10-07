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
	header('X-PHP-Response-Code: 200', true, 200);
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