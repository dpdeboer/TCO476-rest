<?php
/* require files for each command that supports this method */
require_once 'pilot_delete_pilot.php';

function _pilot_delete ($link, $resourceElems, $qpElems, $debugState) {
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['resourceElems'] = $resourceElems;
	}
	$actionTaken = false;
	if (!empty($resourceElems)) {
		// get pilot entry with resource ID
		$pilotId = $resourceElems[0];
		$response = _pilot_delete_pilot ($link, $pilotId, $qpElems, $debugState);
		$actionTaken = true;
    } else {
		// perform pilot lookup by query parameter
		// function not available, yet.
		$localErr = '';
		$localErr['info'] = 'No pilot ID specified';
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