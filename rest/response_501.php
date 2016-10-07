<?php
// unrecognized command
$errData['code'] = 501;
$errData['message'] = 'Unrecognized command';
$response['error'] = $errData;
$response['code'] = $errData['code'];
		if ($debugState) {
	// return debug info
	if (empty($thisFile)) {$thisFile = __FILE__;}
	$dbgData['module'] = $thisFile;
	$dbgData['postData'] = $postData;
	$dbgData['getData'] = $_GET;
	$response['debug'] = $dbgData;
}
?>