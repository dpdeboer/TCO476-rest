<?php
/* require files for each command that supports this method */
require_once 'airline_get_airline.php';

function _airline_get($link, $resourceElems, $qpElems, $debugState) {
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['resourceElems'] = $resourceElems;
	}
	$actionTaken = false;
	if (!empty($resourceElems)) {
		// get airline entry with resource ID
		$airlineId = $resourceElems[0];
		$response = _airline_get_airline ($link, $airlineId, $qpElems, $debugState);
		$actionTaken = true;
    } else {
		// perform airline lookup by query parameter
		// function not available, yet.
		$localErr = '';
		$localErr['info'] = 'No airline ID specified';
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