<?php

/* require files for each command that supports this method */
require_once 'airport_get_airport.php';

function _airport_get($link, $resourceElems, $qpElems, $debugState) {
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['resourceElems'] = $resourceElems;
	}
	$actionTaken = false;
	if (!empty($resourceElems)) {
		// get airport entry with resource ID
		$airportId = $resourceElems[0];
		$response = _airport_get_airport ($link, $airportId, $qpElems, $debugState);
		$actionTaken = true;
    } else {
		// perform airport lookup by query parameter
		// function not available, yet.
		$localErr = '';
		$localErr['info'] = 'No airport ID specified';
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