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
		$response = _airport_get_airport ($link, $resourceElems, $qpElems, $debugState);
		$actionTaken = true;
    } 
	if (!$actionTaken) {
		$thisFile = __FILE__;
		require 'response_501.php';
	}

	return $response;
}
?>