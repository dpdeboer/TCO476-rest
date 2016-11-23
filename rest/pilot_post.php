<?php
/* require files for each command that supports this method */
require_once 'pilot_post_pilot.php';

function _pilot_post($link, $resourceElems, $postData, $qpElems, $debugState) {
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['resourceElems'] = $resourceElems;
	}
	$actionTaken = false;
	if (!empty($qpElems)) {
		// create a new pilot entry from qpElems
		$response = _pilot_post_pilot ($link, $postData, $qpElems, $debugState);
		$actionTaken = true;
    } else {
		// perform pilot lookup by query parameter
		// function not available, yet.
		$localErr = '';
		$localErr['info'] = 'No pilot info specified';
		$localErr['message'] = get_error_message ($link, 400);
		$response['error'] = $localErr;
		$response['code'] = 400;	
		$actionTaken = true;
	}
	
	if (!$actionTaken) {
		$thisFile = __FILE__;
		require 'response_501.php';
	}

	return $response;
}
?>