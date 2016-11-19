<?php

function _pilot_delete_pilot ($link, $pilotId, $qpElems, $debugState) {
require_once 'dbConfig.php';
require_once 'db_utils.php';
	// initialize the response buffer
	$response = '';
	// initialize the debug values
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['pilotId'] = $pilotId;
		$response['debug']['link'] = $link;
	}
	if (!is_null($link)) {
		if (empty($response['error'])) {
			// validate the request buffer fields
			if (isset($pilotId)) {
				// read conifguration for this study and condition
				$queryString = 'DELETE FROM '.DB_TABLE_PILOTS.
					' WHERE pilotId = "'.$pilotId.'"';
				$result = @mysqli_query ($link, $queryString);
				if ($result) {
						$response['code'] = 200;
				} 
				else 
				{
					$localErr = '';
					$localErr['info'] = 'No pilot resources found for the specified ID';
					$localErr['message'] = get_error_message ($link, 404);
					$response['error'] = $localErr;
					$response['code'] = 404;
				}
				if ($debugState) {
					// write detailed sql info
					$localErr = '';
					$localErr['sqlQuery'] = $queryString;
					$localErr['sqlError'] =  mysqli_sqlstate($link);
					$localErr['message'] = mysqli_error($link);				
					$response['debug']['sqlSelect1']= $localErr;
				}
			} else {
				// missing a required parameter
				$localErr = '';
				$localErr['info'] = 'A required parameter is missing. You must provide an pilotId.';
				$localErr['message'] = get_error_message ($link, 400);
				$response['error'] = $localErr;
				$response['code'] = 400;
			}
		}
	} else {
	// not implemented
		$errData['code'] = 500;
		$errData['message'] = 'DB Error on the server.';
		$response['error'] = $errData;	
		$response['code'] = 500;
	}			
	return $response;
}
?>