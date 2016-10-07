<?php

/* require files for each command that supports this method */
require_once 'airport_get_study.php';

function _airport_get($link, $postData) {
	$debugState = false;
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['postData'] = $postData;
	}
	$actionTaken = false;
	/*
	* Repeat for each command that supports this method.
	*  only one method allowed per call.
	* 1. define $action to the the command
	* 2. Test for that command
	* 3. if true, call the function that performs the command
	$action = 'config';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _gratuity_get_config ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 
	*/
	$action = 'airport';
	if (!$actionTaken && (!empty($postData[$action]))) {
		$requestBuffer = $postData[$action];
		$response = _gratuity_get_airport ($link, $requestBuffer, $debugState);
		$actionTaken = true;
    } 
	if (!$actionTaken) {
		$thisFile = __FILE__;
		require 'response_501.php';
	}

	return $response;
}
?>