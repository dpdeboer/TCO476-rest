<?php
/* require files for each command that supports this method */
require_once 'flight_get_flight.php';

function _flight_get($link, $resourceElems, $qpElems, $debugState) {
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['resourceElems'] = $resourceElems;
	}
	$actionTaken = false;
	if (!empty($resourceElems)) {
		// get flight entry with resource ID
		$flightId = $resourceElems[0];
		$response = _flight_get_flight ($link, $flightId, $qpElems, $debugState);
		$actionTaken = true;
    } else {
		// perform flight lookup by query parameter
		// function not available, yet.
		$localErr = '';
		$localErr['info'] = 'No flight ID specified';
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